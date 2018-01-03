<?php

class persoon{
  public $naam;
  private $leeftijd;
  protected $geslacht;



  // aanmaken
  function __construct($persoonsnaam, $leeftijd, $geslacht){
    $this->naam = $persoonsnaam;
    $this->leeftijd = $leeftijd;
    $this->geslacht = $geslacht;
    echo "<br>Nieuw Persoon object $persoonsnaam aangemaakt";
  }
  // verwijderd
  function __destruct(){
    // voer de benodigde acties uit;
    echo "<br>Persoon object $this->naam word verwijderd";
  }
  // in zetten
  function setGeslacht($geslacht){
    $this->geslacht = $geslacht;
  }
  // opvragen
  function getGeslacht(){
    return $this->geslacht;
  }


  // function setLeeftijd($leeftijd) {
  //   $this->leeftijd = $leeftijd;
  //   echo "<br>Leeftijd van $this->naam omgezet in: $this->leeftijd";
  // }
  // function getLeeftijd(){
  //   return $this->leeftijd;
  // }

  function setNaam($persoonsnaam) {
    if(is_string($persoonsnaam)) {
      $this->naam = $persoonsnaam;
    }else {
      echo "<br>Datatype error in setNaam() methode.";
    }
  }
  function getNaam(){
    return $this->naam;
  }


  function setLeeftijd($leeftijd) {
    if(is_integer($leeftijd)) {
      $this->leeftijd = $leeftijd;
    }else {
      throw new Exception(
        "<br>Datatype Exception in setLeeftijd() methode."
      );
    }
  }
  function getLeeftijd(){
    return $this->leeftijd;
}

// laat naam, leeftijd en geslacht zien van een persoon
public function printGegevens(){
  $gegevens = "<br>De gegevens van $this->naam zijn:
  <br>Leeftijd: $this->leeftijd
  <br>Geslacht: $this->geslacht";
  echo $gegevens;
}


}
// einde persoon class


class User extends Persoon {
  private $mail;
  private $wachtwoord;
  public $admin;

  function __construct(
    $persoonsnaam, $leeftijd, $geslacht, $email, $wachtwoord, $admin){
      parent::__construct(
        $persoonsnaam, $leeftijd, $geslacht);
      $this->email = $email;
      $this->wachtwoord = $wachtwoord;
      $this->admin = $admin;
    echo "<br>Nieuw User $persoonsnaam extends Persoon";
}


function __destruct(){
  // voer de benodigde acties uit
  echo "<br>User object $this->naam word verwijderd";
}

public function setEmail($email){
  $this->email = $email;
}

public function setWachtwoord($wachtwoord){
  $this->wachtwoord = $wachtwoord;
}

public function setAdmin($admin){
  $this->admin = $admin;
}

public function getEmail(){
  return $this->email;
}

public function getWachtwoord(){
  return $this->wachtwoord;
}

public function getAdmin(){
  return $this->admin;
}

public function printGegevens(){
  $gegevens = parent::printGegevens();
  $gegevens .= "<br>E-mail: $this->mail";
  $gegevens .= "<br>Wachtwoord: $this->wachtwoord";
  $gegevens .= "<br>Admin: $this->admin";
  echo $gegevens;
}
}
// einde userclass

interface Ishoppingcart{
  public function addToCart(Item $item);
  public function printCart();
}

abstract class Shoppingcart implements Ishoppingcart {
  protected $items = array();
  public function addToCart($item){
    $this->items[] = $item;
  }
}
// einde Shoppingcart


class MyShoppingcart extends Shoppingcart {
  public function printCart(){
    echo "<table border=1>
    <tr>
      <td>Product ID</td>
      <td>Omschrijving</td>
      <td>Prijs</td>
      <td>Aantal</td>
    </tr>";
    foreach( $this->items as $item){
      $rij = "";
      $rij .= "<tr>";
      $rij .= "<td>" . $item->getId() . "</td>";
      $rij .= "<td>" . $item->getOmschrijving() . "</td>";
      $rij .= "<td>" . $item->getPrijs() . "</td>";
      $rij .= "<td>" . $item->getAantal() . "</td>";
      $rij .= "</tr>";
      echo($rij);
    }
    echo "</table>";
  }
}
// einde MyShoppingcart

class Item {
  private $id;
  private $merk;
  private $model;
  private $prijs;
  private $aantal;
  function __construct($id, $merk, $model, $prijs, $aantal){
    $this->id = $id;
    $this->merk = $merk;
    $this->model = $model;
    $this->prijs = $prijs;
    $this->aantal = $aantal;
  }

  function __destruct(){
    // voer de benodigde acties uit
    echo("<br>Item $this->id wordt verwijderd");
  }

  public function getId(){
    return $this->id;
  }

  public function getOmschrijving(){
    return($this->merk . " " . $this->model);
  }

  public function getPrijs(){
    return $this->prijs;
  }

  public function getAantal(){
    return $this->aantal;
  }
  public function setAantal($aantal){
    if(is_integer($aantal)) {
      $this->aantal = $aantal;
    } else {
      throw new Exception(
        "<br>Datatype Exception in setAantal() methode.");
    }
  }
  // public function getTotaal(){
  //
  // }


  // interface {
  //   public function getID(Item $item);
  //   public function getPrijs();
  // }
  //
  // abstract class Item implements Iitem {
  //   protected $items = array();
  //   public function getID($item){
  //     $this->items = $item;
  //   }
  //   public function getPrijs($item){
  //     $this->item = $item;
  //   }
  // }


}
// einde item
?>
