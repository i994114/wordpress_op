<!--ヘッダ酔い込み-->
<?php get_header(); ?>

<!-- メニュー -->
<?php get_temlate_part('content', 'menu'); ?>

        <!--ここからメインビジュアル画像-->
        <div id="main_visual">
            <img src="images_kitchen/main_visual.jpg" alt="健やかな健康と豊かな食生活をはじめる">
        </div>
        <!--メインビジュアル画像ここまで-->
        <!--ここからwrapperー-->
        <div id="wrapper">
            <!--ここからメイン-->
            <div id="main">
                <section id="point">
                    <h2>TechAcademy KITCHENについて</h2>
                    <section>
                        <h3>食卓を豊かにしたい</h3>
                        <figure>
                            <img src="images_kitchen/photo01.jpg" alt="TechAcademy KITCHENについて1">
                            <figcaption>健康バランスを考えた食事</figcaption>
                        </figure>
                        <p>
                            健やかな人生は健やかな食生活から<br>
                            上手に料理が作れるだけでなく、食べる人の人生をも健やかにしていきたい。<br>
                            それが、TechAcademy KITCHENの思いです。
                        </p>
                    </section>
                    <section>
                        <h3>豊かな食生活を応援したい</h3>
                        <figure>
                            <img src="images_kitchen/photo02.jpg" alt="TechAcademy KITCHENについて2">
                            <figcaption>完成間近の作品</figcaption>
                        </figure>
                        <p>
                            食は文化の数だけあります。<br>
                            食生活が豊かだと、人生をも豊かになります。 <br>
                            多彩なカテゴリの料理を提供し、料理をする人、食べる人の生活も豊かにしていきたいと思っております。
                        </p>
                    </section>
                </section>
                <section id="news">
                    <h2>お知らせ</h2>
                    <ul>
                        <li>
                            <span>2018/09/01</span>
                            <a href="course.html">講座案内を更新しました</a>
                        </li>
                        <li>
                            <span>2018/08/31</span>
                            <a href="gallery.html">写真を追加しました</a>
                        </li>
                        <li>
                            <span>2018/08/24</span>
                            <a href="course.html">講座案内を更新しました</a>
                        </li>
                    </ul>
                </section>
            </div>
            <!--メインここまで-->
            <!--ここからサイド-->
            <aside id="sidebar">
                <section id="side_banner">
                    <h2>関連リンク</h2>
                    <ul>
                        <li>
                            <a href="https://techacademy.jp/magazine/" target="_blank"><img src="images_kitchen/banner01.jpg" alt="ブログ"></a>
                            <p>毎日季節の野菜を取り入れたレシピを公開中。</p>
                        </li>
                    </ul>
                </section>
            </aside>
            <!--サイドここまで-->
        </div>
        <!--wrapperここまで-->
<!-- フッター読み込み-->
<?php get_footer(); ?>