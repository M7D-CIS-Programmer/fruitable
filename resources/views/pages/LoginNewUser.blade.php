<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="styles.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/assets/img/hero-bg-2.jpg');
            overflow: hidden;
        }

        .background {
            background-image: url('path_to_your_image.jpg');
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: brightness(0.6);
            z-index: 1;
        }

        .container {
            position: relative;
            background-color: rgba(2, 22, 22, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(43, 29, 247, 0.5);
            width: 350px;
            z-index: 2;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ddd;
        }

        input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4cae4c;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #ddd;
        }

        a {
            color: #5cb85c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
{{-- 
<script>
    function handleSubmit(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        // التحقق من شروط الإدخال
        if (password.length < 6) {
            alert("يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل.");
            return;
        }

        if (password !== confirmPassword) {
            alert("كلمة المرور وتأكيد كلمة المرور غير متطابقتين.");
            return;
        }

        // إرسال البيانات إلى الخادم
        $.ajax({
            url: '{{ route('page.UpdateLoginNewUser') }}', // المسار إلى ملف PHP
            method: 'GET',
            data: {
                name: name,
                email: email,
                password: password
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    alert('تمت عملية التسجيل بنجاح!');
                    // يمكن توجيه المستخدم إلى صفحة أخرى هنا
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function(xhr) {
                console.error(xhr);
                alert('حدث خطأ أثناء إرسال البيانات.');
            }
        });
    }
</script> --}}

    {{-- <script>
        function handleSubmit(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password.length < 6) {
                alert("يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل.");
                return;
            }

            if (password !== confirmPassword) {
                alert("كلمة المرور وتأكيد كلمة المرور غير متطابقتين.");
                return;
            }

            // alert(`الاسم: ${name}\nالبريد الإلكتروني: ${email}\nكلمة المرور: ${password}`);

            const formData = {
            name: name,
            email: email,
            password: password,
            confirmPassword: confirmPassword
        };

        // إرسال الطلب عبر Ajax
        $.ajax({
            url: '{{ route('page.UpdateLoginNewUser') }}', // تأكد من صحة المسار
            method: 'GET', // استخدام POST
            data: formData,
            success: function(response) {
                // التعامل مع الاستجابة
                console.log(response);
                alert('تم تنفيذ طلبك بنجاح!');

                // إعادة التوجيه إلى صفحة home
                window.location.href = '{{ route('page.home') }}'; // تأكد من أن لديك route مناسب
            },
            error: function(xhr) {
                // التعامل مع الأخطاء
                alert('حدث خطأ، يرجى المحاولة مرة أخرى.');
                console.error(xhr);
                console.log(xhr.responseText); // إضافة هذه السطر لطباعة الرد
            }
        });
        
        } --}}
    </script>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <form class="login-form" onsubmit="return handleSubmit(event)" action="{{ route('page.UpdateLoginNewUser') }}" method="GET">
            <h2>تسجيل الدخول كمستخدم جديد</h2>

            <div class="input-group">
                <label for="name">الاسم</label>
                <input name="name" type="text" id="name" placeholder="your name" required>
            </div>
            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input name="email" type="email" id="email" placeholder="your email" required>
            </div>
            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input name="password" type="password" id="password" placeholder="password" required minlength="6">
            </div>
            <div class="input-group">
                <label for="confirm-password">تأكيد كلمة المرور</label>
                <input name="confirm_password" type="password" id="confirm-password" placeholder="confirm password"
                    required minlength="6">
            </div>
            <button type="submit">دخول</button>
            @if (session('secssful'))
                <div class="alert">
                    {{ session('secssful') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif
            @if (session('error'))
                <div class="alert">
                    {{ session('error') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif
            {{-- <p>ليس لديك حساب؟ <a href="#">سجل هنا</a></p> --}}
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>
