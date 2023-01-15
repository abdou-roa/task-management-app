<!DOCTYPE html>
<html>
<head>
    <title>Task Management App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #e5e5e5;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            margin-bottom: 30px;
            color: #333;
        }
        p {
            color: #555;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Task Management App</h1>
        <p>Efficiently manage your tasks and increase productivity.</p>
        <div class="links d-flex">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        </div>
    </div>
</body>
</html>
