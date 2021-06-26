<?php
//カスタムメニュー
//カスタムヘッダー機能を有効にする
add_theme_support('custom-header', $custom_header_defaults);

//カスタムメニュー使用
register_nav_menu('main-menu', 'メインメニュー');

//カスタムフィールド
add_action('admin_menu', 'add_custom_inputbox');
add_action('save_post', 'save_custom_postdata');

//入力項目がどのタイプのページに表示されるのか設定
function add_custom_inputbox(){
    //第一引数:編集画面のhtmlに挿入されるid属性名
    //第二引数:管理画面に表示されるカスタムフィールド名
    //第三引数:メタボックスのなかに出力される関数名
    //第四引数:管理画面に表示するカスタムフィールドの場所(postなら投稿、pageなら固定ページ)
    //第五引数:配置される順序
    add_meta_box('vision_id', 'VISION入力欄', 'custom_area_vision', 'page', 'normal');
    add_meta_box('top_img_id', 'トップ画像URL入力欄', 'custom_area_img', 'page', 'normal');
    add_meta_box('map_id', 'MAP入力欄', 'custom_area_map', 'page', 'normal');
}

function custom_area_vision(){
    global $post;

    echo 'コメント：<textarea name="vision_msg" cols="50" rows="5">'. get_post_meta($post->ID, 'vision', true).'</textarea><br>';
}

function custom_area_img(){
    global $post;

    echo 'コメント：<textarea name="img_top" cols="50" rows="5">'. get_post_meta($post->ID, 'img_top', true).'</textarea><br>';
}

function custom_area_map(){
    global $post;

    echo 'コメント：<textarea name="map" cols="50" rows="5">'. get_post_meta($post->ID, 'map', true).'</textarea><br>';
}

//投稿ボタンを押した際のデータ更新と保持
function save_custom_postdata($post_id){

    $vision_msg = '';
    $img_top = '';
    $map = '';

    //VISION
    //カスタムフィールドに入力された情報を取り出す
    if(isset($_POST['vision_msg'])){
        $vision_msg = $_POST['vision_msg'];
    }

    //内容が変わっていた場合、保持していた情報を更新する
    if($vision_msg != get_post_meta($post_id, 'vision', true)){
        update_post_meta($post_id, 'vision', $vision_msg);
    }else if($vision_msg == ''){
        delete_post_meta($post_id, 'vision', get_post_meta($post_id, 'vision', true));
    }

    //IMG
    if(isset($_POST['img_top'])){
        $img_top = $_POST['img_top'];
    }

    if($img_top != get_post_meta($post_id, 'img_top', true)){
        update_post_meta($post_id, 'img_top', $img_top);
    }else if($img_top == ''){
        delete_post_meta($post_id, 'img_top', get_post_meta($post_id, 'img_top', true));
    }

    //MAP
    if(isset($_POST['map'])){
        $map = $_POST['map'];
    }

    if($map != get_post_meta($post_id, 'map', true)){
        update_post_meta($post_id, 'map', $map);
    }else if($map == ''){
        delete_post_meta($post_id, 'map', get_post_meta($post_id, 'map', true));
    }

}

//カスタムウィジェット
//ウィジェットエリアを作成する関数がどれなのかを登録する
add_action('widgets_init', 'my_widgets_area');
//ウィジェット自体の作成する関数がどれなのかを登録する
add_action('widgets_init', function(){register_widget("my_widgets_item1");});

//ウィジェットエリアを作成する
function my_widgets_area(){
    register_sidebar( array(
        'name' => 'メッセージエリア',
        'id' => 'widgets_msg',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ));
}

//ウィジェット自体を作成する
class my_widgets_item1 extends WP_Widget{

    //初期化（管理画面で表示するウィジェットの名前を設定する）
    function __construct(){
        parent::__construct(false, $name = 'メッセージウィジェット');
    }

    //ウィジェットの入力項目を作成する処理
    function form($instance){
        $title = esc_attr($instance['title']);
        $body = esc_attr($instance['body']);
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>">
                <?php echo 'タイトル:'; ?>
            </label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('body') ?>">
                <?php echo '内容:'; ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('body'); ?>" id="<?php echo $this->get_field_id('body'); ?>" cols="30" rows="10"><?php echo $body; ?></textarea>
        </p>
    <?php
    }

    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['body'] = trim($new_instance['body']);

        return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance){
        //配列を変数に展開
        extract($args);

        //ウィジェットから入力された情報を取得
        $title = apply_filters('widget_title', $instance['title']);
        $body = apply_filters('widget_body', $instance['body']);

        //ウィジェットから入力された情報がある場合、htmlを表示する
        if($title){
    ?>
            <section class="panel">
                <h2><?php echo $title; ?></h2>
                <p>
                    <?php echo $body; ?>
                </p>
            </section>
<?php
        }
    }
}