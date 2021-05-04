
<!DOCTYPE html>
<html>
    <head>
        <title>Xcoins- Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <style type="text/css">
            .imgRight {
                width: 150px;
                padding-right: 15px;
            }   
        </style>
    </head>
    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Sign in</h5>
                                            <p>Sign-in to Crypto-explorer</p>
                                        </div>
                                        <div class="imgRight">
                                            <img src="{{ URL::asset('images/logo.png') }}" alt=""
                                            class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                @if(session()->has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session()->get('success') }}
                                </div>
                                @endif
                                
                                @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session()->get('error') }}
                                </div>
                                @endif
                                
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="username">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="username" placeholder="Enter email" autocomplete="off">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" id="userpassword" placeholder="Enter password" autocomplete="off">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="auth-remember-check" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </form>
                                    <div class="mt-4 text-center">
                                        <a href="#"><i class="mdi mdi-lock mr-1"></i>Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
