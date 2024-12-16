<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>
</head>
<body>
    <nav>
        @auth
        <div>
            <a href="/test/home">Home</a>
            <a href="/test/users">Users</a>
            <a href="/test/customers">Customers</a>
        </div>
        @endauth

        @guest
            <a href="/custome/login">Login</a>
            <a href="/custome/register">Register</a>
        @endguest
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
