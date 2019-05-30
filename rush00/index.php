<?php
    session_start();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>Rush00</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css" />
</head>

<body id="home">
    <header>
        <div class="wrapper">
            <h1><a href="index.php" id="brand" title="Rush00">Rush00</a></h1>
            <nav>
                <ul>
                    <li>
                        <a href="search.php">Tops</a>
                        <ul class="sub-menu">
                            <li><a href="search.php">Tshirts</a></li>
                            <li><a href="search.php">Jumpers</a></li>
                            <li><a href="search.php">Cardigans</a></li>
                            <li><a href="search.php">Knitwear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="search.php">Trousers</a>
                        <ul class="sub-menu">
                            <li><a href="search.php">Formal</a></li>
                            <li><a href="search.php">Palazzo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="search.php">Dresses</a>
                        <ul class="sub-menu">
                            <li><a href="search.php">Bridal dress</a></li>
                            <li><a href="search.php">Cocktail dress</a></li>
                            <li><a href="search.php">Maxi dress</a></li>
                            <li><a href="search.php">Shift dress</a></li>
                            <li><a href="search.php">Warp dress</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <aside id="top">
        <div class="wrapper">
            <ul id="social">
                <li>
                    <a href="https://www.facebook.com/42born2code/" class="facebook" title="like us us on Facebook">like
                        us us on Facebook</a>
                </li>
                <li>
                    <a href="https://twitter.com/42born2code" class="twitter" title="follow us on twitter">follow us on
                        twitter</a>
                </li>
            </ul>
            <form>
                <input type="text" placeholder="Search Rush00..." /><button type="submit">
                    Search
                </button>
            </form>
            <div id="action-bar">
                <?php if (isset($_SESSION['loggued_on_user']) && !empty($_SESSION['loggued_on_user'])) : ?>
                <a href="administration.php">My Account</a> /
                <a href="logout.php">Logout</a> /
                <?php else : ?>
                <a href="sign_in.php">Login/Register</a> /
                <?php endif;?>
                <a href="viewbasket.php">Your bag (0)</a>
            </div>
        </div>
    </aside>
    <article>
        <a href="search.php"><img src="images/photo.jpg" /></a>
    </article>
    <footer>
        <div class="wrapper">
            <span class="logo">Rush00</span>
            <a href="#" target="_blank" title="title" class="right">Web Design 42</a>
            &copy; Rush00 <a href="#">Sitemap</a>
            <a href="#">Terms &amp; Conditions</a>
            <a href="#">Shipping &amp; Returns</a> <a href="#">Size Guide</a><a href="#">Help</a> <br />
        </div>
    </footer>
</body>

</html>
