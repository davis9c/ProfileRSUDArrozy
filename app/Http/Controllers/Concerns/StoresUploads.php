<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\UploadedFile;

trait StoresUploads
{
    /**
     * Store an uploaded file and fail loudly when the disk rejects the write.
     */
    protected function storeUpload(UploadedFile $file, string $directory): string
    {
        $path = $file->store($directory, 'public');

        if (! is_string($path) || $path === '') {
            throw new \RuntimeException(
                'Gagal menyimpan file upload. Periksa izin folder storage.'
            );
        }

        return $path;
    }
}
