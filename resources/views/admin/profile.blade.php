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
        <div class="container-fluid">
            <div class="profile-content mb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">My profile</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i
                                                    class="uil uil-estate"></i>Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">My profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-4  ">
                        <aside class="profile-sider">
                            <div class="card mb-25">
                                <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">
                                    <div class="account-profile">
                                        <div class="ap-img w-100 d-flex justify-content-center">
                                            <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary"
                                                src="{{ Avatar::create(Auth()->user()->name)->toBase64() }}"
                                                alt="profile">
                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title">{{ Auth()->user()->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                                        <div class="profile-overview d-flex justify-content-between flex-wrap">
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">$72,572</h6>
                                                <span class="po-details__sTitle text-primary">Total Revenue</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">3,257</h6>
                                                <span class="po-details__sTitle text-primary">order</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">74</h6>
                                                <span class="po-details__sTitle text-primary">Products</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xxl-9 col-md-8">
                        <div class="ap-tab ap-tab-header">
                            <div class="ap-tab-header__img">
                                <img src="{{ url('assets/img/ap-header.png') }}" alt="ap-header"
                                    class="img-fluid w-100">
                            </div>
                            <div class="ap-tab-wrapper">
                                <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="ap-overview-tab" data-bs-toggle="pill"
                                            href="#ap-overview" role="tab" aria-selected="true">Overview</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                                aria-labelledby="ap-overview-tab">
                                <div class="ap-content-wrapper">
                                    <div class="row">
                                        <div class="col-lg-4 mb-25">
                                            <div class="ap-po-details radius-xl d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h1>3,257</h1>
                                                        <p>Orders</p>
                                                        <div class="ap-po-details-time">
                                                            <span class="color-success"><i class="las la-arrow-up"></i>
                                                                <strong>25%</strong>
                                                            </span>
                                                            <small>Since last week</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ap-po-timeChart">
                                                    <div class="overview-single__chart d-md-flex align-items-end">
                                                        <div class="parentContainer">
                                                            <div>
                                                                <canvas id="mychart8"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <div class="ap-po-details radius-xl d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h1>$72,572</h1>
                                                        <p>Total Revenue</p>
                                                        <div class="ap-po-details-time">
                                                            <span class="color-success"><i class="las la-arrow-up"></i>
                                                                <strong>25%</strong>
                                                            </span>
                                                            <small>Since last week</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ap-po-timeChart">
                                                    <div class="overview-single__chart d-md-flex align-items-end">
                                                        <div class="parentContainer">
                                                            <div>
                                                                <canvas id="mychart9"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <div class="ap-po-details radius-xl d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h1>1,274</h1>
                                                        <p>product sold</p>
                                                        <div class="ap-po-details-time">
                                                            <span class="color-danger"><i
                                                                    class="las la-arrow-down"></i>
                                                                <strong>25%</strong>
                                                            </span>
                                                            <small>Since last week</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ap-po-timeChart">
                                                    <div class="overview-single__chart d-md-flex align-items-end">
                                                        <div class="parentContainer">
                                                            <div>
                                                                <canvas id="mychart10"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card mt-25 mb-40">
                                                <div class="card-header text-capitalize px-md-25 px-3">
                                                    <h6>My products</h6>
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="products"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <img src="img/svg/more-horizontal.svg"
                                                                alt="more-horizontal" class="svg text-primary">
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="products">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else
                                                                here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="ap-product">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Products Name</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">sold</th>
                                                                        <th scope="col">Revenue</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Samsung Galaxy S8 256GB</td>
                                                                        <td>$280</td>
                                                                        <td>126</td>
                                                                        <td>$38,536</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Half Sleeve Shirt</td>
                                                                        <td>$25</td>
                                                                        <td>80</td>
                                                                        <td>$20,573 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Marco Shoes </td>
                                                                        <td>$32</td>
                                                                        <td>58</td>
                                                                        <td>$17,457</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>15 Mackbook Pro</td>
                                                                        <td>$9,50</td>
                                                                        <td>36</td>
                                                                        <td>$15,354</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>apple iphone x</td>
                                                                        <td>$985</td>
                                                                        <td>24</td>
                                                                        <td>$10,710</td>
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
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
