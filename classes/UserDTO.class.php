<?php


class UserDTO {
  public $id;
  public $uId;
  public $firstName;
  public $lastName;
  public $gmail;
  public $image;
  public $phone;

  // public function __construct() {

  // }

  public function __construct1($firstName, $lastName, $phone, $image) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->phone = $phone;
    $this->image = $image;
  }

  public function __construct2($id, $uId, $firstName, $lastName, $gmail, $image, $phone) {
    $this->id = $id;
    $this->uId = $uId;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->gmail = $gmail;
    $this->image = $image;
    $this->phone = $phone;
  }

  public function setId() {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setUId() {
    $this->uId = $uId;
  }

  public function getUId() {
    return $this->uId;
  }

  public function setFirstName() {
    $this->firstName = $firstName;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function setLastName() {
    $this->lastName = $lastName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function setGmail() {
    $this->gmail = $gmail;
  }

  public function getgmail() {
    return $this->gmail;
  }

  public function setImage() {
    $this->image = $image;
  }

  public function getImage() {
    return $this->image;
  }

  public function setPhone() {
    $this->phone = $phone;
  }

  public function getPhone() {
    return $this->phone;
  }
}