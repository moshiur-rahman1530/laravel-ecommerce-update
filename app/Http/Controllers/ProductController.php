<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\ProductAttr;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cat = Category::all();
      $subcat = SubCategory::all();
      $brand = Brand::all();
      $unit = Unit::all();
      // $size = json_decode(Size::all());
      $size = Size::all();
      $color = Color::all();
        return view('admin.Product',['cat'=>$cat,'subcat'=>$subcat,'brand'=>$brand,'unit'=>$unit,'sizes'=>$size,'color'=>$color]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p_name = $request->input('name');
        $p_desc = $request->input('des');
        // $p_price = $request->input('price');
        // $p_dis = $request->input('discount');
        $p_cat = $request->input('cat');
        $p_subcat = $request->input('subcat');
        $p_brand = $request->input('brand');

        // if ($request->input('color')) {
        //     foreach ($request->input('color') as  $value) {
        //         $p_color = $value;
        //     }
        // }
        //
        // if ($request->input('size')) {
        //     foreach ($request->input('size') as  $value) {
        //         $p_size = $value;
        //     }
        // }
        // $p_color = json_encode($request->input('color'));
        // echo $request->input('color');
        // $p_size = json_encode($request->input('size'));
        
        // $p_color = implode(',',$request->input('color'));
        // $p_size = implode(',',$request->input('size'));

        // $p_color = $request->input('color');
        // $p_size = $request->input('size');
        $p_unit = $request->input('unit');
        // $p_qtn = $request->input('qtn');
        $p_img = json_encode($request->input('img'));
        $feature = $request->input('feature');
        $condition = $request->input('condition');
        $status = $request->input('status');

        // dd($request->all());

        // $result = Product::insert(['product_name'=>$p_name,'product_des'=>$p_desc,'product_cat'=>$p_cat,'product_price'=>$p_price,'discount'=>$p_dis,'subcat_id'=>$p_subcat,'brand_id'=>$p_brand,'color_id'=>$p_color,'size_id'=>$p_size,'unit_id'=>$p_unit,'product_quantity'=>$p_qtn,'product_img'=>$p_img,'is_featured'=>$feature,'condition'=>$condition,'status'=>$status]);



        $result = Product::insert(['product_name'=>$p_name,'product_des'=>$p_desc,'product_cat'=>$p_cat,'subcat_id'=>$p_subcat,'brand_id'=>$p_brand,'unit_id'=>$p_unit,'product_img'=>$p_img,'is_featured'=>$feature,'condition'=>$condition,'status'=>$status]);
        if ($result==true) {
          return 1;
        } else {
          return 0;
        }
      }

    // get all product

    public function allproducts()
    {
      $result = Product::all();
      return $result;
    }

    public function AddProductAttr(Request $request)
    {

      // dd($request->all());
      $product_id = $request->AttrProductModalId;
      $color;
      $size;
      $price;
      $qtn;
      for ($i = 0; $i < count($request->input('color')); $i++) {
        $answers[] = [
            'product_id' => $request->AttrProductModalId,
            'color_id' => $request->color[$i],
            'size_id' => $request->size[$i],
            'product_price' => $request->price[$i],
            'qtn' => $request->quantity[$i],
            'discount' => $request->discount[$i],
            'attr_status' => $request->attrStatus[$i],
        ];

        $check = ProductAttr::where('product_id', $request->AttrProductModalId)->where('color_id',$request->color[$i])->where('size_id',$request->size[$i])->first();
        if($check){
          return response()->json(['success'=>'Already Have Data']);
        }  
    }

    // dd($answers);

    if(!$check){
      ProductAttr::insert($answers);
    }   
          return response()->json(['success'=>'done']);
    }


    
}
