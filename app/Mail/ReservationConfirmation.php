<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        // Generate invoice PDF
        $invoicePdf = $this->generateInvoicePdf();

        // Attach the invoice PDF to the email
        return $this->view('emails.reservation-confirmation')
                    ->attachData($invoicePdf, 'tagihan.pdf', ['mime' => 'application/pdf']);
    }

    private function generateInvoicePdf()
    {
        // Generate your invoice PDF here
        // For demonstration purposes, let's assume we have a sample PDF file

        // Get the sample PDF content
        $pdfContent = Storage::disk('local')->get('sample_invoice.pdf');

        return $pdfContent;
    }
}