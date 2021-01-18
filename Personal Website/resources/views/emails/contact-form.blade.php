@component('mail::message')

# You have one new message

<strong>Name</strong> {{$data['name']}}
<strong>Message</strong> 

{{$data['message']}}
@endcomponent
