@extends("layouts.public")

@section("title", "Pesanan Baru")

@section("content")
<div class="container">
    <div id="left-container">
        <h2>Kategori</h2>
        <button id="all-categories-btn">Semua Kategori</button>
        <div id="category-list">
        </div>
    </div>

    <div id="center-container">
        <h2>Menu</h2>
        <div id="menu-list">
        </div>
    </div>

    <div id="right-container">
        <h2>Pesanan</h2>
        <form action="{{route("newOrder.submit")}}" method="POST" id="order-form">
            @csrf
            <input type="text" name="customer_name" placeholder="Nama Pelanggan" required>
            <ul id="order-list"></ul>
            <input type="hidden" name="order_items" id="order-items">
            <button type="button" id="clear-order-items">Hapus Pesanan</button>
            <button type="submit">Kirim Pesanan</button>
        </form>
    </div>
</div>
@endsection

@section("scripts")
<script>
    const categories = @json($categories);
    const menus = @json($menus);

    let orderItems = JSON.parse(localStorage.getItem('orderItems')) || [];

    const categoryList = document.getElementById('category-list');
    categories.forEach(category => {
        const btn = document.createElement('button');
        btn.textContent = category.category_name;
        categoryList.appendChild(btn);

        btn.addEventListener('click', () => {
            filterMenusByCategory(category.id);
        });
    });

    const allCategoriesBtn = document.getElementById('all-categories-btn');
    allCategoriesBtn.addEventListener('click', () => {
        displayAllMenus();
    });

    const clearOrderItemsBtn = document.getElementById('clear-order-items');
    clearOrderItemsBtn.addEventListener('click', () => {
        localStorage.removeItem('orderItems');
        orderItems = [];
        updateOrderList();
    });

    function filterMenusByCategory(categoryId) {
        const menuList = document.getElementById('menu-list');
        menuList.innerHTML = '';
        const filteredMenus = menus.filter(menu => menu.category_id === categoryId);

        filteredMenus.forEach(menu => {
            const div = document.createElement('div');
            div.textContent = `${menu.name} - Rp. ${menu.price}`;
            const addBtn = document.createElement('button');
            addBtn.textContent = 'Tambah';
            div.appendChild(addBtn);
            menuList.appendChild(div);

            addBtn.addEventListener('click', () => {
                addMenuToOrder(menu);
            });
        });
    }

    function displayAllMenus() {
        const menuList = document.getElementById('menu-list');
        menuList.innerHTML = '';

        menus.forEach(menu => {
            const div = document.createElement('div');
            div.textContent = `${menu.name} - Rp. ${menu.price}`;
            const addBtn = document.createElement('button');
            addBtn.textContent = 'Tambah';
            div.appendChild(addBtn);
            menuList.appendChild(div);

            addBtn.addEventListener('click', () => {
                addMenuToOrder(menu);
            });
        });
    }

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

        updateOrderList();
    }

    function updateOrderList() {
        const orderList = document.getElementById('order-list');
        orderList.innerHTML = '';

        orderItems.forEach(item => {
            const li = document.createElement('li');
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