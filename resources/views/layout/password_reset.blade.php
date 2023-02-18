@component('mail::message')
# Password Reset Request

Hi {{ $user->username }},

You have requested to reset your password. Please use the following token to reset your password within the next 1 minute:

**{{ $token }}**

If you did not request a password reset, please ignore this message.

Thank you,<br>
{{ config('app.name') }}
@endcomponent