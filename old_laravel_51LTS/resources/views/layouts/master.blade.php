<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>.:: Electronic Engineering Web Site ::.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div id="app"class="container">
    <header>
        <img src="images/logobig.jpg" alt="Electronic Engineering">
        <h1>Electronic Engineering </h1>
    </header>
    <main>
        @yield('aside')
        <article>
            @yield('content')
        </article>
    </main>
    <footer>
        <ul>
            <li>Copyright <i class="fa fa-copyright"></i> 2016</li>
            <li>Tutti i diritti riservati</li>
            <li>Design & Coding by <a href="http://www.litemedia.it" target="_blank">LiteMedia</a></li>
        </ul>
        <ul>
            <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
        </ul>
    </footer>
</div>

@yield('jscript')

</body>
</html>