<?php

/**
 * Login
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
?>
<div class="container">
    <div class="row" style="padding-top: 3rem !important;">
        <div class="col">
            <h1 class="text-center h3 mb-5 font-weight-normal">Willkommen / Welcome!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Liebe Mitbewohner,<br>
                <br>
                Immer wieder hört man Beschwerden darüber, dass die Internetgeschwindigkeit hier im PSW sehr
                schlecht
                ist, teilweise ist die Verbindung extrem langsam oder bricht gar regelmäßig komplett ab.
                Gerade jetzt in Zeiten von Onlinelehre, ist das inakzeptabel. Wir möchten daher im ersten Schritt
                erheben, wie viele Personen tatsächlich regelmäßig Probleme mit dem Internet haben und bitten euch
                daher
                Formular auszufüllen, wenn ihr Bewohner des PSW seid und regelmäßig Probleme mit
                Verbindungsabbrüchen,
                der Download- oder Uploadgeschwindigkeit der Netzwerkverbindung habt. Sobald genug Unterschriften
                zusammenkommen sind, wird diese Liste an das Studentenwerk weitergegeben, mit der nachdrücklichen
                Forderung, das Problem zeitnah anzugehen.<br>
                <br>
                Danke für eure Mithilfe.
            </p>
            <div class="d-block d-sm-none">
                <hr>
            </div>
        </div>
        <div class="col-md-6">
            <p>Dear tenants,<br>
                <br>
                You keep hearing complaints about the internet-connection being very bad here in the PSW – abrupt
                disconnections and slow speeds seem to be a real problem for many tenants.
                With the onset of corona and the constant need for steady and usable internet, the inability to stream
                and daily shutdowns of which have become regular for months now, are unacceptable. By signing this you
                are a resident of PSW who agrees with the above, also experience these problems and requests a solution
                be found as soon as possible.<br>
                <br>
                Thank you.
            </p>
            <div class="d-block d-sm-none">
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col-sm-4 mx-auto">
                <form action="step2.php" method="get">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Room Number" aria-label="Room Number"
                               aria-describedby="button-addon2" id="roomNumber" name="roomNumber" min="1000" max="8000" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Authenticate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('classes/Footer.class.php');?>
</body>

</html>
