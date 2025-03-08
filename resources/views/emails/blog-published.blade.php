<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Blog Post has been Published</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Blog Post has been Published</h1>
        <p>Your blog post titled "<strong>{{ $blog->title }}</strong>" has been successfully published!</p>
        <a href="{{ url('blog/' . $blog->id) }}" class="button">View Your Post</a>
        <p class="footer">Thank you for using our platform. If you have any questions, feel free to contact us.</p>
    </div>
</body>
</html>