@component('mail::message')
    {{config('app.name')}}

    Salam {{$user->fullname}}, uğurla qeydiyyatdan keçdiniz
    Profilinizi aktivləşdirmək üçün  Təstiqlə düyməsinə kilikləyin və ya aşağdakı bağlantıyı brauzerinizdə açın.
    {{config('app.url')}}/auth/activation/{{$user->activation}}


@component('mail::button', ['url' =>route('activation',$user->activation) ])
    Təstiqlə
@endcomponent

Hörmətlə,
{{ config('app.name') }}
@endcomponent
