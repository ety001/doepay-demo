<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DogeShop</title>

        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    DogeShop
                </a>
            </div>
        </nav>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    This demo built on TEST NET. Please use the account of TEST NET to test.
                </div>
                </div>
                <div class="col-md-12">
                    <p>Product List</p>
                </div>
                <div class="col-md-12">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://www.colourbox.com/preview/8519302-rubber-stamp-vip-members-only.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">DogeShop Vip Card</h5>
                            <p class="card-text"><span style="color: red;">11 XLM / Year</span></p>
                            <a href="{{ $pay_url }}" class="btn btn-primary">Go to pay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
