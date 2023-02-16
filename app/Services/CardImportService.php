<?php

namespace App\Services;

use App\Events\CardDataUploadedEvent;
use App\Exceptions\FailImportFailedException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CardImportService
{
    /**
     * @throws FailImportFailedException
     */
    public function importFile(UploadedFile $file, string $sendFileUrl): void
    {
        $path = Storage::putFile('uploads', $file);

        if (!$path) {
            throw new FailImportFailedException();
        }

        CardDataUploadedEvent::dispatch($path, $sendFileUrl);
    }
}