<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use App\Models\Admin;
use App\Models\Member;

class AuthController extends Controller
{
    public function login() {
        if(Session::has('loginUsername')) {
            return back();
        } else {
            return view('client.login');
        }
    }

    public function register() {
        if(Session::has('loginUsername')) {
            return back();
        } else {
            return view('client.register');
        }
        
    }

    public function loginAdmin() {
        if(Session::has('login_name_admin')) {
            return back();
        } else {
            return view('admin.login');
        }
    }

    public function postLoginAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $account = Account::where('USERNAME', '=', $request->username)
        ->where('ROLE', '=', 1)
        ->first();
        if($account) {
            if(Hash::check($request->password, $account->PASSWORD)) {
                $admin = Admin::where('USERNAME', '=', $request->username)->first();
                $request->session()->put('login_name_admin', $admin->NAME_ADMIN);
                $request->session()->put('login_id_admin', $admin->ID_ADMIN);
                return redirect('/admin');
            } else {
                return back()->with('fail', 'Tên đăng nhập hay mật khẩu không đúng.');
            }
        } else {
            return back()->with('fail', 'Tên đăng nhập hay mật khẩu không đúng.');
        }
    }


    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $request->username;
        $account = Account::where('USERNAME', '=', $request->username)
        ->where('ROLE', '=', 0)
        ->first();
        if($account) {
            if(Hash::check($request->password, $account->PASSWORD)) {
                $member = Member::where('USERNAME', '=', $request->username)->first();
                $request->session()->put('login_name', $member->NAME_MEMBER);
                $request->session()->put('login_id', $member->ID_MEMBER);
                return redirect('/');
            } else {
                return back()->with('fail', 'Tên đăng nhập hay mật khẩu không đúng.');
            }
        } else {
            return back()->with('fail', 'Tên đăng nhập hay mật khẩu không đúng.');
        }
    }

    public function postRegisterAdmin(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:account,USERNAME',
            'email' => 'required|email|unique:member,EMAIL_MEMBER',
            'phone' => 'required',
            'password' => 'required|min:8',
            'prePassword' => 'required|same:password',
        ],[
            'name.required' => 'Vui lòng điền thông tin này.',
            'username.required' => 'Vui lòng điền thông tin này.',
            'username.unique' => 'Tên đang nhập đã tồn tại',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không hợp lệ.',
            'email.required' => 'Vui lòng điền thông tin này.',
            'password.required' => 'Vui lòng điền thông tin này.',
            'password.min' => 'Mật khẩu ít nhất phải 8 ký tự.',
            'prePassword.required' => 'Vui lòng điền thông tin này.',
            'prePassword.same' => 'Mật khẩu nhập lại không giống.',
        ]);
        $hashed = Hash::make($request->password);
        $account = Account::create([
            'USERNAME' => $request->username,
            'PASSWORD' => $hashed,
            'ROLE' => 1,
            'STATUS' => 0,
        ]);

        if($account) {
            $admin = Admin::create([
                'USERNAME' => $request->username,
                'NAME_MEMBER' => $request->name,
                'EMAIL_MEMBER' => $request->email,
                'PHONE_MEMBER' => $request->phone,
            ]);
            // if($admin) {
            //     return back()->with('success', 'Đăng ký thành công');
            // }
            // else {
            //     return back()->with('fail', 'Có lỗi gì đó.');
            // }
        }
        else {
            return back()->with('fail', 'Có lỗi gì đó.');
        }
    }


    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:account,USERNAME',
            'email' => 'required|email|unique:member,EMAIL_MEMBER',
            'phone' => 'required',
            'password' => 'required|min:8',
            'prePassword' => 'required|same:password',
        ],[
            'name.required' => 'Vui lòng điền thông tin này.',
            'username.required' => 'Vui lòng điền thông tin này.',
            'username.unique' => 'Tên đang nhập đã tồn tại',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không hợp lệ.',
            'email.required' => 'Vui lòng điền thông tin này.',
            'password.required' => 'Vui lòng điền thông tin này.',
            'password.min' => 'Mật khẩu ít nhất phải 8 ký tự.',
            'prePassword.required' => 'Vui lòng điền thông tin này.',
            'prePassword.same' => 'Mật khẩu nhập lại không giống.',
        ]);
        $hashed = Hash::make($request->password);
        $token = Hash::make(Str::random(10));
        $account = Account::create([
            'USERNAME' => $request->username,
            'PASSWORD' => $hashed,
            'ROLE' => 0,
            'STATUS' => 0,
        ]);

        if($account) {
            $member = Member::create([
                'USERNAME' => $request->username,
                'NAME_MEMBER' => $request->name,
                'EMAIL_MEMBER' => $request->email,
                'PHONE_MEMBER' => $request->phone,
            ]);
            if($member) {
                return back()->with('success', 'Đăng ký thành công');
            }
            else {
                return back()->with('fail', 'Có lỗi gì đó.');
            }
        }
        else {
            return back()->with('fail', 'Có lỗi gì đó.');
        }
    }

    public function logoutAdmin() {
        if(Session::has('login_id_admin') && Session::has('login_name_admin')) {
            Session::pull('login_id_admin');
            Session::pull('login_name_admin');
            return redirect('/admin/dang-nhap');
        }
    }

    public function logout() {
        if(Session::has('login_id') && Session::has('login_name')) {
            Session::pull('login_id');
            Session::pull('login_name');
            return back();
        }
    }
}
