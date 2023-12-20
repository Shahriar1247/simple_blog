<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $mailModel;

    public function __construct($data, Mail $mailModel)
    {
        $this->data = $data;
        $this->mailModel = $mailModel;
    }

    public function build()
    {
        // Build email content as before...

        $this->mailModel->name = $this->name;
        $this->mailModel->email = $this->email;
        $this->mailModel->adress = $this->adress;
        $this->mailModel->ask = $this->ask;
        $this->mailModel->data = json_encode($this->data); // or store relevant data fields directly
        $this->mailModel->save();

        return $this->view('my-email-template', ['data' => $this->data]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'My Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
