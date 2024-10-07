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
                                        <li class="breadcrumb-item ">
                                            <a href="{{ url('admin/dashboard') }}" class="text-primary">
                                                <i class="uil uil-estate text-primary"></i>Dashboard
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">
                                            <a href="{{ route('orders.list') }}" class="text-primary">View Orders</a>
                                        </li>
                                        </li>
                                        <li class="breadcrumb-item">{{ $order->order_number }}</li>
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

                        <div class="d-flex justify-content-between align-items-center my-3">
                            <h6 class="text-primary"># Order {{$order->order_number}}</h6>
                            <p class="mb-0">{{ $order->created_at->format('d M, Y h:i A') }}</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" id="table_data">
                                        <thead class="bg-primary text-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Image</th>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-bottom">
                                            <tr>

                                            </tr>
                                            @forelse ($order->orderItems as $orderItems)
                                                <tr class="border-bottom">
                                                    <td>{{ $orderItems->id }}</td>
                                                    <td>
                                                        @foreach ($productImages as $productImage)
                                                            @if ($productImage->id == $orderItems->product_id)
                                                                <img src="{{ $productImage->getFirstMediaUrl('product_image') }}"
                                                                    alt="{{ $orderItems->product_name }}"
                                                                    style="max-width: 100px" />
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                    <td>{{ $orderItems->product->product_code }}</td>
                                                    <td>{{ $orderItems->product_name }}</td>
                                                    <td>{{ $orderItems->quantity }}</td>
                                                    <td>{{ $orderItems->price }}</td>
                                                    <td>{{ $orderItems->quantity * $orderItems->price }}</td>
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
                                        <tfoot>
                                            <tr>
                                                <td class="border-none" colspan="4">
                                                    <span></span>
                                                </td>
                                                <td class="border-color" colspan="1">
                                                    <span><strong>Sub Total</strong></span>
                                                </td>
                                                <td class="border-color">
                                                    <span><b>Rs. {{ $order->sub_total }}</b></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-none" colspan="4">
                                                    <span></span>
                                                </td>
                                                <td class="border-color" colspan="1">
                                                    <span><strong>Delivery Charge</strong></span>
                                                </td>
                                                <td class="border-color">
                                                    <span><b>Rs. {{ $order->delivery_charge }}</b></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-none" colspan="4">
                                                    <span></span>
                                                </td>
                                                <td class="border-color" colspan="1">
                                                    <span><strong>Total</strong></span>
                                                </td>
                                                <td class="border-color">
                                                    <span><b>Rs. {{ $order->total_amount }}</b></span>
                                                </td>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- category table ends --}}
                        <hr class="my-3">

                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-3">Customer Details</h6>
                                <p class="mb-1"><strong>Name:</strong> {{ $order->user->name }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p class="mb-1"><strong>Phone:</strong> {{ $order->user->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Shipping Details</h6>
                                <p class="mb-1"><strong>Name:</strong> {{ $order->fullname }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $order->shipping_email ? $order->shipping_email : $order->user->email }}</p>
                                <p class="mb-1"><strong>Phone:</strong> {{ $order->shipping_phone ? $order->shipping_phone : $order->user->phone }}</p>
                                <p class="mb-1"><strong>Address:</strong> {{ $order->province . ", " . $order->city . ", " . $order->area . ", " . $order->shipping_address }}</p>
                                {{-- <p><strong>Order Time:</strong> {{ $order->created_at }}</p> --}}
                            </div>
                            @if ($order->comment)  
                                <div class="col-12">
                                    <h6 class="mb-3">Comment</h6>
                                    <p class="mb-1">{{ $order->comment }}</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
