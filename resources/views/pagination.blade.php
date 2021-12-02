@if($paginator->hasPages())
    <div class="page-btn">
        @if($paginator->onFirstPage())
{{--        <a><i class="fa fa-angle-left"></i></a>--}}
            <a href=""><i class="fa fa-angle-left"></i></a>
        @else
            <a href="{{$paginator->previousPageURl()}}"><i class="fa fa-angle-left"></i></a>
        @endif()
        @if(is_array($elements[0]))
            @foreach($elements[0] as $page =>$url)
                @if($page ==$paginator->currentPage())
                     <a href="{{$url}}" class="active">{{$page}}</a>
                    @else
                        <a href="{{$url}}" >{{$page}}</a>
                    @endif

                @endforeach
        @endif()
            @if($paginator->hasMorePages())
                <a href="{{$paginator->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
            @endif
{{--        <span>1</span>--}}
{{--        <span>2</span>--}}

    </div>
 @endif
