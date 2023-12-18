<!DOCTYPE html>
<html>
<head>
    <title>Your App</title>
    <!-- Include your CSS and other head elements -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class='header'>
    <div class='container'>
        <div class='header-line'>
            <div class='header-logo'>
                <img src="{{ asset('img/logo.png') }}" alt="">
            </div>

            <div class='nav'>
                <a class='nav-item' href="{{ url('/') }}">ГЛАВНАЯ</a>
                <a class='nav-item' href="{% url 'tours' %}">ТУРЫ</a>
                <a class='nav-item' href="{% url 'about' %}">О НАС</a>
                <a class='nav-item' href="{% url 'cooperation' %}">СОТРУДНИЧЕСТВО</a>
                <a class="nav-item" href="{{ url('/attractions/create') }}">ДОБАВИТЬ ДОСТОПРИМЕЧАТЕЛЬНОСЬ</a>
            @if (Route::has('login'))
                    @auth
                        <a class='nav-item' href="{{ url('/dashboard') }}">ПРОФИЛЬ</a>
                    @else
                        <a class='nav-item' href="{{ route('login') }}">АВТОРИЗАЦИЯ</a>
                        @if (Route::has('register'))
                            <a class='nav-item' href="{{ route('register') }}">РЕГИСТРАЦИЯ</a>
                        @endif
                    @endauth
            @endif
        </div>

            <div class='cart'>
                <a href="#">
                    <img class='cart-img'>
                </a>
            </div>
            <div class='phone'>
                <div class='phone-holder'>
                    <div class='phone-img'>
                        <img src="{{ asset('img/phone.png') }}"alt="">
                    </div>

                    <div class='number'><a class='num' href='#'>+996 709-16-23-33</a></div>
                </div>

                <div class='phone-text'>
                    При возникновение вопросов<br> свяжитесь с нами
                </div>
            </div>

    <!-- Your navigation bar or other common elements -->
    </div>
    </div>
</div>

    <div class="container">
        @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        @yield('content')
    </div>

    <!-- Include your scripts or other common elements at the end of the body -->

</body>
</html>