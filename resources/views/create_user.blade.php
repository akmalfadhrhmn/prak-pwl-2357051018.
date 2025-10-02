<!-- resources/views/user/create.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .page-title {
        font-size: 1.8rem;
        color: #2d3748;
        margin-bottom: 2rem;
        font-weight: 600;
    }

    .form-card {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #2d3748;
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.95rem;
        color: #4a5568;
        background-color: #ffffff;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-input:focus,
    .form-select:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
    }

    .btn-submit {
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        color: #ffffff;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(66, 153, 225, 0.4);
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 0 1rem;
            margin: 2rem auto;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .form-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="form-container">
    <h1 class="page-title">Buat Pengguna Baru</h1>

    <div class="form-card">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="npm" class="form-label">NPM:</label>
                <input type="text" id="npm" name="npm" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="kelas_id" class="form-label">Kelas:</label>
                <select name="kelas_id" id="kelas_id" class="form-select" required>
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</div>
@endsection
