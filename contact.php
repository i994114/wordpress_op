<?php 
/*
Template Name: Contact　〜お問い合わせ〜
*/
?>

<!-- ヘッダー -->
<?php get_header(); ?>

<!-- メニュー -->
<?php get_template_part('content', 'menu'); ?>

<div id="qa-form">
    <div class="container qa-back">
        <div class="far fa-paper-plane"></div>
        <h2><?php echo get_the_title(); ?></h2>
        <p>
            <?php echo get_post_meta($post->ID, 'contact', true); ?>
        </p>

        <div class="animated bounce infinite">↓どうぞお気軽に↓</div><br>

        <form>
            <ul>
                <li class="short-qa qa-name">
                    <label class="label">氏名</label>
                    <input class="inputs" type="text" name="name"><br>
                </li>    
                <li class="short-qa qa-email">
                    <label class="label">メールアドレス</label>
                    <input class="inputs" type="email" name="mail"><br>
                </li>
                <li class="qa-text">
                    <label class="label">問い合わせ内容</label>
                    <textarea class="inputs"></textarea><br>
                </li>

                <li class="qa-submit">
                    <div class="txbtn">
                        <input type="submit" value="送信"><br>
                    </div>
                </li>
            </ul>
        </form>
            
    </div>
</div>
<!-- フッター -->
<?php get_footer(); ?>