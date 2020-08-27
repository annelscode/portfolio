<?php
 
if(isset($_POST['email'])) {
 
     
 
    
 
    $email_to = "annelinterfase@gmail.com";
    //$email_to = "annelinterfase@gmail.com";
 
    $email_subject = "Mensaje enviado desde la pagina de contacto, www.annel.com.mx, ".date("D M d, Y G:i");
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "<div class='alert alert-danger'>$error</div>";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
       
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('Tu mensaje no pudo ser enviado');       
 
    }
 
     
 
    $first_name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required

 
    $comments = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Correo invalido.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'Nombre invalido.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'Debe escribir algo en el mensaje.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Detalles del mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

  

 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Gracias por tu mensaje, pronto me pondré en contacto contigo.
 
 
 
<?php
 
}
 
?>