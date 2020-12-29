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
                            <li class="breadcrumb-item active">Admin Settings</li>
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
        <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/admin/update_current_password')}}" enctype="multipart/form-data" name="updatePasswordForm" id="updatePasswordForm">@csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Email</label>
                        <input readonly="" value="{{ $admindetails->email}}"  id="admin_email"  class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Type</label>
                        <input readonly="" value="{{ $admindetails->type}}" id="admin_type" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"  required="" placeholder="Enter Current Password">
                     <span id="chkCurrentPwd"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password"  required="" placeholder="Enter new Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password"  name="confirm_password"  required="" placeholder="confirm Password">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
        <!-- /.card -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
