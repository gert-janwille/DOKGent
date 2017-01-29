<header class="program-detail">
    <div class="top-detail header-detail">
      <h1>DOK</h1>
      <h2><?php echo $event['title']; ?></h2>
    </div>

    <div class="bottom-detail header-detail">
      <h1>2017</h1>
      <h2><?php echo date('l d F', strtotime($event['start'])); ?></h2>
    </div>
</header>

<?php
  $lines = explode(".", $event['description']);
  $maxlines = count($lines);

  $foldername = str_replace(' ', '', $event['title']);
  $d = preg_replace('/[^a-z\d]+/i', '', $foldername);

  $file = explode(' ',trim($event['image']));
  $maxfiles = count($file);

  $secondFile = ($maxfiles>0) ? 1 : 0;
?>

<section class="detail-main">
  <article class="first-met">

    <div class="img-title">
      <h1><?php echo $event['title']; ?></h1>
      <img src="./assets/img/program/<?php echo $d . '/'. $file[0] ?>" height="100%" alt="<?php echo $event['title']; ?>">
    </div>

    <p><?php echo $lines[0] .'. '. $lines[1].'.'; ?></p>

  </article>

  <article class="section-detail">

    <div class="description">
      <p><?php for ($i=2; $i < round($maxlines/2) ; $i++) echo $lines[$i]; ?></p>
      <p><?php for ($i=round($maxlines/2); $i < $maxlines ; $i++) echo $lines[$i]; ?></p>
    </div>

    <img src="./assets/img/program/<?php echo $d . '/'. $file[$secondFile] ?>" height="100%" alt="<?php echo $event['title']; ?>">
  </article>

  <article class="detail-info">

    <div class="bold-detail-info">
      <h1>Datum</h1>
      <h1>Uur</h1>
      <h1>Locatie</h1>
    </div>

    <div class="option-detail-info">
      <p><?php echo date('l d F', strtotime($event['start'])); ?></p>
      <p>vanaf <?php echo date('G', strtotime($event['start']));?>u - <?php echo date('G', strtotime($event['end']));?>u</p>
      <p><?php echo $event['name']; ?></p>
    </div>

  </article>

  <article class="instagram">
    <h1>Instagram</h1>

    <div class="pictures">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13108771_1719934594928153_1671160220_n.jpg?ig_cache_key=MTI0MDU5OTYyNjc5Mzc5NjA3Mw%3D%3D.2" alt="">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/c135.0.810.810/13827421_558782687663643_2120565249_n.jpg?ig_cache_key=MTMxMDg4NDE1MTM2OTE5NTk1MQ%3D%3D.2.c" alt="">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13768126_1744375602516684_1961783369_n.jpg?ig_cache_key=MTMxMTQ4OTY3MDI4NzA4ODY0OA%3D%3D.2" alt="">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13743439_282918785397419_1828110263_n.jpg?ig_cache_key=MTMxMTA0OTU0NzYzMjMzMzkwMQ%3D%3D.2" alt="">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/e15/11325437_1443986802573197_1155240266_n.jpg?ig_cache_key=MTAxMjQ3OTk1NDgxNjY4NTQwOQ%3D%3D.2" alt="">
      <img width="100%" src="https://scontent-bru2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/c0.100.799.799/14360212_1068794493215938_1990322574071955456_n.jpg?ig_cache_key=MTM0ODQwNDE0MTA0Mjg0MzI5NQ%3D%3D.2.c" alt="">
    </div>

  </article>

</section>
