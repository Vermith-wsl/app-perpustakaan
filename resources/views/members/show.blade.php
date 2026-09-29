@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <h1>Detail Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">Nama:</strong> {{ $member->nama }}</div>
    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">NIM:</strong> {{ $member->nim }}</div>
    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">Email:</strong> {{ $member->email }}</div>
    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">Nomor Telepon:</strong> {{ $member->nomor_telepon }}</div>
    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">Alamat:</strong> {{ $member->alamat }}</div>
    <div style="margin-bottom: 12px;"><strong style="display:inline-block; width:120px;">Status:</strong> {{ ucfirst($member->status) }}</div>
@endsection