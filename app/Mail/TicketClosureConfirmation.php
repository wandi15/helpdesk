<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketClosureConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $confirmationUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket, string $confirmationUrl)
    {
        $this->ticket = $ticket;
        $this->confirmationUrl = $confirmationUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Penutupan Tiket #' . $this->ticket->_id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket-closure-confirmation',
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
