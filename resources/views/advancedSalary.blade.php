@extends('layouts.app')

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
            <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome !</h4>
            <ol class="breadcrumb pull-right">
            <li><a href="#">Echovel</a></li>
            <li class="active">IT</li>
            </ol>
            </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
              <!-- Basic example -->
                              <!-- Basic example -->
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Advanced Salary Provide</h3></div>

                                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                                    <div class="panel-body">

                                        <form role="form" action="{{url('/insertAdvancedSalary')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                            <div class="form-group">
                                    <label for="exampleInputPassword12">Employee</label>
                                    @php
                                    $emp=DB::table('employees')->get();
                                    @endphp
                                    <select name="emp_id" class="form-control">
                                        <option disabled="" selected=""></option>
                                        @foreach($emp as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                     </div>

                                    <div class="form-group">
                                    <label for="exampleInputPassword12">Month</label>
                                    <select name="month" class="form-control">
                                        <option disabled="" selected=""></option>
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputPassword21">Year</label>
                                    <input type="text" class="form-control" name="year" placeholder="Year" required>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputPassword12">Advanced Salary</label>
                                    <input type="text" class="form-control" name="advanced_salary" placeholder="Advance Salary" required>
                                    </div>

                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        </form>

                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
            </div>

        </div>
    </div> <!-- container -->          
</div> <!-- content -->
               
@endsection