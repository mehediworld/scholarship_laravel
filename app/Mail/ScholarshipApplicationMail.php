<?php

namespace App\Mail;

use App\Models\ScholarshipApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScholarshipApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $scholarshipApplication;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ScholarshipApplication $scholarshipApplication)
    {
        $this->scholarshipApplication = $scholarshipApplication;
    }

    public function build()
    {
        return $this->markdown('emails.scholarship_application');
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    
}
