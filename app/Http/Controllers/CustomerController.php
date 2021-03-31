<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Person;
use App\Models\Account;
use Auth;
use Hash;
class CustomerController extends Controller
{
	//frontend
	/*đỏi mật khẩu ok*/
    public function getChangePassword(){
        return view('frontend.customer.change_password');
    }
    public function postChangePassword(Request $request){
    	$request->validate([
            'stringPassword' => 'min:5|max:15|different:stringOldPassword',
            'stringRePassword' => 'same:stringPassword',
        ],
        [
        	'min' => 'Trường trên tối thiểu :min ký tự',
            'max' => 'Trường trên tối đa :max ký tự',
 			'different' => 'Mật khẩu mới phải khác mật khẩu cũ',
            'same' => 'Mật khẩu xác nhận không khớp mật khẩu mới',  
        ]);
        $account = Account::findOrFail(Auth::guard('account_customer')->id());
        $oldPassword = $request->stringOldPassword;
        $password = $request->stringPassword;
        $rePassword = $request->stringRePassword;
        if(Hash::check($oldPassword,$account->password)){            
            $account->password= Hash::make($password);
            $account->save();                          
        }
        else return back()->with(['typeMsg'=>'danger','msg'=>'Mật khẩu cũ không đúng']);
        return back()->with(['typeMsg'=>'success','msg'=>'Đổi mật khẩu thành công']);
    }
    /*thong tiin ca nhan*/
	public function getProfile(){
		return view('frontend.customer.profile');
	}
	public function postProfile(Request $request){
		$request->validate([
           
            'stringPhone' => 'digits:10'
        ],
        [
            'digits' => 'Trường gồm :digits số',
           
        ]);
		$person = Person::where('account_id',Auth::guard('account_customer')->id())->first();
		$person->full_name = $request->stringFullName;
		$person->gender = ($request->intGender==1)?'Nam':'Nữ';
		$person->address = $request->stringAddress;
		$person->date_of_birth = $request->dateOfBirth;
		$person->phone = $request->stringPhone;
		$person->email = $request->stringEmail;
		$person->save();
		return back()->with(['typeMsg'=>'success','msg'=>'Cập nhật thành công']);
	}
	public function getSignup(){
		if(Auth::guard('account_customer')->check()) 
			return back()->with(['typeMsg'=>'danger','msg'=>'Bạn phải đăng xuất để sử dụng tính năng này']);;
		return view('frontend.signup');
	}
	public function postSignup(Request $request){
		$request->validate([
            'stringUsername' => 'unique:account,username|min:5|max:15',
            'stringPassword' => 'min:5|max:15',
            'stringRePassword' => 'same:stringPassword',
          
            'stringPhone' => 'digits:10'
        ],
        [
        	'unique' => 'Tên tài khoản đã tồn tại',
            'min' => 'Trường trên tối thiểu :min ký tự',
            'max' => 'Trường trên tối đa :max ký tự',
            'digits' => 'Trường gồm :digits số',
            'same' => 'Mật khẩu xác nhận không khớp mật khẩu mới',
           
        ]);
		# add account
		$account = new Account;
		$account->username = $request->stringUsername;
		if($request->stringPassword!=$request->stringRePassword) return back()->with(['typeMsg'=>'danger','msg'=>'Mật khẩu xác nhận không khớp']);
		$account->password = bcrypt($request->stringPassword);
		$account->role = 'customer';
		$account->save();
		# add person
		$person = new Person;
		$person->account_id = $account->id;
		$person->full_name = $request->stringFullName;
		$person->gender = ($request->intGender==1)?'Nam':'Nữ';
		$person->address = $request->stringAddress;
		$person->date_of_birth = $request->dateOfBirth;
		$person->phone = $request->stringPhone;
		$person->email = $request->stringEmail;
		$person->save();
		# add customer
		$customer = new Customer;
		$customer->person_id = $person->id;
		$customer->save();
		return back()->with(['typeMsg'=>'info','msg'=>'Đã đăng ký thành công mời bạn đăng nhập']);
	}
    //backend
    public function getList(){
    	$listCustomer = Customer::all();    	
    	return view('backend.customer.list',['listCustomer'=>$listCustomer]);
    }
    public function getDetail($id){
    	$customer = Customer::findOrFail($id);
    	return view('backend.customer.detail',['customer'=>$customer]);
    }
    public function postType(Request $request,$id){
    	$customer = Customer::findOrFail($id);
    	switch ($request->intType) {
			case 0:
				$customer->type = 'Thường';
				break;
			case 1:
				# code...
				$customer->type = 'Thân thiết';
				break;
			case 2:
				$customer->type = 'Vip';
				break;
			default:
				# code...
				break;
		}
		$customer->save();
		return back()->with(['typeMsg'=>'success','msg'=>'Cập nhật thành công']);
    }
    public function getDelete($id){
    	//Customer::destroy($id);
    	$account = Customer::find($id)->person->account;
    	Account::destroy($account->id);
    	return back()->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
