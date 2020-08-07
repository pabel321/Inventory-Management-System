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
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Customer Information</h3></div>

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

                                        <form role="form" action="{{url('/updateCustomer/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$edit->name}}" required >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{$edit->phone}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$edit->address}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" value="{{$edit->shopname}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Holder</label>
                                                <input type="text" class="form-control" name="account_holder" value="{{$edit->account_holder}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Number</label>
                                                <input type="text" class="form-control" name="account_number" value="{{$edit->account_number}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{$edit->bank_name}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Branch Name</label>
                                                <input type="text" class="form-control" name="bank_branch" value="{{$edit->bank_branch}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City</label>
                                                <input type="text" class="form-control" name="city" value="{{$edit->city}}" required>
                                            </div>

                                             <div class="form-group">
                                                <img id="image" src="#" />
                                                <label for="exampleInputEmail1">Photo</label>
                                                <input type="file" name="photo" accept="image/*"  required onchange="readURL(this);">
                                            </div>

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>

                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
            </div>

        </div>
    </div> <!-- container -->          
</div> <!-- content -->
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>                
@endsection