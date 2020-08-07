<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addExpense()
    {
    	return view('addExpense');
    }

    public function insertExpense(Request $request)
    {
    	$data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
        $data['year']=$request->year;

    	$exp=DB::table('expenses')->insert($data);
    	if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense Inserted ',
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

    public function todayExpense()
    {
    	$date =date("d/m/y");
    	$today=DB::table('expenses')->where('date', $date)->get();
    	return view('todayExpense',compact('today'));
    }

    public function editExpense($id)
    {
    	$tdy=DB::table('expenses')->where('id',$id)->first();
    	return view('editExpense',compact('tdy'));
    }

    public function updateExpense(Request $request, $id)
    {
    	$data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;

    	$exp=DB::table('expenses')->where('id',$id)->update($data);
    	if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('todayExpense')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }

    public function monthlyExpense()
    {
        $month=date("F");
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function yearlyExpense()
    {
        $year=date('Y');
        $year=DB::table('expenses')->where('year',$year)->get();
        return view('yearlyExpense',compact('year'));
    }

    //monthly more expenses
    public function januaryExpense()
    {
        $month="January";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function februaryExpense()
    {
        $month="February";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function marchExpense()
    {
        $month="March";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function aprilExpense()
    {
        $month="April";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function mayExpense()
    {
        $month="May";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function juneExpense()
    {
        $month="June";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function julyExpense()
    {
        $month="July";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function augustExpense()
    {
        $month="August";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function septemberExpense()
    {
        $month="September";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function octoberExpense()
    {
        $month="October";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function novemberExpense()
    {
        $month="November";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }

    public function decemberExpense()
    {
        $month="December";
        $expense=DB::table('expenses')->where('month',$month)->get();
        return view('monthlyExpense',compact('expense'));
    }
}
