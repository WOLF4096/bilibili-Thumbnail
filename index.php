<?php
$bv = $_POST['bv'];
if ($bv == ""){
    $url = "https://api.bilibili.com/x/player/videoshot?bvid=BV1J34y1t7bE";
}else{
    $url = "https://api.bilibili.com/x/player/videoshot?bvid=$bv";
}
$result = file_get_contents($url);
$data = json_decode($result, true);
$coun = count($data['data']['image']);
for ($i=0;$i<$coun;$i++){
    $val .= "\n            ".'<img style="width:100%;" src="https:'.$data['data']['image'][$i].'">';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>获取视频缩略图</title>
        <meta charset="utf-8">
        <meta name="referrer" content="no-referrer">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <style>
            *{
                margin: auto;
            }
            .input-text {
                width: 256px;
                outline: none;
                border:1px solid #eee;
                padding: 10px;
                border-radius: 4px;
                font-size: 14px;
                transition: 0.3s all;
                text-align: center;
            }
            .input-text:focus {
                border: 1px solid #aaa;
                background: #fff;
            }
        </style>
    </head>
    <body>
        <div style="max-width: 360px;margin: auto;text-align: center;"><br/><h3>获取视频缩略图</h3><br/>
            <form method="post">
                <input name="bv" placeholder="输入BV号" class="input-text"><br/><br/>
                <input type="submit" value="查看" class="input-text" style="background-color: #448EF6;color: #fff;" onclick="postcode()"><br/><br/>
            </form>
        </div>
        <div style="width:100%;text-align: center;line-height: 0;"><?php echo $val;?>

        </div>
        <div style="text-align: center;"><a href="https://github.com/WOLF4096" target="_blank" style="font-size:14px;text-decoration:none;color:#777;">Github</a></div>
    </body>
</html>
