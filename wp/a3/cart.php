<?php
		session_start();
		include_once('tools.php');
        include_once("/home/eh1/e54061/public_html/wp/debug.php");
		topModule('Water And Wick');
?>

    <?php
    if (isset($_POST['add'], $_POST['id'], $_POST['qty'], $_POST['option'])) {
        echo $_POST['id'];
        echo "<br>";
        echo $_POST['qty'];
        echo "<br>";
        echo $_POST['option'];
        
        
    $_SESSION['cart'][$_POST['id']]['qty'] = $_POST['qty'];
    $_SESSION['cart'][$_POST['id']]['option'] = $_POST['option'];  
        
    header("Location: cart.php");
    }
?>

        <div class="container">
            <div class="row">
                <div>
                    <h3 class="desc-heading">SHOPPING CART</h3>
                </div>
            </div>
            <div class="row">
                <div>
                    <p><strong>ID</strong></p>
                    <p><?php echo $_POST['id']; ?></p>
                    <p><strong>TITLE</strong></p>
                    <p><?php echo $_POST['pTitle']; ?></p>
                    <p><strong>QTY</strong></p>
                    <p><?php echo $_POST['qty']; ?></p>
                    <p><strong>OPTION</strong></p>
                    <p><?php echo $_POST['option']; ?></p>
                </div>
                
                <div>
                    <a class="button" href="product.php?pid=BDC001">CONTINUE SHOPPING</a>
                    <a class="button button-primary" href="">CHECKOUT</a>
                </div>
            </div>
        </div>
            <?php
		endModule();
?>
