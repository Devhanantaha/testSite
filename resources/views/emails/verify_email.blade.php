@component('mail::message')
# Verify Your Email Address

Hello {{ $user->name }},

To complete your registration, please enter the following verification code:

{{  $verification_code }}

Thank you for registering!

Best regards,
{{ config('app.name') }}
@endcomponent