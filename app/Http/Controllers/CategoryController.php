<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class CategoryController extends Controller
{
    //
    public function getList(){
    	$listCategory = Category::all();    	
    	return view('backend.category.list',['listCategory'=>$listCategory]);
    }
    public function getAdd(){
    	return view('backend.category.add_edit');
    }
    public function postAdd(Request $request){
        $request->validate([
            'stringName' => 'required|unique:category,name'
        ],
        [
            'required' => 'Không để trống thông tin',
            'unique' => 'Tên danh mục đã tồn tại'
        ]);
    	$category = new Category();//viết là new Category cũng được
    	$category->name = $request->stringName;
    	$category->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Thêm thành công']);
      
    }
    public function getEdit($id){
    	$category = Category::find($id);
    	return view('backend.category.add_edit',['category'=>$category]);
    }
    public function postEdit(Request $request, $id){
        $request->validate([
            'stringName' => 'required|unique:category,name'
        ],
        [
            'required' => 'Không để trống thông tin',
            'unique' => 'Tên danh mục đã tồn tại'
        ]);
		$category = Category::find($id);
		$category->name =$request->stringName;
		$category->save();
		return back()->with(['typeMsg'=>'success','msg'=>'Sửa thành công']);
    }
    public function getDelete($id){
    	Category::destroy($id);
    	return redirect(url('/admin-page/category/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
