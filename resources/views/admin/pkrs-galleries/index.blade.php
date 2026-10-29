@extends('admin.layouts.app')

@section('title', 'Gallery Post PKRS')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-white/50 text-sm">
            Gallery untuk post: <span class="text-white/80">{{ $post->title }}</span>
        </p>
    </div>

    <div class="flex gap-2">
        <a href="{{ route('admin.pkrs-posts.index') }}"
            class="px-4 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
            Kembali ke Post
        </a>

        <a href="{{ route('admin.pkrs-posts.galleries.create', ['post' => $post->id]) }}"
            class="btn-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm">
            + Tambah Gallery
        </a>
    </div>
</div>

<div class="admin-card p-4 mb-6 flex items-center gap-4">
    <img
        src="{{ $post->thumbnail_url ?? asset('img/news/clinical-news1.jpg') }}"
        alt="{{ $post->title }}"
        class="w-16 h-16 rounded-lg object-cover">

    <div class="min-w-0">
        <p class="text-white font-medium truncate">{{ $post->title }}</p>
        <p class="text-xs text-white/50">
            {{ $galleries->count() }} gambar terdaftar.
        </p>
    </div>
</div>

<div class="table-container overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="table-header">
            <tr class="text-white/60 text-left">
                <th class="px-5 py-3">Gambar</th>
                <th class="px-5 py-3">Urutan</th>
                <th class="px-5 py-3">Tanggal</th>
                <th class="px-5 py-3 text-right">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @forelse ($galleries as $gallery)
                <tr class="text-white/80">
                    <td class="px-5 py-3">
                        <img src="{{ $gallery->image_url }}"
                            alt="Gallery {{ $post->title }}"
                            class="w-20 h-20 rounded-lg object-cover border border-white/10">
                    </td>

                    <td class="px-5 py-3">{{ $gallery->sort_order }}</td>

                    <td class="px-5 py-3">{{ $gallery->created_at?->format('d M Y') ?? '-' }}</td>

                    <td class="px-5 py-3 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.pkrs-posts.galleries.edit', ['post' => $post->id, 'gallery' => $gallery->id]) }}"
                                class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('admin.pkrs-posts.galleries.destroy', ['post' => $post->id, 'gallery' => $gallery->id]) }}"
                                onsubmit="return confirm('Yakin hapus gambar gallery ini?')">
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
                    <td colspan="4" class="px-5 py-10 text-center text-white/50">
                        Belum ada gambar gallery untuk post ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
