<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassMail;

class UserService
{
    public function loginService($credentials)
    {
        $user = User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            Auth::login($user);
            return true;
        }

        return false;
    }
    //Đăng ký
    public function registerService($request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $request['password'],
            'role' => 'Admin'
        ]);
        return $user;
    }

    //Đăng xuất
    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    //Trang cá nhân người dùng
    public function getUserProfile()
    {
        return Auth::user();
    }

    //Chỉnh sửa người dùng
    public function getUserById(string $id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => $data['password']
            ]);
            return true;
        }
        return false;
    }

    public function handleForgotPassword($email)
    {
        $existingUser = User::where('email', $email)->first();

        if (!$existingUser) {
            return false;
        }

        Mail::to($existingUser->email)->send(new ForgotPassMail($existingUser));
        return true;
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function updatePassword($email, $newPassword)
    {
        $user = $this->getUserByEmail($email);
        if ($user) {
            $user->update([
                'password' => $newPassword
            ]);
            return true;
        }
        return false;
    }
}
