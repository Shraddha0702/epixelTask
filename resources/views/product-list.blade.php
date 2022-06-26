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

    </header>
</head>

<body>


    <div class="row px-5 py-3">
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
                        <h2>All Products</h2>
                    </div>
                    <div>
                        <select name="seletestatus" class="form-control" id="deletestatus" onchange="TableSelected()">
                            <option value="Active">Active</option>
                            <option value="Archived">Archived</option>
                        </select>
                    </div>
                    <div>
                    @if(Session::has('name'))
                        <a href="/logout" class="btn btn-primary float-end">Logout</a>
                    @else
                    <a href="/login" class="btn btn-primary float-end">Login</a>
                    @endif
                        <a href="{{ url('product') }}" class="btn btn-primary float-end">Add New Product</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="mytable">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody id="activetable" class="text-center">
                            @foreach ($products as $products)
                            <tr>
                                <td>{{$products->id}}</td>
                                <td>{{ $products->name }}</td>
                                <td><img src={{ asset('/img/'.$products->product_image) }} class="img-fluid" /></td>
                                <td>
                                    <a href="{{'product-edit/'.$products->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    <button value="{{$products->id}}" class="btn btn-danger btn-sm deletebtn">Delete</button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                        <tbody id="arcivetable" class="text-center">
                            @foreach ($data2 as $data2)
                            <tr>
                            <td>{{$products->id}}</td>
                            <td>{{ $data2->name }}</td>
                                <td><img src={{ asset('/img/'.$data2->product_image) }} class="img-fluid" /></td>
                                <td class="text-center">
                                    <a href="{{'product-edit/'.$data2->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    <button value="{{$data2->id}}" class="btn btn-danger btn-sm recyclebtn">Restore</button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Delete modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <samp aria-hidden="true">&times;</samp>
                        </button>
                    </div>
                    <form action="{{ url('delete/') }}" method="POST" id="deleteform">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Do you want to delete data..? </p>
                            <input type="hidden" name="data_id" id="dt_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recycle modal -->

        <div class="modal fade" id="recycleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Recycle</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <samp aria-hidden="true">&times;</samp>
                        </button>
                    </div>
                    <form action="{{ url('product-recycle/') }}" method="POST" id="deleteform">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Do you want to restore data..? </p>
                            <input type="hidden" name="recycle_id" id="rc_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- -- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -- -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.deletebtn', function() {
                var pkg_id = $(this).val();
                //alert(pkg_id);
                $('#exampleModal').modal('show');
                $('#dt_id').val(pkg_id);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.recyclebtn', function() {
                var pkg1_id = $(this).val();
                //alert(pkg_id);
                $('#recycleModal').modal('show');
                $('#rc_id').val(pkg1_id);
            });
        });
    </script>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("arcivetable").style.display = 'none';
        }

        function TableSelected() {
            var selectedtable = document.getElementById("deletestatus").value;
            if (selectedtable == "Active") {
                document.getElementById("activetable").style.display = '';
                document.getElementById("arcivetable").style.display = 'none';
            } else {
                document.getElementById("activetable").style.display = 'none';
                document.getElementById("arcivetable").style.display = '';
            }
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
</body>

</html>