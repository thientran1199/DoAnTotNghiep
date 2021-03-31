<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Auth;
use Hash;
class AccountController extends Controller
{
    
    /*login and logout customer*/
    public function getLoginCustomer(){
        if(Auth::guard('account_customer')->check()) 
            return back()->with(['typeMsg'=>'danger','msg'=>'Bạn phải đăng xuất để sử dụng tính năng này']);
        session()->put('urlprev',request()->server('HTTP_REFERER'));
        return view('frontend.login');
    }
    public function postLoginCustomer(Request $request){
        $request->validate([
           'stringUsername' => 'exists:account,username'
        ],
        [
            'exists' => 'Tài khoản này không tồn tại yêu cầu bạn đăng ký tài khoản'
        ]);
        $data = [
            'username' => $request->stringUsername,
            'password' => $request->stringPassword,
            'role' => 'customer'
        ];
        $remember = ($request->remember) ? true : false;
    
        if(Auth::guard('account_customer')->attempt($data,$remember)){
            //$account = Auth::guard('account_customer')->user();
            //dd(Auth::guard('account'));
            $urlprev = session('urlprev');
            return redirect(($urlprev!=url('/login')&&$urlprev!=url('/signup')&&$urlprev!=null)?session('urlprev'):url('/'))->with(['typeMsg'=>'success','msg'=>'Đăng nhập thành công !']);
        }
        else return back()->with(['typeMsg'=>'danger','msg'=>'Tên tài khoản/mật khẩu không chính xác']);     
    }
    public function getLogoutCustomer(){
        Auth::guard('account_customer')->logout();
        return back()->with(['typeMsg'=>'success','msg'=>'Đăng xuất thành công']);
    }
    //admin login & logout
    public function getLoginAdmin(){
    	//dd(Auth::guard('account'));
    	return view('backend.login');
    }
    public function postLoginAdmin(Request $request){
        $request->validate([
           'stringUsername' => 'exists:account,username'
        ],
        [
            'exists' => 'Tài khoản này không tồn tại yêu cầu bạn đăng nhập lại'
        ]);
    	$data = [
    		'username' => $request->stringUsername,
    		'password' => $request->stringPassword,
    		'role' => 'admin',
    	];
    	$remember = ($request->remember) ? true : false;
    
    	if(Auth::guard('account_admin')->attempt($data,$remember)){
    		//dd(Auth::guard('account'));
            //$account = Auth::guard('account_admin')->user();
    		return redirect(url('/admin-page'))->with(['typeMsg'=>'success','msg'=>'Đăng nhập thành công !']);
    	}
    	else return back()->with(['typeMsg'=>'danger','msg'=>'Tên tài khoản/mật khẩu không chính xác']);    	
    }
    public function getLogoutAdmin(){
    	Auth::guard('account_admin')->logout();
    	return redirect(url('/admin-page/login'))->with(['typeMsg'=>'success','msg'=>'Đăng xuất thành công']);
    }
}
