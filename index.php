<?php
require 'vendor/autoload.php';

use Aws\Ec2\Ec2Client;

$ec2Client = new Ec2Client([
    'region' => 'us-east-2',
    'version' => '2016-11-15',
    'credentials' => [
        'key' => 'key_here',
        'secret' => 'secret_here',
    ]
]);

$instanceIds = array('i-idhere1', 'i-idhere2');

$url = 'https://www.collegestash.net/test.html';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);

if (trim($data) !== 'ok') {
  $result = $ec2Client->startInstances(array(
  'InstanceIds' => $instanceIds,
  ));
}

var_dump($result);
