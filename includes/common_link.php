<?php
if(isset($common_link_text) && !empty($common_link_text)) {
    $common_link_text = htmlspecialchars($common_link_text, ENT_QUOTES, 'UTF-8');
} else {
    $common_link_text = 'a';
}

if(isset($common_link_href) && !empty($common_link_href)) {
    $common_link_href = htmlspecialchars($common_link_href, ENT_QUOTES, 'UTF-8');
} else {
    $common_link_href = '#';
}
?>

<div class="row mt-3">
    <div class="col">
        <a href="<?= $common_link_href ?>" class="common-link"><?= $common_link_text ?></a>
    </div>
</div>