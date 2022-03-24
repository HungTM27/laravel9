<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\RequestCategoriesForm;
class CategoryController extends Controller
{
    public function index(request $request){
        $cates = Category::OrderBy('name','desc')->where('name','like', '%'.$request->search.'%')->paginate(5);
          return view('admin.category.index',compact('cates'));
    }
    public function store(RequestCategoriesForm $request){
        $store = new Category();
        $store->fill($request->all());
        if(!$store){
            return redirect()->route('categories.store');
        }
        $store->save();
        return redirect()->route('categories.index')->with('store', 'Thêm mới thành công');
    }
    public function update($id){

    }
    public function UpdateStore($id, request $request){
        $update = Category::find($id);
        dd($update);
    }
    public function destroy($id){
        $remove = Category::destroy($id);
        if(!$remove){
            return redirect()->route('categories.index')->with('remove', 'id không tồn tại');
        }
             return redirect()->route('categories.index')->with('remove','Xoá sản phẩm thành công');
    }
}