<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Noer Lock System</title>
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
            margin-bottom: 30px;
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

        .badge {
            padding: 12px 20px;
            border-radius: 999px;
            background: rgba(34,197,94,.15);
            color: #4ade80;
            border: 1px solid rgba(34,197,94,.35);
            font-weight: bold;
        }

        .nav-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav-btn {
            text-decoration: none;
            color: white;
            padding: 12px 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, #38bdf8, #8b5cf6);
            font-weight: 700;
            box-shadow: 0 12px 30px rgba(56,189,248,.18);
        }

        .alert {
            background: rgba(34,197,94,.15);
            color: #86efac;
            border: 1px solid rgba(34,197,94,.35);
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-bottom: 30px;
        }

        .card {
            background: rgba(15,23,42,.85);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }

        .card h3 {
            color: #94a3b8;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .number {
            font-size: 32px;
            font-weight: 900;
        }

        .door-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 30px;
        }

        .panel {
            background: rgba(15,23,42,.85);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 24px;
            padding: 28px;
        }

        .status {
            font-size: 42px;
            font-weight: 900;
            margin: 20px 0 10px;
        }

        .locked {
            color: #f87171;
        }

        .unlocked {
            color: #4ade80;
        }

        .actions {
            display: flex;
            gap: 14px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        button {
            border: none;
            padding: 14px 20px;
            border-radius: 15px;
            color: white;
            font-weight: 800;
            cursor: pointer;
        }

        .btn-open {
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .btn-lock {
            background: linear-gradient(135deg, #ef4444, #b91c1c);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
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

        .success {
            color: #4ade80;
            font-weight: bold;
        }

        .denied {
            color: #f87171;
            font-weight: bold;
        }

        @media(max-width: 900px) {
            .cards,
            .door-box {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media(max-width: 600px) {
            body {
                padding: 18px;
            }

            .cards,
            .door-box {
                grid-template-columns: 1fr;
            }

            table {
                display: block;
                overflow-x: auto;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="topbar">
        <div>
            <h1>Noer Lock System</h1>
            <p class="subtitle">Dashboard monitoring smart door lock berbasis Laravel.</p>
        </div>

        <div class="nav-actions">
            <a href="{{ route('fingerprint.index') }}" class="nav-btn">Data Fingerprint</a>
            <div class="badge">System Online</div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="cards">
        <div class="card">
            <h3>Status Pintu</h3>
            <div class="number">
                {{ $door && $door->status == 'unlocked' ? 'Terbuka' : 'Terkunci' }}
            </div>
        </div>

        <div class="card">
            <h3>Total Fingerprint</h3>
            <div class="number">{{ $totalUsers }}</div>
        </div>

        <div class="card">
            <h3>Akses Berhasil</h3>
            <div class="number">{{ $successAccess }}</div>
        </div>

        <div class="card">
            <h3>Akses Ditolak</h3>
            <div class="number">{{ $deniedAccess }}</div>
        </div>
    </div>

    <div class="door-box">
        <div class="panel">
            <h2>Kontrol Pintu</h2>

            @if($door && $door->status == 'unlocked')
                <div class="status unlocked">UNLOCKED</div>
                <p>Pintu sedang terbuka.</p>
            @else
                <div class="status locked">LOCKED</div>
                <p>Pintu sedang terkunci.</p>
            @endif

            <div class="actions">
                <form action="{{ route('door.unlock') }}" method="POST">
                    @csrf
                    <button class="btn-open" type="submit">Buka Pintu</button>
                </form>

                <form action="{{ route('door.lock') }}" method="POST">
                    @csrf
                    <button class="btn-lock" type="submit">Kunci Pintu</button>
                </form>
            </div>
        </div>

        <div class="panel">
            <h2>Informasi Sistem</h2>
            <br>

            <p>Mode: <b>{{ $door->mode ?? 'manual' }}</b></p>

            <br>

            <p>Update terakhir:</p>
            <h3>
                {{ $door && $door->last_updated_at ? \Carbon\Carbon::parse($door->last_updated_at)->format('d M Y H:i') : '-' }}
            </h3>
        </div>
    </div>

    <div class="panel">
        <h2>Riwayat Akses Terbaru</h2>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Fingerprint ID</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>
            </thead>

            <tbody>
                @forelse($latestLogs as $log)
                    <tr>
                        <td>{{ $log->name ?? 'Unknown' }}</td>
                        <td>{{ $log->fingerprint_id ?? '-' }}</td>
                        <td>
                            @if($log->access_status == 'success')
                                <span class="success">Berhasil</span>
                            @else
                                <span class="denied">Ditolak</span>
                            @endif
                        </td>
                        <td>{{ $log->description ?? '-' }}</td>
                        <td>
                            {{ $log->access_time ? \Carbon\Carbon::parse($log->access_time)->format('d/m/Y H:i') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada riwayat akses.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>