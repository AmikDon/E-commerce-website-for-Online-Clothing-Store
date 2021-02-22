<?php
    if(isset($_POST['category'])){
        //databaseconn
        include_once 'connect.php';
        
        //storing data from category to variables

    }elseif(isset($_GET['category'])){
        //databaseconn
        include_once 'connect.php';
        $categoryCheck = $_GET['category'];

    }
    include_once 'header.php';
?>

    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home ></a></li>
                <li><a href="category.php">
                    <?php
                        if($categoryCheck == "men"){
                            echo "Men";
                            
                        }elseif($categoryCheck == "women"){
                            echo "Women";
                        }elseif($categoryCheck == "kids"){
                            echo "Kids";
                        }elseif($categoryCheck == "accessories"){
                            echo "Accessories";
                        }elseif($categoryCheck == "Shoes"){
                            echo "Shoes";
                        }
                    ?>
                    </a></li>
            </ul>
        </div>
    </div>

    <div class="main-login">
        <div class="container">
            <div class="login-content">
                <div class="login-details">
                    <h1>Images...</h1>
                    
                </div>

                
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>