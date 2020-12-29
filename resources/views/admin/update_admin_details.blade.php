@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Admin Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <!-- general form elements -->
        @if(Session::has('wrong_password'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('wrong_password')}}
            </div>
        @endif
        @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success_message')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </div>
        @endif

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Admin Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{url('/admin/update_admin_details')}}" enctype="multipart/form-data" name="update_admin_details" id="update_admin_details">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Email</label>
                            <input readonly="" value="{{ Auth()->guard('admin')->user()->email}}"  id="admin_email"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Admin Type</label>
                            <input readonly="" value="{{ Auth()->guard('admin')->user()->type}}" id="admin_type" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">name</label>
                            <input type="name" class="form-control" id="admin_name" name="admin_name"  required="" value="{{Auth()->guard('admin')->user()->name}} "placeholder="enter your name">
                            <span id="chkCurrentPwd"></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mobile</label>
                            <input type="name" class="form-control" id="admin_number" name="admin_number"  value="{{Auth()->guard('admin')->user()->mobile}}     "required="" placeholder="Enter your Mobile Number">
                        </div>

                        <label for="exampleInputFile">Image</label>
                        <input type="file"  class="form-control" name="admin_image" id="admin_image" accept="image/*">
                           @if(!empty(Auth()->guard('admin')->user()->image))
                               <a href="/">View Image</a>
                               <input type="hidden" class="form-control"  name="current_admin_image" value="{{Auth()->guard('admin')->user()->image}}" />
                           @endif

                     </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
