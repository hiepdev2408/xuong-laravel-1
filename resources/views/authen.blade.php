<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://your-image-link.jpg'); /* Đặt đường dẫn hình ảnh nền */
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5); /* Lớp nền tối mờ */
        }
        h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        .btn {
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-secondary {
            background-color: #fff;
            color: #000;
        }
        .btn:hover {
            opacity: 0.9;
        }
        header {
            position: absolute;
            top: 0;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }
        .logo {
            font-size: 24px;
            color: #fff;
        }
        nav a {
            margin-left: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Your Logo</div>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    <div class="container">
        <h1>Welcome back, {{ Auth::user()->name }}!</h1>
        <p>We are glad to see you again! Start exploring now.</p>
        <button class="btn btn-primary">Explore Now</button>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-secondary">Logout</button>
        </form>
    </div>
</body>
</html>
