<?php

namespace App\Traits;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait uploadImageTrait {
    private array $validDirectoryTypes = ['avatar', 'products'];

    /**
     * Upload multiple images to storage
     *
     * @param array  $files
     * @param string $directoryType avatar|products
     *
     */
    public function uploadMultipleImages(array $files, string $directoryType) {
        foreach ($files as $file) {
            $this->uploadOneImage($file, $directoryType);
        }
    }

    /**
     * Upload one image to storage
     *
     * @param UploadedFile $file
     * @param string       $directoryType avatar|products
     *
     * @return string
     */
    public function uploadOneImage(UploadedFile $file, string $directoryType): string {
        if (!in_array($directoryType, $this->validDirectoryTypes)) {
            throw new \InvalidArgumentException('Invalid directory type');
        }

        $extension = strtolower($file->getClientOriginalExtension());
        $filename = $directoryType . '_' . uniqid() . '_' . time() . '.' . $extension;
        $now       = Carbon::now();
        $path      = 'uploads/' . $directoryType . '/' . $now->year . '/' . $now->month . '/';
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        try {
            $image = Image::make($file);
            $image->resize(480, 480, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('storage/' . $path . $filename));

            return $path . $filename;
        } catch (Exception $e) {
            throw new Exception('Image upload failed: ' . $e->getMessage());
        }
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public function deleteImage(string $path): bool {
        if (Str::startsWith($path, 'public/')) {
            $path = Str::replaceFirst('public/', '', $path);
        }
        if (Storage::exists($path)) {
            Storage::delete($path);
            return true;
        }
        return false;
    }
}
