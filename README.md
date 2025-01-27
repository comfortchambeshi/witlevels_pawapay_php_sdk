# wit Broadpay PHP SDK
# Requirements:
- Broadpay account, https://gateway.broadpay.io/register
- Broadpay public and secrete keys, https://gateway.broadpay.io/dashboard/settings

## Configurations
Open classes/Sparcopay.php and replace "returnUrl" with your domain and root folder of your verify_pay.php as shown below:
> "returnUrl": "http://localhost/Sparco/verify_pay.php?ref='.$uuid.'",

!!!Warning, never remove ?ref='.$uuid.' parameter to whichever return url you would decide!!!
### Configure public key:
Open classes/Sparcopay.php and then RequestPay function.
>> public static $merchantPublicKey = "Your public key";
### Configure token
For easy token generation kindly use this online tool
https://10015.io/tools/jwt-encoder-decoder

On input enter:
>  {"pubKey":"your public key"}

On JWT Keys, enter your private key.

Copy your JWT payload to:
classes/Sparcopay.php, verifyTransaction and then token as shown:
> 'token: Your JWT token'

### Call For a payment

> $sparco = new Sparcopay();

> $pay = $sparco->RequestPay("Payment name", $amount, "ZMW", $first_name, $last_name, $email, $phone_number);

### Boom!!! Your Wit Sparco SDK is ready to go

