@component('mail::message')

<h1>
    Hello,
</h1>

Welcome to CareerOne Job Portal.

@component('mail::button', ['url' => url('http://advertiser-wp.localpub/post-new-job/')])
   Start posting job!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
