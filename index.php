<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500">
     <title>PawaPay payment form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway+Dots">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/News-article-for-homepage-by-Ikbendiederiknl.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script>
    // Data mapping for operators and currencies
    const data = {
        BEN: {
            operators: [
                { value: "MTN_MOMO_BEN", label: "MTN Money Benin" },
                { value: "MOOV_BEN", label: "Moov Benin" },
            ],
            currencies: ["XOF"]
        },
        BFA: {
            operators: [
                { value: "MOOV_BFA", label: "Moov Burkina Faso" },
                { value: "ORANGE_BFA", label: "Orange Money Burkina Faso" },
            ],
            currencies: ["XOF"]
        },
        CMR: {
            operators: [
                { value: "MTN_MOMO_CMR", label: "MTN Money Cameroon" },
                { value: "ORANGE_CMR", label: "Orange Money Cameroon" },
            ],
            currencies: ["XAF"]
        },
        CIV: {
            operators: [
                { value: "MTN_MOMO_CIV", label: "MTN Money Côte d'Ivoire" },
                { value: "ORANGE_CIV", label: "Orange Money Côte d'Ivoire" },
            ],
            currencies: ["XOF"]
        },
        COD: {
            operators: [
                { value: "VODACOM_MPESA_COD", label: "Mpesa DRC" },
                { value: "AIRTEL_COD", label: "Airtel Money DRC" },
                { value: "ORANGE_COD", label: "Orange Money DRC" },
            ],
            currencies: ["CDF", "USD"]
        },
        GAB: {
            operators: [
                { value: "AIRTEL_GAB", label: "Airtel Gabon" }
            ],
            currencies: ["XAF"]
        },
        GHA: {
            operators: [
                { value: "MTN_MOMO_GHA", label: "MTN Money Ghana" },
                { value: "AIRTELTIGO_GHA", label: "AirtelTigo Money Ghana" },
                { value: "VODAFONE_GHA", label: "Vodafone Ghana" },
            ],
            currencies: ["GHS"]
        },
        KEN: {
            operators: [
                { value: "MPESA_KEN", label: "Mpesa Kenya" }
            ],
            currencies: ["KES"]
        },
        MWI: {
            operators: [
                { value: "AIRTEL_MWI", label: "Airtel Malawi" },
                { value: "TNM_MWI", label: "TNM Malawi" },
            ],
            currencies: ["MWK"]
        },
        MOZ: {
            operators: [
                { value: "VODACOM_MOZ", label: "Vodacom Mozambique" }
            ],
            currencies: ["MZN"]
        },
        NGA: {
            operators: [
                { value: "AIRTEL_NGA", label: "Airtel Nigeria" },
                { value: "MTN_MOMO_NGA", label: "MTN Money Nigeria" },
            ],
            currencies: ["NGN"]
        },
        COG: {
            operators: [
                { value: "AIRTEL_COG", label: "Airtel Congo" },
                { value: "MTN_MOMO_COG", label: "MTN Money Congo" },
            ],
            currencies: ["XAF"]
        },
        RWA: {
            operators: [
                { value: "AIRTEL_RWA", label: "Airtel Rwanda" },
                { value: "MTN_MOMO_RWA", label: "MTN Money Rwanda" },
            ],
            currencies: ["RWF"]
        },
        SEN: {
            operators: [
                { value: "FREE_SEN", label: "Free Senegal" },
                { value: "ORANGE_SEN", label: "Orange Money Senegal" },
            ],
            currencies: ["XOF"]
        },
        SLE: {
            operators: [
                { value: "ORANGE_SLE", label: "Orange Money Sierra Leone" }
            ],
            currencies: ["SLE"]
        },
        TZA: {
            operators: [
                { value: "AIRTEL_TZA", label: "Airtel Tanzania" },
                { value: "VODACOM_TZA", label: "Vodacom Tanzania" },
                { value: "TIGO_TZA", label: "Tigo Tanzania" },
                { value: "HALOTEL_TZA", label: "Halotel Tanzania" },
            ],
            currencies: ["TZS"]
        },
        UGA: {
            operators: [
                { value: "AIRTEL_OAPI_UGA", label: "Airtel Uganda" },
                { value: "MTN_MOMO_UGA", label: "MTN Money Uganda" },
            ],
            currencies: ["UGX"]
        },
        ZMB: {
            operators: [
                { value: "AIRTEL_OAPI_ZMB", label: "Airtel Zambia" },
                { value: "MTN_MOMO_ZMB", label: "MTN Money Zambia" },
                { value: "ZAMTEL_ZMB", label: "Zamtel Zambia" },
            ],
            currencies: ["ZMW"]
        }
    };

    // Function to update dropdown options
    function updateOptions(selectId, options) {
        const select = document.getElementById(selectId);
        select.innerHTML = '<option value="">Select an option</option>';
        options.forEach(option => {
            const opt = document.createElement("option");
            opt.value = option.value || option;
            opt.textContent = option.label || option;
            select.appendChild(opt);
        });
    }

    // Function to handle country selection
    function onCountryChange() {
        const country = document.getElementById("countries").value;
        if (data[country]) {
            updateOptions("currencies", data[country].currencies);
            updateOptions("operators", data[country].operators);
        } else {
            updateOptions("currencies", []);
            updateOptions("operators", []);
        }
    }
</script>

</head>

<body>

    <section class="highlight-blue" style="background: rgb(58,70,86);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">PawaPay Payment Form</h2>
            </div>
        </div>
    </section>
    <div class="news-block" style="padding-top: 0px;">
        <section class="login-clean">
            <form action="inc/submit.inc.php" method="post" style="max-width: 100%;">
                <br>
                <label class="form-label">Full Name</label>

                <input type="text" name="full_name" placeholder="Your Full Name" class="form-control" />
                <br>
                <label class="form-label">Email Address</label>


                <input type="email" name="email" placeholder="Your Email Address" class="form-control" />
                <br>
                <label class="form-label">Country</label>
                <select class="form-control" name="country" id="countries" onchange="onCountryChange()">
                <option value="">Select Country</option>
                <option value="BEN">Benin</option>
                <option value="BFA">Burkina Faso</option>
                <option value="CMR">Cameroon</option>
                <option value="CIV">Côte d'Ivoire (Ivory Coast)</option>
                <option value="COD">Democratic Republic of the Congo (DRC)</option>
                <option value="GAB">Gabon</option>
                <option value="GHA">Ghana</option>
                <option value="KEN">Kenya</option>
                <option value="MWI">Malawi</option>
                <option value="MOZ">Mozambique</option>
                <option value="NGA">Nigeria</option>
                <option value="COG">Republic of the Congo</option>
                <option value="RWA">Rwanda</option>
                <option value="SEN">Senegal</option>
                <option value="SLE">Sierra Leone</option>
                <option value="TZA">Tanzania</option>
                <option value="UGA">Uganda</option>
                <option value="ZMB">Zambia</option>
            </select>
                <br>
                <label class="form-label">Currency</label>

                <select required name="currency" class="form-control" id="currencies">
                    <option value="">Select Currency</option>
                </select>
                <br>
                <label class="form-label">Mobile Money Operator</label>

                <select required class="form-control" name="correspondent" id="operators">
                    <option value="">Select Mobile Money Operator</option>
                </select>
                <br>
                <label class="form-label">Full Mobile money Number</label>

                <input required="" type="number" class="form-control" name="phone_number" placeholder="Full Mobile Money number (e.g., 260968793843)">
                <br>
                <label class="form-label">Amount</label>

                <input required="" type="number" class="form-control" name="amount" placeholder="Amount">
                <br>
                <label class="form-label">Payment Description</label>

                <textarea required="" class="form-control" cols="10" name="description" placeholder="Payment description"></textarea>
                <br>
                <button class="btn btn-success" type="submit" name="submit_btn">CONTINUE</button>
            </form>
        </section>
    </div>

</body>

</html>
