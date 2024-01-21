@extends('layouts.dashboard.app')
@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">All Orders</h3>
                    </div>
                    <div class="card-body">
                        @if($orders->count() > 0)
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($orders as $order)
                                    <div class="col">
                                        <div class="card h-100 border-primary bg-light">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Order #{{ $order->id }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong class="text-primary">Customer Name:</strong> {{ $order->customer_name }}</li>
                                                    <li class="list-group-item"><strong class="text-info">Items:</strong> {{ $order->items }}</li>
                                                    <li class="list-group-item"><strong class="text-success">Address:</strong> {{ $order->address }}</li>
                                                    <li class="list-group-item"><strong class="text-info">Phone Number:</strong> {{ $order->phone_number }}</li>
                                                    <li class="list-group-item"><strong class="text-warning">Status:</strong> {{ $order->status }}</li>
                                                    <li class="list-group-item"><strong class="text-danger">Delivery Date:</strong> {{ $order->delivery_date }}</li>
                                                    <li class="list-group-item"><strong class="text-muted">Notes:</strong> {{ $order->notes }}</li>
                                                    <li class="list-group-item"><strong class="text-primary">Customer:</strong>{{ optional($order->customer)->name }}</li>
                                                </ul>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <form id="updateOrderForm{{ $order->id }}" class="update-order-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="order_status">Update Order Status:</label>
                                                        <select class="form-control" name="order_status" id="order_status{{ $order->id }}">
                                                            <option value="pending">Pending</option>
                                                            <option value="processing">processing</option>
                                                            <option value="completed">completed</option>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-primary update-order-btn" data-order-id="{{ $order->id }}">Update Order</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">No orders available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.update-order-btn').on('click', function () {
            var orderId = $(this).data('order-id');
            var newStatus = $('#order_status' + orderId).val();

            $.ajax({
                url: '/update-status/' + orderId,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_status: newStatus
                },
                success: function (response) {
                    // عند النجاح، يمكنك إضافة التفاعل المناسب هنا (رسائل، تحديثات، إلخ).
                    console.log(response.message);
                },
                error: function (error) {
                    console.log(error.responseJSON.message);
                }
            });
        });
    });
</script>
