@component('mail::message')
Salam, Admin

    {{$contact->fullname}} adlı istifadəçi

    {{$contact->message}}

    mesajını gondərdi.




@component('mail::button', ['url' => "mailto:".$contact->email])
Cavabla
@endcomponent

Hörmətlə,<br>
{{ config('app.name') }}
@endcomponent
