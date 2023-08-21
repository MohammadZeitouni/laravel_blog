<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-700 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        Zeitouni
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="{{url('blog')}}">Blog</a>
                    <a class="no-underline hover:underline" href="{{url('tag')}}">Tag</a>
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <!-- Start Username -->
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="no-underline hover:underline" type="button">{{ Username() }} </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownHover" class="z-10 hidden bg-gray-600 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="{{ route('logout') }}"
                                class="block px-4 py-2 hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                            </li>
                            </ul>
                        </div>
                          <!-- End Username -->
                          <!-- Start Notifications -->
                        <button id="dropdownHoverButton2" data-dropdown-toggle="dropdownHover2" data-dropdown-trigger="hover"
                                class="no-underline hover:underline" type="button"><svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="h-6">
                                <path
                                fill-rule="evenodd"
                                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                clip-rule="evenodd" />
                      </svg> </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownHover2" class="z-10 hidden bg-gray-600 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownHoverButton2">
                            <li>
                                <span
                                class="block px-4 py-2">Notifications : {{unreadNotifications()->count()}}</span>
                            </li>
                            @if (unreadNotifications()->count())
                            <hr class="w-full pb-2">
                            @endif
                            @foreach (unreadNotifications() as $item)
                              <li  class="block px-4 py-2 hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="{{url('blog')}}/{{$item->data['slug']}}">
                                    Title: {{$item->data['title']}}
                                </a>
                              </li>
                              <li  class="block px-4 py-2">{{$item->data['user_create']}}</li>
                              <li  class="block px-4 py-2">Date: {{date('d-m-Y',strtotime($item->created_at))}}</li>

                              <hr class="w-full pb-1 pt-1">
                            @endforeach
                            @if (unreadNotifications()->count())
                            <li>
                                <a href="{{route('Notification.read')}}"
                                class="block px-4 py-2 hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">Delete All</a>
                            </li>
                            @endif
                            </ul>
                        </div>
                         <!-- End Notifications -->
                    @endguest
                </nav>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
