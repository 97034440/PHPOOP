<html>
<head>
  <?php include("shoppingcart.php") ?>
  <title>Opgave 22 PHP OOP</title>
</head>
<body>
  <?php
    $item1 = new Item("001", "Toshiba", "Satelite", 999.99, 10);
    $item2 = new Item("002", "Acer", "Aspire", 1099.99, 5);

    $myShoppingcart = new MyShoppingcart();
    $myShoppingcart->addToCart($item1);
    $myShoppingcart->addToCart($item2);
    $myShoppingcart->printCart();

  ?>
</body>
</html>
