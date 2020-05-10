@component('mail::message')
Hi, {{request("last_name") . " " . request("first_name")}}

Thanks, subscribing for <i>ADUKA TEAM</i>

@component('mail::button', ['url' => route("main")])
Go To Main Page
@endcomponent

Thanks,<br>
ADUKA TEAM
@endcomponent
