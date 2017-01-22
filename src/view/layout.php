<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php echo $css;?>

    <script>

    WebFontConfig = {
      custom: {
        families: ['Avenir'],
        urls: ['assets/fonts/Avenir/Avenir.css']
      }
    };

    (function(d) {
      var wf = d.createElement('script'), s = d.scripts[0];
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js';
      s.parentNode.insertBefore(wf, s);
    })(document);

  </script>

  </head>
  <body>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <section class="fixed-nav">

        <article class="top-nav">
          <a href="#" class="menu icon"><span class="hidden">Menu</span></a>
          <a href="#" class="search icon"><span class="hidden">Zoek</span></a>
          <a href="index.php" class="logo icon"><span class="hidden">DOK</span></a>
        </article>


        <div class="row-container">
          <div class="social">
            <a href="http://www.facebook.com/pages/DOK/155427904513736" target="_blank" class="fb icon"><span class="hidden">Facebook</span></a>
            <a href="http://twitter.com/#!/dokgent" target="_blank" class="twitter icon"><span class="hidden">Twitter</span></a>
          </div>

          <main>qsdfqsd
            <?php if ($_GET['page'] != 'home') echo $content; ?>
          </main>

          <p class="street">Splitsing Koopvaardijlaan – Afrikalaan 9000 Gent</p>

        </div>

      </section>

      <?php if ($_GET['page'] == 'home') echo $content; ?>

    </div>

    <?php echo $js;?>
  </body>
</html>
