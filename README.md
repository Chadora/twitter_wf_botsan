# wf_botsanについて

##　概要
PHPの学習における内容の確認と練習、またポートフォリオとしての公開を目的として作成したTwitterBOTです。

コンソール上で実行することで、API連携したtwitterアカウントから指定した地域の天気情報をツイートすることができます。



動作のおおまかな流れとしては

1. 天気情報API(http://weather.livedoor.com/forecast/webservice/json/v1)を取得
2. TwitterAPIに接続し、取得した情報を合わせた定型文をtwitterへ投稿

という風になっています。


### 動作環境・使用ツール
※()内は各バージョン

- XAMPP(7.4.5)
- Apache(2.4.43)
- MySQL(10.4.11)
- PHP(7.4.5)

