<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GET OTP - {{ config('constants.APP_NAME') }}</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">Hello, {{ $data->name }}</div>
                <div class="title m-b-md">User : <strong>{{ $data->otp }}</strong> to login with you account.</div>
            </div>
        </div>
    </body>
</html>
