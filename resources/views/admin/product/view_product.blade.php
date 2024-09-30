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
                            <h4 class="text-capitalize breadcrumb-title">View Product</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"
                                                class="text-primary"><i
                                                    class="uil uil-estate text-primary"></i>Dashboard</a></li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">View
                                            Products</li>
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
                                    <form action="{{ url('admin/products/view-product') }}" method="GET"
                                        class="order-search__form">
                                        @csrf
                                        <img src="img/svg/search.svg" alt="search" class="svg text-primary">
                                        <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                            name="keyword" placeholder="Filter by keyword" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="content-center mt-10">
                                <div class="button-group m-0 mt-xl-0 mt-sm-10 order-button-group">
                                    <button type="button"
                                        class="order-bg-opacity-secondary text-secondary btn radius-md">Export</button>
                                    <a href="{{ url('admin/products/add-product') }}"
                                        class="btn btn-sm btn-primary me-0 radius-md">
                                        <i class="la la-plus"></i> Add Product</a>
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
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>

                                                        @foreach ($product->productImages as $productImage)
                                                            @foreach ($productImage->getMedia('product_image') as $media)
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#ImageModal{{ $media->id }}">
                                                                    <img src="{{ $media->getUrl() }}"
                                                                        alt="{{ $product->product_name }}"
                                                                        class="gallery-thumbnail img-fluid"
                                                                        style="max-width: 40px; max-height: 40px;">
                                                                </a>
                                                            @endforeach
                                                        @endforeach


                                                    </td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_code }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a class="btn btn-primary me-3"
                                                                href="{{ url('admin/products/edit/' . $product->slug) }}"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                            <a class="btn btn-danger remove"
                                                                href="{{ url('admin/products/view-product/delete/' . $product->id) }}"><i
                                                                    class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <img src="{{ url('assets/img/No data-rafiki.png') }}"
                                                            class="img-fluid d-block mx-auto"
                                                            style="max-width: 300px" />
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $products->links('pagination::bootstrap-5') }}
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
