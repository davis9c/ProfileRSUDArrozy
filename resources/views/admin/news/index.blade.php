@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-white/50 text-sm">Kelola semua berita, termasuk draft.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm">
            + Tambah Berita
        </a>
    </div>

    <form method="GET" class="flex flex-wrap gap-3 mb-6">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita..."
            class="form-input max-w-xs">
        <select name="status" class="form-input max-w-[160px]">
            <option value="">Semua Status</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <button type="submit" class="px-5 py-2.5 rounded-lg text-white/80 border border-white/20 text-sm">
            Filter
        </button>
    </form>

    <div class="table-container">
        <table class="w-full text-sm">
            <thead class="table-header">
                <tr class="text-white/60 text-left">
                    <th class="px-5 py-3">Thumbnail</th>
                    <th class="px-5 py-3">Judul</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Dilihat</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse ($newsList as $news)
                    <tr class="text-white/80">
                        <td class="px-5 py-3">
                            <img src="{{ $news->thumbnail_url ?? asset('img/news/default.jpg') }}"
                                class="w-14 h-14 rounded-lg object-cover">
                        </td>
                        <td class="px-5 py-3 max-w-xs">
                            <p class="font-medium text-white line-clamp-1">{{ $news->title }}</p>
                        </td>
                        <td class="px-5 py-3">{{ $news->category }}</td>
                        <td class="px-5 py-3">
                            @if ($news->status === 'published')
                                <span class="px-2.5 py-1 rounded-full text-xs bg-green-500/20 text-green-400">Published</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs bg-yellow-500/20 text-yellow-400">Draft</span>
                            @endif
                        </td>
                        <td class="px-5 py-3">{{ $news->views }}</td>
                        <td class="px-5 py-3">{{ $news->published_at?->format('d M Y') ?? '-' }}</td>
                        <td class="px-5 py-3 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.news.edit', $news) }}"
                                    class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.news.destroy', $news) }}"
                                    onsubmit="return confirm('Yakin hapus berita ini?')">
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
                        <td colspan="7" class="px-5 py-10 text-center text-white/50">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $newsList->links() }}
    </div>
</div>
@endsection