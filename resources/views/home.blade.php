@extends('layouts.app')

@section('content')
<div class="content-page">
<div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="pull-left page-title">Welcome - Rahul Rana</h3>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Echovel</a></li>
                                    <li class="active">IT</li>
                                </ol>
                            </div>
                        </div>
                      
                        <img src="{{URL::to('public/admin/images/IMG_0447.jpg')}}" alt="user-img" class="img-circle" style="display: block; margin-left: auto; margin-right: auto; width: 35%;">
                        </div> <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

@endsection
