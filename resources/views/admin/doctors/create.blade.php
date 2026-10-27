@extends('admin.layouts.app')

@section('title', 'Tambah Dokter')
@section('subtitle', 'Tambah data dokter beserta jadwal praktik')

@section('content')
    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-500/20 border border-green-500/30 p-4 text-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 rounded-lg bg-red-500/20 border border-red-500/30 p-4 text-red-300">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-500/20 border border-red-500/30 p-4">
            <ul class="list-disc pl-5 text-red-300 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="admin-card p-6 space-y-6">

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 text-white">Nama Dokter</label>

                    <input type="text" name="name" value="{{ old('name') }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block mb-2 text-white">Poli</label>

                    <input type="text" name="clinic" value="{{ old('clinic') }}" class="form-input w-full" required>
                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-8">

                {{-- Kategori --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-white">
                        Kategori
                    </label>

                    <select name="category" class="form-input w-full">

                        <option value="rawat_jalan">🩺 Rawat Jalan</option>

                        <option value="pelayanan_penunjang">
                            ❤️ Pelayanan Penunjang
                        </option>

                    </select>
                    {{-- Status --}}
                    <div class="mt-8">

                        <label class="block mb-2 text-sm font-medium text-white">
                            Status
                        </label>

                        <select name="is_active" class="form-input w-full md:w-72">

                            <option value="1">
                                ✅ Aktif
                            </option>

                            <option value="0">
                                ❌ Tidak Aktif
                            </option>

                        </select>

                    </div>

                </div>

                {{-- Upload Foto --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-white">
                        Foto Dokter
                    </label>

                    <div
                        class="relative rounded-2xl border-2 border-dashed border-white/10
                   bg-gradient-to-br from-slate-800 to-slate-900
                   hover:border-primary-500 transition-all duration-300
                   overflow-hidden">

                        <div class="flex flex-col items-center justify-center py-8 px-6">

                            <div
                                class="w-40 h-40 rounded-full
                           bg-white/5 border border-white/10
                           shadow-xl overflow-hidden
                           flex items-center justify-center">

                                <img id="previewPhoto" src="{{ asset('img/no-image.png') }}"
                                    class="max-w-full max-h-full object-contain p-3 opacity-60
                               transition-all duration-300 scale-95">

                            </div>

                            <h4 class="mt-5 text-white font-semibold">
                                Preview Foto
                            </h4>

                            <p class="text-xs text-white/40 mt-1 text-center">
                                PNG transparan atau JPG<br>
                                Maksimal 2 MB
                            </p>

                            <label for="photo"
                                class="mt-5 inline-flex items-center gap-2
                           px-5 py-2.5 rounded-xl
                           bg-primary-600 hover:bg-primary-500
                           text-white font-medium cursor-pointer
                           transition-all">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                Pilih Foto

                            </label>

                            <input type="file" name="photo" id="photo" accept="image/*" class="hidden">

                        </div>

                    </div>

                </div>

            </div>


            <hr class="border-white/10">

            <div class="flex justify-between items-center">

                <h3 class="text-white text-lg font-semibold">
                    Jadwal Praktik
                </h3>

                <button type="button" id="addSchedule" class="btn-primary px-4 py-2 rounded-lg">

                    + Tambah Jadwal

                </button>

            </div>

            <div id="scheduleWrapper">

                @if (old('schedules'))

                    @foreach (old('schedules') as $i => $schedule)
                        <div class="grid md:grid-cols-5 gap-4 mt-4 schedule-item">

                            <select name="schedules[{{ $i }}][day]" class="form-input">

                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                    <option value="{{ $day }}" @selected($schedule['day'] == $day)>
                                        {{ $day }}
                                    </option>
                                @endforeach

                            </select>

                            <input type="time" class="form-input" name="schedules[{{ $i }}][start_time]"
                                value="{{ $schedule['start_time'] }}">

                            <input type="time" class="form-input" name="schedules[{{ $i }}][end_time]"
                                value="{{ $schedule['end_time'] }}">

                            <select name="schedules[{{ $i }}][status]" class="form-input">

                                <option value="practice" @selected(($schedule['status'] ?? 'practice') == 'practice')>
                                    Praktik
                                </option>

                                <option value="holiday" @selected(($schedule['status'] ?? '') == 'holiday')>
                                    Libur
                                </option>

                            </select>

                            <button type="button" class="removeSchedule bg-red-500 hover:bg-red-600 rounded-lg text-white">

                                Hapus

                            </button>

                        </div>
                    @endforeach

                @endif

            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-white/10">

                <a href="{{ route('admin.doctors.index') }}"
                    class="inline-flex items-center gap-2
               px-6 py-3 rounded-xl
               bg-slate-700 hover:bg-slate-600
               text-white font-medium
               transition-all duration-300">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>

                    Kembali

                </a>

                <button type="submit"
                    class="inline-flex items-center gap-2
               px-6 py-3 rounded-xl
               btn-primary
               text-white font-medium">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>

                    Simpan Perubahan

                </button>

            </div>

        </div>

    </form>

@endsection
@push('scripts')
    <script>
        let index = {{ old('schedules') ? count(old('schedules')) : 0 }};

        document.getElementById('addSchedule')
            .addEventListener('click', function() {

                document.getElementById('scheduleWrapper')
                    .insertAdjacentHTML('beforeend', `

            <div class="grid md:grid-cols-5 gap-4 mt-4 schedule-item">

                    <select class="form-input" name="schedules[${index}][day]">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>

                    <input class="form-input" type="time"
                        name="schedules[${index}][start_time]">

                    <input class="form-input" type="time"
                        name="schedules[${index}][end_time]">

                    <select class="form-input"
                        name="schedules[${index}][status]">
                        <option value="practice">Praktik</option>
                        <option value="holiday">Libur</option>
                    </select>

                <button class="removeSchedule bg-red-500 rounded-lg">
                     Hapus
                </button>

            </div>

        `);

                index++;

            });

        document.addEventListener('click', function(e) {

            if (e.target.classList.contains('removeSchedule')) {

                e.target.closest('.schedule-item').remove();

            }

        });

        const photo = document.getElementById('photo');
        const preview = document.getElementById('previewPhoto');

        photo.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            preview.classList.add('opacity-0', 'scale-90');

            reader.onload = function(event) {

                preview.src = event.target.result;

                preview.onload = function() {

                    preview.classList.remove('opacity-0', 'scale-90', 'opacity-60');
                    preview.classList.add('scale-100');

                };

            };

            reader.readAsDataURL(file);

        });
    </script>
@endpush
