@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid" >
                <div class="card card-default">
                    @if(Session::has('error_message'))
                        <div class="alert alert-warning" role="alert">
                           {{Session::get('error_message')}}
                        </div>
                    @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                           {{Session::get('success_message')}}
                        </div>
                    @endif

     <form name="attributeForm" id="attributeForm" method="POST" enctype="multipart/form-data" action="{{url( Config::get('app.locale').'/admin/add-attributes/'.$productData['id'])}}">@csrf

                 <div class="row"
                      @if(Config::get('app.locale') =="ar")
                        dir="rtl"
                      @endif>
                     <div class="form-group col-md-6 "
                          @if(Config::get('app.locale') =="ar")
                               dir="rtl"
                          @endif
                          style=" margin-top: 50px; padding-left: 40px" >
                         <div>
                             <p class="text-bold d-inline"> {{__('messages.product')}}: </p> &nbsp;  {{$productData['product_name']}}
                         </div>
                         <div style="margin-top: 5px">
                             <p class="text-bold d-inline"> {{__('messages.product_code')}}  : </p> &nbsp; {{$productData['product_code']}}
                         </div>
                         <div style="margin-top: 5px">
                             <p class="text-bold d-inline"> {{__('messages.product_color')}} : </p> &nbsp; {{$productData['product_color']}}
                         </div>
                         <div class="form-group" style="margin-top: 10px">
                             <div class="field_wrapper" >
                                 <div >
                                     <input type="text" id="size"  name="size[]"   placeholder="size" style="width:  80px"/>
                                     <input type="text" id="sku"   name="sku[]"  placeholder="sku"  style="width:   80px"/>
                                     <input type="text" id="price" name="price[]"      placeholder="price" style="width: 80px"/>
                                     <input type="text" id="stock" name="stock[]"    placeholder="stock" style="width: 80px"/>
                                     <a href="javascript:void(0);" class="add_button fas fa-plus" title="Add field"></a>
                                 </div>
                             </div>
                         </div>

                     </div>

                     <div class="col-md-3">
                         <div class="form-group col-md-6 mt-4">
                             <img width="100" height="300" src="{{url('images/product_image/'.$productData['main_image'])}}">
                         </div>

                     </div>

                 </div>

         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>

         </form>

                </div>
                <div>

                </div>




                <div class="card card-blue ">
                    <form name="edit_attributes"  id="edit_attributes"   method="post" action="{{url(Config::get('app.locale').'/admin/edit-attribute/'.$productData['id'])}}" >@csrf

                       <div class="card-header" style="padding: 10px">
                            <div>
                                <h3 class="card-title"> added Product Attributes </h3>
                            </div>
                        </div>
                        <div class="card" style="padding-top: 10px; margin: 10px">
                            <table id="product_attributes" class="table table-striped" style="min-width: 562px">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('messages.sku')}}</th>
                                    <th scope="col">{{__('messages.size')}}</th>
                                    <th scope="col">{{__('messages.price')}}</th>
                                    <th scope="col"> {{__('messages.stock')}}</th>
                                    <th scope="col">{{__('messages.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pros as $key=>$pro)


                                    <input hidden name="attr_id[]" value="{{$pro['id']}}" >
                                    <tr>
                                        <td style="color: grey">
                                            {{$pro['id']}}
                                        </td>
                                        <td style="color: grey">
                                            {{$pro['sku']}}
                                        </td>
                                        <td style="color: grey">
                                            {{$pro['size']}}
                                        </td>
                                        <td style="color: grey">
                                            <label for="price[]"></label><input  name="price[]"  value="{{$pro['price']}}" type="number" required="" >
                                        </td>
                                        <td style="color: grey">
                                            <label for="stock[]"></label><input name="stock[]"   value="{{$pro['stock']}}" type="number" required="">
                                        </td>

                                        <td>
                                            @if($pro['status']===1)
                                     <a class="updateAttributeStatus" id="attr-{{$pro['id']}}" attr_id="{{$pro['id']}}" href="javascript:void(0)" style="color: dodgerblue">active</a>

                                            @else
                                     <a class="updateAttributeStatus" id="attr-{{$pro['id']}}" attr_id="{{$pro['id']}}" href="javascript:void(0)" style="color: grey">inactive</a>

                                            @endif

                                            &nbsp;&nbsp;&nbsp;

                                            <a  class="confirmDelete" title="remove attributes"  record="attribute"   recordid="{{$pro['id']}}" style="color: red"  href="javascript:void(0)" >
                                                <i class="far fa-trash-alt"> </i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>       <!-- /.row -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>

        </div>
        </section>
    </div>
@endsection()
