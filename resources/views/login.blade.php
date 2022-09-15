@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-5 offset-lg-3 col-md-5 offset-md-4 px-5">
                <p class="text-center fw-bolder">Log in to your account</p>
                <form class="row g-3" action="" method="post">
                    @csrf
                    <div class="col-md-12">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter your email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <div class="text-danger py-2 d-flex align-items-center alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <div  class ="px-3">
                                    {{ $errors->first('email') }}*
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Enter your password...">
                        @if ($errors->has('password'))
                            <div class="text-danger py-2 d-flex align-items-center alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <div  class ="px-3">
                                    {{ $errors->first('password') }}*
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div  class ="px-3">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="d-grid gap-2 col-md-12 mx-auto my-4">
                        <button class="btn btn-primary" type="submit">Sign In</button>
                    </div>
                </form>
                <div>
                    <p>Don't have an account ?&nbsp; &nbsp;<span><a href="{{url('registration')}}">Register</a></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
