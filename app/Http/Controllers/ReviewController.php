<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //frontend
    public function postReview(Request $request ,$id){
    	$review = Review::find($request->intReviewId );
    	$review->rate = $request->intRate;
    	$review->comment = $request->stringComment;
    	$review->reviewed = 1;
    	$review->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Đánh giá thành công !']);
    }
    //backend
    public function getList(){
    	$listReview = Review::where('reviewed',1)->get();
    	return view('backend.review.list',['listReview'=>$listReview]);
    }
}
