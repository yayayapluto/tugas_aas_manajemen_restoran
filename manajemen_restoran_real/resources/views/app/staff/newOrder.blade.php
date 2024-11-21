@extends('layouts.public')

@section('title', 'Pesanan Baru')

@section('content')
    <div class="container mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div id="left-container" class="bg-white p-6 rounded-lg shadow-md max-h-[500px] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-[#333333] mb-4">Pilih Kategori</h2>
            <button id="all-categories-btn"
                class="inline-block mb-4 px-4 py-2 text-white bg-[#333333] rounded-md hover:bg-[#222222] focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-200 ease-in-out w-full">
                Semua Kategori
            </button>
            <div id="category-list" class="space-y-2"></div>
        </div>

        <div id="center-container" class="bg-white p-6 rounded-lg shadow-md max-h-[500px] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-[#333333] mb-4">Menu Pilihan</h2>
            <div id="menu-list" class="space-y-4"></div>
        </div>

        <div id="right-container" class="bg-white p-6 rounded-lg shadow-md max-h-[500px] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-[#333333] mb-4">Rincian Pesanan</h2>
            <form action="{{ route('newOrder.submit') }}" method="POST" id="order-form">
                @csrf
                <input type="text" name="customer_name" placeholder="Nama Pelanggan" required
                    class="w-full p-2 border border-gray-300 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-[#333333] transition duration-200 ease-in-out">

                <input type="hidden" name="order_items" id="order-items">

                <ul id="order-list" class="space-y-3 mb-4"></ul>

                <div class="flex justify-between items-center">
                    <button type="button" id="clear-order-items"
                        class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200 ease-in-out">
                        Bersihkan Pesanan
                    </button>
                    <button type="submit" id="send-order"
                        class="px-4 py-2 text-white bg-[#5A9BCF] hover:bg-[#4A89B1] rounded-md focus:outline-none focus:ring-2 focus:ring-[#5A9BCF] transition duration-200 ease-in-out">
                        Kirim Pesanan
                    </button>

                    {{-- 
                    Data yang dikirim bakal kayak gini
                        [{
                            "menu_id": 1,
                            "name": "Pempek",
                            "price": "908.94",
                            "quantity": 1,
                            "subtotal": "908.94"
                        },
                        {
                            "menu_id": 2,
                            "name": "Susu Jahe",
                            "price": "3766.42",
                            "quantity": 1,
                            "subtotal": "3766.42"
                        }]
                    --}}
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // Mengonversi data ke JSON
        const categories = @json($categories);
        const menus = @json($menus);
        /**
         * Data compact dijadiin json bakal jadi kek gini:
         * [
         *     {
         *         "id": 1,
         *         "category_name": "Makanan Utama",
         *         "created_at": "2024-11-21T06:27:11.000000Z",
         *         "updated_at": "2024-11-21T06:27:11.000000Z"
         *     },
         *     {
         *         "id": 2,
         *         "category_name": "Makanan Utama",
         *         "created_at": "2024-11-21T06:27:11.000000Z",
         *         "updated_at": "2024-11-21T06:27:11.000000Z"
         *     },
         *     {
         *         "id": 3,
         *         "category_name": "Minuman Jus",
         *         "created_at": "2024-11-21T06:27:11.000000Z",
         *         "updated_at": "2024-11-21T06:27:11.000000Z"
         *     }
         * ]
         */

        // Mendapatkan data dari local storage jika ada
        let orderItems = JSON.parse(localStorage.getItem('orderItems')) || [];

        // Menambahkan tombol untuk setiap kategori
        const categoryList = document.getElementById('category-list');
        categories.forEach(category => {
            const btn = document.createElement('button');
            btn.textContent = category.category_name;
            btn.classList.add('w-full', 'px-4', 'py-2', 'text-white', 'bg-[#333333]', 'rounded-md',
                'hover:bg-[#222222]', 'focus:outline-none', 'focus:ring-2', 'focus:ring-gray-600', 'transition',
                'duration-200', 'ease-in-out');
            categoryList.appendChild(btn);

            btn.addEventListener('click', () => {
                filterMenusByCategory(category.id);
            });
        });

        // Tombol untuk menampilkan semua menu
        const allCategoriesBtn = document.getElementById('all-categories-btn');
        allCategoriesBtn.addEventListener('click', () => {
            displayAllMenus();
        });

        // Menghapus data pesanan dari local storage
        const clearOrderItemsBtn = document.getElementById('clear-order-items');
        clearOrderItemsBtn.addEventListener('click', () => {
            localStorage.removeItem('orderItems');
            orderItems = [];
            updateOrderList();
        });

        // Menampilkan menu berdasarkan kategori
        function filterMenusByCategory(categoryId) {
            const menuList = document.getElementById('menu-list');
            menuList.innerHTML = '';
            const filteredMenus = menus.filter(menu => menu.category_id === categoryId);

            filteredMenus.forEach(menu => {
                const div = document.createElement('div');
                div.classList.add('flex', 'justify-between', 'items-center', 'mb-4');
                div.innerHTML = `<span class="text-lg">${menu.name} - Rp. ${menu.price}</span>`;
                const addBtn = document.createElement('button');
                addBtn.textContent = 'Tambah ke Pesanan';
                addBtn.classList.add('px-4', 'py-2', 'text-white', 'bg-green-600', 'hover:bg-green-700',
                    'rounded-md', 'focus:outline-none', 'focus:ring-2', 'focus:ring-green-500', 'transition',
                    'duration-200', 'ease-in-out');
                div.appendChild(addBtn);
                menuList.appendChild(div);

                addBtn.addEventListener('click', () => {
                    addMenuToOrder(menu);
                });
            });
        }

        // Menampilkan semua menu
        function displayAllMenus() {
            const menuList = document.getElementById('menu-list');
            menuList.innerHTML = '';

            menus.forEach(menu => {
                const div = document.createElement('div');
                div.classList.add('flex', 'justify-between', 'items-center', 'mb-4');
                div.innerHTML = `<span class="text-lg">${menu.name} - Rp. ${menu.price}</span>`;
                const addBtn = document.createElement('button');
                addBtn.textContent = 'Tambah ke Pesanan';
                addBtn.classList.add('px-4', 'py-2', 'text-white', 'bg-green-600', 'hover:bg-green-700',
                    'rounded-md', 'focus:outline-none', 'focus:ring-2', 'focus:ring-green-500', 'transition',
                    'duration-200', 'ease-in-out');
                div.appendChild(addBtn);
                menuList.appendChild(div);

                addBtn.addEventListener('click', () => {
                    addMenuToOrder(menu);
                });
            });
        }

        // Menambahkan menu ke dalam pesanan
        function addMenuToOrder(menu) {
            const existingOrderItem = orderItems.find(item => item.menu_id === menu.id);

            if (existingOrderItem) {
                existingOrderItem.quantity++;
                existingOrderItem.subtotal = existingOrderItem.quantity * existingOrderItem.price;
            } else {
                orderItems.push({
                    menu_id: menu.id,
                    name: menu.name,
                    price: menu.price,
                    quantity: 1,
                    subtotal: menu.price,
                });
            }

            /**
             * Menu yang ditambahin bentuknya kayak gini:
             * {
             *     "menu_id": 1,
             *     "name": "Pempek",
             *     "price": "908.94",
             *     "quantity": 1,
             *     "subtotal": "908.94"
             * }
             */

            updateOrderList();
        }

        // Memperbarui tampilan pesanan
        function updateOrderList() {
            const orderList = document.getElementById('order-list');
            orderList.innerHTML = '';

            orderItems.forEach(item => {
                const li = document.createElement('li');
                li.classList.add('flex', 'justify-between', 'items-center');
                li.textContent = `${item.name} - Rp. ${item.price} x ${item.quantity} = Rp. ${item.subtotal}`;
                orderList.appendChild(li);
            });

            const orderItemsInput = document.getElementById('order-items');
            orderItemsInput.value = JSON.stringify(orderItems);

            localStorage.setItem('orderItems', JSON.stringify(orderItems));
        }

        updateOrderList();
        displayAllMenus();
    </script>
@endsection
