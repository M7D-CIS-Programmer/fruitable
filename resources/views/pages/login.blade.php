<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            /* ارتفاع كامل الصفحة */
            display: flex;
            /* استخدام Flexbox */
            justify-content: center;
            /* محاذاة أفقية */
            align-items: center;
            /* محاذاة عمودية */
            background-color: #26222c;
            /* يمكنك تغيير اللون هنا إذا رغبت */
            overflow: hidden;
        }

        .background {
            background-image: url('path_to_your_image.jpg');
            /* استبدل بمسار الصورة التي تفضلها */
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: brightness(0.6);
            z-index: 1;
            /* وضع الخلفية أسفل المحتوى */
        }

        .container {
            position: relative;
            background-color: rgba(5, 78, 78, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(224, 217, 217, 0.5);
            width: 350px;
            /* margin: 20px auto; */
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


    {{-- <script>
        function handleSubmit(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // التحقق إذا كان البريد الإلكتروني فارغًا أو يحتوي فقط على مسافات
            if (email.trim() === '') {
                alert("لا يمكن ترك البريد الإلكتروني فارغًا!");
                return;
            } else if (password.length < 6) {
                alert("يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل.");
                return;
            }

            // يمكنك إضافة أي منطق هنا، مثل التحقق من البيانات
            alert(`البريد الإلكتروني: ${email}\nكلمة المرور: ${password}`);
        }
    </script> --}}




</head>

<body>
    <div class="background"></div>
    <div class="container">
        <form class="login-form" onsubmit="return handleSubmit(event)" method="GET"
            action="{{ route('page.updateLogin') }}">
            <h2>تسجيل الدخول</h2>
            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input name="email" type="email" id="email" placeholder="your email" required>
            </div>
            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input name="password" type="password" id="password" placeholder="your password" minlength="6" required>
            </div>
            <button type="submit">دخول</button>
            @if (session('error'))
                <div class="alert">
                    {{ session('error') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif
            <p>ليس لديك حساب؟ <a href="{{ route('page.LoginNewUser') }}">سجل هنا</a></p>
        </form>
    </div>

</body>

</html>
