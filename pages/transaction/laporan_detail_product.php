<?php
include 'system/query/transaction.php';
$report = reportDetail($_GET['d']);
$orderDetail =  orderDetail($report['date']);

?>


<section class="mt-16 mx-16 py-8 px-14 bg-gray-900 rounded-xl border border-blue-600">
    <a href="<?= url('/transaction/laporan') ?>" class="text-center text-blue-500 text-xl font-semibold hover:text-blue-600 ">
        ≺ Kembali
    </a>

<h1 class="text-white text-2xl font-semibold text-center mb-12">Laporan <?= $_GET['d'] ?></h1>

    <div class="text-white w-full flex justify-between">

        <div class="w-1/2 space-y-3 flex flex-col">
            <h1 class="text-xl font-semibold">Informasi</h1>
            <div class="w-full flex-1 flex items-center">
                <ul class="w-full space-y-3 flex flex-col">
                    <li class="flex gap-x-4">
                        <h3 class="flex-[0rem]">Tanggal Transaksi </h3> :
                        <p class="font-semibold flex-1"><?= $report['date'] ?></p>
                    </li>
                    <li class="flex gap-x-4">
                        <h3 class="flex-[0rem]">Admin </h3> :
                        <p class="font-semibold flex-1"><?= $report['name'] ?></p>
                    </li>
                    <li class="flex gap-x-4">
                        <h3 class="flex-[0rem]">Total Tranasaksi </h3> :
                        <p class="font-semibold flex-1"><?= $report['transaction'] ?></p>
                    </li>
                    <li class="flex gap-x-4">
                        <h3 class="flex-[0rem]">Produk Terjual </h3> :
                        <p class="font-semibold flex-1"><?= $report['quantity'] ?></p>
                    </li>
                    <li class="flex gap-x-4">
                        <h3 class="flex-[0rem]">Total Penjualan </h3> :
                        <p class="font-semibold flex-1">Rp. <?= $report['total'] ?></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-1/2 space-y-3">
            <h1 class="text-xl font-semibold">Detail Produk</h1>
            <div class="rounded-lg bg-slate-800 border border-slate-500">
                <table class="w-full text-center">
                    <thead class="bg-gray-700">
                        <tr class="border-b border-slate-500">
                            <th class="py-2 border-r border-slate-500">Nama</th>
                            <th class="py-2 border-r border-slate-500">Harga</th>
                            <th class="py-2 border-r border-slate-500">Terjual</th>
                            <th class="py-2">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orderDetail as $od) :?>
                            <?php $total += $od['total']; $quantity += $od['quantity']; ?>
                        <tr>
                            <td class="py-1 border-r border-slate-500"><?= $od['name'] ?></td>
                            <td class="py-1 border-r border-slate-500"><?= $od['price'] ?></td>
                            <td class="py-1 border-r border-slate-500"><?= $od['quantity'] ?></td>
                            <td class="py-1"><?= $od['total'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="border-t border-slate-500">
                            <td colspan="2" class="py-1 border-r border-slate-500">Total</td>
                            <td class="py-1 border-r border-slate-500"><?= $quantity; ?></td>
                            <td class="py-1">Rp. <?= $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>

