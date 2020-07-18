<?php

$connect= mysqli_connect("localhost", "tecuri_qwerty","qwerty2020@", "tecuri_pms");

 $filename = "CallbackResponseeee.json";

 $data = file_get_contents($filename);

 $array = json_decode($data, true);

// $sql = "INSERT INTO mpesaaa (`MerchantRequestID`, `CheckoutRequestID`, `ResultCode`, `ResultDesc`, `CallbackMetadataItem0Name`, `CallbackMetadataItem0Value`, `CallbackMetadataItem1Name`, `CallbackMetadataItem1Value`, `CallbackMetadataItem2Name`, `CallbackMetadataItem3Name`, `CallbackMetadataItem3Value`, `CallbackMetadataItem4Name`, `CallbackMetadataItem4Value`)
//         VALUES ('15935-4710548-1', 'ws_CO_080620201644026758', 0, 'The service request is processed successfully.', 'Amount', 1, 'MpesaReceiptNumber', 'OF89SBTURJ', 'Balance', 'TransactionDate', 20200608164411, 'PhoneNumber', 254702755729)";
    
    
   $sql =  "INSERT INTO mpesaaa(`CallbackMetadataItem0Name`, `CallbackMetadataItem0Value`, `CallbackMetadataItem1Name`, `CallbackMetadataItem1Value`, `CallbackMetadataItem2Name`, `CallbackMetadataItem3Name`, `CallbackMetadataItem3Value`, `CallbackMetadataItem4Name`, `CallbackMetadataItem4Value`)
            VALUES ('Amount', 30, 'MpesaReceiptNumber', 'OF96TC6DOW', 'Balance', 'TransactionDate', 20200609182201, 'PhoneNumber', 254702755729)";
    
    mysqli_query($connect ,$sql);
                        

 echo "data inserted";
?>