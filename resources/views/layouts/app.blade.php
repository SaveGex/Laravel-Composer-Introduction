<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <x-navigation :links="[
        'home' => 'Home',
        'posts.index' => 'Posts',
        // 'register' => 'Register',
        // 'login' => 'Login',
    ]">
        <x-profile />
    </x-navigation>
    @if (session('success'))
        <x-flash type="success">{{ session('success') }}</x-flash>
    @elseif (session('error'))
        <x-flash type="danger">{{ session('error') }}</x-flash>
    @endif

    @yield('content')
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
