@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Penduduk</h1>
        </div>

        {{--@if ($errors->any())
            @dd($errors->all())
        @endif--}}

        <div class="row">
            <div class="col">
                <form action="{{ route('resident.create') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label for="nik">NIK</label>
                                <input type="number" inputmode="numeric" maxlength="16" name="nik" id="nik" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option disabled selected>Pilih Gender</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="birth_date">Tanggal Lahir</label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="birth_place">Tempat Lahir</label>
                                <input type="text" name="birth_place" id="birth_place" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="address">Alamat</label>
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="religion">Agama</label>
                                <input type="text" name="religion" id="religion" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="marital_status">Status Perkawinan</label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option disabled selected>Pilih Status</option>
                                    <option value="single">Belum Menikah</option>
                                    <option value="married">Sudah Menikah</option>
                                    <option value="divorced">Cerai</option>
                                    <option value="widowed">Janda/Duda</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="occupation">Pekerjaan</label>
                                <input type="text" name="occupation" id="occupation" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Telepon</label>
                                <input type="text" inputmode="numeric" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option disabled selected>Pilih Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="moved">Pindah</option>
                                    <option value="deceased">Almarhum</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end" style="gap: 10px;">
                                <a href="/resident" class="btn btn-outline-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection