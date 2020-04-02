<?php
include('phpmailer.php');
class Mail extends PhpMailer
{
    // Set default variables for all new objects
    public $From     = 'singh.kajal940@gmail.com';
    public $FromName = Vamps;
    public $Host     = 'thebizroot.com';
    public $Mailer   = 'smtp';
    public $SMTPAuth = true;
    
    public $Username = 'noreply@thebizroot.com';
    public $Password = 'Bizroot@123';
    public $SMTPSecure = 'tls';
    public $WordWrap = 75;

    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($body)
    {
        $this->Body = $body;
    }
    public function send()
    {
        $this->AltBody = strip_tags(stripslashes($this->Body))."\n\n";
        $this->AltBody = str_replace("&nbsp;", "\n\n", $this->AltBody);
        return parent::send();
    }
}
