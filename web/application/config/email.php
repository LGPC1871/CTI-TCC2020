<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
|--------------------------------------------------------------------------
| Email
|--------------------------------------------------------------------------
| Configurações relacionadas ao envio de emails pela aplicação
*/
$config['protocol'] = "smtp";
$config['smtp_host'] = "smtp.gmail.com";
$config['smtp_user'] = "cotiljogos@gmail.com";
$config['smtp_pass'] = "]#fspl%%32";
$config['smtp_port'] = "587";
$config['mailpath'] = "C:\\xampp\\sendmail";
$config['starttls'] = TRUE;
$config['smtp_crypto'] = "tls";
$config['smpt_ssl'] = "auto";
$config['send_multipart'] = false;
$config['charset']  = 'UTF-8';
$config['mailtype'] = "html";
$config['wordwrap']  = TRUE;
$config['newline']  = "\r\n";
$config['crlf']     = "\r\n";

