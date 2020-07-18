<?php
        require 'vendor/autoload.php';
        use AfricasTalking\SDK\AfricasTalking;


        $response = '{
            "ResultCode":0,
            "ResultDesc":"Confirmation recieved successfuly"
        }';
        
        
        /*
        
        
        Extract field values from the post data.
        
        */
        
        $callback=file_get_contents('php://input');
    
    
    
            $myfile = fopen("newfile.json", "w") or die("Unable to open file!");
            
            fwrite($myfile, $callback);
            
            fclose($myfile);
                
    
    
        $jsonMpesaResponse = json_decode($callback,true);
        
        
        $amount=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['0']['Value'];
        
        $MpesaReceiptNumber=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['1']['Value'];
        
        $MerchantRequestID=$jsonMpesaResponse['Body']['stkCallback']['MerchantRequestID'];
        
        $CheckoutRequestID=$jsonMpesaResponse['Body']['stkCallback']['CheckoutRequestID'];
        
        if($jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['2']['Name']==='Balance')
        {
            $TransactionDate=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['3']['Value'];
        
        $PhoneNumber=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['4']['Value'];
        }
        else
        {
            $TransactionDate=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['2']['Value'];
        
        $PhoneNumber=$jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['3']['Value'];
        }
        
        
        
        try{
                $hostname="localhost";
                $db="tecuri_pms";
                $Username="tecuri_qwerty";
                $Password="qwerty2020@";
                
                $sql_connection = mysqli_connect($hostname, $Username, $Password, $db);
                
                $sql = "INSERT INTO Mpesa (Amount,MpesaReceiptNumber,TransactionDate,PhoneNumber,MerchantRequestID,CheckoutRequestID)
                        VALUES ('$amount','$MpesaReceiptNumber','$TransactionDate','$PhoneNumber','$MerchantRequestID','$CheckoutRequestID')";
                        
                        
                if (mysqli_query($sql_connection, $sql)) {
                     
               echo $response; 
                }
                else
                {
                    mysqli_close($sql_connection);
                }
                
                
                
        }
        catch(PDOException $exception)
        {
            echo $response;
        }
        
        
            // Set your app credentials
    $username   = "smartieangie";
    $apiKey     = "98672b4c531d8834ef09e8567d80f3c9873664027285487280317a863";
    
    // post URL Aso endpoint????
    // $postUrl = "https://api.africastalking.com/version1/user";
    
    
    
    // Initialize the SDK
    $AT         = new AfricasTalking($username, $apiKey);
    
    // Get the SMS service
    $sms        = $AT->sms();
    
    // Set the numbers you want to send to in international format
    $recipients = "+254702755729";
    
    // Set your message
    $message    = "Mpesa Payment recieved. Your parking spot has been reserved for you";
    
    // Set your shortCode or senderId
    $from       = "Parking";
    
    try {
        // Thats it, hit send and we'll take care of the rest
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,
            'from'    => $from
        ]);
    
        print_r($result);
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
        
?>