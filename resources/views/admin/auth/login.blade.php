<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin login | {{ $siteSettings['seo_meta_title'] ?? 'Aarogya Hospital' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/hospital/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="login-page">
<main class="login-card">
    <img class="login-logo" src="{{ asset(($siteSettings['website_logo'] ?? null) ?: 'assets/hospital/images/aarogya-logo.png') }}" alt="Aarogya Hospital">
    <p class="kicker">AAROGYA HOSPITAL</p>
    <h1>Admin portal</h1>
    <p class="muted">Sign in to manage your website content and enquiries.</p>
    @if($errors->any())
        <div class="login-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first() }}</div>
    @endif
    <form method="post" action="{{ route('admin.authenticate') }}">
        @csrf
        <label>Email address<input type="email" name="email" value="{{ old('email') }}" required autofocus></label>
        <label>Password<input type="password" name="password" required></label>
        <label class="check"><input type="checkbox" name="remember"> Remember me</label>
        <button class="button button-primary button-wide">Sign in to admin</button>
    </form>
    <a class="back-link" href="{{ route('home') }}">Return to website</a>
</main>
</body>
</html>
