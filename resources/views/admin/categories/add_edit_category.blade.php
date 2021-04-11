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
            </div><!-- /.container-fluid -->
        </section>
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('flash_message_success')}}
            </div>
    @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
                <!-- SELECT2 EXAMPLE -->
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
                          @if(empty($categoryData->id))
                              action ="{{url(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale())) }}"
                           @else
                              action ="{{ url(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale())) }}"
                          @endif >@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Category name</label>
                                    <div class="input-group mb-3">
                                        <input id="category_name" name="category_name" type="text" class="form-control" placeholder="Category Name"
                                           @if(!empty($categoryData['category_name']))
                                                 value ="{{$categoryData['category_name']}}"
                                               @else
                                                 value ="{{old('category_name')}}"
                                            @endif
                                        >
                                    </div>
                                 <div id="appendCategoriesLevel">
                                        @include('admin.categories.append_categories_level')
                                    </div>
                                    <label>Category Discount</label>
                                    <div class="input-group mb-3">
                                        <input id="category_discount" name="category_discount" type="text" class="form-control" placeholder="Category Discount"
                                       @if(!empty( $categoryData['category_discount'])) value ="{{$categoryData['category_discount']}}"  @else value="{{0.0}}"  @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Category Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" rows="3" placeholder="Enter ..."
                                        >@if(!empty($categoryData['description']))  {{$categoryData['description']}}@else {{old('description')}}
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
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Section</label>
                                        <select id="section_id" name="section_id" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="">Select</option>
                                            @foreach($getSections as $getSection)
                                                <option value="{{$getSection->id}}"
                                                @if(!empty($categoryData['section_id']) && $categoryData['section_id'] == $getSection->id))  selected @endif
                                                  >{{$getSection->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                <label>Category Url</label>
                                    <div class="input-group mb-3">
                                        <input id="url" name="url" type="text" class="form-control" placeholder="Category Url"
                                           @if(!empty($categoryData['url']))
                                               value ="{{$categoryData['url']}}"
                                           @else
                                               value ="{{old('url')}}"
                                           @endif
                                              >
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <textarea id="meta_title" name="meta_title" type="text"  class="form-control" rows="3" placeholder="Enter Meta title">@if(!empty($categoryData['meta_title'])){{$categoryData['meta_title']}}@else {{old('meta_title')}} @endif
                                        </textarea>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <!-- /.row -->
                    </div>
                </div>
          </div>
        </section>
    </div>
@endsection()
