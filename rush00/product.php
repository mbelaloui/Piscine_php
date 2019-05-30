<?php
session_start();
if ($_GET['id'] == null) {
    header("HTTP/1.0 404 Not Found"); // or just include 404 and don't display the rest ?
    exit();
}
include 'sqlib.php';
$con = connect_db();
$product = get_produit($con, $_GET['id']);
?>

<head>
    <meta charset="utf-8" />
    <title>Produit</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <div class="wrapper">
            <h1><a href="index.php" id="brand" title="Produit">Produit</a></h1>
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
                            <li><a href="search.php">Summer dress</a></li>
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
                <input type="text" placeholder="Search Produit..." /><button type="submit">
                    Search
                </button>
            </form>
            <div id="action-bar">
                <?php if (isset($_SESSION['loggued_on_user']) && !empty($_SESSION['loggued_on_user'])): ?>
                <a href="administration.php">My Account</a> /
                <a href="logout.php">Logout</a> /
                <?php else: ?>
                <a href="sign_in.php">Login/Register</a> /
                <?php endif;?>
                <a href="viewbasket.php">Your bag (0)</a>
            </div>
        </div>
    </aside>
    <article id="mainview">
        <div id="breadcrumb">
            <a href="index.php">Home</a> > <a href="search.php">Dresses</a> >
            <a href="search.php">Summer Dress</a> > <?php echo $product[0]['nom_produit']; ?>
        </div>
        <div id="description">
            <h1>
                <?php echo $product[0]['nom_produit']; ?>
            </h1>
            <p>
                <?php echo $product[0]['description_produit']; ?>
            </p>
       <!--     <p>
                <select name="size">
                    <option value="Init" selected="selected">Select size</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    <option value="XLarge">X-Large</option>
                    <option value="XXLarge">XX-Large</option>
                </select>
            </p> -->
            <p>
                <button type="button">Size guide</button>
            </p>
            <p><a href="viewbasket.php?additem=<?php echo $_GET['id']; ?>"><button type="submit" class="continue">Add to bag</button></a></p>
            <p><button type="button">Tell a friend</button></p>
        </div>
        <div id="images" style="padding-bottom: 12px;">
            <a href="images/main.jpg"><img src="images/main.jpg" /></a>
        </div>
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
