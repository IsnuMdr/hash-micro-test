@extends('layouts.main_layout')
@section('content')
    <div class="d-lg-flex justify-content-between">
        <h3>Hasil Kalkulasi Persentase Karakter</h3>
    </div>

    @session('success')
        <div class=" col-lg-6">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endsession

    <div class="container">
        <p><strong>Input 1:</strong> {{ $input1 }}</p>
        <p><strong>Input 2:</strong> {{ $input2 }}</p>
        <p><strong>Persentase Karakter dari Input 1 di Input 2 adalah:</strong> {{ number_format($percentage, 2) }}%</p>
        <p>Karena : @foreach ($sameCharacters as $char)
                <strong>{{ $char }}, {{ ' ' }}</strong>
            @endforeach
            muncul di <strong>{{ $input2 }}</strong>, berarti {{ count($sameCharacters) }} / {{ strlen($input1) }}
            (<strong>{{ $input1 }}</strong> = {{ strlen($input1) }} karakter) itu
            muncul di input kedua, maka hasil = {{ number_format($percentage, 2) }}%

        </p>

        <a href={{ route('check-percentage.index') }}>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Coba Lagi
            </button>

        </a>
    </div>

@endsection
