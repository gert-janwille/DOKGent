<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class HomeController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $this->checkAction('Hou me op de hoogte', 'subscribe');
    $this->set('events', $this->eventDAO->selectAll(5));
  }

  private function subscribe() {
    $validation = $this->validateData('email');

    if (empty($validation)) {
      $data = $_POST;
      $data['created'] = date("F j, Y, g:i a");

      $this->insertHandler('eventDAO', $data, 'index.php?#newsletter', 'Je bent ingeschreven als ', 'Inschrijving mislukt');

    }else{
      $_SESSION['error'] = 'Je bent je email vergeten in te vullen.';
      $this->set('errors', $validation);
    }
  }

  private function validateData($data){
    $errors = array();
    if (is_array($data)) {
      foreach ($data as $key) if(empty($_POST[$key]&& $_POST[$key] != " ")) $errors[$key] = 'Please enter a'. $key;
    }else{
      if(empty($_POST[$data]&& $_POST[$data] != " ")) $errors[$data] = 'Please enter a '. $data;
    }
    return $errors;
  }

  private function insertHandler($dao, $data, $link, $infotxt, $errortxt) {
    $inserted = $this->$dao->insert($data);
    if (empty($inserted)) {
      $emailName = $_POST['email'];
      unset($_POST);
      $_SESSION['info'] = $infotxt . ' <span class="emailName"> '.$emailName.'</span>';

      $this->redirect($link);
      $this->set('info', $info);
    }else{
      $errors = $this->$dao->getValidationErrors($data);
      $_SESSION['error'] = $errortxt;
      $this->set('errors', $errors);
    }
  }

  private function checkAction($aCall, $func){
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == $aCall) $this->$func();
    }
  }
}
