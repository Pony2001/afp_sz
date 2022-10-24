<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/results.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SzakiMaki</title>
</head>

<body>
    <div class='container'>
        <header>
            <nav class="navbar">
                <div class="logo">
                    <a id="home" href="/" style="text-decoration: none; color: #ffcc00;">
                        <img src="/images/logo.png" alt="" width="75" class="logo-img"> SzakiMaki
                    </a>
                </div>
            </nav>
        </header>
        <content>

            @yield('content')

        </content>
        <footer class="py-3 my-4">
            <hr>
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item nav-link px-2 text-muted">Bata Krisztián</li>
                <li class="nav-item nav-link px-2 text-muted">Tápi Dániel</li>
                <li class="nav-item nav-link px-2 text-muted">Csikós Zsolt Csaba</li>
            </ul>
            <p class="text-center text-muted"><a href="#" class="nav-link px-2 text-muted">Discord</a></p>
        </footer>
    </div>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
