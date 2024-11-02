<?php 
include 'system/query/category.php';
require 'system/query/product.php';
$categories = Category\findAll();
$products = findAll();
foreach ($products as $product) {
    $all[] = $product;
}
$all = count($all)+2;
$id = $all > 9 ? "$all" : "0$all"; 
?>
<section class="py-10 px-[8rem]">
    <div class="bg-gray-900 rounded-lg p-4">
        <form action="<?= action('/master/product/create'); ?>" method="post" class="flex flex-col text-gray-400 gap-[1rem]">

            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-200">Add Product</h1>
                <a href="<?= url('/master/product/index') ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-4 py-2">Cancel</a>
            </div>

            <div class="hidden flex-col gap-2 text-white">
                <label for="id" class="font-medium">ID</label>
                <input type="text" required name="id" id="id" value="<?= 'P' . $id ?>" placeholder="P07" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex flex-col gap-2 text-white">
                <label for="name" class="font-medium">Name</label>
                <input type="text" required name="name" id="name" placeholder="Name" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex flex-col gap-2 text-white">
            <label for="name" class="font-medium">Category</label>
            <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php foreach($categories as $category) :?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>  
            <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="price" class="font-medium">Price</label>
            <input type="number" min="0" required name="price" id="price" placeholder="12000" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="quantity" class="font-medium">Quantity</label>
            <input type="number" min="0" required name="quantity" id="quantity" placeholder="100" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

            <button type="submit" name="submit" class="text-white text-sm bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-8 py-2 mt-4 w-fit">
                Add Product
            </button>
        </form>
    </div>
</section>