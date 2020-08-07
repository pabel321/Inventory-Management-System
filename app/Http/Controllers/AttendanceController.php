<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;
use Str;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function takeAttendance()
    {
    	$emp=DB::table('employees')->get();
    	return view('takeAttendance',compact('emp'));
    }

    public function insertAttendance(Request $request)
    {

        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date',$date)->first();
        if ($att_date) {
             $notification=array(
                 'messege'=>'Today Attendance Already Taken ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
        }else{
           foreach ($request->emp_id as $id) {
            $data[]=[
                "emp_id"=>$id,
                "attendance"=>$request->attendance[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month" =>$request->month,
                "edit_date" =>date("d_m_y")
            ];
        }
        $att=DB::table('attendances')->insert($data);
         if ($att) {
                 $notification=array(
                 'messege'=>'Successfully Attendance Taken ',
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
    }

    public function allAttendance()
    {
    	$all_att=DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('allAttendance', compact('all_att'));
    }

    public function editAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendances')->join('employees','attendances.emp_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
         return view('editAttendance', compact('data','date'));
    }

    public function updateAttendance(Request $request)
    {
        foreach ($request->id as $id) {
            $data=[
                "attendance"=>$request->attendance[$id],
                "att_date" =>$request->att_date,
                "att_year" =>$request->att_year,
                "month" =>$request->month
            ];

            $attendance= Attendance::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
            $attendance->update($data);
        }
         if ($attendance) {
                 $notification=array(
                 'messege'=>'Successfully Attendance Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('allAttendance')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }    
    }

    public function viewAttendance($edit_date)
    {

        $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendances')->join('employees','attendances.emp_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
        return view('viewAttendance', compact('data','date'));
    }

    //setting functions are here
    public function setting()
    {
    	$setting=DB::table('settings')->first();
    	return view('setting',compact('setting'));
    }

    public function updateWebsite(Request $request, $id)
    {
    	$validatedData = $request->validate([
        'company_name' => 'required|max:255',
        'company_address' => 'required|max:255',
        'company_city' => 'required|max:13',
        'company_country' => 'required',
        'company_phone' => 'required',
        ]);

        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_city']=$request->company_city;
        $data['company_country']=$request->company_country;
        $data['company_phone']=$request->company_phone;
        $data['company_zipcode']=$request->company_zipcode;
        $image=$request->company_logo;

      if ($image) {
       $image_name=str::random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/company/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['company_logo']=$image_url;
             $img=DB::table('settings')->where('id',$id)->first();
             $image_path = $img->company_logo;
             $done=unlink($image_path);
          $company=DB::table('settings')->where('id',$id)->update($data); 
         if ($company) {
                $notification=array(
                'messege'=>'Company Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['company_logo']=$oldphoto;  
          $comp=DB::table('settings')->where('id',$id)->update($data); 
         if ($comp) {
                $notification=array(
                'messege'=>'Company Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
}
