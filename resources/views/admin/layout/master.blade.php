<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.categories') }}">Categories</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.category.create') }}">Create New Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.posts') }}">Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.post.create') }}">Create New Post</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @elseif (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}")
    @elseif (Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @endif
</script>
</body>
</html>
