<?php



class PawaPay{


  private  $token = "";
  private  $environment = "live"; // live/sandbox
  private $url = "https://api.sandbox.pawapay.io";
  
  //Initialise constructor for setting up the endpoint url
  function __construct()
  {
    if ($this->environment == "live")
    {
      $this->url = "https://api.pawapay.io";

    }
  }

  //Function for generating UUID version 4
  private function generateUUIDv4() {
    // Generate random bytes
    $data = openssl_random_pseudo_bytes(16);
  
    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 0100
    // Set bits 6 and 2 of the clock_seq_hi_and_reserved to random values
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
  
    // Convert to UUID format
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
  
   
  //Function for initalising a payment request
  public function deposit($transactionName, $amount, $currency, $country,$correspondent, $customerName, $customerEmail, $customerPhone)
  {
    //UUID ID generator
      $uuid = $this->generateUUIDv4();


      $curl = curl_init();
      
      curl_setopt_array($curl, [
          CURLOPT_URL => $this->url."/deposits",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{
              \"depositId\": \"".$uuid."\",
              \"amount\": \"".$amount."\",
              \"currency\": \"".$currency."\",
              \"country\": \"".$country."\",
              \"correspondent\": \"".$correspondent."\",
              \"payer\": {
                  \"type\": \"MSISDN\",
                  \"address\": {
                      \"value\": \"".$customerPhone."\"
                  }
              },
              \"customerTimestamp\": \"2020-02-21T17:32:28Z\",
              \"statementDescription\": \"".$transactionName."\",
              \"metadata\": [
                  {
                      \"fieldName\": \"orderId\",
                      \"fieldValue\": \"ORD-B234x6789\"
                  },
                  {
                      \"fieldName\": \"customerId\",
                      \"fieldValue\": \"".$customerEmail."\",
                      \"isPII\": true
                  }
              ]
          }",
          CURLOPT_HTTPHEADER => [
              "Authorization: Bearer ".$this->token."",
              "Content-Type: application/json"
          ],
      ]);
      

      $response = curl_exec($curl);
      $result = json_decode($response);
      curl_close($curl);





      //Return checkout link or json data
      return array($result, $uuid);
        }


  //Verify transaction
  
  public function verifyTransaction($depositId)
  {
      $curl = curl_init();

      curl_setopt_array($curl, [
          CURLOPT_URL => $this->url."/deposits/".$depositId."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
              "Authorization: Bearer ".$this->token.""
          ],
      ]);
      
      $response = curl_exec($curl);
      $result = json_decode($response);
      
      curl_close($curl);
      
      $tran_status = "pending";
      
      // Check if the result is an array and access the first object's status
      if (isset($result[0]) && isset($result[0]->status)) {
          $status = $result[0]->status;
      
          if ($status == "COMPLETED") {
              $tran_status = "success";
          } elseif ($status == "FAILED") {
              $tran_status = "rejected";
          } else {
              $tran_status = "pending";
          }
      } 


      return ["result"=>$result,"tran_status"=>$tran_status];
  }  
      }
