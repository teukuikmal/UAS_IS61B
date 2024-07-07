@extends('layout.app')

@section('title', 'Hapus Mahasiswa')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Hapus Mahasiswa</h1>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Hapus Mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.delete', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>Apakah Anda yakin ingin menghapus data mahasiswa dengan nama <strong>{{ $mahasiswa->nama }}</strong>?</p>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        <a href="{{ route('mahasiswa') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
