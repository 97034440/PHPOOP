<html>
<head>
  <?php include("klassen.php") ?>
  <title>00 PHP</title>
</head>
<body>
  <?php
    $laptop1 = new Laptop("001", "Toshiba", "Satelite", 999.99, 10);
    $boek1 = new Boek("1765343536", "\"A Little Life\"", "Hanya Tanagihara", 39.99, "1");

    $myShoppingcart = new MyShoppingcart();
    $myShoppingcart->addToCart($laptop1);
    $myShoppingcart->addToCart($boek1);
    $myShoppingcart->printCart();
    echo "Totaal bedrag is: ".$myShoppingcart->getTotaal();

  ?>

</body>
</html>
