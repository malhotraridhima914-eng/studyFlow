<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | StudyFlow</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-container">

    <div class="auth-box">

        <h1>📚 StudyFlow</h1>
<p>Create your account to start managing your studies.</p>

        <form>

            <label>Full Name</label>
            <input type="text" placeholder="Enter your name">

            <label>Email</label>
            <input type="email" placeholder="Enter your email">

            <label>Password</label>
            <input type="password" placeholder="Enter password">

            <label>Confirm Password</label>
            <input type="password" placeholder="Confirm password">

            <button>Create Account</button>

        </form>

        <p>
            Already have an account?
            <a href="/login">Login</a>
        </p>

    </div>

</div>

</body>
</html>