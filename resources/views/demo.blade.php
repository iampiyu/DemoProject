<?php /*Get user ip address*/
$ip_cookie = "ip";
$ip_address = $_SERVER['REMOTE_ADDR'];

setcookie($ip_cookie, $ip_address, 120);
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        .message {
            border: 2px solid green;
            padding: 20px;
        }
    </style>
    <script>
        setTimeout(function() {
            let element = document.querySelector('.message');
            if (element) {
                element.style.display = "none";
            }

        }, 3000); // <-- time in milliseconds
    </script>
</head>

<body class="antialiased">
    <div class="container-fluid my-5">

        <div class="container">

            @if (\Session::has('message'))
            <h3 class="message text-success">

                {!! \Session::get('message') !!}

            </h3>
            @endif



            <h1 class="text-primary text-center">Task 1 Save Demo </h1>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
            <div class="col-sm-12 col-md-8 col-lg-8 mx-5 my-5">

                <form action="{{ route('save')}}" method="post">@csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="firstName">First Name:</label><br />
                    <input id="firstName" type="text" placeholder="ENTER FIRST NAME" name="firstName" class="form-control"><br /><br />
                    <label for="lastName">Last Name:</label><br />
                    <input id="lastName" type="text" placeholder="ENTER LAST NAME" name="lastName" class="form-control"><br /><br />
                    <Button type="submit" class="btn btn-success">Submit</Button>
                </form>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>

    <hr />

    <div class="container-fluid my-5">
        <div class="container">
            <h2 class="text-primary text-center">Task 2 - Show Address </h2>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
            <div class="col-sm-12 col-md-6 col-lg-6 mx-5 my-5">

                <?php
                echo '<b> My IP ADDRESS is: </b>';

                if (!isset($_COOKIE[$ip_cookie])) {
                    echo "IP address from Cookie named '" . $ip_cookie . "' is not set!";
                } else {
                    echo " IP address from Cookie '" . $ip_address . "' is set!<br>";
                };
                echo '<b> My City is: </b>';
                echo '<br />';
                echo '<b> Your State is: </b>';
                echo '<br />';
                ?>

            </div>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>

    <hr />

    <div class="container-fluid my-5">
        <div class="container">
            <h2 class="text-primary text-center">Task 4 - Sent Mail </h2>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
            <div class="col-sm-12 col-md-6 col-lg-6 mx-5 my-5">

                <form action="{{ route('send-mail')}}" method="post">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="to">Recipient:</label><br />
                    <input id="to" type="text" placeholder="Enter recipient email" name="mail_to" class="form-control"><br /><br />
                    <label for="message">Mail body/Message:</label><br />
                    <textarea id="message" type="text" placeholder="Enter mail message" name="mail_message" class="form-control"></textarea><br /><br />
                    <Button type="submit" class="btn btn-success">Send Mail</Button>
                </form>

            </div>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
</body>

</html>