<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Client;

class EmailVerificationClient extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $token;
    public $url;




    /**
     * Create a new message instance.
     */
    public function __construct( Client $client, $token,$url){

    $this->client=$client;
    $this->token=$token;
    $this->url=$url;
    }


    public function build(){


        return $this->view('verify' )
        ->subject('verifer votre email')
        ->with([
            'client'=>$this->client,
            'token'=>$this->token,
            'url'=>$this->url,




        ]);
    

    }






    /**
     * Get the message envelope.
     */

    
   
    }

    /**
     * Get the message content definition.
     */
