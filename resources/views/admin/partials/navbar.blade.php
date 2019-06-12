{{--<ul class="nav navbar-nav">--}}
    {{--<li><a href="/">Blog Home</a></li>--}}
    {{--<li @if (Request::is('admin/post*')) class="active" @endif>--}}
        {{--<a href="/admin/post">Posts</a>--}}
    {{--</li>--}}
    {{--<li @if (Request::is('admin/tag*')) class="active" @endif>--}}
        {{--<a href="/admin/tag">Tags</a>--}}
    {{--</li>--}}
    {{--<li @if (Request::is('admin/upload*')) class="active" @endif>--}}
        {{--<a href="/admin/upload">Uploads</a>--}}
    {{--</li>--}}
{{--</ul>--}}

<ul class="nav navbar-nav">
    <li @if (Request::is('admin/reservations*')) class="active" @endif>
        <a href="/admin/reservations">Резервации</a>
    </li>
    <li @if (Request::is('admin/offer*')) class="active" @endif>
        <a href="/admin/offer">Оферти</a>
    </li>

    <li @if (Request::is('admin/message*')) class="active" @endif>
        <a href="/admin/message">Съобщения</a>
    </li>
</ul>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-expanded="false">{{ Auth::guard('admin')->user()->name }}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/admin/logout">Изход</a></li>
        </ul>
    </li>
</ul>