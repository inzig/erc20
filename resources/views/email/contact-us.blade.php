@component('mail::message')
# {{ $data['name'] }}
Thanks for contacting with us. Your message has been received successfully.
# {{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
