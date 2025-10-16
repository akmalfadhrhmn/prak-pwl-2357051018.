<!-- resources/views/edit_user.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    .edit-user-container {
        max-width: 600px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .form-card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 2rem;
    }

    .page-title {
        font-size: 1.8rem;
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.95rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        color: #2d3748;
        border: 2px solid #e2e8f0;
        border-radius: 6px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        box-sizing: border-box;
    }

    .form-input:focus,
    .form-select:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
    }

    .error-message {
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 4px rgba(66, 153, 225, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(66, 153, 225, 0.4);
    }

    .btn-cancel {
        flex: 1;
        background-color: #718096;
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.2s ease;
        display: inline-block;
    }

    .btn-cancel:hover {
        background-color: #4a5568;
    }

    @media (max-width: 768px) {
        .edit-user-container {
            padding: 0 1rem;
            margin: 2rem auto;
        }

        .form-card {
            padding: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .button-group {
            flex-direction: column;
        }
    }
</style>

<div class="edit-user-container">
    <div class="form-card">
        <h1 class="page-title">Edit Pengguna</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    class="form-input" 
                    value="{{ old('nama', $user->nama) }}" 
                    required
                >
                @error('nama')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="npm" class="form-label">NPM</label>
                <input 
                    type="text" 
                    id="npm" 
                    name="npm" 
                    class="form-input" 
                    value="{{ old('npm', $user->npm) }}" 
                    required
                >
                @error('npm')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select 
                    id="kelas_id" 
                    name="kelas_id" 
                    class="form-select" 
                    required
                >
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $k)
                        <option 
                            value="{{ $k->id }}" 
                            {{ old('kelas_id', $user->kelas_id) == $k->id ? 'selected' : '' }}
                        >
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Update</button>
                <a href="{{ route('user.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection