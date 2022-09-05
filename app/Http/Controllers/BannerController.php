<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {

        $banners = Banner::all();
        return view('admin.Banners',['banners'=>$banners]);
    }


    public function store(Request $request)
    {
        $name = $request->input('bannerName');
        $slug=Str::slug($request->input('bannerName'));
        $desc = $request->input('bannerDes');
        $image = $request->input('bannerImg');
        $status = $request->input('status');
        $count=Banner::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $result = Banner::insert(['title'=>$name,'slug'=>$slug,'photo'=>$image,'description'=>$desc,'status'=>$status]);
        if ($result==true) {
          return 1;
        } else {
          return 0;
        }

    }

    // details SubCatTableBody
    public function bannersDetails(Request $req)
    {
      $id = $req->input('id');
      $data=json_encode(Banner::where('id','=',$id)->get());
        return $data;
    }

    // update sub category
    public function updateBanner(Request $request)
    {
      $id = $request->input('id');
      $name = $request->input('name');
      $slug=Str::slug($request->input('name'));
      $desc = $request->input('description');
      $image = $request->input('img');
      $status = $request->input('status');
      $count=Banner::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
      $result= Banner::where('id','=',$id)->update([
        'title'=>$name,'slug'=>$slug,'photo'=>$image,'description'=>$desc,'status'=>$status
       ]);

       if($result==true){
         return 1;
       }
       else{
        return 0;
       }
    }


    // change sub cat Status

    public function bannersStatus(Request $req){
        $id = $req->input('id');
        // $getCategory = Category::find($id);
        $data = Banner::where('id',$id)->first();
        if ($data->status == 1) {
          $status = 0;
        } else {
          $status = 1;
        }
        $result = Banner::where('id',$id)->update(['status'=>$status]);
            if ($result==true) {
              return 1;
            } else {
              return 0;
            }
    }


  // get allcategory

  public function allbanners()
  {
    $result = Banner::all();
    return $result;
  }
  // delete categoryDelete

    public function bannersDelete(Request $req)
    {
      $id = $req->input('id');
      $result = Banner::where('id','=',$id)->delete();
      if ($result==true) {
        return 1;
      } else {
        return 0;
      }
    }

  }
