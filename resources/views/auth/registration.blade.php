<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy" style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="/product-list">All Products</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="/registration">Register</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="/product-list">All Products</a>
            </li>
            @if (session('name'))
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            @endif
          </ul>
          @if (session('name'))
          <li class="nav-item dropdown no-arrow">
                    
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome {{session('name')}}</span>
                        @endif
                       
                  
                    <!-- Dropdown - User Information -->
                 
                </li>

        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Jumbotron -->
    
    <!-- Jumbotron -->
  </header>


</head>

<body>
    <div class="container-fluid vh-100" style="margin-top:50px">
        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Create Account</h3>
                    </div>
                    <div class="p-4">

                        <form action="{{route('register-user')}}" method="post">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf
                            <center>
                            <div class="form-group">
                                <label for="fname">First Name</label><br>
                                <input type="text" placeholder="Enter Fisrt Name" name=fname value="{{old('fname')}}">
                                
                                <br><br>
                            </div>
                            <span class="text-danger">@error('fname'){{$message}}@enderror</span>

                            <div class="form-group">
                                <label for="lname">Last Name</label><br>
                                <input type="text" placeholder="Enter Last Name" name=lname value="{{old('lname')}}">

                                <br><br>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label><br>
                                <input type="email" placeholder="Enter Email" name=email value="{{old('email')}}">
                                
                                <br><br>
                            </div>
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            <div class="form-group">
                                <label for="password">Password</label><br>
                                <input type="password" placeholder="Enter Password" name=password value="{{old('password')}}">
                                
                                <br><br>
                            </div>
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>

                            <div class="form-group">
                                <label for="password">Confirm Password</label><br>
                                <input type="password" placeholder="Enter Password" name=password_confirmation value="{{old('password')}}">
                                
                                <br><br>
                            </div>
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile</label><br>
                                <input type="number" placeholder="Enter Mobile Number" name=mobile value="{{old('mobile')}}">
                                
                                <br><br>
                            </div>
                            <span class="text-danger">@error('mobile'){{$message}}@enderror</span>

                            <!--https://stackoverflow.com/questions/54029008/need-to-create-a-drop-down-list-in-laravel-and-insert-the-results-in-a-new-data-->

                            <!-- <input type="hidden" name="a" value="admin"> -->

                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Register</button>
                                </center>
                            </div>
                            <p class="text-center mt-3">Already have an account?
                                 <span class="text-primary"> <a href="login">Login</a></span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>