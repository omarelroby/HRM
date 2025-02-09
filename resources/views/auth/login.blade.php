<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Animated Login &amp; Register Form</title>
    <link rel="stylesheet" href="{{ asset('public/auth/css/style.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login-Signup Form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <span class="bg-animate"></span>
    <span class="bg-animate2"></span>

    <div class="form-box login">
        <h2 class="animation" style="--i:0; --j:21;">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box animation" style="--i:1; --j:22;">
                <input type="email" name="email" placeholder="{{ __('Email') }}" autofocus required>
                <label>{{ __('Email') }}</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box animation" style="--i:2; --j:23;">
                <input type="password" name="password" placeholder="{{ __('Password') }}" required>
                <label>{{ __('Password') }}</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button class="btn animation" type="submit" style="--i:3; --j:24;">Login</button>
            <div class="logreg-link animation" style="--i:4; --j:25;">
                <p>Don't have an account? <br> <a href="#" class="register-link">Sign up</a></p>
            </div>
        </form>
    </div>
    <div class="info-text login">
        <h2 class="animation" style="--i:0; --j:20;">Welcome back!</h2>
        <p class="animation" style="--i:1; --j:21;">We're happy to have you with us back again! If you need anything, we're here to help</p>
    </div>

    <div class="form-box register ">
        <h2 class="animation" style="--i:17; --j:0;">Sign up</h2>
        <form action="#">
            <div class="input-box animation" style="--i:18; --j:1;">
                <input type="text" required>
                <label>Username</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box animation" style="--i:19; --j:2;">
                <input type="text" required>
                <label>Email</label>
                <i class='bx bxs-envelope' ></i>
            </div>
            <div class="input-box animation" style="--i:20; --j:3;">
                <input type="password" required>
                <label>Password</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button class="btn animation" type="submit" style="--i:21; --j:4;">Sign up</button>
            <div class="logreg-link animation" style="--i:22; --j:5;">
                <p>Already have an account? <br> <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>

    <div class="info-text register">
        <h2 class="animation" style="--i:17; --j:0;">Welcome!</h2>
        <p class="animation" style="--i:18; --j:1">We're delighted to have you here. If you need any assistance, feel free to reach out</p>
    </div>
</div>

<script src="{{ asset('public/auth/js/script.js') }}"></script>
</body>
</html>
<!-- partial -->
<script  src="{{ asset('public/auth/js/script.js') }}"></script>

</body>
</html>
