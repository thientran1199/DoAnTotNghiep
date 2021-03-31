<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Person;
use App\Models\Account;
use Hash;
use Auth;
class AdminController extends Controller
{
    //
    public function getList(){
    	$listAdmin = Admin::all();    	
    	return view('backend.admin.list',['listAdmin'=>$listAdmin]);
    }
    public function getAdd(){
    	return view('backend.admin.add_edit');
    }
    public function postAdd(Request $request){
        $request->validate([
            'stringUsername' => 'unique:account,username|min:5|max:15',
            'stringPassword' => 'min:5|max:15',
            'stringRePassword' => 'same:stringPassword',
           
            'stringPhone' => 'digits:10',
            'intIdentity' => 'digits:12|unique:account,identity'
        ],
        [
            'unique' => 'Trường trên đã tồn tại',
            'min' => 'Trường trên tối thiểu :min ký tự',
            'max' => 'Trường trên tối đa :max ký tự',
            'digits' => 'Trường gồm :digits số',
            'same' => 'Mật khẩu xác nhận không khớp mật khẩu mới',
          
        ]);
        #
        $account = new Account;
        $account->username = $request->stringUsername;
        if($request->stringPassword!=$request->stringRePassword) return back()->with(['typeMsg'=>'danger','msg'=>'Mật khẩu xác nhận không khớp']);
        $account->password = bcrypt($request->stringPassword);
        $account->role = 'admin';
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
        #
    	$admin = new Admin;
        $admin->person_id= $person->id;
    	$admin->identity = $request->intIdentity;
    	$admin->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Thêm thành công']);
    }
    public function getEdit($id){
    	$admin = Admin::find($id);
    	return view('backend.admin.add_edit',['admin'=>$admin]);
    }
    public function postEdit(Request $request, $id){
         $request->validate([
          
            'stringPhone' => 'digits:10',
            'intIdentity' => 'digits:12'
        ],
        [
            'digits' => 'Trường gồm :digits số',
            'string' => 'Họ và tên chỉ gồm chữ cái'
        ]);
		$admin = Admin::find($id);
		$admin->identity = $request->intIdentity;
		$admin->save();
        #
        $person = $admin->person;
        $person->full_name = $request->stringFullName;
        $person->gender = ($request->intGender==1)?'Nam':'Nữ';
        $person->address = $request->stringAddress;
        $person->date_of_birth = $request->dateOfBirth;
        $person->phone = $request->stringPhone;
        $person->email = $request->stringEmail;
        $person->save();
        /*nếu nhập vào mật khẩu ko thì bỏ qua*/
        if ($request->stringOldPassword!=''||$request->stringPassword!=''||$request->stringRePassword!='') {
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
            # code...
            $account = $person->account;
            $oldPassword = $request->stringOldPassword;
            $password = $request->stringPassword;
            $rePassword = $request->stringRePassword;
            if(Hash::check($oldPassword,$account->password)){
                    $account->password= Hash::make($password);
                    $account->save();            
            }
            else return back()->with(['typeMsg'=>'danger','msg'=>'Mật khẩu cũ không đúng']);
            if(Auth::guard('account_admin')->id()==$account->id){
                Auth::guard('account_admin')->logout();
                return back()->with(['typeMsg'=>'success','msg'=>'Đăng xuất thành công']);
            }
            
        }
        return back()->with(['typeMsg'=>'success','msg'=>'Cập nhật thành công']);     
    }
    public function getDelete($id){
    	//Admin::destroy($id);
        $account = Admin::find($id)->person->account;
        Account::destroy($account->id);
    	return redirect(url('/admin-page/admin/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
