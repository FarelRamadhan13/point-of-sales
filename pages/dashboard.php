<?php 
include 'system/query/dashboard.php';
$revenue = revenue();
$topProduct = topProduct();
$soldProduct = soldProduct();
$soldPerProducts = soldPerProducts();
$maxTransaction = maxTransaction();
$todayTransaction = todayTransaction() ?? ['date' => date('Y-m-d'), 'total' => 0];
$maxProduct = maxProduct();
$todayProduct = todayProduct() ?? ['date' => date('Y-m-d'), 'total' => 0];

var_dump($todayTransaction);
?>

<section class="py-16 px-8 space-y-16">
    <div class="flex">
        <div class="ml-2">
            <h1 class="text-blue-500 text-3xl font-bold">Total Pendapatan</h1>
            <h1 class="text-white text-3xl font-bold text-center">Rp. <?= $revenue['revenue'] ?></h1>
        </div>
        <div class="w-[70%] mx-auto columns-2 gap-x-16 px-8 mt-2">
            <div class="text-white py-2 px-4  border-2 border-blue-500 rounded-lg bg-slate-900">
                <h3 class="font-semibold">Penjualan Produk Teratas</h3>
                <div class="flex justify-between items-center">
                    <h3><?= $topProduct['product'] ?></h3>
                    <h3 class="text-2xl font-semibold text-white"><?= $topProduct['quantity'] ?></h3>
                </div>
            </div>
            <div class="text-white py-2 px-4 border-2 border-blue-500 rounded-lg bg-blue-700 h-[76px]">
                <div class="flex justify-between items-center h-full">
                    <div>
                        <h3 class="font-semibold ">Total Produk</h3>
                        <h3 class="font-semibold ">Terjual</h3>
                    </div>
                    <h3 class="text-2xl font-semibold"><?= $soldProduct['amount'] ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 w-full flex gap-8">
        <div class="text-white py-5 px-6 pb-6 w-3/4 border-2 border-gray-200 rounded-lg bg-slate-900">
            <h1 class="text-xl font-semibold mb-5">Total Penjualan per Produk</h1>
            <div class="space-y-5">
                <?php foreach($soldPerProducts as $spp) :?>
                <div class="py-2 px-4 border-[1.5px] border-blue-500 rounded-lg">
                    <div class="columns-3">
                        <h3><?= $spp['name'] ?></h3>
                        <div class="grid place-content-center">
                            <p class="bg-slate-600 rounded-md px-2 w-fit">Rp. <?= $spp['total'] ?></p>
                        </div>
                        <div class="grid place-content-end">
                            <p class="bg-slate-600 rounded-md px-2 w-fit"><?= $spp['quantity'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="w-[53%] flex flex-col items-center justify-between">

            <div class="text-white py-3 px-4 w-full border-2 border-blue-500 rounded-lg bg-slate-900">
                <div class="flex justify-between items-center">
                    <div class="px-1">
                        <h3 class="font-semibold">Transaksi Hari Ini</h3>
                        <h3><?= $todayTransaction['date'] ?></h3>
                    </div>
                    <h3 class="text-2xl font-semibold px-2"><?= $todayTransaction['total'] ?></h3>
                </div>
                <hr class="my-2">
                <div class="flex justify-between items-center bg-slate-600  rounded-lg">
                    <div class="bg-slate-600 py-1 px-2 rounded-md">
                        <h3 class="font-semibold ">Transaksi Tertinggi</h3>
                        <h3><?= $maxTransaction['date'] ?></h3>
                    </div>
                    <h3 class="text-2xl font-semibold py-1 px-2"><?= $maxTransaction['total'] ?></h3>
                </div>
            </div>

            <div class="text-white py-3 px-4 w-full border-2 border-blue-500 rounded-lg bg-slate-900">
                <div class="flex justify-between items-center">
                    <div class="px-1">
                        <h3 class="font-semibold">Penjualan Produk Hari Ini</h3>
                        <h3><?= $todayProduct['date'] ?></h3>
                    </div>
                    <h3 class="text-2xl font-semibold px-2"><?= $todayProduct['total'] ?></h3>
                </div>
                <hr class="my-2">
                <div class="flex justify-between items-center bg-slate-600  rounded-lg">
                    <div class="bg-slate-600 py-1 px-2 rounded-md">
                        <h3 class="font-semibold ">Penjualan Produk Tertinggi</h3>
                        <h3><?= $maxProduct['date'] ?></h3>
                    </div>
                    <h3 class="text-2xl font-semibold py-1 px-2"><?= $maxProduct['total'] ?></h3>
                </div>
            </div>

        </div>

</section>