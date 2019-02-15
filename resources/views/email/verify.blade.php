@component('mail::message')

Hello {{ $user->name }},
<br>
Thank you for creating an account with us. Don't forget to complete your registration!
<br>
Please click on the button below or copy it into the address bar of your browser to confirm your email address:
<br>

@component('mail::button', ['url' => url('register/verify/'. $user->email_token )])
    Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
