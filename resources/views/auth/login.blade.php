@extends('auth.base_auth')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img class="alta-logo" src="{{ asset('images/auth/Logo.png') }}" alt="Logo" class="img-fluid">
            <b class="alta-title">Đăng nhập</b>
        </div>
        <div class="">
            <div class="">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('userLogin') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="email" class="form-control" name="email"
                            placeholder="Tên đăng nhập">
                    </div>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" id="password">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePassword()">
                                <i class="fas fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                    <div class="login-footer mb-2">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label class="checkbox-login" for="remember">
                                    Ghi nhớ mật khẩu
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <p class="mb-1 text-right">
                                <a href="{{ route('forgot_password')}}">Quên mật khẩu?</a>
                            </p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
