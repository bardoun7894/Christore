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
     <form name="bannerForm" method="post"  enctype="multipart/form-data" id="bannerForm" > @csrf
        <div class="row" >
          <div class="col-md-12" >
        {{-- banner name--}}
             <div class="col-md-6">
                 <label>banner image</label>

                 <div class="input-group mb-3">
                     <input  id="banner_image" name="banner_image" type="file" class="form-control" placeholder="banner Name"
                            @if(!empty($bannerData['image']))
                            value ="{{$bannerData['image']}}"
                            @else
                            value ="{{old('image')}}"
                         @endif    >
                 </div>

                 <label>banner url</label>
                 <div class="input-group mb-3">
                     <input id="banner_url" name="banner_url" type="text" class="form-control" placeholder="banner Url"
                            @if(!empty($bannerData['url']))
                               value ="{{$bannerData['url']}}"
                            @else
                               value ="{{old('url')}}"
                            @endif    >
                 </div>

             </div>
             <div class="col-md-12">
                 <label>banner title</label>
                 <div class="input-group mb-3">
                     <input id="banner_title" name="banner_title" type="text" class="form-control" placeholder="banner Title"
                            @if(!empty($bannerData['title']))
                            value ="{{$bannerData['title']}}"
                            @else
                            value ="{{old('title')}}"
                         @endif    >

                 </div>
              <label>banner alt</label>
               <div class="input-group mb-3">
                     <input id="banner_alt" name="banner_alt" type="text" class="form-control" placeholder="banner Alt"
                          @if(!empty($bannerData['alt']))
                               value ="{{$bannerData['alt']}}"
                            @else
                               value ="{{old('alt')}}"
                          @endif    >

                 </div>
             </div>

           </div>

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
