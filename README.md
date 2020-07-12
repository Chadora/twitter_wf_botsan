# wf_botsanについて

###　概要
PHPの学習過程で内容理解の確認と練習、またポートフォリオとして公開することを兼ねて作成したTwitterBOTです。

コンソール上でphpファイルを実行することで、指定した地域の天気情報をAPI連携したtwitterアカウントからツイートすることができます。


作成する中で意識したポイントは以下の2点です。

1. 天気情報、twitterなどのAPI利用
2. 必要な各種ライブラリの導入



また、動作の概要としては
- 天気情報API(http://weather.livedoor.com/forecast/webservice/json/v1)を取得
- TwitterAPIに接続し、あらかじめ設定した定型文と取得した情報を合わせた投稿をtwitterへポスト


### セットアップ

```
1. テスト
1. `test`
2. 
```
## 動作環境・使用ツール
※()内は各バージョン

- XAMPP(7.4.5)
- Apache(2.4.43)
- MySQL(10.4.11)
- PHP(7.4.5)
- Composer(1.1.0)
- symphony

####　使用したライブラリ一覧
- abraham/TwitterOAuth(1.1.0)
- graham-campbell/Result-type(v1.0.1)
- guzzlehttp(6.5.3)
- vlucas/PHPdotenv(5.0.0)