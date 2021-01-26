<?php
  require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

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

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>Все статьи - </h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                <?php
                  $per_page = 4;
                  $page = 1;

                  if( isset($_GET['page']) ){
                      $page = (int) $_GET['page'];
                  }

                  $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles`");
                  $total_count = mysqli_fetch_assoc($total_count_q);
                  $total_count = $total_count['total_count'];

                  $total_pages = ceil($total_count / $per_page);

                  if ( $page <=1 || $page >  $total_pages) {
                      $page = 1;
                  }

                  $offset = 0;

                  if ( $page != 0) {
                    $offset = $per_page * $page;
                  }

                  $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset, $per_page");
                ?>

                <?php 
                  while( $art = mysqli_fetch_assoc($articles) )
                  { 
                    ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/uploads/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php 
                          $arc_cat = false;
                          foreach ( $categories as $cat ) {
                            if ( $cat['id'] == $art['categorie_id'] ){
                              $art_cat = $cat;
                              break;
                            }
                          }
                        ?>
                        <small>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?categorie=7">Все записи</a>
              <h3>Безопасность [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                <?php
                  $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 7 ORDER BY `id` DESC LIMIT  10");
                ?>

                <?php 
                  while( $art = mysqli_fetch_assoc($articles) )
                  { 
                    ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/uploads/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php 
                          $arc_cat = false;
                          foreach ( $categories as $cat ) {
                            if ( $cat['id'] == $art['categorie_id'] ){
                              $art_cat = $cat;
                              break;
                            }
                          }
                        ?>
                        <small>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                      <?php
                    }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?categorie=4">Все записи</a>
              <h3>Программирование [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                <?php
                  $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT  10");
                ?>

                <?php 
                  while( $art = mysqli_fetch_assoc($articles) )
                  { 
                    ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/uploads/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php 
                          $arc_cat = false;
                          foreach ( $categories as $cat ) {
                            if ( $cat['id'] == $art['categorie_id'] ){
                              $art_cat = $cat;
                              break;
                            }
                          }
                        ?>
                        <small>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                      <?php
                    }
                  ?>

                </div>
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