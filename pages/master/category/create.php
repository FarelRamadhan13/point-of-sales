<?php 
require 'system/query/category.php';
$categories = Category\findAll();

foreach ($categories as $category) {
    $all[] = $category;
}

$all = count($all) + 1;
$id = $all > 9 ? "$all" : "0$all"; 
?>
<section class="py-10 px-[13rem]">
    <div class="bg-gray-900 rounded-lg p-4">
        <form action="<?= action('/master/category/create') ?>" method="post" class="flex flex-col text-gray-400 gap-[1rem]">

            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-200">Add Category</h1>
                <a href="<?= url('/master/category/index') ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-4 py-2">Cancel</a>
            </div>

            <div class="hidden flex-col gap-2 text-white">
                <label for="id" class="font-medium">ID</label>
                <input type="text" required name="id" id="id" value="<?= 'C' . $id ?>" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex flex-col gap-2 text-white">
                <label for="name" class="font-medium">Name</label>
                <input type="text" required name="name" id="name" placeholder="Name" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <button type="submit" name="submit" class="text-white text-sm bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-8 py-2 mt-4 w-fit">
                Add Category
            </button>
        </form>
    </div>
</section>