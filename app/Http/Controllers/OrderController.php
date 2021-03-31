<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CustomerShippingAddress;
use App\Models\ShippingAddress;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use  Auth;
class OrderController extends Controller
{
    //frontend
    /*đặt hàng*/
	public function getAdd(){
		if(!session()->has('cart')) return back()->with(['typeMsg'=>'danger','msg'=>'Chưa có sản phẩm nào trong giỏ']);;
		$listCustomerShippingAddress = CustomerShippingAddress::where('customer_id',Auth::guard('account_customer')->user()->person->customer->id)->get();
		return view('frontend.order',['listCustomerShippingAddress'=>$listCustomerShippingAddress]);
	}
	public function postAdd(Request $request){
		if(!$request->intShippingAddress)
			return back()->with(['typeMsg'=>'danger','msg'=>'Bạn chưa có địa chỉ giao hàng']);
		$customerShippingAddress = CustomerShippingAddress::find($request->intShippingAddress);
		$shippingAddress = new ShippingAddress;
		$shippingAddress->recipient_name = $customerShippingAddress->recipient_name;
		$shippingAddress->recipient_phone = $customerShippingAddress->recipient_phone;
		$shippingAddress->province  = $customerShippingAddress->province ;
		$shippingAddress->district  = $customerShippingAddress->district ;
		$shippingAddress->wards  = $customerShippingAddress->wards ;
		$shippingAddress->address_detail  = $customerShippingAddress->address_detail ;
		$shippingAddress->save();
		#payment
		$payment = new Payment;
		$payment->method = ($request->intPayment==0)?'COD':'Khác';
		$payment->save();
		#
		if(session('cart')){
			$cart = session('cart');
			$order = new Order;
			$order->shipping_address_id = $shippingAddress->id;
			$order->payment_id = $payment->id;
			$order->customer_id = Auth::guard('account_customer')->user()->person->customer->id;
			$order->total_quantity = $cart->getTotalQuantity();
			$order->grand_total = $cart->getGrandTotal();
			$order->note = $request->stringNote;
			$order->save();

			$listCartItem = $cart->getListCartItem();
			foreach ($listCartItem as $item) {
				# code...
				$review = new Review;
				$review->save();
				#
				$orderItem = new OrderItem;
				$orderItem->order_id = $order->id;
				$orderItem->product_id = $item->getProduct()->id;
				$orderItem->review_id = $review->id;
				$orderItem->price_sell = $item->getPriceSell();
				$orderItem->quantity = $item->getQuantity();
				$orderItem->sub_total = $item->getSubTotal();
				$orderItem->save();
			}
			session()->forget('cart');
		return redirect(url('/customer/order-history/detail/'.$order->id))->with(['typeMsg'=>'success','msg'=>'Đặt hàng thành công']);
		}

	}
	/*xem lịch sử đặt hàng*/
    public function getOrderHistory(){
    	$listOrder = Order::where('customer_id',Auth::guard('account_customer')->user()->person->customer->id)->get();
    	return view('frontend.customer.order_history.list',['listOrder'=>$listOrder]);
    }
    /*chỉ tiết đơn*/
    public function getDetailOrder($id){
    	$order = Order::find($id);
    	return view('frontend.customer.order_history.detail',['order'=>$order ]);
    }
    /*hủy đơn nếu chưa xử lý*/
    public function getCancelOrder($id){
    	$order = Order::find($id);
    	if($order->status=='Chờ xử lý')
    	$order->status = 'Hủy';
    	$order->save();
    	return back()->with(['typeMsg'=>'info','msg'=>'Đơn đặt hàng đã bị hủy']);
    }
	/*back end*/
	public function getList(){
		$listOrder = Order::all();
		return view('backend.order.list',['listOrder'=>$listOrder]);
	}
	public function getDetail($id){
		$order = Order::find($id);
		return view('backend.order.detail',['order'=>$order]);
	}
	/*postStatus*/
	public function checkQuantity($order_items){
		foreach ($order_items as $key => $value) {
			if($value->product->quantity_in_stock < $value->quantity)
				return 0;
		}
		return 1;
	}
	public function postStatus(Request $request,$id){
		$order = Order::find($id);
		switch ($request->intStatus) {
			case 0:
				return back()->with(['typeMsg'=>'info','msg'=>'Đơn vốn chờ xử lý rồi']);
				break;
			case 1:
				# code...
				$order->status = 'Hủy';
				break;
			case 2:
				$order->status = 'Đang giao';
				$order_items = $order->order_items;
				if($this->checkQuantity($order_items)==0) return back()->with(['typeMsg'=>'warning','msg'=>'Không đủ sản phẩm trong kho']);
				else{
					foreach ($order_items as $key => $value) {
						$product = Product::find($value->product_id);
						$product->quantity_in_stock-=$value->quantity;
						$product->save();
					}
				}
				break;
			case 3:
				$order->status = 'Đã nhận hàng';
				$payment = Payment::find($order->payment_id);
				$payment->status = 'Đã thanh toán';
				$payment->save();
				break;
			default:
				# code...
				break;
		}
		$order->save();
		return back()->with(['typeMsg'=>'success','msg'=>'Cập nhật thành công']);
	}

}
