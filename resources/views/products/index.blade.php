@extends('layouts.main_layout')
@section('content')
    <div class="d-lg-flex justify-content-between">
        <h3>Product Inventory</h3>
        <!-- Button trigger modal -->
        <a href={{ route('products.create') }}>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Produk
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
                <th>Name</th>
                <th>Kategori</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>@currency($product->price)</td>
                    <td>
                        <div class="flex">
                            <a href={{ route('products.edit', $product->id) }}>
                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $product->id }}">
                                Hapus
                            </button>
                        </div>

                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan menghapus data {{ $product->name }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <th>Category</th>
                <th>Total Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $row)
                <tr>
                    <td>{{ $row['category'] }}</td>
                    <td>{{ number_format($row['total_value'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection()
