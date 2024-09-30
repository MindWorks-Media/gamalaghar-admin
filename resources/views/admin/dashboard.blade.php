@include('layouts.header')
<div class="mobile-search">
    <form action="/" class="search-form">
        <img src="img/svg/search.svg" alt="search" class="svg">
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
        <div class="crm mb-25">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Gamala Ghar</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"
                                                class="text-primary"><i
                                                    class="uil uil-estate text-primary"></i>Dashboard</a></li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">Gamala Ghar
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row">
                            <div class="col-xxl-6 col-sm-6 mb-25">
                                <div
                                    class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                    <div class="overview-content w-100">
                                        <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                            <div class="ap-po-details__titlebar">
                                                <h1>{{ $productCount }}</h1>
                                                <p>Total Products</p>
                                            </div>
                                            <div class="ap-po-details__icon-area">
                                                <div class="svg-icon order-bg-opacity-primary color-primary">
                                                    <i class="uil uil-briefcase-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-sm-6 mb-25">
                                <div
                                    class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                    <div class="overview-content w-100">
                                        <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                            <div class="ap-po-details__titlebar">
                                                <h1>{{ $totalOrders }}</h1>
                                                <p>Total Orders</p>
                                            </div>
                                            <div class="ap-po-details__icon-area">
                                                <div class="svg-icon order-bg-opacity-info color-info">
                                                    <i class="uil uil-shopping-cart-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-sm-6 mb-25">
                                <div
                                    class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                    <div class="overview-content w-100">
                                        <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                            <div class="ap-po-details__titlebar">
                                                <h1>Rs. {{ $totalSales }}</h1>
                                                <p>Total Sales</p>
                                            </div>
                                            <div class="ap-po-details__icon-area">
                                                <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                                    <i class="uil uil-usd-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-sm-6 mb-25">
                                <div
                                    class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                    <div class="overview-content w-100">
                                        <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                            <div class="ap-po-details__titlebar">
                                                <h1>{{ $countCustomer }}</h1>
                                                <p>Total Customers</p>
                                            </div>
                                            <div class="ap-po-details__icon-area">
                                                <div class="svg-icon order-bg-opacity-warning color-warning">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 mb-25">
                        <div class="card border-0 h-100">
                            <div class="card-header border-0 pb-md-0 pb-20">
                                <h4>Sales Reports</h4>
                                <div class="card-extra">
                                    <div class="dropdown dropleft">
                                        <a href="#" role="button" id="else" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <img src="img/svg/more-horizontal.svg" alt="more-horizontal" class="svg">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="else">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-25 mt-n10">
                                <div class="label-detailed">
                                    <div class="label-detailed__single"><span
                                            class="label-detailed__type label-detailed__type--primary">Orders</span>
                                        <strong class="label-detailed__total">$8,550</strong> <span
                                            class="label-detailed__status color-success"><img class="svg"
                                                src="img/svg/arrow-success-up.svg" alt><strong>25%</strong></span>
                                    </div>
                                    <div class="label-detailed__single"><span
                                            class="label-detailed__type label-detailed__type--info">Sales</span>
                                        <strong class="label-detailed__total">$5,550</strong> <span
                                            class="label-detailed__status color-danger"><img class="svg"
                                                src="img/svg/arrow-danger-down.svg" alt>
                                            <strong>15%</strong></span>
                                    </div>
                                </div>
                                <div class="parentContainer position-relative">
                                    <div>
                                        <canvas id="salesReports"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 mb-25">
                        <div class="card border-0 px-25">
                            <div class="card-header px-0 border-0">
                                <h6>Top Selling Products</h6>
                                <div class="card-extra">
                                    <ul class="card-tab-links nav-tabs nav" role="tablist">
                                        <li>
                                            <a class="active" href="#t_selling-today" data-bs-toggle="tab"
                                                id="t_selling-today-tab" role="tab"
                                                aria-selected="true">Today</a>
                                        </li>
                                        <li>
                                            <a href="#t_selling-week" data-bs-toggle="tab" id="t_selling-week-tab"
                                                role="tab" aria-selected="true">Week</a>
                                        </li>
                                        <li>
                                            <a href="#t_selling-month" data-bs-toggle="tab" id="t_selling-month-tab"
                                                role="tab" aria-selected="true">Month</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel"
                                        aria-labelledby="t_selling-today-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>PRDUCTS NAME</th>
                                                            <th>Price</th>
                                                            <th>Sold</th>
                                                            <th>Revenue</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                        src="img/premium-clock.png" alt="img">
                                                                    <span>Premium Clock</span>
                                                                </div>
                                                            </td>
                                                            <td>$280</td>
                                                            <td>339</td>
                                                            <td>$38,536</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                        src="img/t-shirt.png" alt="img">
                                                                    <span>Boys T-Shirt</span>
                                                                </div>
                                                            </td>
                                                            <td>$25</td>
                                                            <td>80</td>
                                                            <td>$20,573</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                        src="img/nike.png" alt="img">
                                                                    <span>Nike Shoes</span>
                                                                </div>
                                                            </td>
                                                            <td>$32</td>
                                                            <td>58</td>
                                                            <td>$17,457</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                        src="img/cup-glass.png" alt="img">
                                                                    <span>Smart Glass</span>
                                                                </div>
                                                            </td>
                                                            <td>$9,50</td>
                                                            <td>36</td>
                                                            <td>$15,354</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="radius-xs img-fluid order-bg-opacity-primary"
                                                                        src="img/women-bag.png" alt="img">
                                                                    <span>Women Bag</span>
                                                                </div>
                                                            </td>
                                                            <td>$32</td>
                                                            <td>40</td>
                                                            <td>$12,354</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="t_selling-week" role="tabpanel"
                                        aria-labelledby="t_selling-week-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>PRDUCTS NAME</th>
                                                            <th>Price</th>
                                                            <th>Sold</th>
                                                            <th>Revenue</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/287.png" alt="img">
                                                                    <span>Samsung Galaxy S8 256GB</span>
                                                                </div>
                                                            </td>
                                                            <td>$289</td>
                                                            <td>339</td>
                                                            <td>$60,258</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid"
                                                                        src="img/165.png" alt="img">
                                                                    <span>Half Sleeve Shirt</span>
                                                                </div>
                                                            </td>
                                                            <td>$29</td>
                                                            <td>136</td>
                                                            <td>$2,483</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/166.png" alt="img">
                                                                    <span>Marco Shoes</span>
                                                                </div>
                                                            </td>
                                                            <td>$59</td>
                                                            <td>448</td>
                                                            <td>$19,758</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/315.png" alt="img">
                                                                    <span>15" Mackbook Pro</span>
                                                                </div>
                                                            </td>
                                                            <td>$1,299</td>
                                                            <td>159</td>
                                                            <td>$197,458</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/506.png" alt="img">
                                                                    <span>Apple iPhone X</span>
                                                                </div>
                                                            </td>
                                                            <td>$899</td>
                                                            <td>146</td>
                                                            <td>115,254</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="t_selling-month" role="tabpanel"
                                        aria-labelledby="t_selling-month-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>PRDUCTS NAME</th>
                                                            <th>Price</th>
                                                            <th>Sold</th>
                                                            <th>Revenue</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/287.png" alt="img">
                                                                    <span>Samsung Galaxy S8 256GB</span>
                                                                </div>
                                                            </td>
                                                            <td>$149</td>
                                                            <td>389</td>
                                                            <td>$60,278</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid"
                                                                        src="img/165.png" alt="img">
                                                                    <span>Half Sleeve Shirt</span>
                                                                </div>
                                                            </td>
                                                            <td>$59</td>
                                                            <td>136</td>
                                                            <td>$2,483</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/166.png" alt="img">
                                                                    <span>Marco Shoes</span>
                                                                </div>
                                                            </td>
                                                            <td>$89</td>
                                                            <td>448</td>
                                                            <td>$19,758</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/315.png" alt="img">
                                                                    <span>15" Mackbook Pro</span>
                                                                </div>
                                                            </td>
                                                            <td>$1,29</td>
                                                            <td>15</td>
                                                            <td>$197,8</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <img class="me-15 wh-34 img-fluid order-bg-opacity-primary"
                                                                        src="img/506.png" alt="img">
                                                                    <span>Apple iPhone X</span>
                                                                </div>
                                                            </td>
                                                            <td>$99</td>
                                                            <td>16</td>
                                                            <td>1154</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 mb-25">
                        <div class="card border-0 px-25 browser-states">
                            <div class="card-header px-0 border-0">
                                <h6>Browser States</h6>
                                <div class="card-extra">
                                    <ul class="card-tab-links nav-tabs nav" role="tablist">
                                        <li>
                                            <a class="active" href="#t_selling-today2" data-bs-toggle="tab"
                                                id="t_selling-today2-tab" role="tab"
                                                aria-selected="true">Today</a>
                                        </li>
                                        <li>
                                            <a href="#t_selling-week2" data-bs-toggle="tab" id="t_selling-week2-tab"
                                                role="tab" aria-selected="true">Week</a>
                                        </li>
                                        <li>
                                            <a href="#t_selling-month3" data-bs-toggle="tab"
                                                id="t_selling-month3-tab" role="tab"
                                                aria-selected="true">Month</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today2" role="tabpanel"
                                        aria-labelledby="t_selling-today2-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Browsers</th>
                                                            <th>Session</th>
                                                            <th>Bounce Rate</th>
                                                            <th>CTE</th>
                                                            <th>Goal Conv. Rate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Google Chrome</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Mozila Firefox</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Apple Safari</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Internet Explorer</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Opera Mini</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="t_selling-week2" role="tabpanel"
                                        aria-labelledby="t_selling-week2-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>Session</th>
                                                            <th>Bounce Rate</th>
                                                            <th>CTE</th>
                                                            <th>Goal Conv. Rate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Google Chrome</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Mozila Firefox</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Apple Safari</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Internet Explorer</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Opera Mini</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="t_selling-month3" role="tabpanel"
                                        aria-labelledby="t_selling-month3-tab">
                                        <div class="selling-table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>Session</th>
                                                            <th>Bounce Rate</th>
                                                            <th>CTE</th>
                                                            <th>Goal Conv. Rate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Google Chrome</span>
                                                                </div>
                                                            </td>
                                                            <td>73,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Mozila Firefox</span>
                                                                </div>
                                                            </td>
                                                            <td>45,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Apple Safari</span>
                                                                </div>
                                                            </td>
                                                            <td>57,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Internet Explorer</span>
                                                                </div>
                                                            </td>
                                                            <td>92,345</td>
                                                            <td>3.5%</td>
                                                            <td>
                                                                12025
                                                            </td>
                                                            <td>90%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="selling-product-img d-flex align-items-center">
                                                                    <span>Opera Mini</span>
                                                                </div>
                                                            </td>
                                                            <td>78,345</td>
                                                            <td>1.5%</td>
                                                            <td>
                                                                48584
                                                            </td>
                                                            <td>80%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
</body>

</html>
