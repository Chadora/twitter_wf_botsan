<?php 
require_once('vendor/autoload.php');
use GuzzleHttp\Client;
use Abraham\TwitterOAuth\TwitterOAuth;
use Dotenv\Dotenv;

//  環境変数を読み込みます 

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 天気情報APIを取得します
function get_weather_json()
{

    $client = new Client([
        'base_uri' => 'http://weather.livedoor.com/forecast/webservice/json/v1'
    ]);
    $method = 'GET';
    $uri = '?city=290010';
    $options = [];
    $response = $client->request($method,$uri,$options);

    $body = (string) $response->getBody();
    $weather_json = json_decode($body,true);

    return $weather_json;
}

// TwitterAPIへの接続

function post_twitter($message)
{
    $connection = new TwitterOAuth(
        $_ENV['CONSUMER_KEY'],
        $_ENV['CONSUMER_KEY_SECRET'],
        $_ENV['ACCESS_TOKEN'],
        $_ENV['ACCESS_TOKEN_SECRET']
    );
    $request = $connection->post("statuses/update", ["status"=>"$message"]);
    $res_body = $connection->getLastBody(); var_dump($res_body);
}

// 取得した天気情報のファイルにある必要な情報を、それぞれを変数に代入

$weather_json = get_weather_json();
$location = $weather_json["location"]["city"];
$day = $weather_json["forecasts"][0]["dateLabel"];
$weather = $weather_json["forecasts"][0]["telop"];

// 代入した変数を併せた定型文を作成
$tweet_message = "{$location}の{$day}は{$weather}です。tweeted by wf_botsan";

// ツイートを投稿

post_twitter($tweet_message);

?>