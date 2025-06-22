<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/common.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>トップページ</title>
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/includes/header.php");
?>
        <h1>一覧</h1>
        <ul>
            <li><a href="./pages/incomes/income_list.php" class="common-link">所得一覧</a></li>
        </ul>
<?php 
include(__DIR__ . "/includes/footer.php");
?>
    </div>
</body>
</html>