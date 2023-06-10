<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
        <div class="auth">
            @auth
            @guest
            <a class="a" href="">Đăng nhập</a>
            @endguest

            <div>
                <a class="a-attem">
                    {{ Auth::user()->name}}
                <a>
                <input type="hidden" id="user_id" name ="user_id" value="{{ Auth::user()->id }}">
            </div>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button  style="display: block" class="a">Đăng Xuất</button>
                </form>
            </div>
        @endauth
        </div>

        @yield('main')

</body>
</html>
