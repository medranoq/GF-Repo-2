<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer API</title>
</head>
<body>
    <form method="GET" action="{{ route('customer') }}">
        <button type="submit" class="btn btn-primary">Get customers</button>
    </form>
</body>
</html>
