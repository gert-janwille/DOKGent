<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="De ontmoetingsplek voor elke Gentenaar, een hangplek voor piepjong, jong, minder jong en ronduit oud. Maar ook een platform voor creatie en een werkplek, een plaats voor organisaties of indivduen op zoek naar samenwerking en inspirerende kruisbestuivingen.">
    <meta name="keywords" content="DOK, Gent, 2017">
    <meta name="author" content="Gert-Jan Wille">
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

    <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
    <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

    <div class="loading"><div class="loader"></div></div>

    <nav>
      <ul class="nav-container">
        <li><a href="#" class="w-icon align-right close-menu"><p>Close</p><span class="close"></span></a></li>
        <li><a href="index.php">Home</a></li>

        <li><a href="#" class="w-icon toggle-list"><p>Zones</p><span class="more-menu"></span></a></li>
        <ul class="more-list close-list">
          <li><a href="#">Zondag</a></li>
          <li><a href="#">Kantine</a></li>
          <li><a href="#">Park</a></li>
          <li><a href="#">Markt</a></li>
          <li><a href="#">Keuken</a></li>
          <li><a href="#">Sport</a></li>
          <li><a href="#">Tank</a></li>
        </ul>

        <li><a href="index.php?page=events">Programma</a></li>
        <li><a href="#">Praktisch</a></li>
        <li><a href="#">Nieuws</a></li>
        <li><a href="#">DokBewoners</a></li>

      </ul>
    </nav>

    <div class="container nav-close">

      <section class="fixed-nav">

        <article class="top-nav">
          <a href="#" class="menu icon"><span class="hidden">Menu</span></a>
          <a href="#" class="search icon"><span class="hidden">Zoek</span></a>
          <form class="search-header away" action="index.php?page=events" method="post">
            <input type="text" name="search" placeholder="Naar wat zoekt u?">
            <input type="submit" name="action" value="Zoeken">
          </form>
          <a href="index.php" class="logo icon"><span class="hidden">DOK</span></a>
        </article>

        <div class="search-overlay away"></div>

        <div class="row-container">
          <div class="social">
            <a href="http://www.facebook.com/pages/DOK/155427904513736" target="_blank" class="fb icon"><span class="hidden">Facebook</span></a>
            <a href="http://twitter.com/#!/dokgent" target="_blank" class="twitter icon"><span class="hidden">Twitter</span></a>
          </div>

          <main <?php if($_GET['page'] == 'home') echo 'style="background: #ebca69;"' ?>>
            <?php if ($_GET['page'] != 'home'){
              echo $content;
            } else {?>

            <section class="home-header">
              <article class="top-header">
                <h1>Dok</h1>
                <h2>1 Mei - 25 Sept</h2>
              </article>

              <article class="bottom-header">
                <h1>2017</h1>
                <p>De ontmoetingsplek voor elke Gentenaar, een hangplek voor piepjong, jong, minder jong en ronduit oud. Maar ook een platform voor creatie en een werkplek, een plaats voor organisaties of indivduen op zoek naar samenwerking en inspirerende kruisbestuivingen.</p>
              </article>

              <div class="quick-nav">
                <ul class="quick-main-nav quick-visible">
                  <li><a href="#" class="zones-btn"><p>Zones</p></a></li>
                  <li><a href="index.php?page=events"><p>Programma</p></a></li>
                  <li><a href="#"><p>Praktisch</p></a></li>
                  <li><a href="#"><p>Nieuws</p></a></li>
                  <li><a href="#"><p>DokBewoners</p></a></li>
                </ul>

                <ul class="zones quick-invisible">
                  <li><a href="#"><p>Zondag</p></a></li>
                  <li><a href="#"><p>Kantine</p></a></li>
                  <li><a href="#"><p>Park</p></a></li>
                  <li><a href="#"><p>Markt</p></a></li>
                  <li><a href="#"><p>Bewoners</p></a></li>
                  <li><a href="#"><p>Keuken</p></a></li>
                  <li><a href="#"><p>Sport</p></a></li>
                  <li><a href="#"><p>Tank</p></a></li>
                  <div class="close-zones icon"><a href="#"><span class="hidden">close</span></a></div>
                </ul>
              </div>
            </section>

            <?php } ?>
          </main>

          <p class="street">Splitsing Koopvaardijlaan – Afrikalaan 9000 Gent</p>

        </div>

      </section>

      <?php if ($_GET['page'] == 'home'){
        echo $content;
      }else{?>
        <footer class="sponsors">

          <img class="own" src="./assets/img/dok/dokgentlogo.png" alt="Dok Gent">

          <img src="./assets/img/sponsors/biofresh_ok.png" alt="Biofresh">
          <img src="./assets/img/sponsors/bionade_ok.png" alt="Bionade">
          <img src="./assets/img/sponsors/eulala_ok.png" alt="Eulala">
          <img src="./assets/img/sponsors/pa-cirq.png" alt="Cirq">
          <img src="./assets/img/sponsors/pa-democrazy.png" alt="Democrazy">
          <img src="./assets/img/sponsors/pa-gent.png" alt="Gent">
          <img src="./assets/img/sponsors/pa-thuis.png" alt="Thuis">
          <img src="./assets/img/sponsors/pa-vedett.png" alt="Vedett">
          <img src="./assets/img/sponsors/pa-vlaamse-overheid.png" alt="Vlaamse Overheid">
          <img src="./assets/img/sponsors/pepsi_ok.png" alt="Pepsi">
          <img src="./assets/img/sponsors/sogent_ok.png" alt="Sogent">


        </footer>
      <?php } ?>


    </div>

    <?php echo $js;?>
  </body>
</html>
