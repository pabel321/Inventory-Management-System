<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCategory()
    {
    	return view('addCategory');
    }

    public function insertCategory(Request $request)
    {
    	$data=array();
    	$data['cat_name']=$request->cat_name;
    	$cat=DB::table('categories')->insert($data);
    	if ($cat) {
                 $notification=array(
                 'messege'=>'Successfully Category Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }     

    }

    public function allCategory()
    {
    	$category=DB::table('categories')->get();
    	return view('allCategory',compact('category'));
    }

    public function deleteCategory($id)
    {
    	$dlt=DB::table('categories')->where('id', $id)->delete();
    	if ($dlt) {
                 $notification=array(
                 'messege'=>'Successfully Category Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }

    public function editCategory($id)
    {
    	$cat=DB::table('categories')->where('id', $id)->first();
    	return view('editCategory',compact('cat'));
    }

    public function updateCategory(Request $request, $id)
    {
    	$data=array();
    	$data['cat_name']=$request->cat_name;
    	$cat_up=DB::table('categories')->where('id', $id)->update($data);
    	if ($cat_up) {
                 $notification=array(
                 'messege'=>'Successfully Category Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allCategory')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }
}
