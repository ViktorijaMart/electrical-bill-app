<?php
declare(strict_types=1);

if (!isset($errorMessage)) {
    $errorMessage = '';
}
?>

<!DOCTYPE html>
<style>
    * {
    margin: 0;
    padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    img {
        height: 240px;
    }

    a {
        display: inline-block;
        color: black;
        cursor: pointer;
    }

    a,
    h2 {
        font-size: 20px;
    }

    h2 {
        margin-bottom: 16px;
    }

    input,
    label,
    select {
        margin-bottom: 12px;
    }

    label {
        font-size: 18px;
    }

    input,
    select {
        height: 20px;
    }

    button {
        font-size: 18px;
        padding: 4px;
        border-color: #4b7722;
        background-color: #9db987;
    }

    #payment,
    #form {
        border: 5px double black;
        width: 40vw;
        text-align: center;
    }

    #payment {
        margin-bottom: 32px;
        padding: 24px;
    }

    #form {
        padding-bottom: 24px;
    }

    #form > h2 {
        margin-top: 24px;
    }

    .error {
        padding: 8px 0;
        background-color: #c74747;
        color: white;
        font-size: 18px;
    }
</style>
<html>
    <body>
        <img src="https://www.logodee.com/wp-content/uploads/2022/01/6.jpg">
        <div id="payment">
            <a href='electricalBills/unpaidBills'>GO TO PAYMENT</a>
        </div>
        <div id="form">
            <?php
            if (!empty($errorMessage)) {
               echo "<p class='error'>$errorMessage</p>";
            }
            ?>
            <h2>ADD NEW BILL</h2>
            <form method="post" action='electricalBills/unpaidBills'>
                <label for="usedKwh">Used kWh total:</label> <br/>
                <input type="number" name="usedKwh"> <br/>
                <label for="priceOfOneKwh">Price of 1 kWh (&euro;):</label> <br/>
                <input type="number" step="0.01" name="priceOfOneKwh"> <br/>
                <label for="tariff">Select tariff</label> <br/>
                <select name="tariff">
                    <option value="daytime">Daytime</option>
                    <option value="nighttime">Nighttime</option>
                </select> <br/>
                <label for="month">Enter the month you want to pay for:</label> <br/>
                <input type="month" name="month"> <br/>
                <button type="submit">Calculate price</button>
            </form>
        </div>
    </body>
</html>