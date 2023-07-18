<?php
include "db_connect.php";

$res = true;

if(!empty($fl_nm = $_FILES['file1']["name"])){
  if(!empty(ltrim($_POST['pl'])) && !empty(ltrim($_POST['nm'])) && !empty(ltrim($fl_nm))){
    mysqli_query($link, "INSERT INTO `playlists_fixed` (`playlist_name`, `video_id`, `video_name`, `file_name`) VALUES ('{$_POST['pl']}', '{$_POST['vi']}', '{$_POST['nm']}', '$fl_nm')");
    move_uploaded_file($_FILES['file1']['tmp_name'], 'videos/' . $_FILES['file1']['name']);
    $res = 'succ';
  }else{
    $res = 'fail';
  }

}else{
  $res = 'nofile';
}


echo $res;
?>
