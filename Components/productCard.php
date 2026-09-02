     <?php include dirname(__FILE__, 2) . '/actions/products/getProduct.php' ?>
     <?php foreach ($arrayProducts as $product): ?>
         <div class="col mb-5">
             <div class="card h-100">
                 <img class="card-img-top" src="<?= BASE_URL . 'views/products/images/' . $product['image'] ?>" alt="..." />
                 <div class="card-body p-4">
                     <div class="text-center">
                         <h5 class="fw-bolder"><?php echo $product['product_name']; ?></h5>
                         $<?php echo $product['price']; ?>
                     </div>

                 </div>
                 <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                     <div class="text-center">
                         <a
                             class="btn btn-outline-dark mt-auto"
                             href="<?= BASE_URL?>views/products/product.php?id=<?= $product['id'] ?>">
                             View item
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>