<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Sesuaikan rule unik jika sedang dalam proses update
        $memberId = $this->route('member'); 

        return [
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|max:50|unique:members,nim,' . $memberId,
            'email'         => 'required|email|max:255|unique:members,email,' . $memberId,
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|in:aktif,nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'          => 'Nama anggota wajib diisi.',
            'nim.required'           => 'NIM wajib diisi.',
            'nim.unique'             => 'NIM sudah terdaftar.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'status.required'        => 'Status wajib dipilih.',
            'status.in'              => 'Status harus berupa aktif atau nonaktif.',
        ];
    }
}