@extends('layouts.main_layout')
@section('content')
    <div class="d-lg-flex justify-content-between">
        <h3>Category List</h3>
        <!-- Button trigger modal -->
        <a href={{ route('categories.create') }}>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Kategori
            </button>

        </a>
    </div>

    @session('success')
        <div class=" col-lg-6">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endsession

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="flex">
                            <a href={{ route('categories.edit', $category->id) }}>
                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $category->id }}">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan menghapus data {{ $category->name }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="3">Tidak ada data kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection()
