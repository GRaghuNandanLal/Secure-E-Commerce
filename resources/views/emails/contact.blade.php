@component('mail::message')
# Contact from {{ $name }}

{{$content}}

@component(' mail::button',['url'=>"http://127.0.0.1:8000/"])
Visit us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
