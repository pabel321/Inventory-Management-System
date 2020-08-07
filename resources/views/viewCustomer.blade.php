@extends('layouts.app')

@section('content')

<div class="content">
                    
                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="{{URL::to($single->photo)}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white">{{$single->name}}</h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs">
                       
                        <div class="indicator"></div></ul> 
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                            <div class="pull-right">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Customer Info <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="color: blue; ">
                                        <li> <strong>Phone: </strong>{{$single->phone}} </li>
                                        <li> <strong>Address: </strong> {{$single->address}} </li>
                                        <li> <strong>Shop Name: </strong> {{$single->shopname}} </li>
                                        <li> <strong>Account Holder: </strong>{{$single->account_holder}} </li>
                                        <li> <strong>Account Number: </strong>{{$single->account_number}} </li>
                                        <li> <strong>Bank Name: </strong> {{$single->bank_name}} </li>
                                        <li> <strong>Branch Name: </strong>{{$single->bank_branch}} </li>
                                        <li> <strong>City: </strong>{{$single->city}} </li>
                                    </ul>
                                </div>
                              </div>
                        </div>
                    </div>
                    
@endsection