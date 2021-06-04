@component('mail::message')
  # Among Us

  *Are you THE IMPOSTER?*

  @component('mail::button', ['url' => $mailData['formUrl']])
    fill out this form and Join US
  @endcomponent

  Thanks,<br>
  Dahis
@endcomponent
