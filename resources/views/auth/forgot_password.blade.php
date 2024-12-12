@extends('auth.base_auth')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img class="alta-logo" src="{{ asset('images/auth/Logo.png') }}" alt="Logo" class="img-fluid">
            <b class="alta-title">Quên mật khẩu</b>
        </div>
        <!-- /.login-logo -->
        <div>
            <div class="forgot-password-form">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('mailForgotPassword') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Gửi</button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
