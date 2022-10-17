<?php
class Richestpeoples extends Controller {

  public function __construct() {
    $this->richestpeopleModel = $this->model('Richestpeople');
  }

  public function index() {
    /**
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $richestpeoples = $this->richestpeopleModel->getRichestpeoples();

    /**
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($countries as $value){
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->capitalCity, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->continent, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . number_format($value->population, 0, ',', '.') . "</td>
                  <td><a href='" . URLROOT . "/richestpeoples/delete/$value->id'>delete<a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>Richestpeoples</h1>',
      'countries' => $rows
    ];
    $this->view('richestpeoples/index', $data);
  }

  

  public function delete($id){

    $this->richestpeopleModel->deleteCountry($id);

    $data =[
      'deleteStatus' => "Het record meet id = $id is verwijdert"
    ];
    $this->view("richestpeoples/delete", $data);
    header("Refresh:2; url=" . URLROOT . "/richestpeoples/index");
  }
}

?>