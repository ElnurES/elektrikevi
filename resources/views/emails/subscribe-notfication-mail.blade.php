@component('mail::message')
    {{config('app.name')}}

    Yeni məhsullarımız,endirimlərimiz haqqında ilk siz xəbərdar olacaqsınız.

    Hörmətlə,<br>
    {{ config('app.name') }}
@endcomponent