<?php 

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteNotification  extends Mailable
{
    use Queueable, SerializesModels;

    public $query;
    public $subjectLine; 
    public $adminEmail; 
    public $logo;
    
    public function __construct($query, $subjectLine, $adminEmail, $logo)
    {
        $this->query = $query;
        $this->subjectLine = $subjectLine;
        $this->adminEmail = $adminEmail;
        $this->logo = $logo;

    }

    public function build()
    {
        return $this->subject($this->subjectLine)
                    ->cc($this->adminEmail)
                    ->view('email-templates.query')
                    ->with([
                        'query' => $this->query,
                        'adminEmail' => $this->adminEmail,
                        'logo' => $this->logo
                    ]);
    }
}
