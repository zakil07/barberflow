<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'barber_id' => 'required|integer|exists:barbers,id',
            'service_id' => 'required|integer|exists:services,id',
            'tanggal_mulai' => 'required|date|after:now',
            'catatan' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'barber_id.required' => 'Pilih barber terlebih dahulu.',
            'barber_id.exists' => 'Barber tidak valid.',
            'service_id.required' => 'Pilih layanan terlebih dahulu.',
            'service_id.exists' => 'Layanan tidak valid.',
            'tanggal_mulai.required' => 'Tanggal dan waktu reservasi wajib diisi.',
            'tanggal_mulai.after' => 'Waktu reservasi harus setelah waktu sekarang.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
}
