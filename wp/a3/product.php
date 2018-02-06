<?php
		session_start();
		include_once('tools.php');	
		topModule('Water And Wick');

		define(PID, $_GET['pid']);
		$valid_products = ['BDC001'];
		if (!isset($_GET['pid']) || !in_array(PID, $valid_products, true)) {
				header('Location: product.php');
		}

		$productTree = array (
				'BDC001' => array (
						'pTitle' => 'BOHEMIAN DREAM',
						'iSrc' => '../img/large_wax_candle.jpg',
						'iAlt' => 'Bohemian Dream Candle',
						'pDesc' => '<p>A very groovy scent, Bohemian Dream is inspired by Nag Champa incense. Full-bodied with enticing earthy notes, its sweet warmth is renowned, a fragrance unmistakable and ever so popular.</p><p><strong>Top Notes:</strong> Neroli and fir needle</p>
						                        <p><strong>Middle Notes:</strong> Coconut husk, lily of the valley and rosewood</p>
																														<p><strong>Base Notes:</strong> Musk, woody and rose petals</p>',
						'price' => array (
								'p1' => '25.00',
								'p2' => '50.00'
						),
						'options' => array (
								'BD1' => 'small',
								'BD2' => 'large'
						)
				)
		);
						 
?>
<div class="container">
		<div class="row">
				<div>
				<h3 class="desc-heading"><?php echo $productTree[PID]['pTitle']; ?></h3>
				</div>
		</div>
		<div class="row">
        <div class="one-half column">
				<img src="<?php echo $productTree[PID]['iSrc']; ?>" alt="<?php echo $productTree[PID]['iAlt']; ?>" class="u-img-responsive">
        </div>
    <div class="one-half column">
        <aside>
						<?php echo $productTree[PID]['pDesc']; ?>
				</aside>

    <div class="one-half column price">
		<h2 id="candle-price">$ <?php echo $productTree[PID]['price']['p1']; ?></h2>
    </div>


    <form action="cart.php?action=add&PID=" method="post" onsubmit="return inputCheck();">
		<input type="hidden" name="id" value="<?php echo $pID ?>">

						<label for="size">Size:</label>
            <select name="option">
                <option id="small" value="small">Small</option>
                <option id="large" value="large" >Large</option>
            </select>

            <label for="qty">Qty:</label>
                <button class="button button-primary qty-subtract" onclick="decrementQuantity()" type="button" aria-label="Subtract 1" title="Subtract 1"><i class="fa fa-minus-square fa-1" aria-hidden="true"></i></button>

            <input class="qty-input" type="number" name="qty" id="qty" min="1" value="1" title="Qty">
                <button class="button button-primary qty-add" onclick="incrementQuantity('<?php echo $price; ?>')" type="button" aria-label="Add 1" title="Add 1" aria-controls="qty"><i class="fa fa-plus-square fa-6" aria-hidden="true"></i></button>
                        
                <button id="updateTotal" type="button" onclick="totalPrice()">UPDATE TOTAL</button>
                <input class="button-primary" type="submit" value="ADD TO CART" >
    </form>
    </div>
		</div>
</div>
<?php
		endModule();
?>

