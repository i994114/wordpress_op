<?php  
/*
Template Name: Home　〜トップページ〜
*/
?>
<!-- ヘッダー -->
<?php get_header(); ?>


<!-- いったんはカスタムフィールドでもともとのサイトとおりに作成したが、手間なのと、そのままだとカスタムウィジェットをつかう機会がないので、 -->
<!-- 今回は、各宣伝部分は、ひとつめはカスタムフィールド、のこりはカスタムウィジェットですべて中央揃えにすることとする。 -->

<!-- メニュー -->
<?php get_template_part('content', 'menu'); ?>
        <div id="main-visual">
            <div class="container">
                <h1 class="animated fadeindown slow">nagomine</h1>
                <h2 id="main-visual-h2" class="animated fadein delay-2s">"かんたんおやつ"及び"おうちパン"を提供する、子育てで忙しいママのための「癒し」の教室</h2>
                <h2 class="main-visual-h2-sub animated fadein slow">オプティボロール</h2>
                <h2 class="main-visual-h2-sub animated slow">かんたんおやつ</h2>
                <h2 class="main-visual-h2-sub animated fadein slow">おうちパン</h2>
                <h2 class="main-visual-h2-sub animated fadein slow">Raw</h2>
            </div>
        </div>
        
        <!-- ひとつ目見出し -->
        <div id="wrapper-opti-how">
            <div class="container">
                <div class="fas fa-birthday-cake"></div>
                <h2><?php echo get_post_meta($post->ID, 'pop1_title', true); ?></h2>
                <div class="rapper-opti-how-figure">
                    <img src="<?php echo get_post_meta($post->ID, 'pop1_img1', true); ?>">
                    <img src="<?php echo get_post_meta($post->ID, 'pop1_img2', true); ?>">
                </div>
                <p>
                    <?php echo get_post_meta($post->ID, 'pop1_msg', true); ?>
                </p>
            </div>
        </div>

        <!-- ふたつ目見出し -->
        <div id="wrapper-oyatsu">
            <div class="container">
                <div class="fas fa-cookie-bite"></div>
                <?php dynamic_sidebar('宣伝記載エリア'); ?>
            </div>
        </div>

 <!-- footer -->
 <?php get_footer(); ?>
