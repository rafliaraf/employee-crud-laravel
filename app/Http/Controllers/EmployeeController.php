<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * READ: Menampilkan daftar seluruh karyawan.
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * CREATE: Menampilkan formulir tambah karyawan baru.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * CREATE: Menyimpan data karyawan baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'salary'     => ['required', 'numeric', 'min:0'],
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Data karyawan baru berhasil ditambahkan.');
    }

    /**
     * UPDATE: Menampilkan formulir edit karyawan berdasarkan ID.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * UPDATE: Menyimpan pembaruan data karyawan ke database.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'salary'     => ['required', 'numeric', 'min:0'],
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * DELETE: Menghapus data karyawan dari database.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
