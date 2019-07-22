<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$content = file_get_contents('https://lenta.ru/rss');
$items = new SimpleXmlElement($content);

$res = [];

foreach($items->channel->item as $item ){

    $res[] = [
        'title' => (string)$item->title,
        'link' => (string)$item->link,
        'description' => (string)$item->description
    ];

    if(count($res) >= 5){
        break;
    }
}

foreach($res as $item){
    echo 'Название: ' . $item['title'] . '<br/>';
    echo 'Ссылка: '  . $item['link'] . '<br/>';
    echo 'Описание: ' . $item['description'] . '<br/><br/>';
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>