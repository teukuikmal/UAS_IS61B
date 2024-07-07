@extends('layout.app')

@section('title', 'Mahasiswa')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('mahasiswa.insert') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Mahasiswa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->email }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>{{ $mahasiswa->no_telp }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $mahasiswa->id }}">
                                        <i class="fas fa-eye"></i> Lihat
                                    </button>
                                    <form action="{{ route('mahasiswa.delete', $mahasiswa->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
    
                            <!-- Modal Pop-up -->
                            <div class="modal fade" id="viewModal{{ $mahasiswa->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $mahasiswa->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel{{ $mahasiswa->id }}">Detail Mahasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
                                            <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                                            <p><strong>Alamat:</strong> {{ $mahasiswa->alamat }}</p>
                                            <p><strong>No HP:</strong> {{ $mahasiswa->no_telp }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
