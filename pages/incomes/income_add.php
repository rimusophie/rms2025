<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title>所得追加</title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
?>
        <div class="row mt-3">
            <div class="col">所得追加</div>
        </div>

        <form action="./income_create.php" method="post" class="mt-3">
        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <td>日付</td>
                    <td><input type="date" id="receive_date" class="common-textbox" name="receive_date"/></td>
                </tr>

                <tr>
                    <td>種別</td>
                    <td>
                        <select id="type" class="common-combobox" name="type">
                            <option value="0">不明</option>
                            <option value="1">月給</option>
                            <option value="2">賞与</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>総支給額</td>
                    <td><input type="number" id="total_amount_paid" class="common-textbox" name="total_amount_paid"/></td>
                </tr>

                <tr>
                    <td>所得税</td>
                    <td><input type="number"  id="income_tax"  class="common-textbox" name="income_tax"/></td>
                </tr>

                <tr>
                    <td>住民税</td>
                    <td><input type="number"  id="resident_tax"  class="common-textbox" name="resident_tax"/></td>
                </tr>

                <tr>
                    <td>社会保険料</td>
                    <td><input type="number"  id="social_insurance_premiums"  class="common-textbox" name="social_insurance_premiums"/></td>
                </tr>

                <tr>
                    <td>支払者</td>
                    <td><input type="text"  id="payer"  class="common-textbox" name="payer"/></td>
                </tr>
            </table>
            
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center ps-0 pe-0">
                <button type="submit" class="w-100 h-100 common-header-link align-middle">登録</button>
            </div>
            </div>
        </form>
<?php 
include(__DIR__ . "/../../includes/footer.php");
?>
    </div>
</body>
</html>