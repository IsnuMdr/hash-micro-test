@extends('layouts.main_layout')
@section('content')
    <div class="d-lg-flex justify-content-between">
        <h3>Check Character Percentage</h3>
    </div>

    @session('success')
        <div class=" col-lg-6">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endsession

    <div class="col-lg-8">
        <form action="{{ route('check-percentage.calculate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="input1" class="form-label">Input 1</label>
                <input type="text" class="form-control @error('input1') is-invalid @enderror" id="input1"
                    name="input1" value="{{ old('input1') }}" placeholder="Masukkan nilai 1">
                @error('input1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="input2" class="form-label">Input 2</label>
                <input type="text" class="form-control @error('input2') is-invalid @enderror" id="input2"
                    name="input2" value="{{ old('input2') }}" placeholder="Masukkan nilai 2">
                @error('input2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
