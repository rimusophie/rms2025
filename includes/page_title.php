<?php
if(isset($page_title_text) && !empty($page_title_text)) {
    $page_title_text = htmlspecialchars($page_title_text, ENT_QUOTES, 'UTF-8');
} else {
    $page_title_text = '';
}
?>
<div class="row mt-3">
    <div class="col">
        <h1><?= $page_title_text ?></h1>
    </div>
</div>