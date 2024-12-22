@extends('layout.master')

@section('title', 'checkout')

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
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form id="myForm" action="{{ route('page.placeorder') }}" method="POST">
                                                @csrf
                                                <p><input name="name" type="text" placeholder="Name"></p>
                                                <p><input name="email" type="email" placeholder="Email"></p>
                                                <p><input name="address" type="text" placeholder="Address"></p>
                                                <p><input name="phone" type="tel" placeholder="Phone"></p>
                                                <p>
                                                    <textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>Your shipping address form is here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <p>Your card details goes here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Your order Details</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                <tr>
                                    <td>Product</td>
                                    <td>Total</td>
                                </tr>
                                @foreach ($products as $product_id => $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>${{ $item->price * $quantity[$product_id] }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td style="font-weight: bold;">Shipping</td>
                                    <td style="font-weight: bold;">$10</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Total</td>
                                    <td style="font-weight: bold;">${{ $totalprice + 10 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" id="submitBtn" class="boxed-btn">Place Order</button>
                        {{-- <a href="{{ route('page.placeorder') }}" class="boxed-btn">Place Order</a> --}}
                        @if (session('error'))
                            <div class="alert">
                                {{ session('error') }}
                                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->

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


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // إعداد توكن CSRF مرة واحدة
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submitBtn').on('click', function() {
            // جمع بيانات النموذج
            var formData = $('#myForm').serialize();

            var productName = $('input[name="name"]').val();
            var email = $('input[name="email"]').val();
            var address = $('input[name="address"]').val();
            var phone = $('input[name="phone"]').val();

            if (!productName || !email || !address || !phone) {
                alert('يرجى ملء جميع الحقول المطلوبة!');
                return; // إيقاف التنفيذ إذا كانت الحقول فارغة
            }

            // إرسال البيانات باستخدام AJAX
            $.ajax({
                url: '{{ route('page.placeorder') }}', // تأكد من صحة المسار
                method: 'POST',
                data: formData,
                success: function(response) {
                    // التعامل مع الاستجابة
                    console.log(response);
                    alert('تم تنفيذ طلبك بنجاح!');

                    // إعادة التوجيه إلى صفحة home
                    window.location.href = '{{ route('page.home') }}'; // تأكد من أن لديك route مناسب
                },
                error: function(xhr)
                {
                    alert(response.message);
                }
            });
        });
    </script>


    <style>
        .alert {
            padding: 15px;
            background-color: #f44336;
            /* اللون الأحمر */
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert .close {
            margin-left: 15px;
            color: white;
            cursor: pointer;
        }

        .boxed-btn {
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

        .boxed-btn:hover {
            background-color: #384639;
            /* لون مختلف عند المرور */
            transform: scale(1.05);
            /* تكبير الزر قليلاً عند المرور */
        }
    </style>

@endsection
