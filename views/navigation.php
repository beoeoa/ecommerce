<?php
  $category_sq1 = "SELECT * FROM categories WHERE parent = 0";
  $categories_query = $db->query($category_sq1);
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="index.php" class="navbar-brand">Mein Laden</a>
    <ul class="nav navbar-nav">
     <?php while($parent = mysqli_fetch_assoc($categories_query)) :  ?>
      <?php
        $parent_id = $parent['id'];
        $items_sql = "SELECT * FROM categories WHERE parent = '$parent_id'";
        $items_query = $db->query($items_sql);
      ?>
      <!-- Navigation Items -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <?php while($item = mysqli_fetch_assoc($items_query)) : ?>
           <li><a href="#"><?php echo $item['category']; ?></a></li>
          <?php endwhile; ?>
        </ul>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</nav>
