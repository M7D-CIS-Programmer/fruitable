@extends('layout.master')

@section('title', 'contact')

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
                        <p>Get special support and discount on 24/1</p>
                        <h1>Contact us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Do you have any question?</h2>
                        <p>
                            Tell me about the questions that come to your mind or if you have any comment do not hesitate to
                            ask
                            so that we can provide you with services that suit your needs, we are here to satisfy you.
                        </p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );" method="POST"
                            action="{{ route('page.subcontact') }}">
                            @csrf
                            <p>
                                <input name="name" type="text" placeholder="Name" name="name" id="name" required>
                                <input name="email" type="email" placeholder="Email" name="email" id="email" required>
                            </p>
                            <p>
                                <input name="phone" type="tel" placeholder="Phone" name="phone" id="phone" required>
                                <input name="subject" type="text" placeholder="Subject" name="subject" id="subject">
                            </p>
                            <p>
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                            </p>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            <p><button class="boxed-btn" id="submitButton" type="submit">submit</button></p>
                        </form>
                        @if (session('success'))
                        <div class="alert">
                            {{ session('success') }}
                            <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i> Shop Address</h4>
                            <p> Jordan <br> Amman. </p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="far fa-clock"></i> Shop Hours</h4>
                            <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i> Contact</h4>
                            <p>Phone: 078******* <br> Email: support@M7D.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->

    <!-- find our location -->
    <div class="find-location blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end find our location -->

    <!-- google map section -->
    <div class="embed-responsive embed-responsive-21by9">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
            class="embed-responsive-item"></iframe>
    </div>
    <!-- end google map section -->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#submitButton').click(function() {
            $.ajax({
                url: '{{ route('page.subcontact') }}',
                type: 'POST',
                data: {
                    inputField: $('#inputField').val(),
                    _token: '{{ csrf_token() }}' // تأكد من تضمين رمز CSRF
                },
                success: function(response) {
                    console.log(response);
                    // يمكنك إضافة الكود لمعالجة الاستجابة
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script> --}}

    <style>
                .alert {
            padding: 15px;
            background-color: #77da35;
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
