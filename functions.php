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
        echo "<div class=\"pagination\">\n";
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
    add_meta_box('pop
    1_img2_id', '1つ目見出し画像2', 'pop1_img2_area', 'page', 'normal');
    add_meta_box('pop1_about_id', '説明入力欄', 'pop1_custom_area', 'page', 'normal');
    //ふたつ目の見出し
    add_meta_box('pop2_title', '2つ目見出し', 'pop2_title_area', 'page', 'normal');
    add_meta_box('pop2_img1', '2つ目見出し画像1', 'pop2_img1_area', 'page', 'normal');
    add_meta_box('pop2_about_id', '説明入力欄', 'pop2_custom_area', 'page', 'normal');

    //みっつ目の見出し
    add_meta_box('pop3_title_id', '3つ目見出し', 'pop3_title_area', 'page', 'normal');
    add_meta_box('pop3_img1_id', '3つ目見出し画像1', 'pop3_img1_area', 'page', 'normal');
    add_meta_box('pop3_about_id', '説明入力欄', 'pop3_custom_area', 'page', 'normal');

    //よっつ目の見出し
    add_meta_box('pop4_title_id', '4つ目見出し','pop3_title_area', 'page', 'normal');
    

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

//ふたつ目の見出し
function pop2_title_area() {
    global $post;
    echo '宣伝2 見出し:<textarea cols="30" rows="1" name="pop2_title">'.get_post_meta($post->ID, 'pop2_title', true).'</textarea><br>';
}
function pop2_img1_area() {
    global $post;
    echo '宣伝2 画像1:<textarea cols="50" rows="5" name="pop2_img1">'.get_post_meta($post->ID, 'pop2_img1', true).'</textarea><br>';
}
function pop2_custom_area() {
    global $post;
    echo '宣伝2 説明欄:<textarea cols="50" rows="10" name="pop2_msg">'.get_post_meta($post->ID, 'pop2_msg', true).'</textarea><br>';
}

//みっつ目の見出し
function pop3_title_area() {
    global $post;
    echo '宣伝3 見出し:<textarea cols="30" rows="1" name="pop3_title">'.get_post_meta($post->ID, 'pop3_title', true).'</textarea>';
}
function pop3_img1_area() {
    global $post;
    echo '宣伝3 画像:<textarea cols="50" rows="5" name="pop3_img1">'.get_post_meta($post->ID, 'pop3_img1', true).'</textarea>';
}
function pop3_custom_area() {
    global $post;
    echo '宣伝3 説明欄:<textarea cols="50" rows="10" name="pop3_msg">'.get_post_meta($post->ID, 'pop3_msg', true).'</textarea>';
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

    $pop2_title = '';
    $pop2_img1 = '';
    $pop2_msg = '';

    $pop3_title = '';
    $pop3_img1 = '';
    $pop3_msg = '';

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

    //ふたつ目の見出し
    if (isset($_POST['pop2_title'])) {
        $pop2_title = $_POST['pop2_title'];
    }
    if (isset($_POST['pop2_img1'])) {
        $pop2_img1 = $_POST['pop2_img1'];
    }
    if (isset($_POST['pop2_msg'])) {
        $pop2_msg = $_POST['pop2_msg'];
    }

    //みっつ目の見出し
    if (isset($_POST['pop3_title'])) {
        $pop3_title = $_POST['pop3_title'];
    }
    if (isset($_POST['pop3_img1'])) {
        $pop3_img1 = $_POST['pop3_img1'];
    }
    if (isset($_POST['pop3_msg'])) {
        $pop3_msg = $_POST['pop3_msg'];
    }
    //-----------------------------------------
    //内容が変わっていた場合、保存していた情報を更新する
    //-----------------------------------------

    //ひとつ目の見出し
    if ($pop1_title != get_post_meta($post_id, 'pop1_title', true)) {
        update_post_meta($post_id, 'pop1_title', $pop1_title);
    } else {
        delete_post_meta($post_id, 'pop1_title', get_post_meta($post_id, 'pop1_title', true));
    }
    if ($pop1_img1 != get_post_meta($post_id, 'pop1_img1', true)) {
        update_post_meta($post_id, 'pop1_img1', $pop1_img1);
    } else {
        delete_post_meta($post_id, 'pop1_img1', get_post_meta($post_id, 'pop1_img1', true));
    }
    if ($pop1_img2 != get_post_meta($post_id, 'pop1_img2',true)) {
        update_post_meta($post_id, 'pop1_img2', $pop1_img2);
    } else {
        delete_post_meta($post_id, 'pop1_img2', get_post_meta($post_id, 'pop1_img2',true));
    }
    if ($pop1_msg != get_post_meta($post_id, 'pop1_msg', true)) {
        update_post_meta($post_id, 'pop1_msg', $pop1_msg);
    } else if($pop1_msg == '') {
        delete_post_meta($post_id, 'pop1_msg', get_post_meta($post_id, 'pop1_msg', true));
    }

    //ふたつ目の見出し
    if ($pop2_title != get_post_meta($post_id, 'pop2_title', true)) {
        update_post_meta($post_id, 'pop2_title', $pop2_title);
    } else {
        delete_post_meta($post_id, 'pop2_title', get_post_meta($post_id, 'pop2_title', true));
    }
    if ($pop2_img1 != get_post_meta($post_id, 'pop2_img1', true)) {
        update_post_meta($post_id, 'pop2_img1', $pop2_img1);
    } else {
        delete_post_meta($post_id, 'pop2_img1', get_post_meta($post_id, 'pop2_img1', true));
    }
    if ($pop2_msg != get_post_meta($post_id, 'pop2_msg', true)) {
        update_post_meta($post_id, 'pop2_msg', $pop2_msg);
    } else {
        delete_post_meta($post_id, 'pop2_msg', get_post_meta($post_id, 'pop2_msg', true));
    }

    //みっつ目の見出し
    if ($pop3_title != get_post_meta($post_id, 'pop3_title', true)) {
        update_post_meta($post_id, 'pop3_title', $pop3_title);
    } else {
        delete_post_meta($post_id, 'pop3_title', get_post_meta($post_id, 'pop3_title', true));
    }
    if ($pop3_img1 != get_post_meta($post_id, 'pop3_img1', $pop3_img1)) {
        update_post_meta($post_id, 'pop3_img1', $pop3_img1);
    } else {
        delete_post_meta($post_id, 'pop3_img1', get_post_meta($post_id, 'pop3_img1', true));
    }
    if ($pop3_msg != get_post_meta($post_id, 'pop3_msg', true)) {
        update_post_meta($post_id, 'pop3_msg', $pop3_msg);
    } else {
        delete_post_meta($post_id, 'pop3_msg', get_post_meta($post_id, 'pop3_msg', true));
    }
}
?>
