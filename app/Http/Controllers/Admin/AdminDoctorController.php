<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminDoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('schedules')
            ->withCount('schedules')
            ->latest()
            ->paginate(9);

        return view('admin.doctors.index', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'clinic' => 'required|string|max:255',
            'category' => 'required|in:rawat_jalan,pelayanan_penunjang',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',

            'schedules' => 'nullable|array',
            'schedules.*.day' => 'required_with:schedules|string',
            'schedules.*.start_time' => 'nullable',
            'schedules.*.end_time' => 'nullable',
            'schedules.*.status' => 'required|in:practice,holiday',
        ]);

        DB::beginTransaction();

        try {

            $photo = null;

            if ($request->hasFile('photo')) {
                $photo = time() . '.' . $request->photo->extension();

                $request->photo->move(
                    public_path('img/dokter'),
                    $photo
                );
            }

            $doctor = Doctor::create([
                'name' => $request->name,
                'clinic' => $request->clinic,
                'category' => $request->category,
                'photo' => $photo,
                'is_active' => $request->is_active,
            ]);

            if ($request->filled('schedules')) {

                foreach ($request->schedules as $schedule) {

                    $doctor->schedules()->create([
                        'day' => $schedule['day'],
                        'start_time' => $schedule['start_time'] ?: null,
                        'end_time' => $schedule['end_time'] ?: null,
                        'status' => $schedule['status'] ?? 'practice',
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Dokter berhasil ditambahkan.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function toggleActive(Doctor $doctor)
    {
        try {

            $doctor->is_active = ! $doctor->is_active;
            $doctor->save();

            return response()->json([
                'success'   => true,
                'is_active' => $doctor->is_active,
                'message'   => $doctor->is_active
                    ? 'Dokter ditampilkan di website.'
                    : 'Dokter disembunyikan dari website.',
            ]);
        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Doctor $doctor)
    {
        DB::beginTransaction();

        try {

            // Hapus foto jika ada
            if ($doctor->photo) {

                $path = public_path('img/dokter/' . $doctor->photo);

                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            // Hapus semua jadwal
            $doctor->schedules()->delete();

            // Hapus dokter
            $doctor->delete();

            DB::commit();

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Dokter berhasil dihapus.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Gagal menghapus dokter: ' . $e->getMessage()
            );
        }
    }

    public function edit(Doctor $doctor)
    {
        $doctor->load('schedules');

        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'clinic' => 'required|string|max:255',
            'category' => 'required|in:rawat_jalan,pelayanan_penunjang',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',

            'schedules' => 'nullable|array',
            'schedules.*.day' => 'required_with:schedules|string',
            'schedules.*.start_time' => 'nullable',
            'schedules.*.end_time' => 'nullable',
            'schedules.*.status' => 'required|in:practice,holiday',
        ]);

        DB::beginTransaction();

        try {

            $photo = $doctor->photo;

            if ($request->hasFile('photo')) {

                if ($photo && File::exists(public_path('img/dokter/' . $photo))) {
                    File::delete(public_path('img/dokter/' . $photo));
                }

                $photo = time() . '.' . $request->photo->extension();

                $request->photo->move(
                    public_path('img/dokter'),
                    $photo
                );
            }

            $doctor->update([
                'name' => $request->name,
                'clinic' => $request->clinic,
                'category' => $request->category,
                'photo' => $photo,
                'is_active' => $request->is_active,
            ]);

            // Hapus jadwal lama
            $doctor->schedules()->delete();

            // Simpan jadwal baru
            if ($request->filled('schedules')) {

                foreach ($request->schedules as $schedule) {

                    $doctor->schedules()->create([
                        'day' => $schedule['day'],
                        'start_time' => $schedule['start_time'] ?: null,
                        'end_time' => $schedule['end_time'] ?: null,
                        'status' => $schedule['status'] ?? 'practice',
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Dokter berhasil diperbarui.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
