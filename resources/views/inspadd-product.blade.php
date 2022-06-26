<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Styles -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <header>
        <!-- Intro settings -->
        <style>
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 58px;
            }

            @media (max-width: 991px) {
                #intro {
                    /* Margin to fix overlapping fixed navbar */
                    margin-top: 45px;
                }
            }
        </style>
        <style>
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 58px;
            }

            @media (max-width: 991px) {
                #intro {
                    /* Margin to fix overlapping fixed navbar */
                    margin-top: 45px;
                }
            }
        </style>
        <style>
    .hide{
        display: none;
    }
    </style>
</head>

<body>


            <div class="row px-5 py-3">
                <div class="col-md-12">
                    @if (session('result'))
                        <h6 class="alert alert-success">{{session('result')}}</h6>
                    @endif
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h2>Add Product</h2>
                            </div>
                            <div>
                                <a href="{{ url('product-list') }}" class="btn btn-primary float-end">All Products</a>
                            </div>
                        </div>
                        <div class="card-body">
                        @if(Session::has('name'))
                            <form action="/add-product" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Name:</label>
                                    <input type="text" class="form-control" name="product_name" >
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Image:</label>
                                    <input type="file" class="form-control" name="product_image" onchange="preview(this);">
                                    <img id="preview_image" class="hide" alt="" src="" width="100px" height="120px"> 

                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                        @else
                        <h3 align="center">Please Login First</h3><br>
                        <center>
                        <a href="/login"><button type="button" class="btn btn-primary">Login Here</button></a>
                        </center>
                        @endif
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script>
    function preview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_image').removeClass();
            $('#preview_image')
                .attr('src', e.target.result)
                .width(100)
                .height(120);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>