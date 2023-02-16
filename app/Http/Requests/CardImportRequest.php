<?php

namespace App\Http\Requests;

use App\Http\Rules\MaxRowsCountRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class CardImportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !Auth::guest();
    }

    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'file',
                'mimes:xlsx',
                'max:200',
                new MaxRowsCountRule()
            ],
        ];
    }

    public function getFile(): UploadedFile
    {
        return $this->file('file');
    }

    public function getUrlToFileSending(): string
    {
        return $this->header('File-Sending-Url');
    }
}
