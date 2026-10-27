<!-- <div
    class="relative bg-white rounded-2xl shadow-lg
    hover:shadow-2xl transition duration-300
    transform hover:-translate-y-2
    pt-24 pb-6 px-8 overflow-visible
    flex flex-col mt-10"
    style="
        height: 300px !important;
        min-height: 300px !important;
        max-height: 400px !important;
    ">

    {{-- Header --}}
    <div
        class="absolute top-0 left-0 w-full h-20
        bg-gradient-to-r from-indigo-600 to-purple-600
        rounded-t-2xl flex items-center
        pl-40 pr-6 z-10">

        <span class="text-white font-semibold text-sm tracking-wide leading-snug ml-auto text-right">

            {{ $doctor->name }}

        </span>

    </div>

    {{-- Foto --}}
    <div class="absolute -top-16 left-6 z-20">

        <img src="{{ asset('img/dokter/' . $doctor->photo) }}" alt="{{ $doctor->name }}"
            class="w-36 h-36 object-contain drop-shadow-2xl">

    </div>

    {{-- Content --}}
    <div class="text-center mt-2">

        <h3 class="text-xl font-bold text-gray-800 mb-2">
            {{ $doctor->clinic }}
        </h3>

        <div class="w-12 h-1 bg-indigo-500 mx-auto rounded-full mb-4">
        </div>

        <p class="text-sm text-gray-500 mb-2">
            Jadwal Praktik
        </p>

        <div class="mt-2">

            <div class="space-y-1">

                @forelse($doctor->schedules as $schedule)
                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-2 text-sm text-gray-700">

                            <span class="font-semibold text-gray-800">
                                {{ $schedule->day }}
                            </span>

                            @if ($schedule->status == 'practice' && $schedule->start_time && $schedule->end_time)
                                <span class="text-gray-400">•</span>

                                <span class="text-gray-900">
                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                    WIB
                                </span>
                            @else
                                <span class="text-gray-400">•</span>

                                <span class="text-red-500 font-medium">
                                    Libur
                                </span>
                            @endif

                        </div>

                        <div class="w-20 flex justify-start">

                            @if ($schedule->status == 'practice')
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-green-700">
                                    <span class="w-3.5 h-3.5 rounded-full bg-green-500 shadow-sm"></span>
                                    Praktik
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-red-600">
                                    <span class="w-3.5 h-3.5 rounded-full bg-red-500 shadow-sm"></span>
                                    Libur
                                </span>
                            @endif

                        </div>

                    </div>

                @empty

                    <div class="text-center text-sm text-gray-400 py-3">

                        Belum ada jadwal praktik.

                    </div>
                @endforelse

            </div>

        </div>

    </div>

</div> -->

<div
    class="relative bg-white rounded-2xl shadow-lg
    hover:shadow-2xl transition duration-300
    transform hover:-translate-y-2
    pt-24 pb-6 px-8 overflow-visible
    flex flex-col mt-10"
    style="
        height: 300px !important;
        min-height: 300px !important;
        max-height: 400px !important;
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
    ">

    {{-- Header --}}
    <div
        class="absolute top-0 left-0 w-full h-20
        rounded-t-2xl flex items-center
        pl-40 pr-6 z-10"
        style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important; background-color: #0D9488 !important;">

        <span class="text-white font-semibold text-sm tracking-wide leading-snug ml-auto text-right">

            {{ $doctor->name }}

        </span>

    </div>

    {{-- Foto --}}
    <div class="absolute -top-16 left-6 z-20">

        <img src="{{ asset('img/dokter/' . $doctor->photo) }}" alt="{{ $doctor->name }}"
            class="w-36 h-36 object-contain drop-shadow-2xl">

    </div>

    {{-- Content --}}
    <div class="text-center mt-2">

        <h3 class="text-xl font-bold text-gray-800 mb-2">
            {{ $doctor->clinic }}
        </h3>

        <div class="w-12 h-1 mx-auto rounded-full mb-4" style="background-color: #0D9488 !important;">
        </div>

        <p class="text-sm text-gray-500 mb-2">
            Jadwal Praktik
        </p>

        <div class="mt-2">

            <div class="space-y-1">

                @forelse($doctor->schedules as $schedule)
                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-2 text-sm text-gray-700">

                        <span class="font-semibold text-gray-800">
                            {{ $schedule->day }}
                        </span>

                        @if ($schedule->status == 'practice' && $schedule->start_time && $schedule->end_time)
                        <span class="text-gray-400">•</span>

                        <span class="text-gray-900">
                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                            WIB
                        </span>
                        @else
                        <span class="text-gray-400">•</span>

                        <span class="text-red-500 font-medium">
                            Libur
                        </span>
                        @endif

                    </div>

                    <div class="w-20 flex justify-start">

                        @if ($schedule->status == 'practice')
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-green-700">
                            <span class="w-3.5 h-3.5 rounded-full bg-green-500 shadow-sm"></span>
                            Praktik
                        </span>
                        @else
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-red-600">
                            <span class="w-3.5 h-3.5 rounded-full bg-red-500 shadow-sm"></span>
                            Libur
                        </span>
                        @endif

                    </div>

                </div>

                @empty

                <div class="text-center text-sm text-gray-400 py-3">

                    Belum ada jadwal praktik.

                </div>
                @endforelse

            </div>

        </div>

    </div>

</div>