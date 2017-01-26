<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $conditions = array();

    $locations = array();
    $tags = array();

    $alltags = count($locations) + count($tags);
    $start = $alltags - count($tags)+1;
    $end = $start + count($tags)-1;

    foreach ($_POST as $key => $value) {
      if (substr( $key, 0, 8 ) === "location") array_push($locations, $value);
      if (substr( $key, 0, 4 ) === "item") array_push($tags, $value);
    }

    //date
    if (!empty($_POST['date']) && $_POST['date'] !== 'all') {
      $conditions[0] = array(
        'field' => 'start',
        'comparator' => '=',
        'value' => $_POST['date']
      );
    }

    //location
    for ($loc=1; $loc < count($locations)+1; $loc++) {
      $conditions[$loc] = array(
        'field' => 'location',
        'comparator' => 'like',
        'value' => $locations[$loc-1]
      );
    }

    //tags
    for ($tag=0; $tag < count($tags); $tag++) {
      $conditions[$start] = array(
       'field' => 'tag',
       'comparator' => '=',
       'value' => $tags[$tag]
     );
     $start++;
    }

    $this->set('locationArray', $locations);
    $this->set('tagArray', $tags);

    $this->set('events', $this->eventDAO->search($conditions));
    $this->set('locationTags', $this->eventDAO->selectAllTags('locations'));
    $this->set('itemTags', $this->eventDAO->selectAllTags('tags'));
    $this->set('eventDates', $this->eventDAO->selectAllEventDates());
  }

  public function Detail(){
    $this->set('event', $this->eventDAO->selectById($_GET['id']));
  }

}
