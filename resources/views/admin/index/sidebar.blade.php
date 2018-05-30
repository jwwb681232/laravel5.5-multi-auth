<style>
    #sidebar .nav a{cursor:pointer}
</style>
<div id="sidebar" class="sidebar sidebar-transparent">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="#" data-toggle="nav-profile">
                    <div class="image">
                        <img src="{{ asset('resources/img/user.jpg') }}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        John Smith
                        <small>Front end developer</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="#"><i class="material-icons">settings</i> Settings</a></li>
                    <li><a href="#"><i class="material-icons">mode_edit</i> Send Feedback</a></li>
                    <li><a href="#"><i class="material-icons">help</i> Helps</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Applications</li>
            @foreach($menus as $menu)
                <li class="has-sub">

                    @if(count($menu->children) > 0)
                    <a href="javascript:void (0);">
                        <b class="caret pull-right"></b>
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a>
                    @else
                    {{--<a href="{{ url($menu->href) }}">--}}
                    <a onclick="iframeSrc('{{ url($menu->href) }}')">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a>
                    @endif


                    @if(count($menu->children) > 0)
                    <ul class="sub-menu">
                        @foreach($menu->children as $item)
                        <li><a onclick="iframeSrc('{{ url($item->href) }}')">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
            @endforeach

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>