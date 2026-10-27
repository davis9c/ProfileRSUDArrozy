@extends('admin.layouts.app')

@section('title', 'Doctors')
@section('subtitle', 'Manage doctors & schedules')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div></div>

        <a href="{{ route('admin.doctors.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg btn-primary text-white font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>

            Add Doctor
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($doctors as $doctor)
            <div class="admin-card overflow-hidden hover-lift">

                {{-- Foto --}}
                @if ($doctor->photo)
                    <img src="{{ asset('img/dokter/' . $doctor->photo) }}" class="w-full h-60 object-contain bg-white"
                        alt="{{ $doctor->name }}">
                @else
                    <div
                        class="w-full h-60 bg-gradient-to-br from-primary-500/20 to-accent-500/20 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                        </svg>
                    </div>
                @endif

                <div class="p-5">

                    {{-- Nama --}}
                    <h3 class="text-lg font-bold text-white">
                        {{ $doctor->name }}
                    </h3>

                    {{-- Klinik --}}
                    <p class="text-primary-400 text-sm mt-1">
                        {{ $doctor->clinic }}
                    </p>

                    {{-- Category --}}
                    <div class="mt-3">
                        @if ($doctor->category == 'rawat_jalan')
                            <span class="px-2 py-1 rounded-full text-xs bg-blue-500/20 text-blue-400">
                                Rawat Jalan
                            </span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs bg-purple-500/20 text-purple-400">
                                Pelayanan Penunjang
                            </span>
                        @endif
                    </div>

                    {{-- Schedule --}}
                    {{-- Jadwal Praktik --}}
                    <div class="mt-4">

                        <h4 class="text-sm font-semibold text-white mb-2">
                            Jadwal Praktik
                        </h4>

                        @if ($doctor->schedules->count())
                            <div class="space-y-2">

                                @foreach ($doctor->schedules as $schedule)
                                    <div
                                        class="flex items-center justify-between rounded-lg bg-white/5 border border-white/10 px-3 py-2">

                                        <div>
                                            <div class="text-sm font-medium text-white">
                                                {{ $schedule->day }}
                                            </div>

                                            <div class="text-xs text-white/60">
                                                @if ($schedule->status == 'holiday')
                                                    Libur
                                                @else
                                                    {{ $schedule->start_time }}
                                                    -
                                                    {{ $schedule->end_time }}
                                                @endif
                                            </div>
                                        </div>

                                        @if ($schedule->status == 'practice')
                                            <span class="px-2 py-1 rounded-full text-[11px] bg-green-500/20 text-green-400">
                                                Praktik
                                            </span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-[11px] bg-red-500/20 text-red-400">
                                                Libur
                                            </span>
                                        @endif

                                    </div>
                                @endforeach

                            </div>
                        @else
                            <div class="text-sm text-white/50 italic">
                                Belum ada jadwal.
                            </div>
                        @endif

                    </div>

                    {{-- Status --}}
                    <div class="mt-2">

                        @if ($doctor->is_active)
                            <span class="px-2 py-1 rounded-full text-xs bg-green-500/20 text-green-400">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs bg-red-500/20 text-red-400">
                                Inactive
                            </span>
                        @endif

                    </div>

                    {{-- Action --}}
                    <div class="flex justify-end gap-2 mt-5 pt-4 border-t border-white/10">

                        <a href="{{ route('admin.doctors.edit', $doctor) }}"
                            class="p-2 rounded-lg hover:bg-white/10 text-white/70 hover:text-white">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                            </svg>
                        </a>

                        <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
                            onsubmit="return confirm('Hapus dokter ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="p-2 rounded-lg hover:bg-red-500/10 text-white/70 hover:text-red-400">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                </svg>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-12 text-white/50">

                Belum ada dokter.

                <a href="{{ route('admin.doctors.create') }}" class="text-primary-400 hover:underline">

                    Tambah Dokter

                </a>

            </div>
        @endforelse

    </div>

    @if ($doctors->hasPages())
        <div class="mt-6">
            {{ $doctors->links() }}
        </div>
    @endif
@endsection
