<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerShippingAddress;
use Auth;
class CustomerShippingAddressController extends Controller
{
    //
    public function getList(){
    	$listCustomerShippingAddress = CustomerShippingAddress::where('customer_id',Auth::guard('account_customer')->user()->person->customer->id)->get();
   		return view('frontend.customer.shipping_address.list',['listCustomerShippingAddress'=>$listCustomerShippingAddress]);
    }
    public function getAdd(){
    	return view('frontend.customer.shipping_address.add_edit');
    }
    public function postAdd(Request $request){
    	$customerShippingAddress = new CustomerShippingAddress;
    	$customerShippingAddress->customer_id = Auth::guard('account_customer')->user()->person->customer->id;
    	$customerShippingAddress->recipient_name = $request->stringRecipientName;
    	$customerShippingAddress->recipient_phone = $request->stringRecipientPhone;
    	$customerShippingAddress->province = $request->stringProvince;
    	$customerShippingAddress->district = $request->stringDistrict;
    	$customerShippingAddress->wards = $request->stringWards;
    	$customerShippingAddress->address_detail = $request->stringAddressDetail;
        $customerShippingAddress->default = ($request->boolDefault==true)?1:0;
        /**/
        $listCustomerShippingAddress = CustomerShippingAddress::where('customer_id',$customerShippingAddress->customer_id)->get();
        if(count($listCustomerShippingAddress)==0) $customerShippingAddress->default=1;
    	$customerShippingAddress->save();
        /*cập nhật các bản ghi khác default về 0*/
        if($request->boolDefault==true) 
        CustomerShippingAddress::where([['id','<>',$customerShippingAddress->id],['customer_id',$customerShippingAddress->customer_id]])->update(['default'=>0]);
		return back()->with(['typeMsg'=>'success','msg'=>'Thêm thành công']);
    }
    public function getEdit($id){
    	$customerShippingAddress = CustomerShippingAddress::find($id);
    	return view('frontend.customer.shipping_address.add_edit',['customerShippingAddress'=>$customerShippingAddress]);
    }
    public function postEdit(Request $request,$id){
    	$customerShippingAddress = CustomerShippingAddress::find($id);
    	$customerShippingAddress->customer_id = Auth::guard('account_customer')->user()->person->customer->id;
    	$customerShippingAddress->recipient_name = $request->stringRecipientName;
    	$customerShippingAddress->recipient_phone = $request->stringRecipientPhone;
    	$customerShippingAddress->province = $request->stringProvince;
    	$customerShippingAddress->district = $request->stringDistrict;
    	$customerShippingAddress->wards = $request->stringWards;
    	$customerShippingAddress->address_detail = $request->stringAddressDetail;
        $customerShippingAddress->default = ($request->boolDefault==true)?1:0;
        /**/
        $listCustomerShippingAddress = CustomerShippingAddress::where('customer_id',$customerShippingAddress->customer_id)->get();
        if(count($listCustomerShippingAddress)==0) $customerShippingAddress->default=1;
    	$customerShippingAddress->save();
         /*cập nhật các bản ghi khác default về 0*/
        if($request->boolDefault==true) 
        CustomerShippingAddress::where([['id','<>',$customerShippingAddress->id],['customer_id',$customerShippingAddress->customer_id]])->update(['default'=>0]);
		return back()->with(['typeMsg'=>'success','msg'=>'Sửa thành công']);
    }
    public function getDelete($id){
        if(CustomerShippingAddress::find($id)->default==1 && count(CustomerShippingAddress::all())!=1) {
            $update = CustomerShippingAddress::where('id','<>',$id)->first();
            $update->default = 1;
            $update->save();
        }
        CustomerShippingAddress::destroy($id);
        return redirect(url('/customer/shipping-address/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
