@include('layouts.header')
<div class="mobile-search">
    <form action="/" class="search-form">
        <img src="{{ url('img/svg/search.svg') }}" alt="search" class="svg">
        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
    </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
    @include('layouts.nav')
</header>
<main class="main-content">
    @include('layouts.sidebar')
    <div class="contents">
        {{-- ------ BredCrumb --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">View Orders</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"
                                                class="text-primary"><i
                                                    class="uil uil-estate text-primary"></i>Dashboard</a></li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">View
                                            Orders</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------ BredCrumb --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
                        <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">
                            <div class="d-flex align-items-center flex-wrap justify-content-center">
                                <div class="project-search order-search  global-shadow mt-10">
                                    <form action="{{ url('admin/orders/search') }}" method="GET"
                                        class="order-search__form">
                                        @csrf
                                        <img src="img/svg/search.svg" alt="search" class="svg text-primary">
                                        <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                            name="keyword" placeholder="Filter by keyword" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" id="table_data">
                                        <thead class="bg-primary text-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Fullname</th>
                                                <th>Order Number</th>
                                                <th>Products</th>
                                                <th>Province</th>
                                                <th>City</th>
                                                <th>Area</th>
                                                <th>Total</th>
                                                <th>Order Status</th>
                                                <th>Order Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr class="border-bottom">
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->fullname }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>
                                                        @foreach ($order->orderItems as $item)
                                                            <p class="mb-0">
                                                                {{-- {{ $item->product ? $item->product->product_code : $item->product_name }} --}}
                                                                @if ($item->product && $item->product->product_code)
                                                                    {{ $item->product->product_code }}
                                                                @else
                                                                    {{ $item->product_name }}
                                                                @endif
                                                            </p>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $order->province }}</td>
                                                    <td>{{ $order->city }}</td>
                                                    <td>{{ $order->area }}</td>
                                                    <td>{{ $order->total_amount }}</td>
                                                    <td>
                                                        @if ($order->order_status == 'Pending')
                                                            <span
                                                                class="badge badge-warning rounded">{{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'processing')
                                                            <span
                                                                class="badge badge-info rounded">{{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'completed')
                                                            <span
                                                                class="badge badge-success rounded">{{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'declined')
                                                            <span
                                                                class="badge badge-danger rounded">{{ $order->order_status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <div class="d-flex p-2">
                                                            <a class="btn btn-primary p-2 lh-1"
                                                                href="{{ url('admin/single-order/' . $order->id) }}">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="11">
                                                        <img src="{{ url('assets/img/No data-rafiki.png') }}"
                                                            class="img-fluid d-block mx-auto"
                                                            style="max-width: 300px" />
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- category table ends --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
