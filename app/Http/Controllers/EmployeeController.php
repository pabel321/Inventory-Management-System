<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use App\Employee;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEmployee()
    {
    	return view('addEmployee');
    }
    
    //Employee insert here
    public function insertEmployee(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'photo' => 'required',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(40);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
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
    
    //Employee show here
    public function allEmployee(){
    	$employees=Employee::all();
    	return view('allEmployee',compact('employees'));
    }
    
    //view a single employee
    public function viewEmployee($id){
    	$single=DB::table('employees')
    	        ->where('id',$id)
    	        ->first();
    	        return view('viewEmployee',compact('single'));
    }
    
    //delete a single employee
    public function deleteEmployee($id)
    {
    	$delete=DB::table('employees')
    	        ->where('id',$id)
    	        ->first();
    	        $photo=$delete->photo;
    	        unlink($photo);
    	$dltuser=DB::table('employees')
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
    
    //update employees are here
    public function editEmployee($id)
    {
    	$edit=DB::table('employees')
    	        ->where('id',$id)
    	        ->first();
        return view('editEmployee',compact('edit'));
    }

    public function updateEmployee(Request $request, $id)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'nid_no' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image=$request->photo;

      if ($image) {
       $image_name=str::random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('employees')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allEmployee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('allEmployee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
}
