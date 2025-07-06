<?php

require_once(__DIR__ . '/qualification_common.php');
require_once(__DIR__ . '/../../utils/db.php');

$page_title_text = QualificationCommon::PAGE_TITLE_LIST;
$common_link_text = QualificationCommon::PAGE_TITLE_ADD;
$common_link_href = QualificationCommon::HREF_ADD;

$pdo = get_db();
$sql = '
    SELECT 
        q.id AS q_id,
        q.name AS q_name,
        q.acquisition_date AS q_acquisition_date
    FROM
        qualifications AS q 
    ORDER BY 
        q.acquisition_date DESC
';
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= QualificationCommon::PAGE_TITLE_LIST ?></title>
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
include(__DIR__ . '/../../includes/page_title.php');
include(__DIR__ . '/../../includes/common_link.php');
?>

        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <th><?= QualificationCommon::PAGE_ITEM_ACQUISITION_DATE ?></th>
                    <th><?= QualificationCommon::PAGE_ITEM_NAME ?></th>
                    <th><?= Constants::PAGE_OPERATION ?></th>
                </tr>
<?php foreach($result as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['q_acquisition_date'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['q_name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><a href="./qualification_edit.php?id=<?= urlencode($row['q_id']) ?>" class="common-link"><?= Constants::PAGE_EDIT ?></a></td>
                </tr>
<?php endforeach; ?>

            </table>
            </div>
        </div>
<?php 
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>