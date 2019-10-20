<?php

class Product
{
  private $conn;
  private $name;
  private $description;
  private $price;
  private $category_id;
  private $created;

  /**
   * Product constructor.
   * @param $conn
   */
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  function listProducts(){
    $sqlGet = $this->conn->prepare("SELECT * FROM products");
    $sqlGet->execute();

    $result = $sqlGet->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($result);
//    echo "<br>";
    return $result;
  }

  function delete($id){
    echo $id;
    echo "some thing will be deleted";
//    $sqlDelete = "DELETE FROM products WHERE id=$id";
//    $this->conn->exec($sqlDelete);
  }

  public function setCreated()
  {
    $date = new DateTime('2010-02-06 19:30:13');
    $time_created = $date->format('Y-m-d H:i:s'	);

    $this->created = $time_created;
  }

  function created(){

  }

  function create(){
    $this->setCreated();
    $sql = "INSERT INTO products (name, description, price, category_id, created) VALUES ('$this->name', '$this->description', $this->price, $this->category_id, '$this->created')";
    var_dump($sql);
    return $this->conn->exec($sql);
  }



  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getCategoryId()
  {
    return $this->category_id;
  }

  /**
   * @param mixed $category_id
   */
  public function setCategoryId($category_id)
  {
    $this->category_id = $category_id;
  }

  /**
   * @return mixed
   */
  public function getCreated()
  {
    return $this->created;
  }

  /**
   * @param mixed $created
   */


}