<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 50px;
            color: #f5f5f5;
            margin: 37Vh;
        }

        body ul {
            list-style: none;
            display: flex;
            width: 100%;
            height: 8vh;
            /* background-color: #f5f5f5; */
            justify-content: space-evenly;
            align-items: center;
        }

        body ul a {
            text-decoration: none;
            color: black;
            font-size: 15px;
        }

        body ul li {
            margin-left: 10px;
        }

        body ul li:hover {
            background-color: #e5e5e5;
            padding: 10px 10px;
            border-radius: 8px;

        }
    </style>
</head>
<body>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
    @yield('content')
</body>
</html>
