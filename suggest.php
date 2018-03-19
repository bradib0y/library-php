<?php 
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/SMTP.php'; 



$pageTitle ="Suggest a Media Item";
$section = "suggest";
include("inc/header.php"); 

if($_SERVER["REQUEST_METHOD"] =="POST"){
$name = $_POST["name"];
$email = $_POST["email"];
$details = $_POST["details"];

$email = "";
$email .= "Name: " . $name . "\n"; 
$email .= "Email: " . $email . "\n";
$email .= "Details: " . $details . "\n";


/* Sending the email */
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "balazspukli";
//Password to use for SMTP authentication
$mail->Password = "oaftleopyyfsyyij";

$mail->setFrom('balazs.pukli@gmail.com', 'Library-PHP Suggestion');
$mail->addAddress('balazspukli@gmail.com', 'Library PHP - admin');
$mail->Subject  = 'LibraryPHP - Suggestion';
$mail->Body     = $email;
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    header("location:suggest.php?status=thanks");
}
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.min.js"></script>

<div class="section page">
     
    <div class = "wrapper">

        <?php if (!isset($_GET["status"])) { ?>

        <h1><?php echo $pageTitle; ?></h1>
        <p>Suggest your favourite items, if they are missing from the library!</pIf>
        <form method="post" action="suggest.php" id="suggest-form">
            <table>
                <tr>
                    <th><label for="name">Name</label></th>
                    <td><input type="text" class="form-control" name="name" id="name" required =""></td>
                </tr>
                <tr>
                    <th><label for="email">Email</label></th>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <th><label for="name">Suggest Item Details</label></th>
                    <td><textarea name="details" id="details"></textarea></td>
                </tr>
            </table>
            <input type="submit" value="Send">
        </form>

        <?php } else { ?>

        
    <h1>Thank you!</h1>
    <p>The email has been sent to us. Appreciate your suggestion!<p/>


        <?php } ?>


    </div>

</div>

<script type="text/javascript">
$(function () {
  $('#suggest-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return true; // Don't submit form for this demo
  });
});
</script>

<?php include("inc/footer.php"); ?>