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
              <a class="nav-link" aria-current="page" href="/">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dazbuca.php">Дактильная азбука</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Вход (только для админа)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="about.php">О проекте</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div><br>
  <div class="container">
    <div class="row">
      <h1>Русский жестовый язык</h1>
      <p>Русский жестовый язык (РЖЯ) — национальная лингвистическая система, обладающая собственной лексикой и грамматикой, используемая для общения глухих и слабослышащих, живущих в России, а также на территории СНГ (Белоруссия, Казахстан), а также Украины. Грамматика русского жестового языка сильно отличается от грамматики русского словесного языка: поскольку слова сложнее преобразовывать морфологически, то грамматика (например, порядок и образование слов) более строгая, чем в русском языке. Согласно общепринятой точке зрения, принадлежит к семье французской жестовой речи, близок к амслену; много лексики взято из австрийского жестового языка.</p>
      <h3>Немного истории</h3>
      <p>Первая сурдопедагогическая школа в России открылась в 1806 г. в Павловске (близ Петербурга). Как и в США, работала по французской методике (в результате чего РЖЯ оказался в родстве с жестовым языком Америки). В Москве же сурдопедагогическая школа открылась в 1860 г. Она работала по немецкой методике. Отголоски борьбы этих двух методик чувствуются в российской сурдопедагогике до сих пор.</p>
      <p>Его ввел в обиход директор Санкт-Петербургского училища глухонемых Г.А. Гурцов. Осознавая насущную необходимость глухих в словесном общении, он предложил обучать детей мимическому языку параллельно с письменным. В середине прошлого века образовалась Всемирная Федерация Глухих, и она стандартизировала язык жестов, разработав его единый вариант для всех национальностей. Словарь Международного языка жестов вышел в свет в 1973 году.</p>
      <h3>Современный русский жестовый язык</h3>
      <p>Известное изречение гласит: есть язык — есть народ, нет языка — нет народа. Отличительная особенность РЖЯ в качестве языка межнационального общения заключается в том, что он не вытесняет языки народов, населяющих федерацию, а функционирует наряду с ними. Такое взаимодействие образовало единый лексический фонд на основе русского языка.</p>
      <p>Для полноценного изучения языка жестов, помимо теории обязательно необходимо приобрести практические навыки. Без них беглый сурдоперевод нереален. С целью освоения жестов на практике выпускаются специальные видео курсы. В целом изучение языка жестов потребует не меньше времени, чем любой другой язык, а итогом работы со словарем, лекции и видео уроки станет решение следующих задач:</p>
      <ul class="list">
        <li>Расширение знаний в области лингвистической базы языка.</li>
        <li>Ознакомление с историей возникновения языка жестов и этапами его развития.</li>
        <li>Прививка мнения о важности изучения языка. Понимание роли русской и жестовой речи в жизни общества.</li>
        <li>Изучение схожих с другими языками и отличных от них особенностей.</li>
        <li>Формирование представления о языке глухих, как о естественном способе общения между людьми.</li>
      </ul>
      <p>В действительности понимать глухих гораздо сложнее, чем просто изучить жесты и показывать их самому. В жестикуляции глухих часто встречаются слова и выражения, которые тяжело перевести на обычный русский язык.</p>
    </div>
  </div>

  <!-- Модульное окно -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Вход в административную панель</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="admin.php" method="post">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="paswd" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Войти</button></form>
        </div>
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

  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
