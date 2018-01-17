<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
    <script src="https://use.fontawesome.com/5f01efa180.js"></script>
    <script type="text/javascript" src="../a2/app.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Water and Wick</title>
</head>

<body>
    <header>
        <section class="section section-two">
            <div class="container">
                <div class="row">
                    <div class="one-third column">
                        <a href="index.php">
                            <h5>HOME</h5>
                        </a>
                    </div>
                    <div class="one-third column">
                        <a href="products.php">
                            <h5>PRODUCTS</h5>
                        </a>
                    </div>

                    <div class="one-third column">
                        <a href="login.php">
                            <h5>LOGIN</h5>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div>
                    <h3 class="desc-heading">BOHEMIAN DREAM</h3>
                </div>
            </div>
            <div class="row">
                <div class="one-half column">
                    <img src="../img/large_wax_candle.jpg" alt="" class="u-img-responsive">
                </div>
                <div class="one-half column">
                    <aside>
                        <p>A very groovy scent, Bohemian Dream is inspired by Nag Champa incense. Full-bodied with enticing earthy notes, its sweet warmth is renowned, a fragrance unmistakable and ever so popular.</p>

                        <p><strong>Top Notes:</strong> Neroli and fir needle</p>
                        <p><strong>Middle Notes:</strong> Coconut husk, lily of the valley and rosewood</p>
                        <p><strong>Base Notes:</strong> Musk, woody and rose petals</p>
                    </aside>

                    <div class="one-half column price">
                        <h2 id="candle-price">$20.00</h2>
                    </div>

                    <div class="quantity">




                    </div>


                    <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=product" method="post">
                        <input type="hidden" name="id" value="BDC001">


                        <div class="quantity">

                            <label for="size">Size:</label>
                            <select name="option">
                                <option id="small" value="small">Small</option>
                                <option id="large" value="large" >Large</option>
                            </select>

                            <label for="qty">Qty:</label>
                            <button class="button button-primary qty-subtract" onclick="decrementQuantity()" type="button" aria-label="Subtract 1" title="Subtract 1"><i class="fa fa-minus-square fa-1" aria-hidden="true"></i></button>

                            <input class="qty-input" type="number" name="qty" id="qty" min="1" value="1" title="Qty">

                            <button class="button button-primary qty-add" onclick="incrementQuantity()" type="button" aria-label="Add 1" title="Add 1" aria-controls="qty"><i class="fa fa-plus-square fa-6" aria-hidden="true"></i></button>
                        </div>

                        <button id="updateTotal" type="button" onclick="totalPrice()">UPDATE TOTAL</button>
                        <input class="button-primary" type="submit" value="ADD TO CART" onclick="return inputCheck();">

                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
    </footer>
</body>

</html>
