@component('mail::message')
    {{config('app.name')}}

    Salam {{$order->fullname}}, yeni sifariş verdiniz
    İstifadəçi panelinizdən sifarişinizi izləyə bilərsiniz.
    Bunu keçid düyməsinə klikləyərək və ya aşağdakı linki brauzernizdə açaraq edə bilərsiniz

    {{route('my-account')}}

    @component('mail::button', ['url' =>route('my-account') ])
        Keçid
    @endcomponent

    Hörmətlə,
    {{ config('app.name') }}
@endcomponent
