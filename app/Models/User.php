<?php

namespace App\Models;

use App\Config\Database;

class User extends Database {
  private $table = 'users';
  private $id;
  private $username;
  private $email;

  public function __construct($table, $id, $username, $email) {
    $this->table = $this->table;
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
  }

  public function getId() {
    return $this->id;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
}
