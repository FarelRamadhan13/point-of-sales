<?php
include 'system/query/admin.php';
$admins = findAll();
?>
<section class="py-10 px-[3rem]">

        <div class="bg-gray-900 rounded-lg py-4">
            <div class="flex justify-between items-center px-5 mb-4">
                <h1 class="text-3xl font-bold text-gray-200">Admins</h1>
                <a href="<?= url('/master/admin/create') ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                    + Add Admin
                </a>
            </div>
        <div class="">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($admins as $admin) :?>
                        <tr class="border-b border-gray-700 text-center">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-400"><?= $admin['name'] ?></th>
                            <td class="px-4 py-3"><?= $admin['email'] ?></td>
                            <td class="px-4 py-3 flex items-center justify-center">
                                <div class="group relative cursor-pointer inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                    ● ● ●
                                    <div class="hidden absolute top-[1.2rem] group-hover:block z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                            <li>
                                                <a href="<?= url('/master/admin/update') . '?id=' . $admin['id'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?= action('/master/admin/delete') .'?id='. $admin['id'] ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" name="submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
</section>
