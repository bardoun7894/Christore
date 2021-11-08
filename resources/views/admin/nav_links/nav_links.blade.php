@extends('layouts.adminLTE_layout.adminLTE_layout')
@section('content')
    {{-- make direction with  css tailwinds plugin  dir="rtl" --}}
    <div class="content-wrapper" id="app"

         @if(Config::get('app.locale') =="ar")
          dir="rtl"
        @endif>flash_message_success
      @if(Session::has(''))
            <div class="alert alert-success" role="alert">
                {{Session::get('flash_message_success')}}
            </div>
      @endif
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
                                <div class="inline">
                                    <h3 class="card-title flex">{{__('messages.banners')}}</h3>
                                    <a href="{{url('admin/add-edit-banner')}}"  type="button" class="btn btn-block btn-primary text-white px-2 py-1 float-right  hover:bg-blue-600 mr-6" style="width: auto">
                                        {{__('messages.add_banner')}}</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body"
                                 @if(Config::get('app.locale') =="ar")
                                 dir="rtl"
                                @endif
                            >
                                <table id="products" class="table table-striped" style="min-width: 562px">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">linkname</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($navLinks as $navLink)
                                        <tr>
                                            <td style="color: grey">
                                                {{$navLink->id}}
                                            </td>
                                            <td style="color: grey">
                                                {{$navLink->link_name}}
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
