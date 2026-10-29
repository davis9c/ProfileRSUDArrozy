@extends('admin.layouts.app')

@section('title', 'Kategori PKRS')

@section('content')

@php
    $iconMap = [
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

<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-white/50 text-sm">Kelola kategori untuk konten edukasi PKRS.</p>
    </div>

    <a href="{{ route('admin.pkrs-categories.create') }}"
        class="btn-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm">
        + Tambah Kategori
    </a>
</div>

<div class="table-container overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="table-header">
            <tr class="text-white/60 text-left">
                <th class="px-5 py-3">Icon</th>
                <th class="px-5 py-3">Nama</th>
                <th class="px-5 py-3">Slug</th>
                <th class="px-5 py-3">Dibuat</th>
                <th class="px-5 py-3 text-right">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @forelse ($categories as $category)
                <tr class="text-white/80">
                    <td class="px-5 py-3">
                        <div class="w-10 h-10 rounded-lg bg-indigo-500/15 border border-indigo-500/30 flex items-center justify-center text-xl">
                            {{ $iconMap[$category->icon] ?? ($category->icon ?: '📁') }}
                        </div>
                    </td>

                    <td class="px-5 py-3">
                        <p class="font-medium text-white">{{ $category->name }}</p>
                    </td>

                    <td class="px-5 py-3">
                        <span class="px-2.5 py-1 rounded-full text-xs bg-white/10 text-white/70">
                            {{ $category->slug }}
                        </span>
                    </td>

                    <td class="px-5 py-3">
                        {{ $category->created_at?->format('d M Y') ?? '-' }}
                    </td>

                    <td class="px-5 py-3 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.pkrs-categories.edit', $category) }}"
                                class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.pkrs-categories.destroy', $category) }}"
                                onsubmit="return confirm('Yakin hapus kategori ini? Post yang memakai kategori ini akan kehilangan relasinya.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 rounded-lg text-xs text-red-400 border border-red-500/30 hover:bg-red-500/10">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-white/50">
                        Belum ada kategori PKRS.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $categories->links() }}
</div>

@endsection
