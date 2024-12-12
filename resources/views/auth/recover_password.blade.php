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
                <form action="{{ route('getforgotpassword', $email) }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu mới">
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
                        <input type="password" name="password_confirmation"  id="password_confirmation" class="form-control"
                            placeholder="Xác nhận mật khẩu">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordConfirmation()">
                                <i class="fas fa-eye" id="togglePasswordConfirmation"></i>
                            </span>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
