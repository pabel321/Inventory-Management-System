<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //new customer form view
    public function addCustomer()
    {
    	return view('addCustomer');
    }
    
    //customer data insert
    public function insertCustomer(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|unique:customers|max:255',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
        ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['shopname']=$request->shopname;
    	$data['account_holder']=$request->account_holder;
    	$data['account_number']=$request->account_number;
    	$data['bank_name']=$request->bank_name;
    	$data['bank_branch']=$request->bank_branch;
    	$data['city']=$request->city;

        $image=$request->file('photo');
        if ($image) {
            $image_name= str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
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
                
            }else{

              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
        }
    }
    
    //all customer view
    public function allCustomer()
    {
    	$customer=DB::table('customers')->get();
    	return view('allCustomer')->with('customer',$customer);
    }
    
    public function viewCustomer($id)
    {
    	$single=DB::table('customers')
    	        ->where('id',$id)
    	        ->first();
    	        return view('viewCustomer',compact('single'));
    }

    public function deleteCustomer($id)
    {
       $delete=DB::table('customers')
    	        ->where('id',$id)
    	        ->first();
    	        $photo=$delete->photo;
    	        unlink($photo);
    	$dltuser=DB::table('customers')
    	        ->where('id',$id)
    	        ->delete();
    	if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Employee Deleted ',
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

    public function editCustomer($id)
    {
    	$edit=DB::table('customers')
    	        ->where('id',$id)
    	        ->first();
        return view('editCustomer',compact('edit'));
    }

    public function updateCustomer(Request $request ,$id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        $image=$request->file('photo');

      if ($image) {
       $image_name=str::random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('customers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allCustomer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allCustomer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
}
