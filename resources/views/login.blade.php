<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | StudyFlow</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-container">

    <div class="auth-box">

        <h1>📚 StudyFlow</h1>
        <p>Welcome back! Login to continue.</p>

        @if ($errors->any())
<div class="error-box">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

        <form action='login' method='POST'>
            @csrf

            <label>Email</label>
            <input type="email" name="email" value="{{old("email")}}" placeholder="Enter your email">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">

            <button type="submit">Login</button>

        </form>

        <p>
            Don't have an account?
            <a href="/register">Register</a>
        </p>

    </div>

</div>

</body>
</html>