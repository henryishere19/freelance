<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Confirm your email address - {{ config('constants.APP_NAME') }}</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">

            Welcome to {{ config('constants.APP_NAME') }}, please verify your email address.
            <button><a href="{{$data->url}}">Email Verification</a> </button>
               
            </div>
        </div>
    </body>
</html>
