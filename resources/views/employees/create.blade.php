@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        <div class="card-custom">
            <div class="p-4 border-bottom bg-white d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="fw-bold mb-1 text-dark">Tambah Karyawan Baru</h5>
                    <p class="text-muted small mb-0">Lengkapi formulir berikut untuk mendaftarkan karyawan baru ke dalam sistem.</p>
                </div>
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="p-4">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Contoh: Muhammad Farhan"
                                   value="{{ old('name') }}" required>
                        </div>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3 g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary small text-uppercase">Jabatan / Posisi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-briefcase"></i></span>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                                       placeholder="Contoh: Frontend Developer"
                                       value="{{ old('position') }}" required>
                            </div>
                            @error('position') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary small text-uppercase">Departemen</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-building"></i></span>
                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror"
                                       placeholder="Contoh: IT & Software"
                                       value="{{ old('department') }}" required>
                            </div>
                            @error('department') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase">Gaji Bulanan (IDR)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted">Rp</span>
                            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror"
                                   placeholder="Contoh: 10000000"
                                   value="{{ old('salary') }}" required min="0">
                        </div>
                        <div class="form-text small text-muted">Masukkan nominal angka murni tanpa titik atau koma.</div>
                        @error('salary') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                        <a href="{{ route('employees.index') }}" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary-custom px-4 d-inline-flex align-items-center gap-2">
                            <i class="bi bi-check-lg"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
