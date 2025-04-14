<?php include '../components/header.php'; ?>
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4" data-aos="fade-up">Explore Our Menu</h2>
    <div class="row g-4">
      <?php
        $menu = [
          ['id' => 1, 'img' => 'dish1.jpg', 'name' => 'Margherita Pizza', 'price' => 199],
          ['id' => 2, 'img' => 'dish2.jpg', 'name' => 'Pasta Alfredo', 'price' => 249],
          ['id' => 3, 'img' => 'dish3.jpg', 'name' => 'Tandoori Paneer', 'price' => 299],
        ];

        foreach ($menu as $item) {
          echo '
            <div class="col-md-4" data-aos="fade-up">
              <div class="card dish-card h-100">
                <img src="assets/images/'.$item['img'].'" class="card-img-top" alt="'.$item['name'].'">
                <div class="card-body text-center">
                  <h5 class="card-title">'.$item['name'].'</h5>
                  <p class="card-text">₹'.$item['price'].'</p>
                  <a href="../order.php?id='.$item['id'].'" class="btn btn-order">Order Now</a>
                </div>
              </div>
            </div>';
        }
      ?>
    </div>
  </div>
</section>
<?php include '../components/footer.php'; ?>

