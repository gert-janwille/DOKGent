<section class="home-container">
  <article class="progress-bar">
    <ul>
      <li>01</li>
      <li>02</li>
      <li>03</li>
    </ul>
    <div class="bar">
      <div class="full-load"></div>
      <div class="fill-load"></div>
    </div>

  </article>

  <article class="intro-text">
    <h1>Wat is dok</h1>
    <p>Vanaf 1 mei 2017 tot 25 september 2017 opent DOK haar deuren iedere zondag én feestdagen van 11u tot 22u. Dit wordt de vaste afspraak. Op zondag kan je zowel terecht in de kantine, als in de speeltuin, het park (met het strand en de arena), de DOKbox, enz.</p>
    <h3 class="big-letter letter-d">D</h3>
  </article>

  <article class="verwachten">
    <h1>01</h1>
    <h2>Wat mag je <br/> verwachten</h2>
    <img src="./assets/img/camping.jpg" width="100%" alt="Sfeerfoto van Dok Gent">
  </article>

  <article class="program">
    <h3 class="big-letter letter-o">O</h3>

    <?php foreach ($events as $event):
      $images = explode(" ", $event['image']);
    ?>
    <a href="#" class="item">
      <img src="./assets/img/program/<?php echo str_replace(array(";",":"), "", $event['title']) . "/" . $images[0] ?>" width="100%" alt="<?php echo $event['title'] ?>">
      <div class="info">
        <h1><?php echo strtolower($event['title']); ?></h1>
        <h2><?php echo date('d M', strtotime($event['start'])); ?></h2>
      </div>
    </a>
  <?php endforeach; ?>

  </article>

  <article class="info-alg mobi-in">
    <div>
      <p>DOK wil nadrukkelijk nieuwe initiatieven, beginnende organisaties en tal van projecten hosten en ontvangen op de site.</p>
      <p>DOK stelt infrastructuur ter beschikking: een grote buitenzone met arena, een strand, een overdekte ruimte, en een kantine met een klein podium. DOK is een ontmoetings- en werkplek die mensen en organisaties wil inspireren om ideëen te ontwikkelen en die vervolgens ook te realiseren.</p>
      <p>Er kunnen producties getest worden, opgestart en uitgevoerd. DOK als tijdelijke invulling kan een denktank zijn met een verfrissende kijk op stadsontwikkeling</p>
    </div>

    <img class="right" src="./assets/img/projectDok.jpg" alt="Dok Project">
    <h3 class="big-letter letter-k">K</h3>
  </article>

  <article class="info-alg info-list">
    <img class="left" src="./assets/img/cosycozy.jpg" alt="Dok Project">

    <div>
      <ul>
        <li><p>Iedere zondag staat er vanaf 11u taart, koffie en gazet voor u klaar in de kantine.</p></li>
        <li><p>Cosy Cozy zorgt tussen 14u en 19u voor meer dan gezellige dj’s.</p></li>
        <li><p>Vanaf 31 juli kan je weer iedere zondag komen grasduinen op de DOK(rommel)markt, voorzien van eetstandjes</p></li>
      </ul>
    </div>

  </article>

  <article class="section-2">
    <h3 class="big-letter letter-g">G</h3>
    <h1>Ons Laatste <br>Nieuws</h1>
    <h2>02</h2>
  </article>

  <article class="news">
    <h3 class="big-letter letter-e">E</h3>
    <header>
      <div class="header-container">
        <h1>Dokbewoners: Wat na DOK 2016</h1>
      </div>

      <img src="./assets/img/watnadok.jpg" width="100%" alt="foto Dokbewoners: Wat na DOK 2016">
    </header>
    <p>
      DOK gaat in een diepe winterslaap, maar zijn DOKbewoners zijn dat allerminst van plan. We geven je graag een overzicht van wat iedereen zoal van plan is, het komende jaar. Metalcrew gaf dit jaar verschillendeworkshops‘smeden en lassen voor kinderen’ onder de markt, en gaat daar nog even mee verder op DOK.
      <span class="read-more"><a href="#">Read more</a></span>
    </p>
  </article>

  <article class="section-3 flex-reverse">
    <h3 class="big-letter letter-n">N</h3>
    <h1>Kom even <br>Langs</h1>
    <h2>03</h2>
  </article>

  <article class="small-info">
    <div class="map">
      <iframe
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBc3B9mOka6J84d2_ZU1WKOr4F3duccOK4&q=Koopvaardijlaan+13+9000+Gent" allowfullscreen>
      </iframe>
    </div>

    <div class="location-info">
      <p class="short-info">Op een imposant terrein naast het Handelsdok bij Gent Dampoort (aan de splitsing Afrikalaan – Koopvaardijlaan) kiemt een nieuwe stadswijk.</p>

      <div class="table-info">

        <div>
          <p>Openingsuren</p>
          <p>Elke Zondag van 11u - 22u <br> Raadpleeg de agenda voor andre dagen</p>
        </div>

        <div>
          <p>Adres</p>
          <p>Splitsing Koopvaardijlaan – Afrikalaan <br> 9000 Gent  <br>info@dokgent.be</p>
        </div>

      </div>

      <form class="newsletter" action="index.php#newsletter" method="post">
        <label for="newsletter">Blijf op de hoogte</label>

        <div class="input-newsletter">
          <input type="email" name="newsletter" placeholder="Jouw e-mail" id="newsletter">
          <input type="submit" name="action" value="Hou me op de hoogte">
        </div>

        <p>We sturen regelmatig mails om jouw op de hoogte te houden van onze nieuwe updates</p>
      </form>

    </div>
<h3 class="big-letter letter-t">T</h3>
  </article>

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
</section>
