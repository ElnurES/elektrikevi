@component('mail::message')
Salam

Hesabınız üçün şifrə yeniləmə tələbi aldığımız üçün bu e-poçtu alırsınız.

Əgər bir şifrə yeniləməsi tələb etməmisinizsə, sizdən nəsə etmək tələb olunmur!!!.

Əgər istək siz tərəfdən edilibsə prosesin tamamlanması üçün Yenilə düyməsinə kilikləyin və ya aşağdakı bağlantıyı brauzerinizdə açın.
{{route('reset-password-token',$passwordReset->token)}}


@component('mail::button', ['url' => route('reset-password-token',$passwordReset->token)])
    Yenilə
@endcomponent

Hörmətlə,<br>
{{ config('app.name') }}
@endcomponent
