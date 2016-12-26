<?php
include_once '../system/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql_product = "SELECT * FROM products WHERE id = '$id'";
$result_product = $db->query($sql_product);
$product = mysqli_fetch_assoc($result_product);
$brand_id = $product['brand'];
$sql_brand = "SELECT brand FROM brand WHERE id = '$brand_id'";
$result_brand = $db->query($sql_brand);
$brand = mysqli_fetch_assoc($result_brand);
$sizestring = $product['size'];
$size_array = explode(',', $sizestring);
?>
<?php ob_start(); ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" onclick="closeModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
       <h4 class="modal-title text-center"><?=$product['title'];?></h4>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="center-block">
                <img src=<?=$product['image'];?> alt=<?=$product['title'];?> class="details img-responsive"></img>
              </div>
            </div>
            <div class="col-sm-6">
              <h4>Beschreibung</h4>
              <p><?=$product['description'];?></p>
              <hr>
              <p>Preis: <?=$product['price'];?></p>
              <p>Marke: <?=$brand['brand']; ?></p>
              <form action="add_cart.php" method="post">
                <div class="form-group">
                  <div class="col-xs-3">
                    <label for="quantity">Menge:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity"></input>
                  </div><div class="col-xs-9"></div>
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                  <label for="size">Size:</label>
                  <select name="size" id="size" class="form-control">
                    <option value=""></option>
                    <?php foreach($size_array as $string) {
                       $string_array = explode(':', $string);
                       $size = $string_array[0];
                       $quantity = $string_array[1];
                       echo '<option value="'.$size.'">'.$size.' ('.$quantity.'  Verfügbar)</option>';
                    } ?>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" onclick="closeModal()">Close</button>
        <button class="btn btn warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add</button>
      </div>
    </div>
  </div>
</div>
<?php echo ob_get_clean(); ?>
