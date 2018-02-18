<?php
    session_start();
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array (
        'id' => $_POST['id'], 
        'title' => $_POST['title'],
        'qty' => $_POST['qty'], 
        'option' => $_POST['option']
        );
    
    }
        $_SESSION['details'] = array (
        'name' => $_POST['name'], 
        'address' => $_POST['address'],
        'mobileNo' => $_POST['mobileNo'], 
        'creditCard' => $_POST['creditCard'],
        'expiry' => $_POST['expiry']       
        );
    
    
	include_once('tools.php');
    include_once('debug.php');
	topModule('Water And Wick');
?>
    <?php
    
    function unitPrice() {
        if ($_SESSION['cart']['option'] == 'small') {
            $singlePrice = '25.00';
            echo '$' . number_format($singlePrice, 2);
        } else if ($_SESSION['cart']['option'] == 'large') {
            $singlePrice = '50.00';
            echo '$' . number_format($singlePrice, 2);
        }
    }

    function totalPrice() {
        if ($_SESSION['cart']['option'] == 'small') {
            $unitPrice = '25.00';
            $quantity = $_SESSION['cart']['qty'];
            $totalPrice = $quantity * $unitPrice;
            echo '$' . number_format($totalPrice, 2);
        } else if ($_SESSION['cart']['option'] == 'large') {
            $unitPrice = '50.00';
            $quantity = $_SESSION['cart']['qty'];
            $totalPrice = $quantity * $unitPrice;
            echo '$' . number_format($totalPrice, 2);
        }
    }
?>
        <page size="A4">
        <div class="container">
            <div class="row">
                <div>
                    <h3 class="receipt-heading">RECEIPT</h3>
                </div>
            </div>
            <div class="row">
                <div class="cart-table">
                    
                        <table class="u-full-width">
                            <tr>
                                <th>PURCHASE DATE</th>
                                <td>
                                    <?php echo date("F j, Y"); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NAME</th>
                                <td>
                                    <?php echo $_SESSION['details']['name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>ADDRESS</th>
                                <td>
                                    <?php echo $_SESSION['details']['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>MOBILE</th>
                                <td>
                                    <?php echo $_SESSION['details']['mobileNo']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <td>
                                    <?php echo $_SESSION['cart']['id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>OPTION</th>
                                <td>
                                    <?php echo $_SESSION['cart']['option']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>QUANTITY</th>
                                <td>
                                    <?php echo $_SESSION['cart']['qty']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>UNIT PRICE</th>
                                <td>
                                    <?php echo unitPrice(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>TOTAL PRICE</th>
                                <td>
                                    <?php echo totalPrice(); ?>
                                </td>
                            </tr>
                        </table>
                    
                </div>
            </div>
            <div class="row">
                <div>
                    <h3 class="receipt-heading">THANKYOU FOR YOUR PURCHASE</h3>
                </div>
                <div>
                    <img class="receipt-logo" src="../img/main-logo.png" alt="Water & Wick logo">
                </div>
            </div>
        </div>
        </page>
        
<?php
    $unit = unitPrice();
    $total = totalPrice();
    $orders = array (
        date("F j, Y"),
        $_SESSION['details']['name'],
        $_SESSION['details']['address'],
        $_SESSION['details']['mobileNo'],
        $_SESSION['cart']['id'],
        $_SESSION['cart']['option'],
        $_SESSION['cart']['qty'],
        $unit,
        $total
    );

    $file = fopen("orders.csv", "w");

    foreach($orders as $line) {
        fputcsv($file,explode(',',$line));
    }

    fclose($file);
?>
       <a href="orders.csv">ORDERS SPREADSHEET</a>
        <?php
		endModule();
?>
