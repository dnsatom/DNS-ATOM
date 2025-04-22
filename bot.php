<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $token = "7705439212:AAHzVQnED7jdEDVytgbGOqHBX5i3YnjXHRs";
    $response = file_get_contents("https://api.telegram.org/bot$token/getUpdates");
    $data = json_decode($response, true);

    if (isset($data["result"]) && count($data["result"]) > 0) {
        $last = end($data["result"]);
        $chat_id = $last["message"]["chat"]["id"];
        $text = $last["message"]["text"];

        if ($text == "سلام") {
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=سلام پادشاااه! وصل شدیم!");
        } else {
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=دستورت متوجه نشدم قربان.");
        }
    } else {
        echo "هیچ پیام جدیدی نیست.";
    }
    ?>
    