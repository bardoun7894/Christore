
<!-- Navbar -->
<nav class="navbar  bg-light main-header navbar navbar-expand navbar-white navbar-light"

>

    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/admin/dashboard')}}">{{ __('messages.home')}} <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('messages.language')}}
                </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a rel="alternate " class="dropdown-item" hreflang="{{ $localeCode }}" href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true)}}" class="nav-link">   {{ $properties['native'] }}</a>
            @endforeach

        </div>

            </li>
        </ul>
        <ul class="navbar-nav ml-auto float-right"  >
            <li class="nav-item">
                <a class="nav-link  btn-outline-info" href="{{url('admin/logout')}}" role="button">
                    {{__('messages.logout')}}
                </a>
            </li>

        </ul>
    </div>
</nav>
