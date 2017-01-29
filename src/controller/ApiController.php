<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class ApiController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $params = $_GET;
    $body = $_POST;

    if (!empty($params['fetch'])) {
      switch ($params['fetch']) {
        case "all":
          $result = $this->selectAll();
          break;

        case "id":
          $result = $this->selectById($params);
          break;

        case "filter":
          $result = $this->selectFilter($body);
          break;

        default:
          $result = $this->selectAll();
          break;
      }

      header('Content-Type: application/json');
  		echo json_encode($result);
    }
  }

  private function selectAll() {
    $events = $this->eventDAO->selectAll();
		return $events;
  }

  private function selectById($params) {
    if (!empty($params['id'])) {
      $event = $this->eventDAO->selectById($params['id']);

      if (empty($event)) {
        $event[0] = "id was not found";
        http_response_code(404);
      }
    } else {
      $event[0] = "no id was given";
      http_response_code(404);
    }

		return $event;
  }

  private function selectFilter($body) {
    $conditions = array();

    $locations = array();
    $tags = array();

    $alltags = count($locations) + count($tags);
    $start = $alltags - count($tags)+1;
    $end = $start + count($tags)-1;

    if (!empty($body['search'])) {
      $conditions = $this->searchbybar();
    }

    foreach ($body as $key => $value) {
      if (substr( $key, 0, 8 ) === "location") array_push($locations, $value);
      if (substr( $key, 0, 4 ) === "item") array_push($tags, $value);
    }

    //date
    if (!empty($body['date']) && $body['date'] !== 'all') {
      $conditions[0] = array(
        'field' => 'start',
        'comparator' => '=',
        'value' => $body['date']
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
		$events = $this->eventDAO->search($conditions);
		return $events;
	}

}
