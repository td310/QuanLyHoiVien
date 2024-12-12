@extends('auth.base_auth')
@section('content')
    <div class="register-box">
        <div class="login-logo">
            <img class="alta-logo" src="{{ asset('images/auth/Logo.png') }}" alt="Logo" class="img-fluid">
            <b class="alta-title">Đăng ký</b>
        </div>

        <div >
            <div >
                <form action="{{ route('userRegister') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="name" placeholder="Tên đăng nhập">
                    </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-1">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-1">
                        <input type="tel" class="form-control" name="phone" placeholder="Số điện thoại">
                    </div>
                    @error('phone')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-1">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePassword()">
                                <i class="fas fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Nhập lại mật khẩu">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordConfirmation()">
                                <i class="fas fa-eye" id="togglePasswordConfirmation"></i>
                            </span>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="register-footer">
                        <div class="col-8">
                            <a href="{{ route('login') }}" class="text-center">Đã có tài khoản</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
