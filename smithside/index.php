<?php
/**
 * index.php
 * Main content
 * content for the about page
 * @version 1.2 2018-04-16
 * @package Smith Side Auction
 * @copyright (c) 2018, Yasser Soofiyani IPD12
 * @license GNU Generl Public License
 * @since Release version 1.0
 */
require_once 'includes/functions.php';
require_once './includes/classes/contact.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Home | Smithside Auctions 2018</title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="container">

            <div id="header">
                <a href="index.php">
                    <img src="images/banner.jpg"  alt="Smithside Auctions" />
                </a> 
            </div><!-- end header -->

            <div id="navigation">
                <h3 class="element-invisible">Menu</h3>
                <ul class="mainnav">
                    <li><a href="index.php?content=categories">Lot Categories</a></li>
                    <li><a href="index.php?content=about">About Us</a></li>
                    <li><a href="index.php?content=home">Home</a></li>
                </ul>
                <div class="clearfloat"></div>
            </div><!-- end navigation -->

            <div class="message">
                <?php $con = database::getConnection();
                if ($result = $con->query('select database()')) {
                    $row = $result->fetch_array(MYSQLI_NUM);
                    echo '<p>*** Useing Database' .$row;
                }
                ?>
            </div><!-- end message -->	

            <div class="sidebar">
                <?php
                if (isset($_GET["content"])) :
                    switch ($_GET["content"]):
                        case "gents":
                        case "women":
                        case "sporting":
                           // include "content/catnav.php";
                            loadContent('sidebar', 'catnav');
                            
                    endswitch;
                    
                endif;
                
                ?>
            </div><!-- end sidebar -->

            <div class="content">
                <?php
                loadContent('content', 'home')
                ?>
            </div><!-- end content -->

            <div class="clearfloat"></div>

            <div id="footer">
                <p>&copy; <?php echo date('Y') ?>  Smithside Auctions</p>
            </div><!-- end footer -->

        </div><!-- end container -->
    </body>
</html>
