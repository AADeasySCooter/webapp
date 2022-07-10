<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
  'body' => '{"included_segments":["Subscribed Users"],"contents":{"en":"English or Any Language Message","es":"Spanish Message"},"name":"INTERNAL_CAMPAIGN_NAME"}',
  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Basic YOUR_REST_API_KEY',
    'Content-Type' => 'application/json',
  ],
]);

echo $response->getBody();