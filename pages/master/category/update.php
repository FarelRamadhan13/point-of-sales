<?php 
include 'system/query/category.php';
$category = Category\single($_GET['id']);
?>
<section class="py-10 px-[8rem]">
    <div class="bg-gray-900 rounded-lg p-4">
        <form action="<?= action('/master/category/update') ?>" method="post" class="flex flex-col text-gray-400 gap-[1rem]">

            <input type="text" name="id" value="<?= $category['id'] ?>" class="hidden">

            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-200">Edit Category</h1>
                <a href="<?= url('/master/category/index') ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-4 py-2">Cancel</a>
            </div>

            <div class="hidden flex-col gap-2 text-white">
                <label for="id" class="font-medium">ID</label>
                <input type="text" required name="edit_id" id="id" placeholder="C07" value="<?= $category['id'] ?>" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex flex-col gap-2 text-white">
                <label for="name" class="font-medium">Name</label>
                <input type="text" required name="name" id="name" placeholder="Name" value="<?= $category['name'] ?>" class="p-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            
            <button type="submit" name="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg px-8 py-2 mt-4 w-fit">
                Save
            </button>

        </form>
    </div>
</section>