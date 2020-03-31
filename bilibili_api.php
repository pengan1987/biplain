<?php

function requestBiliBiliAPI($bvid){
    $ch = curl_init();
    //get video information for AVID and CID
    curl_setopt($ch, CURLOPT_URL, "https://api.bilibili.com/x/web-interface/view?bvid=" . $bvid);

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);

    $aid = $result['data']['aid'];
    $cid = $result['data']['cid'];

    //get MP4 video address from AVID and CID
    $playerUrl = "http://api.bilibili.com/x/player/playurl?platform=html5&qn=32&cid=" . $cid . "&avid=" . $aid;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $playerUrl);

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);
    $video = $result['data']['durl']['0']['url'];

    $videoArray = array(
        "bvid" => $bvid,
        "aid" => $aid,
        "cid" => $cid,
        "video" => $video,
        "status" => "fresh"
    );
    return $videoArray;
}

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['bvid']) || empty($_GET['bvid']))
{
    echo "{error:\"need bvid param\"}";
    return;
}

$bvid = $_GET["bvid"];
$cacheKey = 'Bili_' . $bvid;

//Change this if you are using wincache
$use_wincache = false;
if ($use_wincache){
    $videoArray = wincache_ucache_get($cacheKey, $success);
    if ($success){
        $videoArray["status"] = "cached";
    }else{
        $videoArray = requestBiliBiliAPI($bvid);
        wincache_ucache_set($cacheKey, $videoArray, 600);
    }
}else{
    $videoArray = requestBiliBiliAPI($bvid);
}

echo json_encode($videoArray);

?>
