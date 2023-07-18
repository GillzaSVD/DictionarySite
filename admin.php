<?php
include "db_connect.php"; ?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <title>Словарь РЖЯ</title>
  <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php
  $pass = "Ckjdfhm";
  if (isset($_POST['paswd']) && $_POST['paswd']==$pass){
    ?>
    <div id="top" class="customnav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/">Словарь РЖЯ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dazbuca.php">Дактильная азбука</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="about.php">О проекте</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div><br>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <h3>Добавить новый жест</h3>
          <form class="form" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Название жеста</label>
              <input id="nm" required name="name" type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Название плейлиста</label>
              <input id="pl" required name="pl" type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Видео ID</label>
              <input id="vi" name="videoid" type="text" class="form-control">
              <div class="form-text">Необязательное поле. Это идентификатор видео Youtube.</div>
            </div>
            <div class="mb-3">
              <label required for="formFile" class="form-label">Видео</label>
              <input class="form-control" type="file" name='flie1' id="formFile" accept=".mp4,.mkv,.mpg,.mpeg,.mov">
            </div>
            <button id="btna" type="submit" class="btn btn-primary">Добавить</button>
          </form><br>
          <div class="alert alert-warning" role="alert">
            Желательно, чтобы названия жеста и файла совпадали!<br>
            Если существует файл с таким названием, он будет перезаписан!
          </div>
        </div>
        <div class="col-4">
          <div class="res">

          </div>
        </div>
        <div class="col-4">
          <h3>Удалить жеста</h3>
          <form class="formdel">
            <div class="mb-3">
              <label class="form-label">Название жеста</label>
              <input required name="delname" type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Название плейлиста</label>
              <input required name="delpl" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Удалить</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Футер -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Словарь РЖЯ</p>
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#top" class="nav-custom nav-link px-2">Наверх</a></li>
        </ul>
      </footer>
    </div>
  <?php }
  else{ header("location: about.php"); } ?>

  <script type="text/javascript">
  $(".form").submit(function(event) {
    event.preventDefault();
    $(".cusalert").remove();
    var $input = $("#formFile");
    var fd = new FormData;
    fd.append('file1', $input.prop('files')[0]);
    fd.append('nm', $("#nm").val());
    fd.append('pl', $("#pl").val());
    fd.append('vi', $("#vi").val());


    $.ajax({
      url: 'post.php',
      type: 'POST',
      processData: false,
      contentType: false,
      data: fd,
      success: function(fd){
        switch (fd) {
          case 'nofile':
          $('div .res').append("<div class='alert cusalert alert-danger' role='alert'>Вы не выбрали файл!</div>");
          $('.cusalert').append("<br>Или ваш файл превышен максимальный размер!");
          $('.cusalert').append("<br>Максимальный размер: 20мб!");
          break;
          case 'fail':
          $('div .res').append("<div class='alert cusalert alert-danger' role='alert'>Произошла ошибка! Проверьте данные!</div>");
          break;
          case 'succ':
          $('div .res').append("<div class='alert cusalert alert-success' role='alert'>Новый жест успешно добавлен!</div>");
          break;
        }
      }
    })
  })

  $(".formdel").submit(function(event) {
    event.preventDefault();
    $(".cusalert").remove();
    var dn = $('.formdel').serialize();

    $.ajax({
      url: 'post_delete.php',
      type: 'POST',
      data: dn,
      success: function(data){
        if(data){
          $('div .res').append('<div class="alert cusalert alert-success" role="alert">Указанный жест успешно удален!</div>');
        }else{
          $('div .res').append('<div class="alert cusalert alert-danger" role="alert">Произошла ошибка! Указанный жест не существует!</div>');
        }
      }
    })
  })
  </script>



  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
