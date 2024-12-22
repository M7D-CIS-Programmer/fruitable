@extends('layout.master')

@section('title', 'cart')

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
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">

                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    {{-- <th class="product-total">Total</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                <form action="{{ route('page.update') }}" method="GET">
                                    @csrf

                                    @foreach ($addproduct as $item)
                                        <tr class="table-body-row">
                                            <td class="product-remove"><button style="background:red;color:#f1e5d3" class="delete-button" data-product-id="{{ $item->id }}">
                                                    <i class="far fa-window-close"></i></button></td>
                                            <td class="product-image"><img src="{{ url($item->product->imgepath) }}"
                                                    alt=""></td>
                                            <td class="product-name">{{ $item->product->title }}</td>
                                            <td class="product-price" id="price">${{ $item->product->price }}</td>
                                            <td class="product-quantity">
                                                <input name="quantities[{{ $item->id }}]" type="number" min="1"
                                                    value="{{ $item->quantity }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <div class="message">
                                        <p>Click "Update Cart" To Show Total Price ! </p>
                                    </div>

                                    <button id="myButton" type="submit" class="custom-button">Update Cart</button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($addproduct as $item)
                                    <tr class="total-data">
                                        <td><strong>{{ $item->product->title }}: </strong></td>
                                        <td id="endprice">${{ $item->product->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach

                                <tr class="total-data">

                                    {{-- @if (session('totalprice'))
                                        <td><strong>Total:</strong></td>
                                        <td>${{ session('totalprice') }}</td>
                                    @endif --}}

                                    @if (session('totalprice'))
                                        <td><strong>Total:</strong></td>
                                        <td>${{ number_format(session('totalprice')) }}</td> <!-- تنسيق الرقم -->
                                    @else
                                        <td><strong>Total:</strong></td>
                                        <td>$0</td>
                                    @endif

                                </tr>
                            </tbody>
                        </table>


                        <div class="cart-buttons">
                            {{-- <a href="{{ route('page.update') }}" class="boxed-btn">Update Cart</a> --}}
                            <a href="{{ route('page.check_out') }}" class="boxed-btn black">Check
                                Out</a>
                        </div>

                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">

                            <form action="{{ route('page.home') }}">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->

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

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    $('.delete-button').click(function() {
        const productId = $(this).data('product-id');
        const confirmation = confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟");
        
        if (confirmation) {
            $.ajax({
                url: '{{ route('page.destroy', '') }}/' + productId, // تأكد من أن لديك route لحذف المنتج
                type: 'DELETE',
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
        }
    });
});

</script>

<style>
    .custom-button {
        background-color: #eea70d;
        /* اللون الأخضر */
        border: none;
        /* بدون حدود */
        color: white;
        /* لون النص */
        padding: 15px 32px;
        /* المساحة حول النص */
        text-align: center;
        /* محاذاة النص */
        text-decoration: none;
        /* إزالة أي تزيين */
        display: inline-block;
        /* جعل الزر في صف واحد */
        font-size: 16px;
        /* حجم الخط */
        margin: 4px 2px;
        /* مسافة خارجية */
        cursor: pointer;
        /* تغيير شكل المؤشر عند المرور */
        border-radius: 12px;
        /* زوايا دائرية */
        transition: background-color 0.3s, transform 0.3s;
        /* تأثيرات الانتقال */
    }

    .custom-button:hover {
        background-color: #384639;
        /* لون مختلف عند المرور */
        transform: scale(1.05);
        /* تكبير الزر قليلاً عند المرور */
    }

    .message {
        display: inline-block;
        background: #f1e5d3;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        color: #007BFF;
        transition: transform 0.3s;
    }

    .message:hover {
        transform: translateY(-3px);
    }
</style>
