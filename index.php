<?php 
require 'system/app.php';
$view = middleware();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="templates/style.css">
    <title>Point of Sales</title>
    <style>
        .scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        
        .scrollbar::-webkit-scrollbar-track {
            border-radius: 99rem;
            background: rgb(51 65 85);
        }
        
        .scrollbar::-webkit-scrollbar-thumb {
            background: #64748b;
            border-radius: 99rem;
        }
        
        scrollbar::-webkit-scrollbar-thumb:hover {
            background: red;
        }
    </style>
</head>
<body class="bg-black overflow-x-hidden bg-slate-">
    <?php if($view !== 'login') :?>
        <?php require 'templates/sidebar.php'; ?>
    <?php endif; ?>
    <main class="<?= $view == 'login' ? '' : 'pl-[14rem]' ?>">
        <?php render($view);?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script>
        
    //jquery
    $(document).ready(function () {
        const products = $('.products');
        let total = 0;

        
        for (let i = 0; i < products.length; i++) {
            if ($('.products').eq(i).data('stock') == 0) $('.products').eq(i).hide();
            products[i].addEventListener('click', function () {
                
                $('.placeholder').remove();

                if ($(`.products-order .product-list-${i}`).attr('class') == `product-list-${i}`) {                
                    return 0;
                };
                
                $('.products-order').append(`<li class="product-list-${i}"></li>`);
                    const id = $('.products').eq(i).data('id');
                    const name = $('.products').eq(i).data('name');
                    const price = $('.products').eq(i).data('price');
                    const stock = $('.products').eq(i).data('stock');
                    
                    $(`.product-list-${i}`).append(productsList(id, name, price, stock));
                    
                })

                $(document).on('click', `.product-${i}`,function () {
                    let productCard = $(`.products-order`).find(`.product-list-${i}`);
                    let currentValue = value('increment', productCard);
                    let stock = productStock(productCard); 
                    let price = productPrice(productCard);

                    console.log(currentValue);

                    if (!isNaN(currentValue) && currentValue <= stock) {
                    productCard.find('.counter-input').val(currentValue);
                    total += price;
                    updateTotal();
                    }
                    
                })

        }

        placeholderOrder();


        $(document).on('click', `.remove-product`, function () {
            total -= parseInt($(this).closest('.product-list').find('.counter-input').val()) * parseInt($(this).closest('.product-list').find('.product-price').val());

            $(this).closest('.product-list').parent().remove();

            placeholderOrder();
            updateTotal();
        })
        
        $(document).on('click', '.increment-button', function() {
            let productCard = $(this).closest('.product-list');
            let currentValue = value('increment', productCard);
            let stock = productStock(productCard);
            let price = productPrice(productCard);
            
            if (!isNaN(currentValue) && currentValue <= stock) {
                productCard.find('.counter-input').val(currentValue);
                total += price;
                updateTotal();
            }
        });


        $(document).on('click', '.decrement-button', function() {
            let productCard = $(this).closest('.product-list');
            let currentValue = value('decrement', productCard);
            let stock = productStock(productCard);
            let price = productPrice(productCard);

            if (!isNaN(currentValue) && currentValue >= 1) {
                productCard.find('#counter-input').val(currentValue);
                total -= price;
                updateTotal();
            }
        });

        $('#submit').on('click', function (event) {
            $('.total-price-products').val(total);

            if($('.products-order .placeholder').attr('class') == 'placeholder') {
                alert('Produk list tidak boleh kosong!');
                event.preventDefault();
            }
        })


        function updateTotal() {
            if (!isNaN(total)){
                $('#total-price').text('Rp. ' + total);
            } else {
                total = 0;
            }
        }

        function value (operation, productCard) {
            switch (operation) {
                case 'increment' :
                    return parseInt(productCard.find('.counter-input').val()) + 1;
                    break;

                case 'decrement' : 
                    return parseInt(productCard.find('.counter-input').val()) - 1;
                    break;
            }
        }

        function productPrice (productCard) {
            return productCard.find('.price').text().replace('K', '') * 1000;
        }

        function productStock (productCard) {
            return productCard.find('#stock').data('stock');
        }

        function placeholderOrder () {
            if ($('.products-order').children().length == 0) {

                $('.products-order').html(`<li class="placeholder">
                <div class="grid place-content-center text-white w-[17rem] min-h-[7rem] border-y-2 border-dashed border-gray-700">
                Produk List ada di sini!
                </div>
                </li>`);

            }
        }


        function productsList (id, name, price, stock) {
            return `<div class="product-list flex text-white border-b-2 border-dashed border-gray-700 py-3 w-[17rem]">
                        <input type="text" name="product_id[]" value="${id}" class="hidden"> 
                        <input type="text" name="price[]" value="${price}" class="product-price hidden"> 
                        <img class="aspect-square object-cover rounded-lg h-20" src="../templates/img/white-cart.jpg" alt="" />
                        <div class="flex w-full gap-x-4">
                            <div class="pl-2 space-y-1 flex-1">
                                <h3>${name}</h3>
                                <p class="price font-semibold text-blue-500">${price/1000}K</p>
                                <p class="remove-product text-sm text-red-500 cursor-pointer">✕ Remove</p>
                            </div>
                            <div class="flex-1 flex flex-col justify-between">
                                <p id="stock" class="text-sm text-end text-gray-400 pt-1" data-stock="${stock}">Stock : ${stock}</p>
                                <div class="flex items-center justify-end counter-wrapper">
                                    <button type="button" class="decrement-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:border-blue-500 dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-600">
                                        <svg class="h-2 w-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"></path>
                                        </svg>
                                    </button>
    
                                        <input id="counter-input" type="text" name="quantity[]" inputmode="numeric" class="counter-input w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" value="0" required readonly>
        
                                        <button type="button" class="increment-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:border-blue-500 dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-600">
                                            <svg class="h-2 w-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                            </div>
                        </div>`
            }
            
    });
    </script>
</body>
</html>

