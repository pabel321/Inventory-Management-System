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
                                    <div class="panel-heading"><h3 class="panel-title">Add Customer</h3></div>

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

                                        <form role="form" action="{{url('/insertCustomer')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Customer Name" required >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" placeholder="Shop Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Holder</label>
                                                <input type="text" class="form-control" name="account_holder" placeholder="Account Holder" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Number</label>
                                                <input type="text" class="form-control" name="account_number" placeholder="Account Number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Branch Name</label>
                                                <input type="text" class="form-control" name="bank_branch" placeholder="Branch Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" required>
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