<?php

if(isset($_POST['submit'])){

    include '../include/smsAPIContr.php';

    $receiver = $_POST['receiver'];
    $message = $_POST['message'];
    $smsAPICode = "TR-ABUSO797310_ARKKT";
    $smsAPIPassword = "t)u4h25!s}";

    $send = new ItextMoController();
    $send->itexmo($receiver, $message, $smsAPICode, $smsAPIPassword);
    if ($send == false) {
       header("location: ../item2.php?error=itexmo: no response from server");
    }elseif ($send == true) {
       header ("location: ../item2.php?error=none");
    }else{
        header ("location: ../item2.php?error=something wrong just happen...");
    }
       
}
?>