@component('mail::message')
# AIBL Scholarship Application Submitted

Hello {{ $scholarshipApplication->full_name }},

Your scholarship application has been successfully submitted. Your application ID is: {{ $scholarshipApplication->id }}.

Please keep this ID for future reference.

Thank you for applying!

Best regards,

Al-Arafah Islami Bank Limited
@endcomponent
