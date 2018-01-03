<?php

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
      $rij = "<tr>";
      $rij = "<td>" . $item->getId() . "</td>";
      $rij = "<td>" . $item->getOmschrijving() . "</td>";
      $rij = "<td>" . $item->getPrijs() . "</td>";
      $rij = "<td>" . $item->getAantal() . "</td>";
      $rij = "</tr>";
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
    $this->aantal = $aantal;
  }

}
// einde item


?>
