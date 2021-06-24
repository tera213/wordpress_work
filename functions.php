<?php
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
}

function custom_area_vision(){
    global $post;

    echo 'コメント：<textarea name="vision_msg" cols="50" rows="5">'. get_post_meta($post->ID, 'vision', true).'</textarea><br>';
}

function custom_area_img(){
    global $post;

    echo 'コメント：<textarea name="img_top" cols="50" rows="5">'. get_post_meta($post->ID, 'img_top', true).'</textarea><br>';
}

//投稿ボタンを押した際のデータ更新と保持
function save_custom_postdata($post_id){

    $vision_msg = '';
    $img_top = '';

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

}


