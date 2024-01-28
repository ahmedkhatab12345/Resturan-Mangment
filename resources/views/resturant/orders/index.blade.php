@extends('layouts.site.app')
<link rel="stylesheet" href="{{ url('/') }}/site/assets/css/orderStyle.css">

@section('content')
<div id="menu">
    <h2>Menu</h2>
    <ul>
        @foreach($menuItems as $menuItem)
            <li>
                <img style="width: 90px; height: 90px;" src="{{ asset('images/dashboard/items/'.$menuItem->photo) }}" alt="{{ $menuItem->name }}">
                <div class="item-details">
                    <span class="item-name">{{ $menuItem->name }}</span>
                    <span class="item-description">{{ $menuItem->description }}</span>
                    <span class="item-price">${{ $menuItem->price }}</span>
                </div>
                <input type="number" class="quantity-input" value="0" min="0" data-item-id="{{ $menuItem->id }}" data-item-name="{{ $menuItem->name }}">
                <button class="add-to-order">Add to Order</button>
            </li>
        @endforeach
    </ul>
</div>

<div id="order-sheet">
    <h1> Restaurant Name </h1>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody id="order-list">
            <!-- Items will be dynamically added here -->
        </tbody>
    </table>
    <p>Total: $<span id="total_price">0.00</span></p>
    <p>Price includes VAT</p>
    <p>Wish you a happy time and thank you for visiting our restaurant</p>
</div>

<form action="{{ route('order_user.store') }}" method="post">
    @csrf
    <!-- Form fields -->
    <div class="form-floating mb-2">
        <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name">
        <label for="customer_name">Customer Name</label>
    </div>

    <div class="form-floating mb-2">
        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        <label for="address">Address</label>
    </div>

    <div class="form-floating mb-2">
        <input type="tel" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number">
        <label for="phone_number">Phone Number</label>
    </div>

    <div class="form-floating mb-2">
        <textarea class="form-control" placeholder="Special Request" id="notes" name="notes" style="height: 100px"></textarea>
        <label for="notes">Special Request</label>
    </div>

    <!-- Additional hidden fields -->
    <input type="hidden" name="items" id="orderData" value="">
    <input type="hidden" name="quantity" id="quantity" value="">
    <input type="hidden" name="total_price" id="total_price_hidden" value="">

    <button type="submit">Submit Order</button>
</form>

<script>
document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('add-to-order')) {
        addToOrder(e.target.parentNode);
    }
});

function addToOrder(itemElement) {
    const itemName = itemElement.querySelector('.item-name').textContent;
    const itemPrice = parseFloat(itemElement.querySelector('.item-price').textContent.replace('$', ''));
    const quantityInput = itemElement.querySelector('.quantity-input');
    const quantity = parseInt(quantityInput.value);

    if (!isNaN(itemPrice) && !isNaN(quantity) && quantity > 0) {
        const total_price = itemPrice * quantity;

        const orderList = document.getElementById('order-list');
        const newRow = orderList.insertRow();
        newRow.innerHTML = `
            <td>${itemName}</td>
            <td>${quantity}</td>
            <td>$${total_price.toFixed(2)}</td>
        `;

        updateTotal();
    } else {
        alert('Please select a valid quantity for the product');
    }
}

function updateTotal() {
    let total = 0;
    const totalElements = document.querySelectorAll('#order-list td:nth-child(3)');

    totalElements.forEach(element => {
        total += parseFloat(element.textContent.replace('$', ''));
    });

    document.getElementById('total_price').textContent = total.toFixed(2);
    document.getElementById('order-sheet').style.display = 'block';
    document.getElementById('orderData').value = JSON.stringify(collectOrderData());
    document.getElementById('quantity').value = '';
}

function collectOrderData() {
    const orderData = [];
    const orderRows = document.querySelectorAll('#order-list tr');
    orderRows.forEach(row => {
        const columns = row.querySelectorAll('td');
        const itemName = columns[0].textContent;
        const quantity = columns[1].textContent;
        const total_price = columns[2].textContent.replace('$', '').trim();
        const item_id = getItemIdByName(itemName); // Replace with actual logic

        orderData.push({
            item_id,
            quantity: parseInt(quantity),
            total_price: parseFloat(total_price)
        });
    });
    return orderData;
}

function getItemIdByName(itemName) {
    // Implement the logic to fetch item_id based on itemName
    // You can use AJAX to make a request to the server and get the item_id
    // For now, return a placeholder value. Replace this with actual logic.
    return 1; // Placeholder value, replace with actual logic
}
</script>
@endsection
