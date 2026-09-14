<?php

/**
 * Plugin Name: マイフッターノート
 * Description: 投稿の末尾に定型文を挿入するプラグインです。
 * Version: 0.5.0
 * Author: yabea
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

define('MY_FOOTER_NOTE_PREFIX', 'my_footer_note_');
define('MY_FOOTER_NOTE_SLUG', 'my-footer-note');

// 管理画面の処理
add_action('admin_menu', 'create_my_footer_note_menu');

function create_my_footer_note_menu() {
    add_submenu_page(
        'options-general.php',
        'マイフッターノート',
        'マイフッターノート',
        'manage_options',
        MY_FOOTER_NOTE_SLUG,
        'show_my_footer_note_setting'
    );
}

function show_my_footer_note_setting() {
    if (isset($_POST['save_settings']) && check_admin_referer(MY_FOOTER_NOTE_PREFIX . 'save_settings')) {
        update_option(MY_FOOTER_NOTE_PREFIX . 'note', sanitize_textarea_field($_POST['note']));

        echo "<div class='notice notice-success is-dismissible'><p>設定を保存しました。</p></div>";
    }

    $note = get_option(MY_FOOTER_NOTE_PREFIX . 'note');

?>
    <div class="wrap">
        <h1>マイフッターノートの設定</h1>
        <form method="POST">
            <?php wp_nonce_field(MY_FOOTER_NOTE_PREFIX . 'save_settings'); ?>
            <table class="form-table">
                <tr>
                    <th>定型文</th>
                    <td><textarea name="note" class="regular-text" rows="5"><?php echo esc_textarea($note); ?></textarea></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="save_settings" class="button button-primary" value="保存">
            </p>
        </form>
    </div>
<?php
}

// フロント側の処理
add_filter('the_content', 'show_my_footer_note');

function show_my_footer_note($content) {
    if (!is_single()) return $content;

    $note = get_option(MY_FOOTER_NOTE_PREFIX . 'note');
    if ($note == '') return $content;

    return $content . '<div class="my-footer-note"><p>' . nl2br(esc_html($note)) . '</p></div>';
}
