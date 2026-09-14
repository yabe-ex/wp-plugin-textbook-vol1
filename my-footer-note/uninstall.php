<?php

// プラグイン削除時の後片付け（管理画面から「削除」したときだけ実行される）
if (!defined('WP_UNINSTALL_PLUGIN')) exit;

delete_option('my_footer_note_note');
