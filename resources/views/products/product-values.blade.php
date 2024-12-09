@extends('layouts.main_layout')
@section('content')
    <div class="d-lg-flex justify-content-between">
        <h3>Product Values by Category</h3>
    </div>
    <table class="table table-striped">
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
                    <td>@currency($row['total_value'])</td>
                </tr>
            @endforeach
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>@currency($total)</strong></td>
            </tr>
        </tbody>
    </table>
@endsection()
