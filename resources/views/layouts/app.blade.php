<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPA Livewire</title>
    @livewireStyles
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</head>
<body>
    <header>
        <nav>
            <a href="/login">Login</a>
            <a href="/logout">Logout</a>
            <a href="/register">Register</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        ©️ 🌚
    </footer>
</body>
</html>