@component('mail::message')
# Scholarship Application Submitted

Hello {{ $scholarshipApplication->full_name }},

Your scholarship application has been successfully submitted. Your application ID is: {{ $scholarshipApplication->id }}.

Please keep this ID for future reference.

Thank you for applying!

Best regards,

{{ config('app.name') }}
@endcomponent
