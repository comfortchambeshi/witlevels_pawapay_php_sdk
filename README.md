# wit PawaPay PHP SDK
# Requirements:
- PawaPay account, https://www.pawapay.io/log-in
- PawaPay API Token

## Configurations
Open classes/PawaPay.php:
- Use your PawaPay token that you generated
- Choose the environment. If you are in testing mode, then add sandbox. If in production, add live.
  Here is the code snippet

```
   private  $token = ""; //Assign $token with your PawaPay token
   private  $environment = "sandbox"; // live/sandbox

```
## Make a Payment Request
To make a payment request, all you need is to just create a PawaPay object and call deposit method.
Here is an example shown:
  ```
  include_once '../classes/PawaPay.php';
  $pawapay = new PawaPay();

  //Call payment function
  //$pay = $pawapay->deposit($description, $amount, $currency, $country, $correspondent, $full_name, $email, $phone_number);
  //Call payment function

  $pay = $pawapay->deposit("Payment description here", "5", "ZMW", "ZMB", "AIRTEL_OAPI_ZMB", "Comfort Chambeshi", "witlevels04@gmail.com", "260972927679");

  
  
  ```
  NOTE: For country and supported correspondencies, please visit this PawaPay URL: https://docs.pawapay.io/using_the_api#correspondents


### Verifying Transaction
This endpoint allows to verify the transaction by a given deposit id.
   
    include 'classes/PawaPay.php';
    $pawapay = new PawaPay();
  
    $verify = $pawapay->verifyTransaction("deposit_id here");


Support us and help us grow by donating any amount using this link:
http://donatetowit.nyimboo.com/

For collaborations/Consulations:
Whatsapp only: +260968793843
Email: witlevels04@gmail.com
