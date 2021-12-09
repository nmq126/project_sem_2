<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Ingredient;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{

    public function getForm()
    {
        $category = Category::all();
        $ingredient = Ingredient::all();
        return view('admin.products.form',["categorys"=>$category,"ingredients"=>$ingredient]);
    }
    public function processForm(ProductRequest $request)
    {
$poduct = new Product();
$poduct->name = $request->name;
$poduct->price = $request->price;
$poduct->discount = $request->discount;
$poduct->description =$request->description;
$poduct->isFeatured =$request->isFeatured;
$poduct->status = $request->status;
$poduct->thumbnail = $request->thumbnail;
$poduct->detail = $request->detail;
$poduct->ingredient_id = $request->ingredient;
$poduct->category_id =$request->category_id;
$poduct->save();
        return redirect('admin/product/create')->with("msg", "Thêm thành công");
    }
    public function getList(){
        $products = Product::paginate(10);
        $categorys= Category::all();
        return view('admin.products.list',["products"=>$products,"categorys"=>$categorys]);
    }
    public function searchProduct(Request $request){
        $products = Product::query()
            ->status($request)
            ->discount($request)
            ->isFeatured($request)
            ->categoryId($request)
            ->name($request)
            ->minprice($request)
            ->maxprice($request)->paginate(10);
        $categorys= Category::all();
        return view('admin.products.list',["products"=>$products,"categorys"=>$categorys]);
    }
    public function delete(Request $request){

        $product = Product::find($request->id);
        $product->delete();
        return redirect('/admin/product/list')->with("msg", "Xóa thành công");
    }
    public function updateProduct(Request $request){

        $product = Product::find($request->id);
        $category = Category::all();
        $ingredient = Ingredient::all();
       return view('admin.products.updateproduct',["product"=>$product,"categorys"=>$category,"ingredients"=>$ingredient]);

    }
    public function updateProductForm(ProductRequest $request){
       $id = $request->id;
       $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description =$request->description;
        $product->isFeatured =$request->isFeatured;
        $product->status = $request->status;
        $product->thumbnail = $request->thumbnail;
        $product->detail = $request->detail;
        $product->ingredient_id = $request->ingredient;
        $product->category_id =$request->category_id;
        $product->update();

        return redirect('admin/product/list')->with("msg", "Update thành công");
    }
public function  destroy(Request $request){
    $ids =$request->id;

    for ($i = 0; $i <  sizeof($ids) ; $i++) {
        Product::find($ids[$i])->delete();

    }
    return  "ok";
}
    public function  status(Request $request){
        $ids =$request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
       $product = Product::find($ids[$i]);
$product->status = 1;
$product->update();
        }
        return  "ok";
    }
    public function  unsatus(Request $request){
        $ids =$request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            $product = Product::find($ids[$i]);
            $product->status = 0;
            $product->update();
        }
        return  "ok";
    }
    public function  featured(Request $request){
        $ids =$request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            $product = Product::find($ids[$i]);
            $product->isFeatured = 1;
            $product->update();
        }
        return  "ok";
    }
    public function  unfeatured(Request $request){
        $ids =$request->id;

        for ($i = 0; $i <  sizeof($ids) ; $i++) {
            $product = Product::find($ids[$i]);
            $product->isFeatured = 0;
            $product->update();
        }
        return  "ok";
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
        $ingrendient->name = $request->name;
        $ingrendient->description = $request->description;
        $ingrendient->save();

        return redirect('admin/product/create/ingredient')->with("msg", "Thêm thành công");

    }

    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->thumbnail = $request->image;
        $category->save();

        return redirect('admin/product/create/category')->with("msg", "Thêm thành công");

    }

    public function ListIngredient()
    {

        $ingrendient = Ingredient::all();


        return view("admin.products.listingrendient", ["ingrendient" => $ingrendient]);

    }

    public function ListCategory()
    {
        $ingrendient = Category::all();

        return view("admin.products.listcategory", ["ingrendient" => $ingrendient]);

    }

    public function DeleteIngrendient(Request $request)
    {
        $id = $request->id;
        $ingrendient = Ingredient::find($id);
        $ingrendient->delete();
        return redirect('admin/product/list/ingredient')->with("msg", "Xóa thành công");
    }

    public function DeleteCategory(Request $request)
    {
        $id = $request->id;
        $ingrendient = Category::find($id);
        $ingrendient->delete();
        return redirect('admin/product/list/category')->with("msg", "Xóa thành công");
    }

    public function UpdateView(Request $request)
    {
        $id = $request->id;
        $ingrendient = Category::find($id);
        return view("admin.products.updateView", ["ingrendient" => $ingrendient]);
    }

    public function UpdateViewCate(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        return view("admin.products.updateCategory", ["category" => $category]);
    }

    public function UpdateIngrendient(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        DB::update('update ingredients set name = ? where id = ?', [$name, $id]);
        return redirect('admin/ingredient/list')->with("msg", "Update thành công");
    }

    public function UpdateCategory(Request $request)
    {

        $name = $request->name;
        $id = $request->id;
        $thumbnail=$request->image;
        $description = $request->description;
        $category = Category::find($id);
        $category->name = $name;
        $category->description = $description;
        $category->thumbnail=$thumbnail;
        $category->update();
        return redirect('admin/category/list')->with("msg", "Update thành công");


    }
}
