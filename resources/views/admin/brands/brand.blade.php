@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>brands</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(Session::has("flash_message_success"))
            <div class="alert alert-success" role="alert">
                {{Session::get('flash_message_success')}}
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">brands</h3>
                                <a href="{{url('/admin/add-edit-banner')}}"  type="button" class="btn btn-block btn-primary text-white px-2 py-1 float-right  hover:bg-blue-600 mr-6" style="width: auto">
                                   Add Brands
                                </a>
                            </div>
                            <!-- /.card-header -->

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                               <table id="brands" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>status</th>
                                        <th>actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>
                                                    {{$brand->id}}
                                                </td>
                                                <td>
                                                    {{$brand->name}}
                                               </td>
                                                <td>
                                        @if($brand->status==1)
                                          <a class="updateBrandStatus" id="brand-{{$brand->id}}" brand_id="{{$brand->id}}" aria-hidden="true" href="javascript:void(0)" style="color: dodgerblue"><i class='fas fa-toggle-on' status='active'></i></a>
                                               @else
                                           <a class="updateBrandStatus" id="brand-{{$brand->id}}"  brand_id="{{$brand->id}}" aria-hidden="true" href="javascript:void(0)"  style="color: grey"><i class='fas fa-toggle-off' status='inactive'></i></a>
                                        @endif
                                         </td>
                                         <td>
                                               <a style="color: mediumseagreen" title="edit brand" href="{{url('/admin/add-brand/'.$brand->id)}}"><i class="far fa-edit"></i></a>
                                             &nbsp;&nbsp;&nbsp;
                                             <a  class="confirmDelete" title="remove brand" record="brand" recordid="{{$brand->id}}" style="color: red"   href="javascript:void(0)" >
                                                 <i class="far fa-trash-alt"> </i></a>
                                         </td>


                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()
