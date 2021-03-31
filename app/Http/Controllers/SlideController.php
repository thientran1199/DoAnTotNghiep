<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
class SlideController extends Controller
{
    //
    public function getList(){
    	$listSlide = Slide::all();    	
    	return view('backend.slide.list',['listSlide'=>$listSlide]);
    }
    public function getAdd(){
    	return view('backend.slide.add_edit');
    }
    public function postAdd(Request $request){	
         $request->validate([
            'slide' => 'mimes:jpeg,jpg,png'
        ],
        [
            'mimes' => 'Không đúng định dạng ảnh : jpeg,jpg,png'
        ]);
        $slide = new Slide;
    	$slide->name = time().$request->file('slide')->getClientOriginalName();
    	$slide->save();
        /*move vào file*/
        $request->file('slide')->move('images/slide',$slide->name);
    	return back()->with(['typeMsg'=>'success','msg'=>'Thêm thành công']);
    }
    public function getEdit($id){
    	$slide = Slide::find($id);
    	return view('backend.slide.add_edit',['slide'=>$slide]);
    }
    public function postEdit(Request $request, $id){
         $request->validate([
            'slide' => 'mimes:jpeg,jpg,png'
        ],
        [
            'mimes' => 'Không đúng định dạng ảnh : jpeg,jpg,png'
        ]);
		$slide = Slide::find($id);
        if(file_exists('images/slide/'.$slide->name)) unlink('images/slide/'.$slide->name);
        /*DB*/
		$slide->name =time().$request->file('slide')->getClientOriginalName();
		$slide->save();
        /*move vào file*/
        $request->file('slide')->move('images/slide',$slide->name);
		return back()->with(['typeMsg'=>'success','msg'=>'Sửa thành công']);
    }
    public function getDelete($id){
        $slide = Slide::find($id);
        if(file_exists('images/slide/'.$slide->name)) unlink('images/slide/'.$slide->name);
    	Slide::destroy($id);
    	return redirect(url('/admin-page/slide/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
