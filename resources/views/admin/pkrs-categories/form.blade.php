@php
    $category = $category ?? null;
    $selectedIcon = old('icon', $category->icon ?? '');

    $iconOptions = [
        'heart' => '❤️',
        'brain' => '🧠',
        'lungs' => '🫁',
        'baby' => '👶',
        'pregnant' => '🤰',
        'eye' => '👁️',
        'tooth' => '🦷',
        'pill' => '💊',
        'hospital' => '🏥',
        'apple' => '🍎',
        'exercise' => '🏃',
        'family' => '👨‍👩‍👧',
        'book' => '📖',
        'virus' => '🦠',
        'vaccine' => '💉',
        'blood' => '🩸',
        'mask' => '😷',
        'elderly' => '👵',
        'health' => '🩺',
    ];
@endphp

<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">Informasi Kategori</p>

    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="form-label" for="name">
                Nama Kategori <span class="text-red-400">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name ?? '') }}"
                class="form-input"
                placeholder="Contoh: Kesehatan Ibu & Anak"
                required>

            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="form-label" for="slug">Slug</label>

            <input
                type="text"
                id="slug"
                name="slug"
                value="{{ old('slug', $category->slug ?? '') }}"
                class="form-input"
                placeholder="slug-akan-dibuat-otomatis"
                readonly>

            <p class="text-xs text-white/50 mt-1">
                Dibuat otomatis berdasarkan nama dan dijamin unik.
            </p>

            @error('slug')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

</div>

<div class="admin-card p-6 space-y-5" x-data="{ selected: '{{ $selectedIcon }}', icons: @js($iconOptions) }">
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-white/60 text-sm font-medium">Icon Kategori</p>
            <p class="text-xs text-white/40 mt-1">Opsional. Pilih salah satu icon di bawah.</p>
        </div>

        <div class="w-12 h-12 rounded-xl bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-2xl">
            <span x-text="icons[selected] || '😊'"></span>
        </div>
    </div>

    <input type="hidden" name="icon" :value="selected">

    <div class="grid grid-cols-6 md:grid-cols-10 gap-2">
        @foreach ($iconOptions as $key => $emoji)
            <button
                type="button"
                @click="selected = '{{ $key }}'"
                :class="selected === '{{ $key }}'
                    ? 'border-indigo-500 bg-indigo-500/20'
                    : 'border-white/10 hover:bg-white/10'"
                class="h-11 rounded-lg border text-xl transition-colors">
                {{ $emoji }}
            </button>
        @endforeach
    </div>

    <p class="text-xs text-white/40">
        Icon terpilih: <span class="text-white/70" x-text="selected || 'belum dipilih'"></span>
    </p>

    @error('icon')
        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('admin.pkrs-categories.index') }}"
        class="px-5 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
        Batal
    </a>

    <button type="submit"
        class="btn-primary text-white px-6 py-2.5 rounded-lg font-semibold text-sm">
        {{ $category ? 'Update Kategori' : 'Simpan Kategori' }}
    </button>
</div>
