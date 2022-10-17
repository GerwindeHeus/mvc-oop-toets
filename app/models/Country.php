<?php
  class Country {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getRichestpeoples() {
      $this->db->query("SELECT * FROM `richestpeople`;");

      $result = $this->db->resultSet();

      return $result;
    }

    public function getSingleRichestpeople($id){
      $this->db->query("SELECT * FROM richestpeople WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function deleteRichestpeople($id){
      $this->db->query("DELETE FROM richestpeople WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }
  }

?>