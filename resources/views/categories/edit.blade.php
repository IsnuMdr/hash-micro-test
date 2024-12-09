@extends('layouts.main_layout')
@section('content')

    @session('error')
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endsession

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('put')
        <div class="container col-lg-6">
            <h1 class="fs-5">Tambah Kategori</h1>
            <div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
