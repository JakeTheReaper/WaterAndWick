<?php
	session_start();
    $_SESSION['cart'] = array (
        'id' => $_POST['id'], 
        'title' => $_POST['title'],
        'qty' => $_POST['qty'], 
        'option' => $_POST['option']
    );
    
    
    
    include_once('tools.php');
    include_once('debug.php');
    topModule('Water And Wick');
?>
    
 <?php
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
           <form  class="u-full-width" action="checkout.php?action=checkout" method="post">
           <input type="hidden" name="id" value="<?php echo $_SESSION['cart']['id']; ?>">
           <input type="hidden" name="title" value="<?php echo $_SESSION['cart']['title']; ?>">
           <input type="hidden" name="qty" value="<?php echo $_SESSION['cart']['qty']; ?>">
           <input type="hidden" name="option" value="<?php echo $_SESSION['cart']['option']; ?>">
            
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
                            <?php echo $_SESSION['cart']['id']; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['cart']['title']; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['cart']['qty']; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['cart']['option']; ?>
                        </td>
                        <td>
                            <?php echo totalPrice(); ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <a class="button" href="products.php" onclick="<?php echo clearCart(); ?>">CLEAR CART</a>
                <input class="button-primary" name="checkout" type="submit" value="CHECKOUT">
            </div>
            </form>
        </div>
    </div>
    <?php
		endModule();
?>
