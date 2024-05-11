<?php
$file = file_get_contents('result.json');
$data = json_decode($file, true);

$messageSentCount = 0;
$messageReceivedCount = 0;
$messageSend = [];
$messageReceive = [];
$messageBudi = [];

foreach($data['messages'] as $message) {
    if($message['from'] == 'Budi') {
        $messageSentCount++;
        array_push($messageSend, strlen($message['text']));
        array_push($messageBudi, strlen($message['text']));
    } else if($message['from'] == 'Bot') {
        array_push($messageReceive, strlen($message['text']));
        array_push($messageBudi, $message['text']);
    }
}

$avgSend = floor(array_sum($messageSend)/count(array_filter($messageSend)));
$avgReceive = floor(array_sum($messageReceive)/count(array_filter($messageReceive)));

foreach($messageBudi as $key => $value) {
    $messageBudi[$key] = str_replace(',', '', $messageBudi[$key]);
    $messageBudi[$key] = str_replace('.', '', $messageBudi[$key]);
    $messageBudi[$key] = str_replace('?', '', $messageBudi[$key]);
}

$saya = [];
foreach($messageBudi as $message) {
    array_push($saya, explode(' ', $message));
}

$mes = [];
foreach($saya as $s) {
    foreach($s as $j) {
        array_push($mes, $j);
    }
}

$mes = array_count_values($mes);
arsort($mes);

$count = 1;
$top = [];
foreach($me as $x => $x_value) {
    array_push($top, [$x => $x_value]);
    if($count == 5) {
        break;
    }
    $count++
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            Top 5 Sent Words:
            <?php
            foreach($top as $tops => $tips) {
            ?>
            <ul>
                <?php 
                foreach($tips as $key => $value) {
                ?>
                <li><?= $key .'('.$value.')' ?></li>
                <?php
                }
                ?>
            </ul>
            <?php
            }
            ?>
        </li>
        <li>
            Total messages sent : <?= $messageSentCount; ?>
            Total messages received : <?= $messageReceivedCount; ?>
            Average character length send : <?= $avgSend; ?>
            Average character length received : <?= $avgReceive; ?>
        </li>
    </ul>
</body>
</html>