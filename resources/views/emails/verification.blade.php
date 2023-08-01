<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Hello {{ $user->name }},</h1>
    <p>Please click the following link to verify your email address:</p>
    <a href="{{ route('verify', ['token' => $user->email_verification_token]) }}">Verify Email</a>
</body>
</html>
