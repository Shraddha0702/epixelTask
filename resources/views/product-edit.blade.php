<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Styles -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .customer-table
        {
            counter-reset: tableCount;
        }
        .counterCell:before
        {
            content: counter(tableCount);
            counter-increment: tableCount;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            @if (session('result'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('result')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h2>Edit Product</h2>
                    </div>
                    <div>
                        <a href="{{ url('product-list') }}" class="btn btn-danger float-end">BACK</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-product/'.$product[0]->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label class="form-label">Product Name:</label>
                            <input type="text" class="form-control" name="name" value="{{$product[0]->name}}">
                        </div>
                        <div class="form-group mb-3">
                                    <label class="form-label">Upload Image:</label>
                                    <!-- <input class="form-control" type="file" name="product_image"> -->
                                    <input type="file" name="product_image" class="form-control" value="{{$product[0]->product_image}}">
                                    
                                </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>