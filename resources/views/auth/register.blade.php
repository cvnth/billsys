<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body style="background-image: url('{{ asset('img/img5.png') }}'); 
             background-size: 100%; 
             background-repeat: no-repeat; 
             background-position: center;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5" >
        <div class="card-register p-0">
                <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{ url('/register') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstName" class="form-control form-control-user" id="firstName"
                                            placeholder="First Name" required autofocus>
                                            @error('first name')
                                             <span>{{ $message }}</span>
                                             @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastName" class="form-control form-control-user" id="lastName"
                                            placeholder="Last Name" required autofocus>
                                            @error('last name')
                                             <span>{{ $message }}</span>
                                             @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="InputEmail"
                                        placeholder="Email Address"required autofocus>
                                        @error('email')
                                             <span>{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password"required autofocus>
                                            @error('password')
                                             <span>{{ $message }}</span>
                                             @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required autofocus>
                                            @error('repeat password')
                                             <span>{{ $message }}</span>
                                             @enderror
                                    </div>
                                </div>
                              
                                <input class="btn btn-primary" type="submit" value="Register">
                               

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    @include('auth.authScript')
</body>

</html>