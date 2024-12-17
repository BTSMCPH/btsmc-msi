<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage; // Renamed from $message to $contactMessage

    /**
     * Create a new message instance.
     */
    public function __construct(Message $message)
    {
        $this->contactMessage = $message; // Use $contactMessage instead
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages.partials.emails.contact-message',
            with: ['contactMessage' => $this->contactMessage] // Pass as contactMessage
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
