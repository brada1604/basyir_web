<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        // initialize email setting from emailConfig function.
        $this->email->initialize($this->emailConfig());

        // Set sender email and name from .env file
        $this->email->setFrom('b32c2204641c0d', 'Basyir Group');
        // target email or receiver
        $this->email->setTo('jaironlanda@gmail.com');
        // Email subject
        $this->email->setSubject('Reset Password');
        // Email message
        $this->email->setMessage('Testing the email class.');

        // make sure email is send
        if($this->email->send()){
            echo 'Success!';
        }else {
            echo 'failed';
        }
        
        // return view('welcome_message');
    }

    //--------------------------------------------------------------------

    /**
     * Set email configuration from .env file
     * getenv = get the the value of an environment variable (.env file)
     */
    private function emailConfig()
    {
        // Protocol
        $config['protocol'] = 'smtp';
        // Host
        $config['SMTPHost'] = 'smtp.mailtrap.io';
        // Port
        $config['SMTPPort'] = 2525;
        // User
        $config['SMTPUser'] = 'b32c2204641c0d';
        // Pass
        $config['SMTPPass'] = '1458624a24aa24';
        
        return $config;
    }
}
