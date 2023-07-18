<?php
include "db_connect.php";

$res = true;

$sss = mysqli_query($link, "SELECT * FROM `playlists_fixed` WHERE `video_name` = '{$_POST['delname']}' AND `playlist_name` = '{$_POST['delpl']}' LIMIT 1");
$row = mysqli_fetch_array($sss);
$flnm = $row[4];

$sql = mysqli_query($link, "DELETE FROM `playlists_fixed` WHERE `video_name` = '{$_POST['delname']}' AND `playlist_name` = '{$_POST['delpl']}' LIMIT 1") or $res = false;

if(mysqli_affected_rows($link)){
  $filepath = "videos/$flnm";
  unlink($filepath);
  $res = true;
}else{
  $res = false;
}

echo $res;
?>
