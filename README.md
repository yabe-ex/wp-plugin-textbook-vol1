# WordPressプラグイン開発の教科書 1 — サンプルコード

書籍『WordPressプラグイン開発の教科書 1 はじめての最小プラグイン』（矢部敦 / Edel Hearts）に掲載しているコードです。本文の掲載コードと1文字も違いません。

## 構成

| フォルダ | 章 | 内容 |
|---|---|---|
| `steps/03-minimal/my-footer-note/` | 第3章 | 1ファイル・固定文の最小プラグイン（v0.1.0） |
| `steps/05-settings/my-footer-note/` | 第5章 | 管理画面「設定」に入力欄1つを追加し、手書き方式で保存（v0.5.0） |
| `my-footer-note/` | 第6・7章 | 完成版。`uninstall.php` と `readme.txt` を含む（v1.0.0） |

## 使い方

1. 使いたい段階の `my-footer-note` フォルダを、ローカル環境の `wp-content/plugins/` にコピーする
2. 管理画面「プラグイン」で「マイフッターノート」を有効化する
3. （第5章以降）「設定 > マイフッターノート」で定型文を保存し、投稿の末尾を確認する

配布用のzipを作るときは、`my-footer-note` フォルダごと圧縮してください（解凍したときにフォルダが出てくる形）。

## 動作環境

WordPress 6.6 以上、PHP 7.4 以上。WordPress 7.1 で動作確認。

## ライセンス

GPLv2 or later。本書の題材として自由に改変して使えます。

## 関連

- 書籍の紹介と続きの学び方: https://edel-hearts.com/wordpress-plugin-development-customization-course/
