# ラジオ好きのための掲示板サイト

## 概要
関東主要局のラジオ番組を網羅し、その番組について掲示板として投稿したりコメントしたり出来るサイトになります。

<br>
<br>

## 本番環境
URL : http://xs291437.xsrv.jp/radio-board/<br>
URL : http://xs291437.xsrv.jp/radio-board/admin/login（管理画面）

- 管理画面ID : admin <br>
- 管理画面PW : 2222

<br>
<br>

## テストアカウント
Email : test1@test.com
Pass  : 111111

<br>
<br>

## 開発意図
このサイトを作成しようと思ったきっかけは、私自身ラジオが好きで良く聞いていました。
<br>
ただ、ラジオ番組の感想を語るのはTwitterが多くたくさんの人が番組を通じてコミュニケーションを取ると言うよりは、一人で楽しむものと言う感じを受けていました。
<br>
今までのラジオであればそうでしたが、今はSNSで呟くようにラジオを通してたくさんの人とコミュニケーションを取りたいと思っている人が多いだろうと思い、このサイトを作りました。
<br>
久しぶりにプログラムを触ったので時間は掛かりましたが、独学で作り上げました。

<br>
<br>

## 使用技術
- 言語 : PHP
- フレームワーク : Codeigniter3
- データベース : MySQL
- バージン管理 : GitHub
- フロント : HTML、CSS、JavaScript、Bootstrap

<br>
<br>

# 各種ページ紹介

<br>
<br>

## 1.TOPページ
<br>
<br>

非ログイン時<br>
名前はゲストで表示させ、ログインんと新規登録リンクを表示

[![Image from Gyazo](https://i.gyazo.com/0d13948ec768ef2779447e31af112efb.png)](https://gyazo.com/0d13948ec768ef2779447e31af112efb)

<br>
<br>

ログイン時<br>
名前には登録した名前を表示させ、退会とログアウトリンクを表示

[![Image from Gyazo](https://i.gyazo.com/5312c0e3ec34a9faba71cda4e346e3be.png)](https://gyazo.com/5312c0e3ec34a9faba71cda4e346e3be)

<br>

番組関連をクリック時
[![Image from Gyazo](https://i.gyazo.com/a24a6290b7713ad6fa0281d6deba7137.png)](https://gyazo.com/a24a6290b7713ad6fa0281d6deba7137)

<br>
<br>

# サイドバー
<br>

### 名前の表示
- 非ログインでは「ゲスト」と表示し、ログインをしていれば登録した名前を表示
<br>

### 番組検索バー
- 番組名を入力して検索
<br>

#### ログイン
- ログイン画面に遷移
<br>

#### 新規登録
- 新規登録画面に遷移
<br>

#### 放送局一覧
- 放送局一覧画面に遷移
<br>

#### 組一覧
- 組一覧画面に遷移
<br>
<br>
<br>

# メインコンテンツ
<br>

### 投稿一覧
- 掲示板の投稿一覧を表示（投稿が新しい順）
- 新規投稿ボタン設置
- ページネーション実装し10件ずつ表示
- コメント数といいね数を各投稿ごとに表示

<br>
<br>

## 2.ログインページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/e6c3f134b2da6cce0eaf88cb80eb6cff.png)](https://gyazo.com/e6c3f134b2da6cce0eaf88cb80eb6cff)

<br>
<br>

ログインページはメールアドレスとTwitterによるログイン機能を実装

<br>
<br>

## 3.新規登録ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/fc67a69aec804556d46a243253e4b90f.png)](https://gyazo.com/fc67a69aec804556d46a243253e4b90f)

<br>
<br>

会員登録はメールアドレスのみの登録。<br>
パスワード表示にチェックを入れると表示させる

<br>
<br>

## 4.放送局一覧ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/6c4ed5d4d44f81b4ba6ede7fcb045d36.png)](https://gyazo.com/6c4ed5d4d44f81b4ba6ede7fcb045d36)

<br>
<br>

放送局一覧を表示。<br>
右上の検索バーに文字を入れると自動検索する。

<br>
<br>

## 4.番組一覧ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/58fbae70d35af2007a7fc985a839d174.png)](https://gyazo.com/58fbae70d35af2007a7fc985a839d174)

<br>
<br>

番組一覧を表示。<br>
右上の検索バーに文字を入れると自動検索する。

<br>
<br>

## 5.新規投稿ページ
<br>
<br>

- 非ログイン時<br>
ログインか会員登録を促す。

[![Image from Gyazo](https://i.gyazo.com/293daa6f8d8c34fb37ea53c02269e1ed.png)](https://gyazo.com/293daa6f8d8c34fb37ea53c02269e1ed)

<br>

- ログイン時<br>
先に放送局をプルダウンから選択し、番組はその放送局に対応する番組が全てプルダウンに現れるのでそこから自分が投稿したい番組を選ぶ。


[![Image from Gyazo](https://i.gyazo.com/fc32c29e15fb5997c2a5785c42077b42.png)](https://gyazo.com/fc32c29e15fb5997c2a5785c42077b42)

<br>
<br>

## 6.投稿詳細ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/7387eead5424c7f7cd2c3e7bab70da02.png)](https://gyazo.com/7387eead5424c7f7cd2c3e7bab70da02)

- 番組情報と投稿内容を表示させ、Twitterボタンを押すとTwitterに投稿内容が投稿できる

<br>

[![Image from Gyazo](https://i.gyazo.com/b885e87ecf9d4b4c3afd1139b9664a8d.png)](https://gyazo.com/b885e87ecf9d4b4c3afd1139b9664a8d)

- 投稿に対する返信一覧を表示

<br>
<br>

## 7.親投稿への返信ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/09018cd99f20a5c52c334f4d1185b29f.png)](https://gyazo.com/09018cd99f20a5c52c334f4d1185b29f)

- 投稿内容とログイン中のユーザーネームは表示させた状態で返信できる

<br>
<br>

# 管理画面
<br>

## 1.TOPページ
<br>

[![Image from Gyazo](https://i.gyazo.com/60def8f3f1979265576951f1d803bed1.png)](https://gyazo.com/60def8f3f1979265576951f1d803bed1)

- 最終ログイン時以降に、新規登録・新規投稿・返信・問い合わせがあればその件数を表示
- サイドバーには各種リンクを表示

<br>
<br>

## 2.ユーザー情報ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/caa384152dc92066f808a5e1378fc98a.png)](https://gyazo.com/caa384152dc92066f808a5e1378fc98a)

- ユーザー一覧を表示させ、メルアド登録なのかTwitterから登録したのかを表示
- 登録時間が新しい順に表示
- 詳細・削除リンクを設置

<br>
<br>

## 3.ユーザー詳細ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/c38a98c602cdabac1ccd6f8a096eef58.png)](https://gyazo.com/c38a98c602cdabac1ccd6f8a096eef58)

<br>
<br>

## 4.投稿一覧ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/02875b275e03d80577725ead98701e2a.png)](https://gyazo.com/02875b275e03d80577725ead98701e2a)

- ユーザー一覧を表示させ、メルアド登録なのかTwitterから登録したのかを表示
- 登録時間が新しい順に表示
- 詳細・削除リンクを設置

<br>
<br>

## 5.投稿詳細ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/327559c5335b695ebb97b7616ca16d7a.png)](https://gyazo.com/327559c5335b695ebb97b7616ca16d7a)

<br>

[![Image from Gyazo](https://i.gyazo.com/7f9419b74d4c579be99720eea1920eaa.png)](https://gyazo.com/7f9419b74d4c579be99720eea1920eaa)

- 親投稿と全ての返信を表示
- ユーザー名にリンクを付けてユーザー詳細に遷移

<br>
<br>

## 6.番組追加ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/e395871179613fe60671d0ce5c7a1e64.png)](https://gyazo.com/e395871179613fe60671d0ce5c7a1e64)

<br>

[![Image from Gyazo](https://i.gyazo.com/93fadf1ae4ffa38bff6346d36b096198.png)](https://gyazo.com/93fadf1ae4ffa38bff6346d36b096198)

<br>

[![Image from Gyazo](https://i.gyazo.com/6fc9372e2802b280b195bca1eaeeb956.png)](https://gyazo.com/6fc9372e2802b280b195bca1eaeeb956)

- front_meta.phpに番組情報を追記する
- 番組詳細情報を管理画面から登録する

<br>
<br>

## 工夫したポイント
このサイトではメールアドレスでの登録の他に、Twitterアカウントを使ったログイン機能も実装しています。
<br>
Twitterアカウントと連携させることで、自分の投稿や気になる投稿をボタン一つでTwitterに投稿することが可能になっています。
<br>
APIを使った実装がとても難しかったですが、どうしても実装したい機能だったので出来た時はとてもうれしかったです。