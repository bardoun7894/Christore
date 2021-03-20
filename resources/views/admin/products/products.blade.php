@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')

    {{-- make direction with  css tailwinds plugin  dir="rtl" --}}
    <div class="content-wrapper"
         @if(Config::get('app.locale') =="ar")
          dir="rtl"
        @endif>
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><h1>{{__('messages.home')}}</h1></a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card"
                       @if(Config::get('app.locale') =="ar")
                            dir="rtl"
                       @endif
                        >
                            @if(Session::has('success_message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success_message')}}
                                </div>
                            @endif
                            <div class="card-header " >
                                <div>
                                    <h3 class="card-title flex">{{__('messages.products')}}</h3>
                                    <a href="{{url('admin/add-edit-product')}}" class="bg-blue-500 rounded-lg font-bold text-white text-center px-2 py-1 transition duration-300 ease-in-out hover:bg-blue-600 mr-6 float-right">
                                       {{__('messages.add_product')}}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                       </div>
                        <!-- /.card -->
                        <div class="card"
                             @if(Config::get('app.locale') =="ar")
                                 dir="rtl"
                             @endif
                        >

                            <!-- /.card-header -->
                            <div class="card-body"
                                 @if(Config::get('app.locale') =="ar")
                                  dir="rtl"
                                 @endif
                            >
                               <table id="products" class="table table-striped">
                                    <thead>
                                       <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__('messages.category')}}</th>
                                        <th scope="col">{{__('messages.section')}}</th>
                                        <th scope="col">{{__('messages.product')}}</th>
                                        <th scope="col">{{__('messages.image')}}</th>
                                        <th scope="col"> {{__('messages.product_code')}}</th>
                                        <th scope="col">{{__('messages.product_color')}}</th>
                                        <th scope="col">{{__('messages.status')}}</th>
                                        <th scope="col">{{__('messages.actions')}}</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                          @foreach($products as $product)
                                            <tr>
                                                <td style="color: grey">
                                                    {{$product->id}}
                                                </td>
                                                <td style="color: grey">
                                                    {{$product->category->category_name}}
                                                </td>
                                                <td style="color: grey">
                                                    {{$product->section->name}}
                                                </td>  <td style="color: grey">
                                                    {{$product->product_name}}
                                                </td>
                                                <td style="color: grey">
                                                    @if(!empty($product->main_image))
                                                        <img width="150" height="400" src=" {{asset('images/product_image/'.$product->main_image)}}">
                                                    @endif
                                                </td>
                                                <td style="color: grey">
                                                    {{$product->product_code}}
                                                </td>
                                                <td style="color: {{$product->product_color}} " class="text-bold">
                                                    {{$product->product_color}}
                                                </td>
                                                <td style="color: grey">
                                                    @if($product->status==1)
                                                      <a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)" style="color: dodgerblue">active</a>
                                                    @else
                                                      <a class="updateProductStatus" id="product-{{$product->id}}"  product_id="{{$product->id}}" href="javascript:void(0)"  style="color: grey">inactive</a>
                                                    @endif
                                                </td>

                                                <td>
                                                  <a style="color: mediumseagreen" href="{{url('/admin/add-edit-product/'.$product->id)}}">{{__('messages.edit')}}</a>
                                                    &nbsp;&nbsp;&nbsp;
                                                  <a  class="confirmDelete" record="product" recordid="{{$product->id}}" style="color: red"  href="javascript:void(0)" > {{__('messages.delete')}} </a>
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
