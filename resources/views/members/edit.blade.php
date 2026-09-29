@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <h1>Edit Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label for="nama" style="display:block; font-weight:bold;">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $member->nama) }}" style="width:100%; padding:6px;">
            @error('nama') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="nim" style="display:block; font-weight:bold;">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $member->nim) }}" style="width:100%; padding:6px;">
            @error('nim') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="email" style="display:block; font-weight:bold;">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" style="width:100%; padding:6px;">
            @error('email') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="nomor_telepon" style="display:block; font-weight:bold;">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}" style="width:100%; padding:6px;">
            @error('nomor_telepon') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="alamat" style="display:block; font-weight:bold;">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" style="width:100%; padding:6px;">{{ old('alamat', $member->alamat) }}</textarea>
            @error('alamat') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="status" style="display:block; font-weight:bold;">Status</label>
            <select name="status" id="status" style="width:100%; padding:6px;">
                <option value="aktif" {{ old('status', $member->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $member->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status') <div style="color:red; font-size:14px;">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn" style="padding: 8px 16px; background: #2563eb; color: #fff; border: none; cursor: pointer;">Perbarui</button>
    </form>
@endsection