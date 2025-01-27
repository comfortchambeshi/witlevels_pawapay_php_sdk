<?php

if (isset($_GET['token'])) {
    include 'classes/PawaPay.php';
    $pawapay = new PawaPay();
    //$verify = $dpo->verifyTrans($_GET['token']);

    $verify = $pawapay->verifyTransaction($_GET['token']);



    

   

    
    
    if ($verify['tran_status'] == "pending") {
    $status = "pending";
    } 

    if ($verify['tran_status'] == "success") {
        $status = "success";
    } 

    if ($verify['tran_status'] == "rejected") {
        $status = "rejected";
        } 
    echo json_encode(['status' => $status]);


    }

?>
