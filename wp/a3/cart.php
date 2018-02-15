<?php
	session_start();
    error_reporting(E_ALL);	
    
    include_once('tools.php');
    include_once('debug.php');
    topModule('Water And Wick');
?>
<?php
    $_SESSION['cart'];

        if (isset($_POST['add'], $_POST['id'], $_POST['qty'], $_POST['option'])) {
        $_SESSION['cart'][$_POST['id']] = $_POST['id'];
        $_SESSION['cart'][$_POST['id']]['qty'] = $_POST['qty'];
        $_SESSION['cart'][$_POST['id']]['option'] = $_POST['option'];  
    }
 
        function clearCart() {
            unset($_SESSION['cart']);
        }
        
        function totalPrice() {
            if ($_POST['option'] == 'small') {
                $unitPrice = '25.00';
                $quantity = $_POST['qty'];
                $totalPrice = $quantity * $unitPrice;
                echo '$' . number_format($totalPrice, 2);
            } else if ($_POST['option'] == 'large') {
                $unitPrice = '50.00';
                $quantity = $_POST['qty'];
                $totalPrice = $quantity * $unitPrice;
                echo '$' . number_format($totalPrice, 2);
            }
        }
?>
    <div class="container">
        <div class="row">
            <div>
                <h3 class="cart-heading">SHOPPING CART</h3>
            </div>
        </div>
        <div class="row">
            <?php print_r($_SESSION); ?>
            <div class="cart-table">
                <table class="u-full-width">
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>QTY</th>
                        <th>OPTION</th>
                        <th>PRICE</th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $_POST['id']; ?>
                        </td>
                        <td>
                            <?php echo $_POST['title']; ?>
                        </td>
                        <td>
                            <?php echo $_POST['qty']; ?>
                        </td>
                        <td>
                            <?php echo $_POST['option']; ?>
                        </td>
                        <td>
                            <?php echo totalPrice(); ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <a class="button" href="products.php" onclick="<?php echo clearCart(); ?>">CLEAR CART</a>
                <a class="button button-primary" href="checkout.php?action=checkout">CHECKOUT</a>
            </div>
        </div>
    </div>
    <?php
		endModule();
?>
