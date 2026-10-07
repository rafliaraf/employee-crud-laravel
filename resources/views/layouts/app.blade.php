<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-subtle: #eef2ff;
            --surface: #ffffff;
            --bg-body: #f8fafc;
            --border-color: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 0.85rem 0;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04);
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.15rem;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.25);
        }

        .card-custom {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
            overflow: hidden;
        }

        .table-custom th {
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            background-color: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.25rem;
        }

        .table-custom td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.925rem;
        }

        .badge-dept {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            border-radius: 6px;
            padding: 0.35rem 0.65rem;
            font-size: 0.78rem;
            border: 1px solid #e2e8f0;
        }

        .badge-salary {
            font-weight: 700;
            color: #047857;
            background-color: #ecfdf5;
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.55rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
            color: #fff;
        }

        .avatar-initial {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            background: #e0e7ff;
            color: #4338ca;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border-color: #cbd5e1;
            padding: 0.65rem 0.95rem;
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .footer {
            margin-top: auto;
            border-top: 1px solid var(--border-color);
            padding: 1.5rem 0;
            font-size: 0.85rem;
            color: var(--text-muted);
            background: #fff;
        }
    </style>
</head>
<body>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark fs-5" href="/">
                <span class="brand-icon">
                    <i class="bi bi-people-fill"></i>
                </span>
                <span>WorkForce <span class="text-primary">Pro</span></span>
            </a>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill d-none d-sm-inline-flex align-items-center gap-1">
                    <span class="spinner-grow spinner-grow-sm text-success" style="width: 0.5rem; height: 0.5rem;"></span>
                    Laravel {{ app()->version() }} &bull; MySQL Active
                </span>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <div class="container py-4 my-2">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-2 rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} <strong>WorkForce Pro</strong> &bull; Sistem Manajemen Data Karyawan (Tugas Akhir CRUD Laravel)</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
