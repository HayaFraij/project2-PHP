

<!--prepare with select !-->
<!--new product($conn)-->
<?php
include "/var/www/html/MVC_OOP_PHP/View/Layout/header.php";

?>

<?php
include "../../Controller/Database/DB.php";

$DB = new DB();
$conn = $DB->connect();

?>
<div class="container m-5 w-50">
<form method="post" action="<?php  $_SERVER["PHP_SELF"]?>">
  <div class="form-group">
    <label for="name">Product Name</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Product Name">
  </div>
  <div class="form-group">
    <label for="description">Product Description</label>
    <input name="description" type="text" class="form-control" id="description" placeholder="Product Description">
  </div>
  <div class="form-group">
    <label for="price">Product Price</label>
    <input name="price" type="text" class="form-control" id="price" placeholder="Product Price">
  </div>
  <div class="form-group">
    <label for="categories">Product Category</label>
<!--    <input name="categories" type="text" class="form-control" id="categories" placeholder="Product Category">-->
      <select name="categories" class="form-control" id="exampleFormControlSelect2">
        <option value="1"> Category 1</option>
        <option value="2"> Category 2</option>
        <option value="3"> Category 3</option>
      </select>

  </div>

  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
echo "Helllo";
include "../../Model/Products/Product.php";
if(isset($_POST['submit'])) {
  echo "Helllo";

  $product = new Product($conn);

  $product->setName($_POST['name']);
  $product->setDescription($_POST['description']);
  $product->setPrice($_POST['price']);
  $product->setCategoryId($_POST['categories']);
// var_dump($product);
  $product->create();


//$product->setCreated(time());
  echo $_POST['name'];
  var_dump($_POST['name']);
}
?>
<?php
include "/var/www/html/MVC_OOP_PHP/View/Layout/footer.php";
?>

