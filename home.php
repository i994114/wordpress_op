<?php  
/*
Template Name: Home　〜トップページ〜
*/
?>
<!-- ヘッダー -->
<?php get_header(); ?>

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

        <!-- みっつ目見出し -->
        <div id="wrapper-outi">
            <div class="container">
                <div class="fas fa-bread-slice"></div>
                <?php dynamic_sidebar('広告記載エリア') ?>
            </div>
        </div>

        <!-- よっつ目見出し -->
        <div id="wrapper-raw">
            <div class="container">
                <div class="fab fa-pagelines"></div>
                <h2><?php echo get_post_meta($post->ID, 'pop4_title', true); ?></h2>
                <div class="raw-figure">
                    <img src="<?php echo get_post_meta($post->ID, 'pop4_img1', true); ?>">
                </div>
                <p>
                    <?php echo get_post_meta($post_id, 'pop4_msg', true); ?>
                </p>
            </div>
        </div>


        <div id="wrapper-menu">
            <div class="container">
                <div class="fas fa-book-open"></div>
                <h2>メニュー&料金</h2>
                <div id="wapper-opti-menu">
                    <h2>オプティボロール詳細</h2>
                    <p>
                        《オプティボロール講座》<br>
                        36.000円（税込 39.600円）<br><br>
    
                        キット1セットご希望 の方  講座料＋7.700円<br>
                        2セットご希望の方  講座料＋13.<br><br>
                        
                        《体験1day  対面のみ》<br>
                        5.000円  (税込5.500円)<br><br>
    
                        好きなｲﾗｽﾄ<br>
                        or<br>
                        指定ﾓﾁｰﾌ<br><br>
    
                        生地の簡易レシピ付き<br><br>
    
                        🌸こんな方にオススメ🌸<br>
                        ・講座を受講する前に1度体験してみたい方<br>
                        ・大切な方の記念日に好きなイラストで作って贈りたい方<br>
                        ・可愛いロールケーキを作ってみたい方<br>
                        ・しの先生デザインのロールケーキを作りたい方<br>
                    </p>
                </div>
 
                <div id="wrapper-kantan-menu">
                    <h2>かんたんおやつ</h2>
                    <ul>
                        <li>かんたんシフォン(プレーン)</li>
                        <li>シフォンロールケーキ</li>
                        <li>カボチャのマフィン</li>
                        <li>ビスコッティ</li>
                        <li>ヨーグルトレアケーキ</li>
                        <li>りんごのクランブル</li>
                        <li>チョコムース</li>
                        <li>米粉パンケーキ</li>
                        <li>かんたんチョコ蒸しパン</li>
                        <li>ヨーグルトを使ったかんたんピザ</li>
                        <li>ほっとアップルケーキ</li>
                        <li>アイスクリーム</li>
                        <li>豆乳バニラアイスクリーム</li>
                        <li>かんたんガトーショコラ</li>
                        <li>オイルのパウンドケーキ</li>
                        <li>ふわふわモチモチベベジ焼きドーナツ</li>
                        <li>キャラメルバナナブラウニー</li>
                        <li>米粉ビーガンクッキー</li>
                        <li>玄米クッキー</li>
                        <li>かぼちゃのヴィーガンパンケーキ</li>
                        <li>米粉ナッツクッキー</li>
                        <li>フラン風ココットスイーツ</li>
                        <li>米粉シフォン</li>
                        <li>かんたん米粉抹茶シフォン</li>
                        <li>かんたんふわふわチョコシフォン</li>
                        <li>かんたん紅茶シフォン</li>
                        <li>かんたん珈琲チョコチップシフォン</li>
                        <li>かんたん桜シフォン</li>                    
                    </ul>
                </div>

                <div id="wrapper-outipan">
                    <h2>おうちぱん</h2>
                    <ul>
                        <h3>基本のおうちパン</h3>
                        <li>ミルクスティックパン</li>
                        <li>ドデカフォッカッチャ</li>
                        <li>基本のフライパンパンとチーズパン</li>
                        <li>チョコスティックパン</li>
                        <li>ゴマチーズドデカパン</li>
                        <li>マンゴークリームチーズ</li>
                        <li>フライパンであんぱん</li>
                        <h3>切りっぱなしパン</h3>
                        <li>コーンパン</li>
                        <li>ふわふわ練乳パン</li>
                        <li>クランベリーホワイトチョコパン</li>
                        <li>全粒粉くるみパン</li>
                        <li>米粉ハムチーズパン</li>
                        <li>抹茶甘納豆パン</li>
                        <h3>離乳食</h3>
                        <li>あおき＆かつお節ステック</li>
                        <li>ほうれん草ステック</li>
                        <li>りんごドデカパン</li>
                        <li>かぼちゃの丸パン</li>
                        <li>ニンジン豆乳のさんかくパン</li>
                        <li>サツマイモのドデカパン</li>
                        <h3>ちょい足し酵母</h3>
                        <li>基本のスティックパン(ウィンナーロール)</li>
                        <li>ドデカリュスティック</li>
                        <li>ゴマのフライパンパン</li>
                        <li>ベーグル</li>
                        <li>食パン</li>
                        <li>ドデカピザ</li>
                        <li>くるみスコーンメープル</li>
                        <li>レーズンとくるみのスティック</li>
                        <h3>キッズレシピ秋11月</h3>
                        <li>とんぼパン</li>
                        <li>りんごパン</li>
                        <h3>切りっぱなしアレンジPart2</h3>
                        <li>巻かない塩パン</li>
                        <li>板チョコパン</li>
                        <li>ミルクフランス</li>
                        <h3>バレンタインアレンジ2020</h3>
                        <li>愛をさけぶ♡コロネ</li>
                        <li>ねじねじハードパン</li>
                        <li>ハートフライパンパン</li>
                        <h3>ハロフィンレシピ</h3>
                        <li>おばけナン</li>
                        <li>ミイラのウィンナーパン</li>
                        <li>カボチャのうずまきパン</li>
                        <h3>無水調理鍋レシピ5品</h3>
                        <li>混ぜるだけのバナナキャラメルパン</li>
                        <li>混ぜるだけの大人フォッカチャ</li>
                        <li>カンパーニュ</li>
                        <li>メイプルとアーモンドのモンキーグレード</li>
                        <li>簡単！即席パニーニ</li>                    
                    </ul>
                </div>

                <div id="wapper-raw-menu">
                    <h2>Raw</h2>
                    <ul>
                        <li>Rawグラノーラ</li>
                        <li>Rawキャラメル</li>
                        <li>Rawブラウニー</li>
                        <li>Rawチョコチップクッキー</li>
                        <li>Rawブリスボール</li>
                        <li>Rawチョコサラミ</li>
                        <li>チアジャム</li>
                        <li>Rawいちごジャム</li>
                        <li>チアシードプリン</li>
                        <li>かんたんRawアイスクリーム</li>
                        <li>アボカドチョコムース</li>
                        <li>Rawチーズケーキタルト</li>
                        <li>チョコマーブルケーキ</li>
                        <li>Rawチョコミントケーキ</li>
                        <li>アップルタルト</li>
                        <li>Rawカスタードクリーム</li>
                        <li>ナッツフリーアボカドチョコクリームタルト</li>
                        <li>いちぢくスパイスケーキ</li>
                        <li>Rawガトーショコラ</li>
                        <li>Rawカップケーキ</li>
                        <li>Rawバニラアイスクリーム</li>
                        <li>Rawロールケーキ</li>
                        <li>Rawパンナコッタ</li>
                        <li>Rawチョコレート</li>
                        <li>ナッツフリーRawドーナツ</li>
                        <li>Rawトリュフ</li>
                        <li>Rawアニバーサリーケーキ</li>
                        <li>Rawチョコレートケーキ</li>
                        <li>Rawモカケーキ</li>
                        <li>Rawチョコファッジ</li>                    
                    </ul> 

                </div>
            </div>
        </div>
        
        <div id="wrapper-profile">
            <div class="container">
                <div class="far fa-meh-blank"></div>
                <h2>講師紹介</h2>
                <figure>
                    <img src="pictures/Yurika.jpg">
                    <figcaption>Yurika</figcaption>
                </figure>
                <p>
                    「子育て中のママにちょっとでも和んでいただける場所を作りたい」<br><br>
                    このような思いで教室を立ち上げました。<br>
                    というのも、私自身が、子育て中に子供といっしょに出掛ける場所がなく、<br>
                    家に引きこもり辛かった思いをしたからです。<br><br>

                    "ゆっくり、まったりと、お話をしながら"<br><br>
                    
                    かんたんな愛情あふれる手作りのパンやおやつを一緒に作りましょう♡<br><br><br><br><br>

                
                    🌸資格🌸<br>
                    ・au petit bonheur認定　オプティボロール認定校<br>
                    ・一般社団法人かんたんおやつマイスター協会認定　かんたんおやつマイスター<br>
                    ・cotta認定　おうちパンマスター<br>
                    ・nanna認定　Rawスイーツクリエイター<br>
                    ・一般社団法人NSBA日本セルフde美マツゲ協会　セルフマツエク®インストラクター<br>
                    ・ptitplaisir認定　甜菜糖アイシングクッキー認定講師<br>
                    ・一般社団法人ジャパンフラフィヘアエクステンション協会認定  フラエク施術者<br> 
                    
                </p>
 
            </div>
            <div id="wrapper-info">
                <a href="https://www.instagram.com/youlijiadalu" class="btn inst"><span class="fab fa-instagram"></span>Instagramはこちら</a>
                <a href="https://profile.ameba.jp/ameba/yurika-snd" class="btn facebook"><span class="fas fa-blog"></span>アメブロはこちら</a>
            </div>
        </div>
        <div id="qa-form">
            <div class="container qa-back">
                <div class="far fa-paper-plane"></div>
                <h2>お問い合わせ</h2>
                <p>
                    レッスンについて、何かあればこちらでご連絡ください。<br>
                    なんでもよいですよ～。<br><br>

                    例えばこんな感じで。<br>
                    ・レッスンを予約したい<br>
                    ・レッスンの内容を問い合わせたい<br>
                    ・レッスン日時や場所を調整したい<br>
                </p>
                <div class="animated bounce infinite">↓どうぞお気軽に↓</div><br>
                <div class="far fa-envelope">mail<br>nagomine.ena@gmail.com<br></div><br><br>
                <div class="fab fa-line">Line</div>
 
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

