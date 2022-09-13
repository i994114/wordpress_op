<?php
/*
Template Name: About　〜講師紹介〜
*/
?>

<!-- ヘッダー -->
<?php get_header(); ?>

<!-- メニュー -->
<?php get_template_part('content', 'menu'); ?>

<!--講師紹介(人が増えてもいいように、ここはカスタムウィジェットで実装) -->
<div id="wrapper-profile">
    <div class="container">
        <div class="far fa-meh-blank"></div>
        <h2>講師紹介</h2>
        <?php dynamic_sidebar('講師紹介エリア'); ?>
    </div>
</div>

<!-- フッター -->
<?php get_footer(); ?>