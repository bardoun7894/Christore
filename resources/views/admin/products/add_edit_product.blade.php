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

        @if(Session::has('flash_message_success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('flash_message_success')}}
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @if($errors->any())
                            <div class="alert alert-danger" dir="rtl" role="alert">
                                @foreach ($errors->all() as $message)
                                    <li>{{$message}}</li>
                                @endforeach
                            </div>
                      @endif
                  <form name="ProductForm" method="post"  enctype="multipart/form-data" id="ProductForm" > @csrf
        <div class="row" >
         <div class="col-md-6" >
             <label>{{__("messages.section")}}</label>
                            <select id="section_id" name="section_id" class="form-control select2" style="width: 100%;">
                                     <option selected="selected" value="">Select</option>
                                     @foreach($getSections as $getSection)
                                            <option value="{{$getSection->id}}"
                                              @if(!empty($productData['section_id']) && $productData['section_id'] == $getSection->id))  selected @endif
                                            >{{$getSection->name}}</option>
                                       @endforeach
                                    </select>

                                    <label>{{__("messages.category")}}</label>
                                    <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Select</option>
                                        @foreach($getCategories as $getCategory)
                                            {{ $getCategory->category_name }}
                                            <option value= "{{$getCategory->id}}"
                               @if(!empty($productData['category_id']) && $productData['category_id'] == $getCategory->id))  selected @endif
                                              >   {{$getCategory->category_name}}</option>
                                        @endforeach
                            </select>
{{-- Product name--}}
                            <label>Product name</label>
                                    <div class="input-group mb-3">
                                      <input id="product_name" name="product_name" type="text" class="form-control" placeholder="Product Name"
                                          @if(!empty($productData['product_name']))
                                               value ="{{$productData['product_name']}}"
                                            @else
                                               value ="{{old('product_name')}}"
                                          @endif    >
                                    </div>
   {{--   Product code--}}
                                    <label>Product code</label>
                                    <div class="input-group mb-3">
                                        <input id="product_code" name="product_code" type="text" class="form-control" placeholder="Product code"
                                           @if(!empty($productData['product_code']))
                                                 value ="{{$productData['product_code']}}"
                                               @else
                                                 value ="{{old('product_code')}}"
                                         @endif   >
                                    </div>
{{--    description--}}
                                    <label>description</label>
                                    <div class="input-group mb-3">
                                        <input id="description" name="description" type="text" class="form-control" placeholder="description"
                                           @if(!empty($productData['description']))
                                                 value ="{{$productData['description']}}"
                                           @else
                                                 value ="{{old('description')}}"
                                           @endif   >
                                    </div>
                                    <label>Product Discount</label>
                                    <div class="input-group mb-3">
                                        <input id="product_discount" name="product_discount" type="text" class="form-control" placeholder="Product Discount"
                                       @if(!empty( $productData['product_discount'])) value ="{{$productData['product_discount']}}"  @else value="{{0.0}}"  @endif
                                        >
                                    </div>
                                        <label>Product Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" rows="3" placeholder="Enter ..."
                                        >@if(!empty($productData['description']))  {{$productData['description']}}@else {{old('description')}}
                                            @endif
                                        </textarea>

                                        <label>Meta  title</label>
                                        <input id="meta_title" name="meta_title" type="text" class="form-control" placeholder="enter Meta title"
                                           @if(!empty($productData['meta_title']))
                                               value ="{{$productData['meta_title']}}"
                                             @else
                                               value ="{{old('meta_title')}}"
                                            @endif
                                        >

                                        <label>Meta Description</label>
                                        <input id="meta_description" name="meta_description" type="text" class="form-control" placeholder="enter Meta Description"
                                           @if(!empty($productData['meta_description']))
                                               value ="{{$productData['meta_description']}}"
                                             @else
                                               value ="{{old('meta_description')}}"
                                            @endif
                                        >
                             <label>Meta Keywords</label>
                                    <textarea id="meta_keywords" name="meta_keywords" type="text" class="form-control" rows="3" placeholder="Enter Meta ..."
                                        >@if(!empty($productData['meta_keywords'])) {{$productData['meta_keywords']}}@else {{old('meta_keywords')}}@endif
                                    </textarea>
                             </div>
         <div class="col-md-6">
{{--product color--}}
             <label> Product color </label>
                 <input id="product_color" name="product_color" type="text" class="form-control" placeholder="Product color"
                        @if(!empty($productData['product_color']))
                        value ="{{$productData['product_color']}}"
                        @else
                        value ="{{old('product_color')}}"
                     @endif   >
{{--product price--}}
             <label>Product price</label>
                 <input id="product_price" name="product_price" type="text" class="form-control" placeholder="Product price"
                        @if(!empty($productData['product_price']))
                        value ="{{$productData['product_price']}}"
                        @else
                        value ="{{old('product_price')}}"
                     @endif   >
{{--product weight--}}
            <label>product weight</label>
            <input id="product_weight" name="product_weight" type="text" class="form-control" rows="3" placeholder="Enter Product weight"
             @if(!empty($productData['product_weight']))
               value="{{$productData['product_weight']}}"
             @else
                value=" {{old('product_weight')}}"
             @endif
                            >
{{--fabric--}}
             <label>fabric</label>
             <select id="fabric" name="fabric" class="form-control select2" style="width: 100%;">
                 <option selected="selected" value="">Select</option>
                 @foreach($fabricArray as $fabric)
                     {{$fabric}}
                     <option value= "{{$fabric}}"
                             @if(!empty($productData['fabric']) && $productData['fabric'] == $fabric)  selected @endif
                     >   {{$fabric}}</option>
                 @endforeach
             </select>
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" value="" name="is_featured"
                       @if(!empty($productData['is_featured'] ))
                        {{ $productData['is_featured'] =="Yes"?'checked':""}}
                       @endif
                        id="flexCheckDefault">
                 <label class="form-check-label" for="flexCheckDefault">
                     Featured
                 </label>
             </div>
             <div class="form-group">
                 <label for="exampleInputFile">{{__('messages.image')}}</label>

                 <div class="input-group">

                    <input  type="file" name="product_image" class="custom-file-input"   id="product_image"
                            @if(!empty($productData['main_image']))
                               value = "{{$productData['main_image']}}"
                            @else
                                value = "{{old('main_image')}}"

                            @endif
                           >
                          <label class="custom-file-label" for="product_image">Choose file</label>
                 </div>
                 <div class="image_preview " id="image_preview" style="width: 300px; height: 400px; border: 2px; ">
                     <span class="image_preview_default_text">Image Preview</span>
                         <div style="height:80px;" >
                             <img style="width: 150px"  class="image_preview_image"

                             @if(!empty($productData['main_image']))
                                  src="{{asset("images/product_image/small/".$productData['main_image']) }}"
                             @else
                                 src="{{asset("images/no-image.png")}}"
                             @endif >

                             @if(!empty($productData['main_image']))
                                 <a href="javascript:void(0)" class="confirmDeleteImage" record="image" recordName="product" recordid="{{$productData['id']}}" style="color: red">Delete image</a>
                             @endif

                         </div>

                 </div>
             </div>
         </div>
         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>

          </div>
         </form>
                        <!-- /.row -->
                    </div>
                </div>
          </div>
        </section>
    </div>
@endsection()
