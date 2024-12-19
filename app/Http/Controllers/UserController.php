<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\EmailRequest;

class UserController extends Controller
{
    function __construct(protected UserService $userService) {}

    public function index()
    {
        $user = $this->userService->getUserProfile();
        return view('profile.index', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = $this->userService->getUserById($id);
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request, string $id)
    {
        if ($request->hasFile('image')) {
            if ($this->userService->updateAvatar($id, $request->file('image'))) {
                return redirect()->back()->with('success', 'Cập nhật ảnh đại diện thành công');
            }
        }
        return back()->with('error', 'Cập nhật ảnh đại diện thất bại');
    }
    public function destroy(string $id)
    {
        //
    }

    //Đăng nhập
    public function login()
    {
        return view('auth.login');
    }

    function userLogin(LoginRequest $request)
    {
        if ($this->userService->loginService($request->validated())) {
            return redirect('/')->with('success', 'Đăng nhập thành công');
        }

        return back()->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    //Đăng ký
    public function register()
    {
        return view('auth.register');
    }

    public function userRegister(RegisterRequest $request)
    {
        $this->userService->registerService($request->validated());

        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công');
    }

    //Đăng xuất
    public function logout(Request $request)
    {
        $this->userService->logout($request);
        return redirect()->route('login');
    }

    //Quên mật khẩu
    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function mailForgotPassword(EmailRequest $request)
    {
        if ($this->userService->handleForgotPassword($request->input('email'))) {
            return redirect()->route('login')
                ->with('success', 'Vui lòng kiểm tra email để thực hiện thay đổi mật khẩu');
        }
        return back()->with('error', 'Email không tồn tại trong hệ thống');
    }

    //Lấy mật khẩu    
    public function getpasswword($email)
    {
        $user = $this->userService->getUserByEmail($email);
        return view('auth.recover_password', ['email' => $email]);
    }
    
    public function getforgotpassword(Request $request, $email)
    {
        if ($this->userService->updatePassword($email, $request->input('password'))) {
            return redirect()->route('login')
                ->with('success', 'Đổi mật khẩu thành công, bạn có thể đăng nhập');
        }
        return back()->with('error', 'Không thể cập nhật mật khẩu');
    }
}
