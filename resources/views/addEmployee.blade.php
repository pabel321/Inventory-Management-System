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
                                    <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>

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

                                        <form role="form" action="{{url('/insertEmployee')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" required >
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
                                                <label for="exampleInputEmail1">Experience</label>
                                                <input type="text" class="form-control" name="experience" placeholder="Experience" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nid No</label>
                                                <input type="text" class="form-control" name="nid_no" placeholder="Nid No" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Salary</label>
                                                <input type="text" class="form-control" name="salary" placeholder="Salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Vacation</label>
                                                <input type="text" class="form-control" name="vacation" placeholder="Vacation" required>
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