<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Person;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Category;
use DB;
class PageController extends Controller
{
    //
    public function getIndex(){
    	$slides = Slide::all();
    	$listLatest = Product::orderBy('created_at','desc')->where('enabled',1)->limit(12)->get();
    	$listSale = Product::where('promotion_price','<>',0)->where('enabled',1)->inRandomOrder()->get();
    	return view('frontend.home',['slides'=>$slides,'listSale'=>$listSale,'listLatest' => $listLatest]);
    }
    public function getContact(){
    	return view('frontend.contact');
    }
    #dashboard
    public function getAdminPage(){
        #biểu đồ doanh thu theo 15 ngày
        $currentDate = date('Y-m-d');
        $arrayDate = array();  
        $dateI = date('Y-m-d',strtotime('-15 Days'));
        $i = 0; 
        while($dateI<=$currentDate){
            array_push($arrayDate, $dateI);
            $i++;
            $j = $i-15;
            $dateI = date('Y-m-d',strtotime($j.' Days'));
        }
        $arrayMoney = Order::select(DB::raw('SUM(grand_total) as total'),DB::raw('DATE(updated_at) as date'))->where('status','Đã nhận hàng')->groupBy('date')->get();
        $arrayLast = array();
        foreach ($arrayDate as $key1 => $value1) {
            $arrayLast[$value1] = 0;
            foreach ($arrayMoney as $key2 => $value2) {
                if($value2->date == $value1)
                $arrayLast[$value2->date] = ($value2->total);
            }
        }
       
        #đơn hàng 
        $orders = Order::all();
        #khách hàng
        $customers = Customer::all();
        #khách đánh giá
        $reviews = Review::where('reviewed',1)->get();
        #biểu đồ cơ cấu số mặt hàng (không phải tồn kho) theo danh mục mà mình cung cấp
        $categories = Category::all();
        //dd($arrayLast);

        return view("backend.dashboard",['arrayLast'=>$arrayLast,'orders'=>$orders,'customers'=>$customers,'reviews'=>$reviews,'categories'=>$categories]);
    }
}
