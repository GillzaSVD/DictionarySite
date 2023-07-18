<?php
include "db_connect.php";

$result = mysqli_query($link,"SELECT * FROM `playlists_fixed` ORDER BY CHAR_LENGTH(`playlist_name`) DESC, `playlist_name` ASC");
?>

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
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
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
        <div class="col-sm-12 col-lg-3 order-2 order-sm-2 order-lg-1">
          <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" id="inp" oninput="filter_list()" autofocus>
          <br>
          <div class="accordion accordion-flush" id="accordionFlushExample">

            <?php
            $i = 0;
            $curpl = '';
            while($item = mysqli_fetch_assoc($result)){
              $pl = $item['playlist_name'];

              if ($pl != $curpl){
                echo "<div class='accordion-item'>";
                echo "<h2 class='accordion-header' id='flush-heading$i'>";
                echo "<button class='accordion-button collapsed' type='button' id='btn' data-bs-toggle='collapse' data-bs-target='#flush-collapse$i' aria-expanded='false' aria-controls='flush-collapse$i'>$item[playlist_name]</button>";
                echo "</h2>";
                echo "<div id='flush-collapse$i' class='accordion-collapse collapse' aria-labelledby='flush-heading$i' data-bs-parent='#accordionFlushExample'>";
                echo "<div class='accordion-body'>";
                echo "<div class='list-group list-group-flush'>";
                $curpl = $item['playlist_name'];

                $result2 = mysqli_query($link,"SELECT * FROM `playlists_fixed` WHERE `playlist_name` = '$pl'");
                while($name = mysqli_fetch_assoc($result2)){
                  echo "<a href='#hideblock' class='list-group-item list-group-item-action' videoid='$name[video_id]' id='eventclick'>$name[video_name]</a>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }

              $i = $i + 1;
            }
            ?>

          </div>
        </div>
        <div class="col-lg-9 col-sm-12 order-1 order-sm-1 order-lg-2">
          <div id="hideblock" class="sticky-top">
            <div class="embed-responsive embed-responsive-16by9">
              <h3></h3>
              <iframe width="720" height="480" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function start(){
        $('#btn').removeClass('collapsed');
        $('#btn').attr('aria-expanded','true');
        $('#flush-collapse0').addClass("show");
        var elem = document.getElementById('eventclick').innerHTML;
        var id = $('#eventclick').attr('videoid');
        var src = 'https://www.youtube.com/embed/'+id;
        $('h3').html(elem);
        $('iframe').attr('src',src);
      }
      start();
    </script>

    <!-- Футер -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Словарь РЖЯ</p>
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#top" class="nav-custom nav-link px-2">Наверх</a></li>
        </ul>
      </footer>
    </div>

    <script src="js/main_youtube.js"></script>
    <script src="js/search.js"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>
