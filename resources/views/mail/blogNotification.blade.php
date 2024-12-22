<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        /* Inline styles for simplicity, consider using CSS classes for larger templates */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .logo-container {
            text-align: center; /* لمحاذاة الشعار في المنتصف */
            margin-bottom: 20px; /* مسافة بين الشعار وباقي المحتوى */
        }

        .logo-container img {
            max-width: 150px; /* التحكم في حجم الشعار */
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <a href="{{ url('/') }}">
                <img src="" alt="logo" style="max-width: 150px; height: auto;" />
            </a>

        </div>
        <div class="header">{{ __('New Blog: ') . $blog->name }}</div>
        <div class="content">
            <p>{{ __('Hello,') }}</p>
            <p>{{ __('A new blog post has been published on our site.') }}</p>
            <h3>{{ $blog->name }}</h3>
            @if($blog->image)
        <img src="{{ asset('storage/'. $blog->image) }}" alt="Blog Image" style="max-width: 100%; height: auto;">
    @endif
            <p>{!! $blog->desc !!}</p>
        </div>
        <div class="footer">{{ __('Thank you for staying with us!') }}</div>
    </div>
</body>
</html>

