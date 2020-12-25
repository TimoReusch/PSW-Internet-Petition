<?php

/**
 * Schritt 3
 *
 * PHP version 7
 *
 *
 * @package    main
 * @author     Timo Reusch <info@reusch-systems.de>
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!doctype html>
<html lang="de">

<?php
include('classes/Head.class.php');
$head = new Head;
$head->generateHead('PSW-Internetpetition (No official site!)');
?>

<body>
<?php
include('classes/Nav.class.php');
require_once('classes/generateMail.class.php');


$downloadSpeedProblem = 0;
$uploadSpeedProblem = 0;
$disconnectionProblem = 0;
$followUp = 0;

if(isset($_POST['downloadSpeedCheck'])){
    $downloadSpeedProblem = $_POST['downloadSpeedCheck'];
}
if(isset($_POST['uploadSpeedCheck'])){
    $uploadSpeedProblem = $_POST['uploadSpeedCheck'];
}
if(isset($_POST['disconnectionCheck'])){
    $disconnectionProblem = $_POST['disconnectionCheck'];
}
if(isset($_POST['followUp'])){
    $followUp = $_POST['followUp'];
}


$data = [
    'room_nr' => $_POST['inputRoomNumber'],
    'firstName' => $_POST['inputFirstName'],
    'lastName' => $_POST['inputLastName'],
    'email' => $_POST['inputEmail'],
    'houseNumber' => $_POST['inputHouseNumber'],
    'downloadSpeedProblem' => $downloadSpeedProblem,
    'uploadSpeedProblem' => $uploadSpeedProblem,
    'disconnectionProblem' => $disconnectionProblem,
    'problemDescription' => $_POST['problemDescription'],
    'ping' => $_POST['inputPing'],
    'upload' => $_POST['inputUpload'],
    'download' => $_POST['inputDownload'],
    'followUp' => $followUp,
    'agreed' => $_POST['agreementCheck'],
];

$sql = 'INSERT INTO psw (room_nr, firstName, lastName, email, houseNumber, downloadSpeedProblem, uploadSpeedProblem, disconnectionProblem, problemDescription, ping, upload, download, followUp, agreed) 
                VALUES (:room_nr, :firstName, :lastName, :email, :houseNumber, :downloadSpeedProblem, :uploadSpeedProblem, :disconnectionProblem, :problemDescription, :ping, :upload, :download, :followUp, :agreed)';
require("mysql.php");
if (isset($mysql)) {
    $stmt = $mysql->prepare($sql);
    $stmt->execute($data);
} else {
    echo "Fatal error.";
}

/*Send an e-mail with the entered values to the user*/
$empfaenger = $data['email'];

$betreff = "Your Data submitted to the PSW-Internet-Petition";

$from = "From: PSW-Internet-Petition <psw-internet@reusch-systems.de>\r\n";
$from .= "Reply-To: psw-internet@reusch-systems.de\r\n";
$from .= "Content-Type: text/html\r\n";

$text = new generateMail($data);
$mailText = $text->mailGeneration();

mail($empfaenger, $betreff, $mailText, $from);

?>
<div class="container">
    <div class="row" style="padding-top: 3rem !important;">
        <div class="col">
            <h1 class="text-center h3 mb-5 font-weight-normal">Thank you! ❤</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Danke für deine Zeit!<br>
                <br>
                An deine E-Mail-Adresse haben wir dir eine Zusammenfassung der angegebenen Daten geschickt. Insofern
                deine Einwilligung im vorigen Schritt gegeben hast, werden wir dich über diese E-Mail-Adresse auch auf
                dem neuesten Stand über diese Petition halten.<br>
                <br>
                Wenn du Fragen hast, kannst du jederzeit gerne eine Mail an <a
                        href="mailto:psw-internet@reusch-systems.de">psw-internet@reusch-systems.de</a> senden.
            </p>
            <div class="d-block d-sm-none">
                <hr>
            </div>
        </div>
        <div class="col-md-6">
            <p>Thanks for your time!<br>
                <br>
                We´ve sent you an mail with all your submitted data. If you agreed on that in the previous step, we will
                send you updates regarding the petition to that e-mail-adress, too.<br>
                <br>
                If you have any questions, please don´t hestitate to contact us by sending an e-mail to <a
                        href="mailto:psw-internet@reusch-systems.de">psw-internet@reusch-systems.de</a>.
            </p>
            <div class="d-block d-sm-none">
                <hr>
            </div>
        </div>
    </div>
    <?php include('classes/Footer.class.php'); ?>
</body>

</html>
