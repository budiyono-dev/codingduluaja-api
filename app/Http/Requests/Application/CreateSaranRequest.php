<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateSaranRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'judul' => 'required',
            'payload_saran' => 'required|min:50',
            'kategori' => 'required|in:pengaduan,saran',
            'gambar.*' => 'file|mimes:jpg,png|max:300',
        ];
    }
}
