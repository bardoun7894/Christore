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

{{--        @if(Session::has('flash_message_success'))--}}
{{--            <div class="alert alert-success" role="alert">--}}
{{--              {{Session::get('flash_message_success')}}--}}
{{--            </div>--}}
{{--        @endif--}}

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
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $message)
                                    <li>{{$message}}</li>
                                @endforeach
                            </div>
                      @endif

                        <form name="categoryForm" method="post" enctype="multipart/form-data" id="category_form"
{{--                          @if(empty($productData->id))--}}
{{--                              action ="{{url(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale())) }}"--}}
{{--                           @else--}}
{{--                              action ="{{ url(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale())) }}"--}}
{{--                          @endif --}}
                        > @csrf
                        <div class="row">
                                <div class="col-md-6">
                                    <label>Section</label>
                                    <select id="section_id" name="section_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">Select</option>
                                        @foreach($getSections as $getSection)
                                            <option value="{{$getSection->id}}"
                                              @if(!empty($productData['section_id']) && $productData['section_id'] == $getSection->id))  selected @endif
                                            >{{$getSection->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Product name</label>
                                    <div class="input-group mb-3">
                                        <input id="product_name" name="product_name" type="text" class="form-control" placeholder="Product Name"
                                           @if(!empty($categoryData['product_name']))
                                                 value ="{{$categoryData['product_name']}}"
                                               @else
                                                 value ="{{old('product_name')}}"
                                            @endif
                                        >
                                    </div>
                                    <label>Product Discount</label>
                                    <div class="input-group mb-3">
                                        <input id="product_discount" name="product_discount" type="text" class="form-control" placeholder="Product Discount"
                                       @if(!empty( $productData['product_discount'])) value ="{{$productData['product_discount']}}"  @else value="{{0.0}}"  @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" rows="3" placeholder="Enter ..."
                                        >@if(!empty($productData['description']))  {{$productData['description']}}@else {{old('description')}}
                                            @endif
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <input id="meta_description" name="meta_description" type="text" class="form-control" placeholder="enter Meta Description"
                                           @if(!empty($categoryData['meta_description']))
                                               value ="{{$categoryData['meta_description']}}"
                                             @else
                                               value ="{{old('meta_description')}}"
                                            @endif
                                        >
                                    </div>
                           <div class="form-group">
                             <label>Meta Keywords</label>
                                    <textarea id="meta_keywords" name="meta_keywords" type="text" class="form-control" rows="3" placeholder="Enter Meta ..."
                                        >@if(!empty($categoryData['meta_keywords'])) {{$categoryData['meta_keywords']}}@else {{old('meta_keywords')}}@endif
                                    </textarea>
                             </div>
                                </div>

                                <div class="col-md-6">

                             <div class="form-group">
                                  <label for="exampleInputFile">Category Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="category_image" class="custom-file-input" id="category_image"
                                                   @if(!empty($categoryData['category_image']))
                                                      value = "{{$categoryData['category_image']}}"
                                                   @else
                                                      value ="{{old('category_image')}}"
                                                   @endif >
                                                <label class="custom-file-label" for="category_image">Choose file</label>
                                            </div>

                                         </div>
                                 <div>
                                     @if(!empty($categoryData['category_image']))
                                         <div style="height:80px;" class="d-inline m-3" >
                                       <img style="width: 150px" src="{{asset("images/category_image/".$categoryData['category_image'])}}" alt="po">
                                                &nbsp;
                                       <a href="javascript:void(0)" class="confirmDeleteImage" record="image" recordid="{{$categoryData['id']}}" style="color: red">Delete image</a>
                                         </div>
                                     @endif
{{--                                         {{url('/admin/delete-category-image/'.$categoryData['id'])}}--}}

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
