<?php

/**
 * Schritt 2
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
<html lang="en">

<?php
include('classes/Head.class.php');
$head = new Head;
$head->generateHead('PSW-Internetpetition (No official site!)');
?>

<body>
<?php
include('classes/Nav.class.php');
require("mysql.php");
// Checks if room-number already exists in Database
$stmt = "SELECT * FROM psw WHERE room_nr='" . $_GET['roomNumber'] . "'";
$roomNOExists = $mysql->query($stmt)->fetchColumn();
if ($roomNOExists > 0){
    echo '<div class="container">
            <div class="row" style="padding-top: 3rem !important;">
                <div class="col">
                <div class="alert alert-danger" role="alert">
                    You´ve already participated in the petition.
                    </div>
                </div>
            </div>
';
} else {

?>
<div class="container">
    <div class="row" style="padding-top: 3rem !important;">
        <div class="col">
            <h1 class="text-center h3 mb-5 font-weight-normal">Please fill out the form completely:</h1>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col">
            <form action="step3.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstNameInput">First Name*</label>
                        <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" maxlength="20"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastNameInput">Last Name*</label>
                        <input type="text" class="form-control" id="inputLastName" name="inputLastName" maxlength="30"
                               required>
                    </div>
                </div>
                <div class="form-row mb-5">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" maxlength="40"
                               required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="inputHouseNumber">House Number*</label>
                                <input type="number" class="form-control" id="inputHouseNumber" name="inputHouseNumber"
                                       min="3" max="7" step="2"
                                       required>
                            </div>
                            <div class="form-group col-6">
                                <label for="inputRoomNumber">Room number</label>
                                <input type="number" class="form-control" value="<?php echo $_GET['roomNumber']; ?>"
                                       required disabled>
                                <input type="number" class="form-control" value="<?php echo $_GET['roomNumber']; ?>"
                                       name="inputRoomNumber" required hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <p>I have experienced problems with:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="downloadSpeedCheck"
                               name="downloadSpeedCheck">
                        <label class="form-check-label" for="downloadSpeedCheck">
                            Download-Speed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="uploadSpeedCheck"
                               name="uploadSpeedCheck">
                        <label class="form-check-label" for="uploadSpeedCheck">
                            Upload-Speed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="disconnectionCheck"
                               name="disconnectionCheck">
                        <label class="form-check-label" for="disconnectionCheck">
                            Abrupt Disconnections
                        </label>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label for="problemDescription">If you want, you can describe your problems closer
                        here:</label>
                    <textarea class="form-control" id="problemDescription" rows="3"
                              name="problemDescription" maxlength="700"></textarea>
                </div>
                <p>Your real internet speed in numbers is the best argument we could present. Even if these fields
                    are not mandatory, they really help our mission, to make your internet faster! So, please take a
                    minute to perform a speedtest via the <a href="https://www.speedtest.net/">link</a> provided in the
                    Menu and enter
                    your results here:</p>
                <div class="form-row mb-5">
                    <div class="form-group col-md-4">
                        <label for="inputPing">Ping (ms)</label>
                        <input type="number" class="form-control" id="inputPing" name="inputPing" step="0.01" max="300">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputUpload">Upload (Mbps)</label>
                        <input type="number" class="form-control" id="inputUpload" name="inputUpload" step="0.01"
                               max="300">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputDownload">Download (Mbps)</label>
                        <input type="number" class="form-control" id="inputDownload" name="inputDownload" step="0.01"
                               max="300">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="followUp" name="followUp">
                    <label class="form-check-label" for="followUp">
                        I´m ok with receiving e-mails regarding the current state of the petition.<br>
                        German Version: Ich bin damit einverstanden, E-Mails zum aktuellen Stand der Petition zu
                        erhalten.
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="agreementCheck" name="agreementCheck"
                           required>
                    <label class="form-check-label" for="agreementCheck">
                        Your agreement check here.
                    </label>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
    <?php }
    include('classes/Footer.class.php'); ?>
</body>

</html>
