<?php
declare(strict_types=1);

function getTariffTotal(array $bills): float
{
    $total = 0;

    foreach ($bills as $bill) {
        $total += $bill->getPrice();
    }

    return $total;
}

$total = getTariffTotal($daytimeUnpaidBills) + getTariffTotal($nighttimeUnpaidBills);

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

    h3 {
        margin: 12px 0;
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    th,
    td {
        padding: 4px;
        text-align: center;
    }

    th:not(:last-child),
    td:not(:last-child) {
        border-right: 1px solid black;
    }

    th {
        border-bottom: 1px solid black;
    }

    hr {
        margin: 16px 0;
    }

    button {
        font-size: 18px;
        padding: 4px;
        border-color: #4b7722;
        background-color: #9db987;
    }

    #unpaid_bills,
    #get_back {
        border: 5px double black;
        width: 40vw;
        padding: 24px;
        margin-bottom: 36px;
    }

    #unpaid_bills > h2 {
        text-align: center;
        margin-bottom: 16px;
    }

    #total > p {
        text-align: end;
        margin-bottom: 4px;
        font-size: 18px;
    }

    .bold {
        font-weight: bold;
    }

    #pay {
        text-align: center;
    }

    #get_back {
        text-align: center;
    }
</style>
<html>
<body>
<img src="https://www.logodee.com/wp-content/uploads/2022/01/6.jpg">

<div id="unpaid_bills">
    <h2>UNPAID BILLS</h2>
    <div id="daytime_bills">
        <h3>Daytime</h3>
        <table>
            <tr>
                <th>Used kWh</th>
                <th>Price of 1 kWh (&euro;)</th>
                <th>Tariff</th>
                <th>Amount</th>
            </tr>
            <?php foreach ($daytimeUnpaidBills as $bill): ?>
            <tr>
                <td><?= $bill->getUsedKwh() ?></td>
                <td><?= $bill->getOneKwhPrice() ?></td>
                <td><?= $bill->getTariff() ?></td>
                <td><?= $bill->getPrice() ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div id="nighttime_bills">
        <h3>Nighttime</h3>
        <table>
            <tr>
                <th>Used kWh</th>
                <th>Price of 1 kWh (&euro;)</th>
                <th>Tariff</th>
                <th>Amount</th>
            </tr>
            <?php foreach ($nighttimeUnpaidBills as $bill): ?>
            <tr>
                <td><?= $bill->getUsedKwh() ?></td>
                <td><?= $bill->getOneKwhPrice() ?></td>
                <td><?= $bill->getTariff() ?></td>
                <td><?= $bill->getPrice() ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div id="total">
        <hr>
        <p class="bold">Total:</p>
        <p><?= $total ?> &euro;</p>
    </div>
    <div id="pay">
        <form method="post" action="/PHP_practise_test/ElectricalBillProject/">
            <button type="submit" name="paid">Declare and Pay</button>
        </form>
    </div>
</div>
<div id="get_back">
    <a href='/PHP_practise_test/ElectricalBillProject/'>GET BACK</a>
</div>
</body>
</html>



