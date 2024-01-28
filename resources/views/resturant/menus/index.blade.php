@extends('layouts.site.app')

@section('content')
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                @foreach($menus as $menu)
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 @if($loop->first) active @endif" data-bs-toggle="pill" href="#tab-{{ $menu->id }}">
                        <div class="ps-3">
                            <small class="text-body">{{ $menu->name }}</small>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($menus as $menu)
                <div id="tab-{{ $menu->id }}" class="tab-pane fade show p-0 @if($loop->first) active @endif">
                    <div class="row g-4">
                        @foreach($menu->items as $item)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/dashboard/items/' . $item->photo) }}" alt="{{ $item->name }}" style="width: 80px;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $item->name }}</span>
                                        <span class="text-primary">${{ $item->price }}</span>
                                    </h5>
                                    <small class="fst-italic">{{ $item->description }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
@endsection
