<?php

use Classiq\Utils\MailConfig;
cq()->defaultMailSender=$m=new MailConfig();
$m->port="465";
$m->SMTPSecure="ssl";
$m->host="smtp.gmail.com";
$m->password="fautPasPousser21!";
$m->username="forms.pixelvinaigrette@gmail.com";
$m->displayName="noreply";
$m->SMTPAuth=true;
