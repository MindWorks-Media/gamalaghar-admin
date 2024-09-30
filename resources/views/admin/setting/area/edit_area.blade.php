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
                            <h4 class="text-capitalize breadcrumb-title">Add Area</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"
                                                class="text-primary"><i
                                                    class="uil uil-estate text-primary"></i>Dashboard</a></li>
                                        <li class="breadcrumb-item active text-primary" aria-current="page">Area
                                        </li>
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
                            <h6 class="fw-500">Area</h6>
                        </div>
                        <div class="add-product__body px-sm-40 px-20">
                            <form action="{{ url('admin/setting/area') }}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="form-group">
                                    <div class="countryOption">
                                        <label for="provinceOption">Province</label>
                                        <select class="select2" id="provinceOption" name="province_id">
                                            <option value=""></option>
                                            @foreach ($province as $provinceData)
                                                <option value="{{ $provinceData->id }}">
                                                    {{ $provinceData->province }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="countryOption">
                                        <label for="cityOption">City</label>
                                        <select class="select2" id="cityOption" name="city_id">
                                            <option value=""></option>
                                        </select>
                                        @error('city_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name1">Area name</label>
                                    <input type="text" class="form-control" id="name1"
                                        placeholder="Enter area name" name="areas[]" multiple>
                                    @error('areas')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div
                                    class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                                    <button class="btn btn-primary btn-default btn-squared text-capitalize"
                                        type="submit">Save area</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#provinceOption').on('change', function() {
            var selectedOption = $(this).val();
            if (selectedOption !== "") {
                // Retrieve the data based on the selected option's value
                $.ajax({
                    url: '/user/checkout/cities/' + selectedOption,
                    method: 'GET',
                    success: function(response) {
                        // Clear previous options
                        $('#cityOption').empty();

                        // Append new options based on retrieved data
                        for (var i = 0; i < response.length; i++) {
                            var option = $('<option>');
                            option.val(response[i].id);
                            option.text(response[i].city);
                            $('#cityOption').append(option);
                        }
                    }
                });
            } else {
                // Clear the second field if no option is selected
                $('#cityOption').empty();
            }
        });
    });

    $(document).ready(function() {
        $('#cityOption').on('change', function() {
            var selectedOption = $(this).val();
            if (selectedOption !== "") {
                // Retrieve the data based on the selected option's value
                $.ajax({
                    url: '/user/checkout/areas/' + selectedOption,
                    method: 'GET',
                    success: function(response) {
                        // Clear previous options
                        $('#areaOption').empty();

                        // Append new options based on retrieved data
                        for (var i = 0; i < response.length; i++) {
                            var option = $('<option>');
                            option.val(response[i].id);
                            option.text(response[i].area);
                            $('#areaOption').append(option);
                        }
                        $('#delivery_charge').text(response.delivery_charge)
                    }
                });
            } else {
                // Clear the second field if no option is selected
                $('#areaOption').empty();
            }
        });
    });

    $(document).ready(function() {
        $('#areaOption').on('change', function() {
            var selectedOption = $(this).val();
            if (selectedOption !== "") {
                // Retrieve the data based on the selected option's value
                $.ajax({
                    url: '/user/checkout/areas/deliveryCharge/' + selectedOption,
                    method: 'GET',
                    success: function(response) {
                        $('#delivery_charge').text('Rs. ' + response.delivery_charge);
                        $('#deliveryCharge').val(response.delivery_charge);
                    }
                });
            } else {
                $('#delivery_charge').text('N/A');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    });
</script>


<style>
    .select2-container--default .select2-selection--single {
        height: 48px;
        outline: none;
        font-size: 16px;
        padding: 10px;
    }

    .select2-search__field {

        height: 30px !important;
        /* Adjust height as needed */
        font-size: 16px;
        /* Adjust font size as needed */
    }

    .select2-selection__arrow {
        display: none !important;
        /* Hide the arrow */
    }
</style>
