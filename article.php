<?php
  require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Блог IT_Минималиста!</title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/assets/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include 'includes/header.php'; ?>
    <?php
       // Небезопасный метод получения параметра GET
       $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = ". (int) $_GET['id']);
    ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <?php        
                if ( mysqli_num_rows($article) <= 0 ) {
                  ?>
                  <h3>Статья не найдена</h3>
                  <div class="block__content">
                    <div class="full-text">
                      Запршиваемая Вами статья не существует!
                    </div>
                  </div>

                  <?php
                } else {
                  $art = mysqli_fetch_assoc($article);
                  // Небезопасный метод получения параметра GET
                  mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = ". (int)$art['id']);
                  ?> 
                <a><?php echo $art['views']; ?> просмотров</a>
                <h3><?php echo $art['title']; ?></h3>
                <div class="block__content">
                  <img src="/uploads/images/<?php echo $art['image']; ?>">

                  <div class="full-text">
                    <?php echo $art['text']; ?>
                  </div>
                </div>
              <?php
                }
              ?>
            </div>

            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>
              <h3>Комментарии к статье</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                  <?php
                    $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = " . (int)$art['id'] . " ORDER BY `id` DESC");
                    if (mysqli_num_rows($comments) <= 0) 
                    {
                      echo "Нет комментариев!";
                    }
                    while( $comment = mysqli_fetch_assoc($comments) )
                    {
                    ?>
                      <article class="article">
                      <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125);"></div>
                        <div class="article__info">
                          <a href="#"><?php echo $comment['author']; ?></a>
                          <div class="article__info__meta">
                            <small>10 минут назад</small>
                          </div>
                          <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                        </div>
                      </article>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form" method="POST" action="/article.php?id=<?php echo $art['id']; ?>">
                  <?php 
                    if( isset($_POST['do_post']) ){
                      $errors = array();
                      if ( $_POST['name'] == ''){
                        $errors[] = "Введите имя!";
                      }
                      if ( $_POST['nickname'] == ''){
                        $errors[] = "Введите Ваш никнейм!";
                      }
                      if ( $_POST['email'] == ''){
                        $errors[] = "Введите email!";
                      }
                      if ( $_POST['text'] == ''){
                        $errors[] = "Введите текст комментария!";
                      }

                      if ( empty($errors) ){
                        // добавляем комментарий
                        // Небезопасный метод получения параметра GET
                        mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('". $_POST['name'] . "', '" . $_POST['nickname'] . "', '"  . $_POST['email'] . "', '" . $_POST['text'] . "', NOW(), '" . $art['id'] . "')");

                        echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block;">Комментарий успешно добавлен</span>';
                      } else {
                        echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block;">' . $errors['0'] . '</span>';
                      }
                    }
                  ?>
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя" value="<?php echo (empty($_POST['name'])) ? '' : $_POST['name']; ?>">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм" value="<?php echo (empty($_POST['nickname'])) ? '' : $_POST['nickname']; ?>">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form__control" required="" name="email" placeholder="Email (не будет показан)" value="<?php echo (empty($_POST['email'])) ? '' : $_POST['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."><?php echo (empty($_POST['text'])) ? '' : $_POST['text']; ?></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php include 'includes/sidebar.php'; ?>
          </section>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>

  </div>

</body>
</html>