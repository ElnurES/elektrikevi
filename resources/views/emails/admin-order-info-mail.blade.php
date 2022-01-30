@component('mail::message')
    {{config('app.name')}}

    Salam Admin, yeni sifariş var

    linkini admin panelde yazandan sora veresik ola bilsin:))
    {{route('my-account')}}


    @component('mail::button', ['url' =>route('my-account') ])
        Keçid
    @endcomponent

    Hörmətlə,
    {{ config('app.name') }}
@endcomponent
