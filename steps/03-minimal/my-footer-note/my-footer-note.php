<?php

/**
 * Plugin Name: マイフッターノート
 * Description: 投稿の末尾に定型文を挿入するプラグインです。
 * Version: 0.1.0
 * Author: yabea
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

// フロント側の処理
add_filter('the_content', 'show_my_footer_note');

function show_my_footer_note($content) {
    if (!is_single()) return $content;

    $note = 'この記事が役に立ったら、シェアしてもらえると嬉しいです。';

    return $content . '<div class="my-footer-note"><p>' . esc_html($note) . '</p></div>';
}
