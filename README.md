# PetConnect
手放すことになったペットの引き取り主を募集するマッチングサイト（作成途中）

## URL
https://petconnect-jp.herokuapp.com/

## テストユーザーアカウント
|メールアドレス|パスワード|
| :---: | :---: |
|  mail@address1  |  testpass1  |
|  mail@address2  |  testpass2  |

## 制作背景
現在、ペットを手放す際には保健所に預けるという手段が取られる場合が多く、そのまま引き取り手が現れない場合、ペットは殺処分されてしまう。そこで、保健所に預ける必要なく、全国に発信できる形で引き取り手を募集する手段を提供することで殺処分を少しでも減らそうと考えた。

## 機能一覧
・ログイン機能<br>
・ペットの投稿<br>
・投稿詳細の表示<br>
・投稿の編集・削除<br>
・投稿へのコメント機能<br>
・投稿されたペットの検索<br>

## 使用技術
PHP 8.0.21<br>
MariaDB<br>
Laravel 8.83.23<br>
Bootstrap 5.2.0<br>
AWS Cloud9<br>

## データベース設計
|テーブル名|説明|
| :---: | :---: |
|  users  |  ユーザー情報  |
|  pets  |  投稿の情報  |
|  statuses  |  募集状況の情報  |
|  species  |  ペットの種類の情報  |
|  sexes  |  ペットの性別の情報  |
|  prefectures  |  都道府県の情報  |
|  comments  |  コメントの情報  |
