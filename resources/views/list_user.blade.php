<!-- resources/views/list_user.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    .user-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.8rem;
        color: #2d3748;
        font-weight: 600;
        margin: 0;
    }

    .btn-add-user {
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
    }

    .btn-add-user:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(66, 153, 225, 0.4);
    }

    /* Alert Success */
    .alert-success {
        background-color: #c6f6d5;
        color: #22543d;
        padding: 1rem 1.5rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #38a169;
    }

    .user-table {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border-radius: 8px;
        overflow: hidden;
    }

    .user-table thead {
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    }

    .user-table th {
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.85rem;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .user-table tbody tr {
        border-bottom: 1px solid #e2e8f0;
    }

    .user-table tbody tr:last-child {
        border-bottom: none;
    }

    .user-table td {
        padding: 1rem 1.5rem;
        color: #4a5568;
        font-size: 0.95rem;
    }

    .user-table tbody tr:nth-child(even) {
        background-color: #f7fafc;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-edit {
        background-color: #48bb78;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        font-size: 0.85rem;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-edit:hover {
        background-color: #38a169;
    }

    .btn-delete {
        background-color: #f56565;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-delete:hover {
        background-color: #e53e3e;
    }

    .delete-form {
        display: inline;
        margin: 0;
    }

    @media (max-width: 768px) {
        .user-container {
            padding: 0 1rem;
            margin: 2rem auto;
        }

        .header-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .user-table th,
        .user-table td {
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.3rem;
        }

        .btn-edit, .btn-delete {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .user-table th,
        .user-table td {
            padding: 0.6rem 0.5rem;
            font-size: 0.8rem;
        }

        .btn-add-user {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="user-container">
    <div class="header-section">
        <h1 class="page-title">Daftar Pengguna</h1>
        <a href="{{ route('user.create') }}" class="btn-add-user">Tambahkan Pengguna</a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>NPM</th>
                <th>KELAS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->nama_kelas }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">Edit</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection