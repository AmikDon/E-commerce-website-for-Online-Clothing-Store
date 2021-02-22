
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Style Css    -->
    <link rel="stylesheet" href="css/style.css">
    <title>Modish Collection</title>
</head>

<body>
    <!-- Header -->
    <section class="header">
        <div class="container">
            <!-- Search and Cart -->
            <div class="nav-area">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.jpg" alt=""></a>
                </div>

                <div class="nav-search">
                    <div class="search-container">
                        <!-- <form class="nav-search">
                            <div>
                                <label class="screen-reader-text" for="s"></label>
                                <input type="text" placeholder="Search" />
                                <input type="submit" id="searchsubmit" value="Search" />
                            </div>
                        </form> -->
                        <form class="form-inline ">
                            <input class="form-control nav-search-form" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn nav-search-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <div class="cart-account">
                    <i class="fas fa-shopping-cart"></i>
                    <a href="register.php"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </div>


        <!-- Nav Menu -->
        <div class="main-nav">
            <div class="container">
                <nav class="main-menu">
                    <ul>
                        <li><a href="category.php?category=men">Men</a></li>
                        <li><a href="category.php?category=women">Women</a></li>
                        <li><a href="category.php?category=kids">Kids</a></li>
                        <li><a href="category.php?category=accessories">Accessories</a></li>
                        <li><a href="category.php?category=shoes">Shoes</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>