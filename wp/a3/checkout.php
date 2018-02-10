<?php
    error_reporting(E_ALL);
    session_start();
	include_once('tools.php');
    include_once('debug.php');
	topModule('Water And Wick');
?>
    <div class="container">
        <div class="row">
            <div>
                <h3 class="cart-heading">CHECKOUT</h3>
            </div>
        </div>
        <div class="row">
            <div>
                
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