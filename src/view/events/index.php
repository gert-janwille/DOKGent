<header class="program-header">

  <form class="event-filter" action="index.php?page=events" method="post">

    <div class="top-program">
      <h1>DOK</h1>
      <h2>Programma</h2>

      <select class="date-picker" name="date">
        <option value="all">All</option>
        <?php foreach ($eventDates as $date):?>
        <option value="<?php echo $date['start'] ?>" <?php if(!empty($_POST['date']) && $_POST['date'] === $date['start']) echo "selected" ?>><?php echo date('l d F', strtotime($date['start'])); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="bottom-program">
      <h1>2017</h1>

      <div class="filter-arrow">
        <p>filter</p>
        <a href="#" class="filter-down"><span class="hidden">More</span></a>
      </div>

      <article class="location-tag tags">
        <h2>Locatie</h2>
        <div class="tag-container">
          <?php foreach ($locationTags as $locationTag):?>

          <div class="tag">
            <input type="checkbox" id="<?php echo 'tag_' . $locationTag['name']?>" name="<?php echo 'location_' . $locationTag['name'] ?>" value="<?php echo $locationTag['name'] ?>" <?php foreach ($locationArray as $locAr) if($locAr === $locationTag['name']) echo "checked";?>>
            <label for="<?php echo 'tag_' . $locationTag['name']?>"><?php echo $locationTag['name'] ?></label>
          </div>
          <?php endforeach; ?>
        </div>

      </article>

      <article class="item-tag tags">
        <h2>Tag</h2>

        <div class="tag-container">
          <?php foreach ($itemTags as $itemTag):?>
          <div class="tag">
            <input type="checkbox" id="<?php echo 'tag_' . $itemTag['tag']?>" name="<?php echo 'item_' . $itemTag['tag'] ?>" value="<?php echo $itemTag['tag'] ?>" <?php foreach ($tagArray as $tagAr) if($tagAr === $itemTag['tag']) echo "checked";?>>
            <label for="<?php echo 'tag_' . $itemTag['tag']?>"><?php echo $itemTag['tag'] ?></label>
          </div>
          <?php endforeach; ?>
        </div>
      </article>

      <input type="submit" name="action" value="Filter Resultaten">

    </div>

  </form>

</header>

<section class="program-container">

  <?php
    $totalEvents = count($events);
    $eventCounter = 0;
    $classArtikel;

    if (empty($events)) {?>
      <div class="sorry-no-events">
        <h1>Sorry, we vonden geen evenementen.</h1>
        <p>Probeer een andere datum of tag.</p>
      </div>
    <?php }else{

      foreach ($events as $event):

        switch ($eventCounter % 7) {
          case 0:
            $classArtikel = "item-one";
            break;
          case 1:
            $classArtikel = "item-two";
            break;
          case 2:
            $classArtikel = "item-tree";
            break;
          case 3:
            $classArtikel = "item-four";
            break;
          case 4:
            $classArtikel = "item-five";
            break;
          case 5:
            $classArtikel = "item-six";
            break;
          case 6:
            $classArtikel = "item-seven";
            break;
        }

        $eventCounter++;

        $foldername = str_replace(' ', '', $event['title']);
        $d = preg_replace('/[^a-z\d]+/i', '', $foldername);
        $file = explode(' ',trim($event['image']));
  ?>
  <article class="<?php echo $classArtikel ?> event-item">
    <img src="./assets/img/program/<?php echo $d . '/'. $file[0] ?>" height="100%" alt="">
    <a href="index.php?page=detail&amp;id=<?php echo $event['id'] ?>" class="text-event-item">
      <h2><?php echo substr(($db_all) ? $event['name'] : $event['locations'][0]['name'], 3);?></h2>
      <h1><?php echo $event['title'] ?></h1>

      <div class="hover-event-item">
        <p><?php echo implode(' ', array_slice(explode(' ', $event['description']), 0, 10)).'...' ?></p>
        <p class="time-event-item"><?php echo date('n F', strtotime($event['start'])); ?></p>
      </div>
    </a>
  </article>
  <?php
      endforeach;
    }
  ?>

</section>
