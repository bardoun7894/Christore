@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 >Categories</h1>
{{--                        <button class="btn-danger" onclick="getRes()"> getResponse</button>--}}
                        <div>
                            <p id="show" ></p>
                        </div>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success_message')}}
                                </div>
                            @endif
                            <div class="card-header ">
                                <div>
                                    <h3 class="card-title fle">categories</h3>
                                    <a href="{{url('/admin/add-edit-category')}}" class="bg-blue-500 rounded-lg font-bold text-white text-center px-2 py-1 transition duration-300 ease-in-out hover:bg-blue-600 mr-6 float-right">
                                       Add Category
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- /.card-body -->
                       </div>
                        <!-- /.card -->
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                               <table id="categories" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                        <th>id</th>
                                        <th>section</th>
                                        <th>parentCategory</th>
                                        <th>category</th>
                                        <th>url</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                             @foreach($categories as $category)
                                @if(!isset($category->parentCategory->category_name))
                                     {{  $parentcategory = "Root" }}
                                 @else
                                  {{ $parentcategory = $category->parentCategory->category_name }}
                               @endif
                                            <tr>
                                                <td style="color: grey">
                                                    {{$category->id}}
                                                </td>
                                                <td style="color: grey">

                                                {{$category->section->name}}
                                                </td>
                                                <td style="color: grey" >
                                                {{$parentcategory}}
                                                </td>
                                                <td style="color: grey">
                                                {{$category->category_name}}
                                                </td>
                                                <td style="color: grey">
                                          {{--    substr is trim the string to  22 char--}}
                                                    {{  substr( $category->url,0,22)}}
                                                </td>
                                                <td>
                                        @if($category->status==1)
                                          <a class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)" style="color: dodgerblue">active</a>
                                                 @else
                                          <a class="updateCategoryStatus" id="category-{{$category->id}}"  category_id="{{$category->id}}" href="javascript:void(0)"  style="color: grey">inactive</a>
                                        @endif
                                                </td>
                                                <td>
                                                  <a style="color: mediumseagreen" href="{{url('/admin/add-edit-category/'.$category->id)}}"> edit</a>
                                                    &nbsp;&nbsp;&nbsp;
                                                  <a  class="confirmDelete" record="category" recordid="{{$category->id}}" style="color: red"  href="javascript:void(0)" > delete </a>
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
