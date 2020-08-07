<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSupplier()
    {
    	return view('addSupplier');
    }

    public function insertSupplier(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|unique:suppliers|max:255',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
        ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['shop']=$request->shop;
    	$data['accountholder']=$request->accountholder;
    	$data['accountnumber']=$request->accountnumber;
    	$data['bankname']=$request->bankname;
    	$data['branchname']=$request->branchname;
    	$data['city']=$request->city;
    	$data['type']=$request->type;

        $image=$request->file('photo');
        if ($image) {
            $image_name= str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('suppliers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allSupplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
        }
    }
    
    public function allSupplier()
    {
    	$supplier=DB::table('suppliers')->get();
    	return view('allSupplier', compact('supplier'));
    }

    public function viewSupplier($id)
    {
      $single=DB::table('suppliers')->where('id',$id)->first();
      return view('viewSupplier', compact('single'));
    }
    
    public function deleteSupplier($id)
    {
    	$delete=DB::table('suppliers')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('suppliers')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Customer Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allSupplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }    
    }

    public function editSupplier($id)
    {
        $sup=DB::table('suppliers')->where('id',$id)->first();
        return view('editSupplier', compact('sup'));
    }

    public function updateSupplier(Request $request, $id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;
        $data['type']=$request->type;
        $image=$request->photo;

      if ($image) {
       $image_name=str::random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('suppliers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allSupplier')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allSupplier')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
}
