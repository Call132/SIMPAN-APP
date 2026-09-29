<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50 dark:bg-gray-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Dibatasi - SIMPAN</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Figtree', system-ui, -apple-system, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .alert-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            max-width: 32rem;
            width: 100%;
            padding: 2.25rem;
            text-align: center;
            border: 1px solid #e2e8f0;
        }
        .icon-container {
            width: 4.5rem;
            height: 4.5rem;
            background-color: #fef3c7;
            color: #d97706;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 0 0 8px #fef9c3;
        }
        .icon-container svg {
            width: 2.5rem;
            height: 2.5rem;
        }
        .badge {
            display: inline-block;
            background-color: #fef3c7;
            color: #b45309;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            margin-bottom: 0.75rem;
        }
        h1 {
            font-size: 1.625rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.75rem;
            line-height: 1.25;
        }
        p {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .alert-box {
            background-color: #f8fafc;
            border-left: 4px solid #f59e0b;
            padding: 0.875rem 1rem;
            text-align: left;
            border-radius: 0.375rem;
            margin-bottom: 1.75rem;
            font-size: 0.85rem;
            color: #475569;
        }
        .actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.65rem 1.35rem;
            border-radius: 0.5rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.15s ease;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .btn-secondary {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            border: 1px solid #cbd5e1;
            cursor: pointer;
            transition: background-color 0.15s ease;
        }
        .btn-secondary:hover {
            background-color: #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="alert-card">
        <div class="icon-container">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        
        <div class="badge">Pemberitahuan Hak Akses</div>
        <h1>Akses Dibatasi</h1>
        <p>
            Akun Anda saat ini tidak memiliki izin untuk membuka halaman atau melakukan tindakan ini.
        </p>

        <div class="alert-box">
            💡 <strong>Informasi:</strong> Batasan akses ini disesuaikan dengan peran kerja (role) Anda dalam sistem SIMPAN. Silakan hubungi Administrator jika Anda memerlukan perubahan wewenang.
        </div>

        <div class="actions">
            <button onclick="window.history.back()" class="btn-secondary">
                ← Kembali
            </button>
            <a href="{{ url('/dashboard') }}" class="btn-primary">
                Ke Dashboard Utama
            </a>
        </div>
    </div>
</body>
</html>
