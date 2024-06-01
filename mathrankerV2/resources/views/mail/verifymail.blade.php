<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="display-1">Hello There</h1>
    <p class="lead">Thank you for registering with us. Please check the OTP below</p>
    <br>
    <br>
    <br>
    <h1 class="display-5">OTP: <code>{{$mailData['body']}}</code></h1>
    <br>
    <br>
    <br>
    <p class="lead">If you did not register with us, please ignore this email.</p>
    <br>
    <br>
    <br>
    <p class="lead">Thank you</p>
    <p class="lead">Team</p>
    <p class="lead">MathRanker</p>

</body>
</html>