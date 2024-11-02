<?php 
session_start();
require 'system/query/transaction.php';
$products = findAllProduct();
$customers = findAllCustomer();
$admin = findAdmin($_SESSION['point_admin_id']);

if (isset($_POST['submit'])) {
  
}
?>

<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-4">

  <div class="flex">
      <div class=" px-4 2xl:px-0 flex-auto">
        
        <h1 class="text-white text-xl font-semibold mb-4">Pilih Produk</h1>

        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
          <?php $i = 0 ?>
          <?php foreach($products as $product) :?>
          <div class="products product-<?= $i ?> cursor-pointer rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-id="<?= $product['id'] ?>" data-name="<?= $product['name'] ?>" data-price="<?= $product['price']?>" data-stock="<?= $product['quantity'] ?>">
            <div class="h-32 w-full">

              <a href="#">
                <img class="h-full w-full object-contain rounded-lg" src="../templates/img/shop-cart.png" alt="" />
              </a>
              
            </div>
            <div class="pt-3">
              
              <h1 href="#" class="flex text-lg font-semibold leading-tight text-gray-900 dark:text-white">
                <?= $product['name'] ?>
              </h1>
              <div class="mt-2 flex items-center justify-between gap-4">
                <span class="me-2 rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300"> <?= $product['category'] ?> </span>
                <p class="text-xl font-extrabold leading-tight text-gray-900 dark:text-white"><?= $product['price']/1000 . 'K' ?></p>
              </div>   
            </div>
          </div>
          <?php $i++ ?>
          <?php endforeach; ?>
        </div>
      </div>
      
      <form action="<?= action('/transaction') ?>" method="post">
        <div class="max-w-96 flex-auto space-y-6 mt-0 pr-4">
              <div class="space-y-4 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 px-6 py-4">
  
              <!-- input -->
              <input type="text" name="total" value="" class="total-price-products hidden">
              <input type="text" name="admin" value="<?= $admin['id']; ?>" class="hidden">

              
              <!-- input -->

              <!-- Dropdown -->
              <select name="customer" class="text-white text-sm rounded-full border-[1.5px] border-blue-600 focus:ring-blue-500 focus:ring-2 block w-full py-2 px-4 dark:bg-gray-700 dark:placeholder-gray-40" required>
                <option value="" disabled selected>Pilih Customer</option>
                <?php foreach($customers as $customer) :?>
                <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                <?php endforeach; ?>
              </select>
              <!-- Dropdown -->
            
              <!-- Order List -->
               <div class="flex flex-col max-h-[19.875rem] overflow-scroll overflow-x-hidden scrollbar pr-3">
                <ul class="products-order">
  
                  
  
                </ul>
               </div>
  
              <!-- Order -->
                <div class="space-y-4">
                  <div class="space-y-2">
                   
                  <dl class="flex items-center justify-between gap-4 pt-2">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd id="total-price" class="text-base font-bold text-gray-900 dark:text-white">Rp. 0</dd>
                  </dl>
                </div>
                <button type="submit" id="submit" name="submit" class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Proceed to Checkout</button>
                
              </div>
          </div>
        </div>
      </form>
  </div>

</section>