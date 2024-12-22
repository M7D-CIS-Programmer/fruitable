@extends('layout.master')

@section('title', 'shopping')

@section('contant')

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>

                            @if ($count == 0)
                                <li class = "active" data-filter="*">All</li>
                            @endif

                            @foreach ($catigory as $item)
                                @if ($count == 0)
                                    <li data-filter=".{{ $item->id }}">{{ $item->title }}</li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                {{-- <form action="{{ route('page.update') }}" method="GET">
                    @csrf
                    @method('PUT') --}}
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center {{ $item->catigory_id }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('page.shopping', $item->catigory_id) }}"><img
                                        src="{{ url($item->imgepath) }}" alt=""
                                        style="max-height: 250px !important;min-height:250px !important"></a>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p class="product-price"><span>Per Kg</span> {{ $item->price }}$ </p>
                            {{-- <a href= "{{ url(route('addtocart',$item->id)) }}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
                            <button class="boxed-btn" id="button-{{ $item->id }}" data-product-id="{{ $item->id }}">add to cart</button>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[id^=button-]').click(function() {
                const productId = $(this).data('product-id');
                $.ajax({
                    url: '{{ route('addtocart', '') }}/' + productId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('حدث خطأ: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });
    </script>


<style>

    .boxed-btn {
        background-color: #eea70d; /* اللون الأخضر */
        border: none; /* بدون حدود */
        color: white; /* لون النص */
        padding: 15px 32px; /* المساحة حول النص */
        text-align: center; /* محاذاة النص */
        text-decoration: none; /* إزالة أي تزيين */
        display: inline-block; /* جعل الزر في صف واحد */
        font-size: 16px; /* حجم الخط */
        margin: 4px 2px; /* مسافة خارجية */
        cursor: pointer; /* تغيير شكل المؤشر عند المرور */
        border-radius: 12px; /* زوايا دائرية */
        transition: background-color 0.3s, transform 0.3s; /* تأثيرات الانتقال */
    }
    
    .boxed-btn:hover {
        background-color: #384639; /* لون مختلف عند المرور */
        transform: scale(1.05); /* تكبير الزر قليلاً عند المرور */
    }
    
    </style>
    

@endsection
