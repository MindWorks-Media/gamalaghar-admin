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
                            <h4 class="text-capitalize breadcrumb-title">Edit Material</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"
                                                class="text-primary"><i
                                                    class="uil uil-estate text-primary"></i>Dashboard</a></li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">edit
                                            material</li>
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
                        <div class="card-header">
                            <h6 class="fw-500">Material</h6>
                        </div>
                        <div class="add-product__body px-sm-40 px-20">
                            <form action="{{ url('admin/property/material/update') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $material->id }}" name="id">
                                <div class="form-group">
                                    <label for="name1">Material</label>
                                    <input type="text" class="form-control" id="name1" placeholder="Pot"
                                        name="material" value="{{ $material->material }}">
                                    @error('material')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div
                                    class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                                    <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                    </button>
                                    <button class="btn btn-primary btn-default btn-squared text-capitalize"
                                        type="submit">save
                                        material
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
