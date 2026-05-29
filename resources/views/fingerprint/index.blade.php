<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Fingerprint - Noer Lock System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(56,189,248,.25), transparent 30%),
                radial-gradient(circle at bottom right, rgba(139,92,246,.25), transparent 30%),
                #020617;
            color: white;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 20px;
            flex-wrap: wrap;
        }

        h1 {
            font-size: 34px;
        }

        .subtitle {
            color: #94a3b8;
            margin-top: 8px;
        }

        .back {
            text-decoration: none;
            color: white;
            padding: 12px 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, #38bdf8, #8b5cf6);
            font-weight: 700;
        }

        .alert {
            background: rgba(34,197,94,.15);
            color: #86efac;
            border: 1px solid rgba(34,197,94,.35);
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 22px;
        }

        .error {
            background: rgba(239,68,68,.15);
            color: #fca5a5;
            border: 1px solid rgba(239,68,68,.35);
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 22px;
        }

        .grid {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 24px;
        }

        .panel {
            background: rgba(15,23,42,.85);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 24px;
            padding: 26px;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }

        .panel h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            color: #cbd5e1;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        input, select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,.12);
            background: rgba(255,255,255,.06);
            color: white;
            outline: none;
        }

        select option {
            color: black;
        }

        button {
            border: none;
            padding: 14px 20px;
            border-radius: 14px;
            color: white;
            font-weight: 800;
            cursor: pointer;
        }

        .btn-save {
            width: 100%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            padding: 10px 14px;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid rgba(255,255,255,.08);
            text-align: left;
            color: #cbd5e1;
            font-size: 14px;
        }

        th {
            color: white;
            background: rgba(255,255,255,.05);
        }

        .active {
            color: #4ade80;
            font-weight: bold;
        }

        .inactive {
            color: #f87171;
            font-weight: bold;
        }

        @media(max-width: 850px) {
            body {
                padding: 18px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="topbar">
        <div>
            <h1>Data Fingerprint</h1>
            <p class="subtitle">Kelola pengguna yang memiliki akses fingerprint.</p>
        </div>

        <a href="{{ route('dashboard') }}" class="back">Kembali Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="grid">
        <div class="panel">
            <h2>Tambah Pengguna</h2>

            <form action="{{ route('fingerprint.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>ID Fingerprint</label>
                    <input type="number" name="fingerprint_id" placeholder="Contoh: 1" required>
                </div>

                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="name" placeholder="Contoh: Afrizal Noer" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input type="text" name="role" value="User" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                </div>

                <button type="submit" class="btn-save">Simpan Data</button>
            </form>
        </div>

        <div class="panel">
            <h2>Daftar Pengguna Fingerprint</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID Fingerprint</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->fingerprint_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                @if($user->status == 'active')
                                    <span class="active">Aktif</span>
                                @else
                                    <span class="inactive">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('fingerprint.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada data fingerprint.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>