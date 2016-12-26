<?php
  $sql = "SELECT * FROM products where featured = 1";
  $products = $db->query($sql);
?>

<div class="col-md-8">
  <div class="row">
    <h2 class="text-center">Produkte</h2>
    <?php while($product = mysqli_fetch_assoc($products)) : ?>
      <div class="col-md-3 text-center">
        <h4><?= $product['title']; ?></h4>
        <img src=<?= $product['image']; ?> alt=<?= $product['title']; ?> class="img-thumb"/>
        <p class="list-price text-danger">Normaler Preis: €<s><?= $product['list_price']; ?></s></p>
        <p class="price">Unser Preis: €<?= $product['price'] ?></p>
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" onclick="detailsmodal(<?= $product['id']; ?>)">Detail</button>
      </div>
    <?php endwhile; ?>
  </div>
</div>
