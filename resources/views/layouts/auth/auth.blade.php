<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    @vite('resources/css/app.css')
    <title>@yield('auth')</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
           @auth
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500" href="{{Route('home')}}">صفحه اصلی</a>
            </li>
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500" href="{{Route('dashboard')}}">داشبورد</a>
            </li>
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500" href="">پوست ها</a>
            </li>
            @endauth
            @guest
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500" href=""> خوش امدید به سایت ما</a>
            </li>
            @endguest
        </ul>
        <ul class="flex items-center">
            @auth
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500" href="">حسنعلی</a>
            </li>
            <li>
                <form action="{{Route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="p-3 cursor-pointer  hover:text-blue-500" >خروج</button>
                </form>
            </li>
            @endauth
            @guest
            <li>
                <a class="p-3 cursor-pointer hover:text-blue-500" href="{{Route('signup')}}">ثبت نام</a>
            </li>
            <li>
                <a class="p-3 cursor-pointer  hover:text-blue-500"href="{{Route('login')}}">ورود</a>
            </li>
            @endguest
          
          
          
          
        </ul>
    </nav>
    @yield('content')
</body>
</html>