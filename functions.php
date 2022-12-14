<?php 
//カスタムヘッダー画像の設置
$custom_header_defaults = array(
    'default-image' => get_bloginfo('template_url').'/pictures/header-logo/logo.jpg',
    'header-text' => false,//ヘッダー画面上にテキストをかぶせる
);
//カスタムヘッダー機能を有効にする
add_theme_support('custom-header', $custom_header_defaults);

//カスタムメニュー使用
register_nav_menu('mainmenu', 'メインメニュー');

//ページネーション
function pagination($pages = '', $range = 2) {
    //ページネーションのアイコンの数を決める
    $showitems = ($range * 2) + 1;

    //現在のページ数をWP変数からもってくる
    global $paged;
    if (empty($paged)) $paged = 1;  //ない場合はデフォルトで1を指定する

    if ($pages == '') {
        global $wp_query;

        $pages = $wp_query->max_num_pages;  //全ページ数を取得
        if (!$pages) {
            $pages = 1;
        }
    } 

    if ($pages != 1) {
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";
        
        //「Prev」文字の表示:現在のページ数が1より大きい場合は表示
        if ($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

        //ページのアイコンの表示
        for ($i=1; $i<$pages; $i++) {
            if ($pages != 1 && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n" : "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }

        //「Next」文字の表示:現在のページ数が1より大きい場合は表示
        //if ($pages > $paged) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged + 1)."'>Next</a></li>\n";
        if ($pages > $paged) echo "<li class=\"prev\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
    }

}
//--------------
//カスタムフィールド
//--------------
add_action('admin_menu', 'add_custom_inputbox');
add_action('save_post', 'save_custom_postdata');

//----------------
//管理画面入力欄の定義
//----------------
function add_custom_inputbox() {
    //ひとつ目の見出し
    add_meta_box('pop1_title_id', '1つ目見出し', 'pop1_title_area', 'page', 'normal');
    add_meta_box('pop1_img1_id', '1つ目見出し画像1', 'pop1_img1_area', 'page', 'normal');
    add_meta_box('pop1_img2_id', '1つ目見出し画像2', 'pop1_img2_area', 'page', 'normal');
    add_meta_box('pop1_about_id', '説明入力欄', 'pop1_custom_area', 'page', 'normal');
    //Map
    add_meta_box('map_id', '地図', 'access_map', 'page', 'normal');
    //Contact
    add_meta_box('contact_id', '連絡先欄コメント', 'contact_msg', 'page', 'normal');
}
//--------------------------------
//管理画面入力欄の関数の実体
//(これがWordPress管理画面に表示される)
//--------------------------------

//ひとつ目の見出し
function pop1_title_area() {
    global $post;
    echo '宣伝1 見出し<textarea cols="30" rows="1" name="pop1_title">'.get_post_meta($post->ID, 'pop1_title', true).'</textarea><br>';
}
function pop1_img1_area() {
    global $post;
    echo '宣伝1 画像1: <textarea cols="50" rows="5" name="pop1_img1">'.get_post_meta($post->ID, 'pop1_img1', true).'</textarea><br>';
}
function pop1_img2_area() {
    global $post;
    echo '宣伝1 画像2:<textarea cols="50" rows="5" name="pop1_img2">'.get_post_meta($post->ID, 'pop1_img2', true).'</textarea><br>';
}
function pop1_custom_area() {
    global $post;
    
    echo ' 宣伝1 説明欄:<textarea cols="50" rows="10" name="pop1_msg">'.get_post_meta($post->ID, 'pop1_msg', true).'</textarea><br>';
}

//地図
function access_map() {
    global $post;
    echo 'Google map URL: <textarea cols="50" rows="5" name="map_url">'.get_post_meta($post->ID, 'map_url', true).'</textarea><br>';
}
//Contact msg
function contact_msg() {
    global $post;
    echo '問い合わせフォーム前のコメント：<textarea cols="50" rows="5" name="contact">'.get_post_meta($post->ID, 'contact', true).'</textarea>
    ';
}

//----------------------
//記事に表示する内容
//(DBに保存するための処理)
//---------------------
function save_custom_postdata($post_id) {
    $pop1_title = '';
    $pop1_img1 = '';
    $pop1_img2 = '';
    $pop1_msg = '';

    $map_url = '';

    $contact = '';

    //------------------------------------
    //カスタムフィールドに入力された情報を取り出す
    //------------------------------------
    //ひとつ目の見出し
    if (isset($_POST['pop1_title'])) {
        $pop1_title = $_POST['pop1_title'];
    }
    if (isset($_POST['pop1_img1'])) {
        $pop1_img1 = $_POST['pop1_img1'];
    }
    if (isset($_POST['pop1_img2'])) {
        $pop1_img2 = $_POST['pop1_img2'];
    }
    if (isset($_POST['pop1_msg'])) {
        $pop1_msg = $_POST['pop1_msg'];
    }

    //map
    if (isset($_POST['map_url'])) {
        $map_url = $_POST['map_url'];
    }

    //Contact
    if (isset($_POST['contact'])) {
        $contact = $_POST['contact'];
    }

    //-----------------------------------------
    //内容が変わっていた場合、保存していた情報を更新する
    //-----------------------------------------

    //ひとつ目の見出し
    if ($pop1_title != get_post_meta($post_id, 'pop1_title', true)) {
        update_post_meta($post_id, 'pop1_title', $pop1_title);
    } else if($pop1_title == '') {
        delete_post_meta($post_id, 'pop1_title', get_post_meta($post_id, 'pop1_title', true));
    }
    if ($pop1_img1 != get_post_meta($post_id, 'pop1_img1', true)) {
        update_post_meta($post_id, 'pop1_img1', $pop1_img1);
    } else if($pop1_img1 == '') {
        delete_post_meta($post_id, 'pop1_img1', get_post_meta($post_id, 'pop1_img1', true));
    }
    if ($pop1_img2 != get_post_meta($post_id, 'pop1_img2',true)) {
        update_post_meta($post_id, 'pop1_img2', $pop1_img2);
    } else if($pop1_img2 == '') {
        delete_post_meta($post_id, 'pop1_img2', get_post_meta($post_id, 'pop1_img2',true));
    }
    if ($pop1_msg != get_post_meta($post_id, 'pop1_msg', true)) {
        update_post_meta($post_id, 'pop1_msg', $pop1_msg);
    } else if($pop1_msg == '') {
        delete_post_meta($post_id, 'pop1_msg', get_post_meta($post_id, 'pop1_msg', true));
    }

    //map
    if ($map_url != get_post_meta($post_id, 'map_url', true)) {
        update_post_meta($post_id, 'map_url', $map_url);
    } else if ($map_url == '') {
        delete_post_meta($post_id, 'map_url', get_post_meta($post_id, 'map_url', true));
    }

    //Contact
    if ($contact != get_post_meta($post_id, 'contact', true)) {
        update_post_meta($post_id, 'contact', $contact);
    } else if ($contact == '') {
        delete_post_meta($post_id, 'contact', get_post_meta($post_id, 'contact', true));
    } 
}

//----------------
//カスタムウィジェット
//----------------
//h1画像
add_action('widgets_init', 'h1_area');
add_action('widgets_init', function(){register_widget( 'H1_Widget' );});

//宣言欄
add_action('widgets_init', 'pop1_area');
add_action('widgets_init', function(){register_widget( 'Pop1_Widget' );});

//Aboutページ
add_action('widgets_init', 'about_area');
add_action('widgets_init', function(){register_widget( 'About_Widget' );});

//--------------------
//ウィジェットエリアの作成
//--------------------
function h1_area() {
    register_sidebar(array(
        'name' => 'トップエリア',
        'id' => 'widget_h1',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ));
}

function pop1_area() {
    register_sidebar( array(
        'name' => '宣伝記載エリア',
        'id' => 'widget_pop',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ));
}
function about_area() {
    register_sidebar( array(
        'name' => '講師紹介エリア',
        'id' => 'widget_about',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ));
}

//------------------
//ウィジェット自体の作成
//------------------
//h1エリア
class H1_Widget extends WP_widget {
    public function __construct() {
        parent::__construct(false, $name = 'トップ画像');
    }
    
    function form($instance) {
        //ポスト送信されていたらサニタイズして変数に格納
        if (isset($_POST['h1_title'])) {
            $h1_title = $_POST['h1_title'];
        }
        if (isset($_POST['sub_title'])) {
            $sub_title = $_POST['sub_title'];
        }
?>
        <!-- h1タイトル -->
        <p>
            <label for="<?php echo $this->get_field_id('h1_title'); ?>">
                <?php echo 'h1タイトル:' ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('h1_title'); ?>" name="<?php echo $this->get_field_name('h1_title'); ?>" type="text" value="<?php echo $h1_title; ?>">
        </p>
        <!-- サブタイトル -->
        <p>
            <label for="<?php echo $this->get_field_id('sub_title'); ?>">
                <?php echo 'サブタイトル:' ?>
                <input class="widefat" id="<?php echo $this->get_field_id('sub_title'); ?>" name="<?php  echo $this->get_field_name('sub_title'); ?>" type="text" value="<?php echo $sub_title; ?>">
            </label>
        </p>
<?php
    }
    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['h1_title'] = strip_tags(($new_instance['h1_title']));
        $instance['sub_title'] = strip_tags($new_instance['sub_title']);

        return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($argc, $instance) {
        //配列を変数に格納
        extract($argc);

        //ウィジェットから入力された情報を取得
        $h1_title = apply_filters('widget_h1_title', $instance['h1_title']);
        $sub_title = apply_filters('widget_sub_title', $instance['sub_title']);

        if ($h1_title) {
?>
            <h1 class="animated fadeindown slow"><?php echo $h1_title; ?></h1>
            <h2 id="main-visual-h2" class="animated fadein delay-2s"><?php echo $sub_title; ?></h2>
<!--
            <h2 class="main-visual-h2-sub animated fadein slow">オプティボロール</h2>
            <h2 class="main-visual-h2-sub animated slow">かんたんおやつ</h2>
            <h2 class="main-visual-h2-sub animated fadein slow">おうちパン</h2>
            <h2 class="main-visual-h2-sub animated fadein slow">Raw</h2>
-->
<?php
        }
    }
}

//宣伝欄
class Pop1_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(false, $name = '宣伝1');
    }
    
    function form($instance) {
        //ポスト送信されていたらサニタイズして変数に格納
        if (isset($_POST['title'])) {
            $title = esc_attr($instance['title']);
        }
        if (isset($_POST['body'])) {
            $body = esc_attr($instance['body']);
        }
        if (isset($_POST['img'])) {
            $img = esc_attr($instance['img']);
        }
        if (isset($_POST['sub_logo'])) {
            $sub_logo = $_POST['sub_logo'];
        }
?>
        <!-- タイトル -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php echo 'タイトル:'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title')?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <!-- 画像 -->
        <p>
            <label for="<?php echo $this->get_field_id('img'); ?>">
                <?php echo '画像:'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo $img; ?>">
        </p>

        <!-- 内容 -->
        <p>
            <label for="<?php echo $this->get_field_id('body'); ?>">
                <?php echo '内容:'; ?>
            </label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
        </p>

        <!-- サブタイトル部分のアイコン(Font Awesome) -->
        <p>
            <label for="<?php echo $this->get_field_id('sub_logo');?>">
                <?php echo 'サブタイトル部分のアイコン(Font Awesome)' ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('sub_logo'); ?>" name="<?php echo $this->get_field_name('sub_logo'); ?>" type="text" value="<?php echo $sub_logo; ?>">
        </p>

<?php
    }
    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);    //php,htmlタグを取り除く
        $instance['img'] = trim($new_instance['img']);
        $instance['body'] = trim($new_instance['body']);    //先頭と最後の空白を取り除く
        $instance['sub_logo'] = trim($new_instance['sub_logo']);

        return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance) {
        //配列を変数に格納
        extract($args);

        //ウィジェットから入力された情報を取得
        $title = apply_filters('widget_title', $instance['title']);
        $img = apply_filters('widget_img', $instance['img']);
        $body = apply_filters('widget_body', $instance['body']);
        $sub_logo = apply_filters('widget_sub_logo', $instance['sub_logo']);

        //ウィジェットから入力された情報がある場合、htmlを表示する
        if ($title) {
?>
            <div class="<?php echo $sub_logo; ?>"></div>
            <h2 class="h2-tittle"><?php echo $title; ?></h2>
            <div id="oyatsu-figure">
                <img src="<?php echo $img; ?>">
            </div>
            <p>
                <?php echo $body; ?>
            </p>
<?php
        }
    }
}

//スタッフ紹介欄
class About_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(false, $name="スタッフ紹介");
    }

    function form($instance) {
        //ポスト送信されていたらサニタイズして変数に格納
        if (isset($_POST['staff_img'])) {
            $staff_img = $_POST['staff_img'];
        }
        if (isset($_POST['staff_name'])) {
            $staff_name = $_POST['staff_name'];
        }
        if (isset($_POST['staff_msg'])) {
            $staff_msg = $_POST['staff_msg'];
        }
?>
        <!-- スタッフの画像 -->
        <p>
            <label for="<?php echo $this->get_field_id('staff_img'); ?>">
                <?php echo 'スタッフ画像URL'; ?>
            </label>
            <textarea cols="50" rows="5" name="<?php echo $this->get_field_name('staff_img'); ?>" value="<?php echo $staff_img; ?>"></textarea>
        </p>

        <!-- スタッフ名前 -->
        <p>
            <label for="<?php echo $this->get_field_id('staff_name'); ?>">
                <?php echo 'スタッフ名'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('staff_name') ?>" name="<?php  echo $this->get_field_name('staff_name'); ?>" type="text" value="<?php echo $staff_name; ?>">
        </p>

        <!-- スタッフ紹介文 -->
        <p>
            <label for="<?php echo $this->get_field_id('staff_msg'); ?>">
                <?php echo 'スタッフ紹介文'; ?>
            </label>
            <textarea cols="50" rows="5" name="<?php echo $this->get_field_name('staff_msg'); ?>" type="text" value="<?php  echo $staff_msg; ?>"></textarea>
        </p>
<?php
    }
    //ウィジェットに格納された情報を保存する
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['staff_img'] = strip_tags($new_instance['staff_img']);
        $instance['staff_name'] = trim($new_instance['staff_name']);
        $instance['staff_msg'] = trim($new_instance['staff_msg']);

        return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance) {
        //配列を変数に格納
        extract($args);

        //ウィジェットから入力された情報を取得
        $staff_img = apply_filters('widget_staff_img', $instance['staff_img']);
        $staff_name = apply_filters('widget_staff_name', $instance['staff_name']);
        $staff_msg = apply_filters('widget_staff_msg', $instance['staff_msg']);

        //ウィジェットから入力された情報がある場合、htmlを表示する
        if ($staff_name) {
?>
            <figure>
                <img src="<?php echo $staff_img; ?>">
                <figcaption><?php echo $staff_name; ?></figcaption>
            </figure>
            <p>
                <?php echo $staff_msg; ?>
            </p>
<?php
        }
    }
}