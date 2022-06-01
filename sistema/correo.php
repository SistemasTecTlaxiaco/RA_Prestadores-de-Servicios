
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$alert='';

if(isset($_POST['emaildestino']) && isset($_POST['Apellido'])){

    $emaildestino=$_POST['emaildestino'];
    $Apellido=$_POST['Apellido'];
    $micorreo=$_POST['micorreo'];
    $asunto=$_POST['asunto'];
    $comentario=$_POST['comentario'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail =new PHPMailer();

   
                                   
            $mail->isSMTP();                                    
            $mail->Host = 'smtp.office365.com';                   
            $mail->SMTPAuth = true;                             
            $mail->Username = 'chequi-2000@hotmail.com';                 
            $mail->Password = 'tercercielo2014';                           
            $mail->SMTPSecure = 'tls';                           
            $mail->Port = 587;     
            $mail-> isHTML(TRUE);      
            $mail->setFrom('chequi-2000@hotmail.com', 'Prestadores de servicios EGAL');
            $mail->addAddress($emaildestino, $asunto);    
            
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );  
            $mail->isHTML(true);                                  
            $mail->Subject = 'Correo de contacto';
            $mail->Body    = 'Nombre: '  . $Apellido .'<br/>Envió:'.$micorreo.'<br/>Asunto:'.$asunto. '<br/>Correo: ' . $emaildestino . '<br/>' . $comentario;
         




    if($mail->send()){
        $alert='<div class="alert-success">
        <span>Mensaje enviado correctamente!! </span>
        </div>';
     
 
    }
    else{
        $alert='<div class="alert-success">
<span>Error al enviar!! </span>
</div>';
        
    } 

}
