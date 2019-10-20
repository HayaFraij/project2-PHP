<?php
  include "../../View/Layout/header.php";
  include "../../Model/Products/Product.php";
  include "../../Controller/Database/DB.php";

  $DB = new DB();
  $conn = $DB->connect();

  $ProductClass = new Product($conn);
  $getAll = $ProductClass->listProducts();
//  $delete = $ProductClass->delete();
//echo $listOfProducts[0]['name'];
echo "<br>";
echo "<br>";
//  var_dump($listOfProducts);

$keysForProductsTable = array_keys($getAll[0]);
$valuesForProductsTable = array_values($getAll);
//var_dump($valuesForProductsTable);
//var_dump($keysForProductsTable);
//echo "<br>";
//echo "<br>";
//var_dump($listOfProducts);

?>

<table class="table">
  <thead class="thead-dark">
  <tr>
    <?php
      foreach ($keysForProductsTable as $value){
        echo  '<th scope="col">'. $value.'</th>';
      }
    echo '<th> Delete </th>';
    echo '<th> Edit </th>';
    ?>
  </tr>
  </thead>


  <tbody>
  <tr>
    <?php

//    $valuesForProductsTableForeach = $valuesForProductsTable;
    foreach ($valuesForProductsTable as $value){
          echo '<tr>';
      $id = $value[id];
      foreach ($value as $i => $tableData){
        echo ' <td scope="row">' . $tableData . '</td>';
        if (isset($_POST['delete'])) {
          if($id === $value[id]){
//            $ProductClass->delete($id);
            echo "hello $id";
          }
      }
      }
      echo '<form method="post">
        <td><button id="test" name="delete" class="btn btn-danger">X</button></td>
        </form>';
      echo '<td><button class="btn btn-info">edit</button></td>';
      echo '</tr>';
    }
    ?>
  <?php
    ?>
  </tr>
  </tbody>
</table>



<?php
  include "../../View/Layout/footer.php";