<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: image/png");

$apiSecret = "<<API SECRET TOKEN>>";

$responseJSON = file_get_contents(
    "https://api.notion.com/v1/blocks/".htmlspecialchars($_GET["blockId"]),
    false,
    stream_context_create(array('http' => array(
        'method'  => "GET", 
        'header'  => <<<TXT
            Notion-Version: 2021-05-13
            Authorization: Bearer $apiSecret
            TXT
    )))
);
$puml = json_decode($responseJSON, TRUE)["code"]["text"][0]["plain_text"];

echo file_get_contents('https://kroki.io/plantuml/png/'.rtrim(strtr(base64_encode(gzcompress($puml)), '+/', '-_'), '='));