@component('mail::message')

<h1>
    Hello,
</h1>

Welcome to Kchahiyo.

Please use the following code to verify your account:
<br>
<br>
{{ $user->email_token }}
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
