<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngrendientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{
    public function getForm()
    {
        return view('admin.products.form');
    }
    public function getFormIngredient()
    {
        return view('admin.products.ingrendient');
    }
    public function getFormCategory()
    {
        return view('admin.products.category');
    }
    public function addIngredient(Request $request)
    {
       $ingrendient = new Ingredient();
       $ingrendient->name=$request->name;
       $ingrendient->description = $request->description;
       $ingrendient->save();

        return redirect('admin/product/create/ingredient')->with("msg","Thêm thành công");

    }
    public function addCategory(Request $request)
    {
        $ingrendient = new Category();
        $ingrendient->name=$request->name;
        $ingrendient->description = $request->description;
        $ingrendient->save();

        return redirect('admin/product/create/category')->with("msg","Thêm thành công");

    }
    public function ListIngredient()
    {

        $ingrendient = Ingredient::all();

<<<<<<< HEAD
        return view("admin.products.listingrendient",["ingrendient"=>$ingrendient]);

    }
    public function ListCategory()
    {
        $ingrendient = Category::all();

        return view("admin.products.listcategory",["ingrendient"=>$ingrendient]);

    }
    public function DeleteIngrendient(Request $request){
$id = $request->id;
$ingrendient = Ingredient::find($id);
$ingrendient->delete();
        return redirect('admin/product/list/ingredient')->with("msg","Xóa thành công");
    }
    public function DeleteCategory(Request $request){
        $id = $request->id;
        $ingrendient = Category::find($id);
        $ingrendient->delete();
        return redirect('admin/product/list/category')->with("msg","Xóa thành công");
    }
    public function UpdateView(Request $request){
        $id = $request->id;
        $ingrendient = Category::find($id);
        return view("admin.products.updateView",["ingrendient"=>$ingrendient]);
    }
    public function UpdateViewCate(Request $request){
        $id = $request->id;
        $ingrendient = Ingredient::find($id);
        return view("admin.products.updateCategory",["ingrendient"=>$ingrendient]);
    }
    public function UpdateIngrendient(Request $request){
        $name = $request->name;
        $id = $request->id;
        DB::update('update ingredients set name = ? where id = ?',[$name,$id]);
        return redirect('admin/product/list/ingredient')->with("msg","Update thành công");
    }
    public function UpdateCategory(Request $request){
        $name = $request->name;
        $id = $request->id;
        DB::update('update categories set name = ? where id = ?',[$name,$id]);
        return redirect('admin/product/list/category')->with("msg","Update thành công");
=======
    public function processForm(Request $request){
        return $request->all();
>>>>>>> e989e9b194e31916beb543cf43daddbd7c3fd682
    }
    public function getList()
    {
        return view('admin.products.list');
    }

}
