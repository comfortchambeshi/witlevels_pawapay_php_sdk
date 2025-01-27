<?php

if (isset($_GET['token'])) {
    include 'classes/PawaPay.php';
    $pawapay = new PawaPay();
    //$verify = $dpo->verifyTrans($_GET['token']);

    $verify = $pawapay->verifyTransaction($_GET['token']);

    

   

     
    $message = "Your transaction was not succesful";
    
    if ($verify['tran_status'] == "pending") {
    $status = "pending";
    } 

    if ($verify['tran_status'] == "success") {
        $status = "success";

        $message = 'Transaction successful!';
    } 

    if ($verify['tran_status'] == "rejected") {
        $status = "rejected";
        } 
    
    }

    echo '<h1>'.$message.'</h1>';

    echo '<br>DATA<hr>';
    echo json_encode($verify['result']);

?>
