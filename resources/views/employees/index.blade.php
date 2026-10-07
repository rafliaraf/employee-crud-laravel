@extends('layouts.app')

@section('content')
<!-- Header Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon bg-primary-subtle text-primary">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div class="text-muted small fw-medium">Total Karyawan</div>
                <div class="fs-4 fw-bold">{{ $employees->count() }} Orang</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon bg-success-subtle text-success">
                <i class="bi bi-cash-stack"></i>
            </div>
            <div>
                <div class="text-muted small fw-medium">Total Anggaran Gaji</div>
                <div class="fs-5 fw-bold">Rp {{ number_format($employees->sum('salary'), 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon bg-info-subtle text-info">
                <i class="bi bi-building"></i>
            </div>
            <div>
                <div class="text-muted small fw-medium">Total Departemen</div>
                <div class="fs-4 fw-bold">{{ $employees->unique('department')->count() }} Divisi</div>
            </div>
        </div>
    </div>
</div>

<div class="card-custom">
    <!-- Card Header Toolbar -->
    <div class="p-3 px-4 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2 bg-white">
        <div>
            <h5 class="fw-bold mb-0 text-dark">Daftar Karyawan</h5>
            <small class="text-muted">Kelola data seluruh karyawan, jabatan, dan struktur gaji</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('employees.create') }}" class="btn btn-primary-custom d-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill"></i>
                <span>Tambah Karyawan</span>
            </a>
        </div>
    </div>

    <!-- Table Content -->
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama Karyawan</th>
                    <th>Posisi / Jabatan</th>
                    <th>Departemen</th>
                    <th>Gaji Bulanan</th>
                    <th class="text-end" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $i => $employee)
                <tr>
                    <td class="text-center text-muted fw-semibold">{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span class="avatar-initial">
                                {{ strtoupper(substr($employee->name, 0, 2)) }}
                            </span>
                            <div>
                                <div class="fw-bold text-dark">{{ $employee->name }}</div>
                                <div class="text-muted small">ID: #EMP-{{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="fw-medium text-secondary">{{ $employee->position }}</span>
                    </td>
                    <td>
                        <span class="badge-dept">
                            <i class="bi bi-tag-fill me-1 opacity-50"></i>{{ $employee->department }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-salary">
                            Rp {{ number_format($employee->salary, 0, ',', '.') }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-warning btn-sm px-2 py-1" title="Edit Data">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data karyawan {{ $employee->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm px-2 py-1" title="Hapus Data">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <div class="py-4">
                            <i class="bi bi-folder-x fs-1 text-secondary opacity-50 d-block mb-2"></i>
                            <div class="fw-semibold">Belum Ada Data Karyawan</div>
                            <small>Klik tombol "Tambah Karyawan" di atas untuk menambahkan data baru.</small>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
