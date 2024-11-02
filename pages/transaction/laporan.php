<?php
include 'system/query/transaction.php';
$reports = reports();
?>
<section class="py-10 px-[3rem]">

    <div class="mb-8">
        <h1 class="text-3xl text-gray-200 font-semibold">Laporan</h1>
    </div>

    <div class="bg-gray-900 rounded-lg overflow-hidden">
    <div class="">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-300 border border-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-300 text-center border-b border-gray-600">
                    <tr>
                        <th scope="col" class="px-4 py-3 border-r border-gray-600">No</th>
                        <th scope="col" class="px-4 py-3 border-r border-gray-600">Tanggal</th>
                        <th scope="col" class="px-4 py-3 border-r border-gray-600">Admin</th>
                        <th scope="col" class="px-4 py-3 border-r border-gray-600">Total Penjualan</th>
                        <th scope="col" class="px-4 py-3 border-r border-gray-600">Total Transaksi</th>
                        <th scope="col" class="px-4 py-3">Produk Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                <?php foreach ($reports as $reports) :?>
                    <tr class="border-b border-gray-600 text-center">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-300 border-r border-gray-600"><?= $i ?></th>
                        <td class="px-4 py-3 border-r border-gray-600"><?= $reports['date'] ?></td>
                        <td class="px-4 py-3 border-r border-gray-600"><?= $reports['name'] ?></td>
                        <td class="px-4 py-3 border-r border-gray-600">Rp. <?= $reports['total'] ?></td>
                        <td class="px-4 py-3 border-r border-gray-600"><?= $reports['transaction'] ?></td>
                        <td class="px-4 py-3 border-r border-gray-600">
                            <a href="<?= url('/transaction/laporan_detail_product?d=' . $reports['date']) ?>" class="w-full hover:text-blue-600  flex items-center justify-center gap-x-4">
                                <?= $reports['quantity'] ?>
                                <svg class="w-6 h-6 hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</section>
