@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('resident.update', $resident->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="nik">NIK</label>
                            <input type="number" inputmode="numeric" maxlength="16" name="nik" id="nik" class="form-control"
                                   value="{{ old('nik', $resident->nik) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $resident->name) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                @foreach ([
                                    (object) ["label" => "Laki-laki", "value" => "male"],
                                    (object) ["label" => "Perempuan", "value" => "female"],
                                ] as $item)
                                    <option value="{{ $item->value }}" @selected(old('gender', $resident->gender) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control"
                                   value="{{ old('birth_date', $resident->birth_date) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" name="birth_place" id="birth_place" class="form-control"
                                   value="{{ old('birth_place', $resident->birth_place) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{ old('address', $resident->address) }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="religion">Agama</label>
                            <input type="text" name="religion" id="religion" class="form-control"
                                   value="{{ old('religion', $resident->religion) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                @foreach ([
                                    (object) ["label" => "Belum Menikah", "value" => "single"],
                                    (object) ["label" => "Sudah Menikah", "value" => "married"],
                                    (object) ["label" => "Cerai", "value" => "divorced"],
                                    (object) ["label" => "Janda/duda", "value" => "widowed"],
                                ] as $item)
                                    <option value="{{ $item->value }}" @selected(old('marital_status', $resident->marital_status) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" name="occupation" id="occupation" class="form-control"
                                   value="{{ old('occupation', $resident->occupation) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Telepon</label>
                            <input type="text" inputmode="numeric" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone', $resident->phone) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach ([
                                    (object) ["label" => "Aktif", "value" => "active"],
                                    (object) ["label" => "Pindah", "value" => "moved"],
                                    (object) ["label" => "Almarhum", "value" => "deceased"],
                                ] as $item)
                                    <option value="{{ $item->value }}" @selected(old('status', $resident->status) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end" style="gap: 10px;">
                            <a href="/resident" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
