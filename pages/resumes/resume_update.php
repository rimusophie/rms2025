<?php

require_once(__DIR__ . '/resume_common.php');
require_once(__DIR__ . '/../../utils/db.php');

$page_title_text = ResumeCommon::PAGE_TITLE_EDIT;
$common_link_text = ResumeCommon::PAGE_TITLE_LIST;
$common_link_href = ResumeCommon::HREF_LIST;

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= ResumeCommon::PAGE_TITLE_EDIT ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php

$result_msg_text = '';

try{
    /*
    $pdo = get_db();

    $sql = '
        UPDATE 
            resumes
        SET
            title = :title,
            summary = :summary,
            start_date = :start_date,
            end_date = :end_date
        WHERE 
            id = :id
    ';

    $pdo->beginTransaction();
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindValue(':summary', $_POST['summary'], PDO::PARAM_STR);
    $stmt->bindValue(':start_date', $_POST['start_date'], PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $_POST['end_date'], PDO::PARAM_STR);
    $stmt->execute();
    */
    $id = filter_input(INPUT_POST, Constants::HTML_NAME_ID, FILTER_VALIDATE_INT);
    $receive_date = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_RECEIVE_DATE, FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_TYPE, FILTER_VALIDATE_INT);
    $total_amount_paid = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_TOTAL_AMOUNT_PAID, FILTER_VALIDATE_INT);
    $income_tax = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_INCOME_TAX, FILTER_VALIDATE_INT);
    $resident_tax = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_RESIDENT_TAX, FILTER_VALIDATE_INT);
    $social_insurance_premiums = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_SOCIAL_INSURANCE_PREMIUMS, FILTER_VALIDATE_INT);
    $other = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_OTHER, FILTER_VALIDATE_INT);
    $payer = filter_input(INPUT_POST, IncomeCommon::HTML_NAME_PAYER, FILTER_SANITIZE_STRING);

    IncomeCommon::update($id,
                               $receive_date,
                               $type,
                               $total_amount_paid,
                               $income_tax,
                               $resident_tax,
                               $social_insurance_premiums,
                               $other,
                               $payer
    );

    // スキルの更新
    if (isset($_POST['skills']) && is_array($_POST['skills'])) {
        $resume_id = $_POST['id'];
        $sql_skill = '
            DELETE FROM resume_skills 
            WHERE resume_id = :resume_id
        ';
        $stmt_skill = $pdo->prepare($sql_skill);
        $stmt_skill->bindValue(':resume_id', $resume_id, PDO::PARAM_INT);
        $stmt_skill->execute();

        foreach ($_POST['skills'] as $skill_id) {
            $sql_insert_skill = '
                INSERT INTO resume_skills (
                    resume_id,
                    skill_id
                ) VALUES (
                    :resume_id,
                    :skill_id
                )
            ';
            $stmt_insert_skill = $pdo->prepare($sql_insert_skill);
            $stmt_insert_skill->bindValue(':resume_id', $resume_id, PDO::PARAM_INT);
            $stmt_insert_skill->bindValue(':skill_id', $skill_id, PDO::PARAM_INT);
            $stmt_insert_skill->execute();
        }
    }
    $pdo->commit();

    $result_msg_text = ResumeCommon::MESSAGE_UPDATE_SUCCESS;
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $result_msg_text = sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
}

?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
include(__DIR__ . '/../../includes/page_title.php');
include(__DIR__ . '/../../includes/result_msg.php');
include(__DIR__ . '/../../includes/common_link.php');
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>