@extends('layouts.global')

@section('title')
    PRODUCT API
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Route Menu Api</h3>
        </div>
        <div class="card-body">
            <p>Link <a href="http://127.0.0.1:8000/api/data-user">http://127.0.0.1:8000/api/data-user</a></p>
        </div>
    </div>

    <div  class="card">
        <div class="card-header">
            <h3>Response <a href="http://149.129.217.146/jubelio/api/all/products/stock">http://149.129.217.146/jubelio/api/all/products/stock</a></h3>
        </div>
        <div class="card-body">
            <h3>Hasil Api</h3>
            <p class="text-muted">response data : {{ json_encode($response) }}</p>
            <p>response status = {{ json_encode($response['status']) }}</p>
            <p>response message = {{ json_encode($response['message']) }}</p>
            <p>response data = {{ json_encode($response['data']) }}</p>
        </div>
    </div>
    
    {{-- Jika Menggunakan Javascript
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $.ajax({
            type: 'GET',
            url: 'http://149.129.217.146/jubelio/api/all/products/stock',
            async: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
            }
            error: function(response) {
                console.log(response)
            }
        });
    </script> --}}
@endsection