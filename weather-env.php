<?php 
require_once('vendor/autoload.php');
use GuzzleHttp\Client;
use Abraham\TwitterOAuth\TwitterOAuth;
use Dotenv\Dotenv;

//  環境変数読み込み 

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function get_weather_json()
{

    $client = new Client([
        'base_uri' => 'http://weather.livedoor.com/forecast/webservice/json/v1'
    ]);
// city 情報を奈良に変更(2020.6.22)
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


$weather_json = get_weather_json();
$location = $weather_json["location"]["city"];
$day = $weather_json["forecasts"][0]["dateLabel"];
$weather = $weather_json["forecasts"][0]["telop"];
// 
$tweet_message = "{$location}の{$day}は{$weather}です。tweeted by wf_botsan";

post_twitter($tweet_message);

?>