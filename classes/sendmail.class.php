<?php

class SendMail extends Main
{
	private $email;
	public function __construct() {
		//this needs to be true to accept exceptions
        $this->email = new PHPMailer();

        $this->email->IsSMTP();
        $this->email->SMTPAuth = true;
        $this->email->Host       = EMAIL_HOST;
        $this->email->Username   = EMAIL_USERNAME;
        $this->email->Password   = EMAIL_PASSWORD;
        $this->email->Port       = 465;
        $this->email->SMTPSecure = 'ssl';
        $this->email->SMTPDebug = EMAIL_DEBUG;
        $this->email->CharSet = "UTF-8";
        $this->email->Encoding = 'base64';

    }

    public function enviarCorreo($subject, $body, $details_body, $details_subject, $to, $toName, $attachment = array(), $fileName = array(), $from = null, $fromName)
	{
		$body = nl2br($this->Util()->handle_mail_patterns($body,$details_body));
		$subject = $this->Util()->handle_mail_patterns($subject,$details_subject);

        $replyTo = $from ?? EMAIL_USERNAME;
        $this->email->AddReplyTo($replyTo, $fromName);
        $this->email->SetFrom(EMAIL_USERNAME, $fromName);

		$this->email->AddAddress($to, $toName);
        $this->email->Subject    = utf8_decode($subject);
		$this->email->MsgHTML($body);

		foreach($attachment as $key => $attach)
		{
			$this->email->AddAttachment($attach, $fileName[$key]);
		}
		$this->email->Send();
	}

	public function PrepareAttachment($subject, $body, $details_body, $details_subject, $to, $toName, $attachment = array(), $fileName = array(), $from = null, $fromName = "Administrador del Sistema")
	{
		$body = nl2br($this->Util()->handle_mail_patterns($body,$details_body));
		$subject = $this->Util()->handle_mail_patterns($subject,$details_subject);
        $from = 'dlopez@trazzos.com';

		$replyTo = $from ?? EMAIL_USERNAME;
		$this->email->AddReplyTo($replyTo, $fromName);
		$this->email->SetFrom(EMAIL_USERNAME, $fromName);

		$this->email->AddAddress($to, $toName);
		$this->email->Subject    = utf8_decode($subject);
		$this->email->MsgHTML($body);

		if(is_array($attachment)) {
			foreach($attachment as $key => $attach)
			{
                $this->email->AddAttachment($attach, $fileName[$key]);
			}
		}

		//TODO add try catch to this :/
		$this->email->Send();
	}


	public function Prepare($subject, $body, $details_body, $details_subject, $to, $toName, $attachment = "", $fileName = "", $from = null, $fromName = "Administrador del Sistema")
	{
		if(!isset($from)) {
			$from = EMAIL_USERNAME;
		}

		$body = nl2br($this->Util()->handle_mail_patterns($body,$details_body));
		$subject = $this->Util()->handle_mail_patterns($subject,$details_subject);

		$replyTo = $from ?? EMAIL_USERNAME;
		$this->email->AddReplyTo($replyTo, $fromName);
		$this->email->SetFrom(EMAIL_USERNAME, $fromName);

        $this->email->AddAddress($to, $toName);
        $this->email->Subject    = utf8_decode($subject);
        $this->email->MsgHTML($body);

		if($attachment != "")
		{
            $this->email->AddAttachment($attachment, $fileName);
		}
        $this->email->Send();
	}

	public function PrepareMulti($subject, $body, $details_body, $details_subject, $to, $toName = null, $attachment = "", $fileName = "", $from = null, $fromName = "Administrador del Sistema")
	{
		$body = nl2br($this->Util()->handle_mail_patterns($body,$details_body));
		$subject = utf8_decode($this->Util()->handle_mail_patterns($subject,$details_subject));

        $replyTo = $from ?? EMAIL_USERNAME;
        $this->email->AddReplyTo($replyTo, $fromName);
        $this->email->SetFrom(EMAIL_USERNAME, $fromName);

		$ids = explode(",", $to);
		$student = new User;
		foreach($ids as $id)
		{
			$student->setUserId($id);
			$info = $student->InfoUser();
			$info["names"] = $info["names"];
			$info["lastNamePaterno"] = $info["lastNamePaterno"];
			$info["lastNameMaterno"] = $info["lastNameMaterno"];
			$name = utf8_decode($info["names"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"]);
            $this->email->AddBCC($info["email"], $name." (".$info["controlNumber"].")");
		}

        $this->email->Subject    = utf8_decode($subject);
        $this->email->MsgHTML($body);

		if($attachment != "")
		{
            $this->email->AddAttachment($attachment, $fileName);
		}
        $this->email->Send();
	}

}


?>
