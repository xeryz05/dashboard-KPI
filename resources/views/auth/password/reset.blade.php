<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>
        Anda telah menerima email ini karena Anda telah meminta untuk mereset password Anda di [Nama Aplikasi].
    </p>
    <p>
        Untuk mereset password Anda, klik tautan berikut:
    </p>
    <a href="{{ url('password/reset', $token) }}">{{ url('password/reset', $token) }}</a>
    <p>
        Tautan ini akan kadaluarsa dalam {{ config('auth.passwords.reset_token_ttl') }} menit.
    </p>
    <p>
        Jika Anda tidak meminta untuk mereset password, silakan abaikan email ini.
    </p>
</body>
</html>