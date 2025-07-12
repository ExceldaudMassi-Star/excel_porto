<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax;

  private $messages = [];

  public function add_message($content, $label, $length = 0) {
    $this->messages[] = "$label: $content";
  }

  public function send() {
    $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
    $headers .= "Reply-To: {$this->from_email}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $message = implode("\n", $this->messages);

    if (mail($this->to, $this->subject, $message, $headers)) {
      return 'Message sent successfully!';
    } else {
      return 'Failed to send message.';
    }
  }
}
?>
