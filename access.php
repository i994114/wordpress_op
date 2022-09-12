<?php 
/*
Template Name: Access〜住所やWeb情報〜
*/
?>

<!-- ヘッダ -->
<?php get_header(); ?>

<!-- メニュー -->
<?php get_template_part('content', 'menu'); ?>

<div id="main">

    <!-- blog_list -->
    <section id="map">
        <h1 class="title"><?php get_the_title(); ?></h1>
        <div id="content">
            <?php get_post_meta($post->ID, 'map', 'true'); ?>
        </div>					
    </section>
    
    <section id="shop_info" class="site-width">
        <?php if (have_posts()):  ?>
            <?php while (have_posts()): the_post(); ?>
                <div id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="post">
                <h2>記事はありません。。</h2>
                <p>お探しの記事はみつかりませんでした。。</p>
            </div>
        <?php endif; ?>
    </section>
</div>
<!-- フッター -->
<?php get_footer(); ?>
