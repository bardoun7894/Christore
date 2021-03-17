<div class="sidebar  ">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        @if(!empty(Auth()->guard('admin')->user()->image))
            <div class="image">
                <img src="{{asset('images/adminLTE_img/admin_photos/'.Auth()->guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
        @endif
        <div class="info">
            <a href="#" class="d-block">{{ucwords(Auth()->guard('admin')->user()->type)}}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                 @if(Session()->get('page')=="dashboard")
                     <?php   $active = 'active'  ?>
                     @else
                      <?php   $active = ''  ?>
                 @endif
               <a href="{{url('/admin/dashboard')}}" class="nav-link bs-popover-top {{$active}}" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{__("messages.Dashboard")}}</p>
               </a>
            </li>

             @if(Session()->get('page')=="settings"|| Session()->get('page')=="update_admin_details")
                        <?php   $active = "active"  ?>
                   @else
                        <?php   $active = ""  ?>
                    @endif
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link  {{$active}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p> {{__("messages.Settings")}} <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item">
                              @if(Session()->get('page')=="settings")
                                <?php  $active = "active" ?>
                                  @else
                                <?php  $active = ""  ?>
                              @endif
                        <a href="{{url('/admin/settings')}}" class="nav-link {{$active}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{__("messages.update_password")}}</p>
                        </a>
                    </li>
                    @if(Session()->get('page')=="update_admin_details")
                        <?php   $active = "active"  ?>
                      @else
                        <?php   $active = ""  ?>
                    @endif
                    <li class="nav-item">
                        <a href="{{url('/admin/update_admin_details')}}" class="nav-link {{$active}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{__("messages.admin_details")}}</p>
                        </a>
                    </li>
                </ul>
            </li>

           @if(Session()->get('page')=="sections" || Session()->get('page')=="categories")
                 <?php   $active = "active"  ?>
            @else
                  <?php   $active = ""  ?>
           @endif
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link  {{$active}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p> {{ __("messages.catalogues") }} <i class="right fas fa-angle-left"></i></p>
                </a>

                <ul class="nav nav-treeview ">


                    <li class="nav-item">

                        @if(Session()->get('page')=="sections")
                            <?php   $active = "active"  ?>
                        @else
                            <?php   $active = ""  ?>
                        @endif
                        <a href="{{url('/admin/section')}}" class="nav-link {{$active}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __("messages.sections") }}</p>
                        </a>
                    </li>

                     <li class="nav-item">
                            @if(Session()->get('page')=="categories")
                                <?php  $active = "active" ?>
                            @else
                                <?php  $active = ""  ?>
                            @endif
                            <a href="{{url('/admin/categories')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("messages.categories") }}</p>
                            </a>
                     </li>

                    <li class="nav-item">
                            @if(Session()->get('page')=="products")
                                <?php  $active = "active" ?>
                            @else
                                <?php  $active = ""  ?>
                            @endif
                            <a href="{{url('/admin/products')}}" class="nav-link {{$active}}">
                                <i class="fas fa-tshirt"></i>
                                &nbsp;&nbsp;&nbsp;   <p>{{ __("messages.products") }}</p>
                            </a>
                     </li>
                </ul>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

