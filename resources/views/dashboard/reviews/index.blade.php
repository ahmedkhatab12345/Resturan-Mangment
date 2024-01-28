@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">All Reviews</h3>
                    </div>
                    <div class="card-body">
                        @if($reviews->count() > 0)
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($reviews as $review)
                                    <div class="col">
                                        <div class="card h-100 border-primary bg-light">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Review #{{ $review->id }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong class="text-primary">Customer Name:</strong> {{ optional($review->customer)->name }}</li>
                                                    <li class="list-group-item"><strong class="text-info">Review:</strong> {{ $review->review }}</li>
                                                </ul>
                                            </div>
                                            <!-- Add your update form or any other actions here -->
                                            <div class="card-footer bg-light">
                                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger box-shadow-3">Delete</button>
                                                </form>

                                                <button class="btn box-shadow-3 toggle-status-btn 
                                                    {{ ($review->status == 'view') ? 'btn-success' : '' }}" 
                                                    data-review-id="{{ $review->id }}" 
                                                    data-status="{{ $review->status }}">
                                                    {{ ($review->status == 'view') ? 'Hide' : 'View' }}
                                                </button>


                                                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('images/site/customers/' . $review->customer->photo) }}" style="width: 50px; height: 50px;">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">No Review available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- إضافة السكريبت للتفاعل مع الأزرار -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle-status-btn').on('click', function () {
                var reviewId = $(this).data('review-id');
                var currentStatus = $(this).data('status');

                // تحقق من الحالة الحالية وقم بتغييرها
                var newStatus = (currentStatus === 'view') ? 'hide' : 'view';

                // قم بتحديث حالة الريفيو باستخدام AJAX
                updateReviewStatus(reviewId, newStatus);

                // تحديث الزر بالحالة الجديدة
                $(this).data('status', newStatus);
                $(this).text((newStatus === 'view') ? 'Hide' : 'View');
            });
        });

        function updateReviewStatus(reviewId, newStatus) {
            // قم بإرسال طلب AJAX لتحديث حالة الريفيو على السيرفر
            $.ajax({
                url: '/update-review-status/' + reviewId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    new_status: newStatus
                },
                success: function (response) {
                    // يمكنك إضافة المزيد من المنطق هنا بناءً على الاحتياجات الخاصة بك
                    console.log(response);
                },
                error: function (error) {
                    console.log(error.responseJSON.message);
                }
            });
        }
    </script>
@endsection
