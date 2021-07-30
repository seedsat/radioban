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

[![Image from Gyazo](https://i.gyazo.com/4ee6476dcc8a1730767682f486001469.png)](https://gyazo.com/4ee6476dcc8a1730767682f486001469)

<br>
<br>

ログイン時<br>
名前には登録した名前を表示させ、退会とログアウトリンクを表示

[![Image from Gyazo](https://i.gyazo.com/d29d47c25de292aa258a274348edd262.png)](https://gyazo.com/d29d47c25de292aa258a274348edd262)

<br>

番組関連をクリック時
[![Image from Gyazo](https://i.gyazo.com/4a45070dea44851c9ec532adfc24a6b3.png)](https://gyazo.com/4a45070dea44851c9ec532adfc24a6b3)

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

[![Image from Gyazo](https://i.gyazo.com/181f7acfe3860c9de7ffd19e9da38180.png)](https://gyazo.com/181f7acfe3860c9de7ffd19e9da38180)

<br>
<br>

ログインページはメールアドレスとTwitterによるログイン機能を実装

<br>
<br>

## 3.新規登録ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/359a66bbc28f15bb938b5f9abfb0b611.png)](https://gyazo.com/359a66bbc28f15bb938b5f9abfb0b611)

<br>
<br>

会員登録はメールアドレスのみの登録。<br>
パスワード表示にチェックを入れると表示させる

<br>
<br>

## 4.放送局一覧ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/9684965fe1077152c1ccf1b28b863c9c.png)](https://gyazo.com/9684965fe1077152c1ccf1b28b863c9c)

<br>
<br>

放送局一覧を表示。<br>
右上の検索バーに文字を入れると自動検索する。

<br>
<br>

## 4.番組一覧ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/2655a0543c5570a19d5637fc6d2bb20e.png)](https://gyazo.com/2655a0543c5570a19d5637fc6d2bb20e)

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

[![Image from Gyazo](https://i.gyazo.com/67663f4d381dae7d9710402afb6b7189.png)](https://gyazo.com/67663f4d381dae7d9710402afb6b7189)

<br>

- ログイン時<br>
先に放送局をプルダウンから選択し、番組はその放送局に対応する番組が全てプルダウンに現れるのでそこから自分が投稿したい番組を選ぶ。


[![Image from Gyazo](https://i.gyazo.com/408ab1658366d23d5a737cc8ad6a903a.png)](https://gyazo.com/408ab1658366d23d5a737cc8ad6a903a)

<br>
<br>

## 6.投稿詳細ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/a824f712580973b793a162bdf731d402.png)](https://gyazo.com/a824f712580973b793a162bdf731d402)

- 番組情報と投稿内容を表示させ、Twitterボタンを押すとTwitterに投稿内容が投稿できる

<br>

[![Image from Gyazo](https://i.gyazo.com/e6ed627d008fe8c678243b922e2b92e0.png)](https://gyazo.com/e6ed627d008fe8c678243b922e2b92e0)

- 投稿に対する返信一覧を表示

<br>
<br>

## 7.親投稿への返信ページ
<br>
<br>

[![Image from Gyazo](https://i.gyazo.com/2fd993d12376ef2ab0661f853200d4f3.png)](https://gyazo.com/2fd993d12376ef2ab0661f853200d4f3)

- 投稿内容とログイン中のユーザーネームは表示させた状態で返信できる

<br>
<br>

# 管理画面
<br>

## 1.TOPページ
<br>

[![Image from Gyazo](https://i.gyazo.com/2983a9a18d79ab112460161fa66d7bf8.png)](https://gyazo.com/2983a9a18d79ab112460161fa66d7bf8)

- 最終ログイン時以降に、新規登録・新規投稿・返信・問い合わせがあればその件数を表示
- サイドバーには各種リンクを表示

<br>
<br>

## 2.ユーザー情報ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/30af657b2d90e1e29aac0ef4f2621b4b.png)](https://gyazo.com/30af657b2d90e1e29aac0ef4f2621b4b)

- ユーザー一覧を表示させ、メルアド登録なのかTwitterから登録したのかを表示
- 登録時間が新しい順に表示
- 詳細・削除リンクを設置

<br>
<br>

## 2.ユーザー詳細ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/7190b7539fed208e80863ecb560b4bad.png)](https://gyazo.com/7190b7539fed208e80863ecb560b4bad)

<br>
<br>

## 3.投稿一覧ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/103c284e282a38496e6e61d9de4dcdc3.png)](https://gyazo.com/103c284e282a38496e6e61d9de4dcdc3)

- ユーザー一覧を表示させ、メルアド登録なのかTwitterから登録したのかを表示
- 登録時間が新しい順に表示
- 詳細・削除リンクを設置

<br>
<br>

## 4.投稿詳細ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/3d9176887b87545e83801650370de8b0.png)](https://gyazo.com/3d9176887b87545e83801650370de8b0)

<br>

[![Image from Gyazo](https://i.gyazo.com/131e403c8f66913bbd830a0af4b96685.png)](https://gyazo.com/131e403c8f66913bbd830a0af4b96685)

- 親投稿と全ての返信を表示
- ユーザー名にリンクを付けてユーザー詳細に遷移

<br>
<br>

## 5.番組追加ページ
<br>

[![Image from Gyazo](https://i.gyazo.com/8950ce1214f10117157f8bdc9d9be406.png)](https://gyazo.com/8950ce1214f10117157f8bdc9d9be406)

<br>

[![Image from Gyazo](https://i.gyazo.com/d8f0b1c57e72c0af29dcca32ee333d35.png)](https://gyazo.com/d8f0b1c57e72c0af29dcca32ee333d35)

<br>

[![Image from Gyazo](https://i.gyazo.com/abe762fba99f3bb968bd66e62d8b9b5e.png)](https://gyazo.com/abe762fba99f3bb968bd66e62d8b9b5e)

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