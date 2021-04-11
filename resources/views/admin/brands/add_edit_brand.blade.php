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
                  <form name="brandForm" method="post"  enctype="multipart/form-data" id="brandForm" > @csrf
        <div class="row" >
         <div class="col-md-6" >
      {{-- brand name--}}
         <label>brand name</label>
                          <div class="input-group mb-3">
                                      <input id="brand_name" name="brand_name" type="text" class="form-control" placeholder="brand Name"
                                          @if(!empty($brandData['name']))
                                               value ="{{$brandData['name']}}"
                                            @else
                                               value ="{{old('name')}}"
                                          @endif    >
                                    </div>
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
