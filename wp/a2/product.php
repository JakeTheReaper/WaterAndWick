<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
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
                            <h2>$30.00</h2>
                        </div>
                        <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=product" method="post">
                          <input type="hidden" name="id" value="BDC001">
                           <div class="one-half column quantity">
                            <label for="qty">Qty:</label>
                            <input type="number" name="qty" id="qty" maxlength="3" min="1" value="1" title="Qty" class="u-full-width">
                        
                        <input class="button-primary u-full-width" type="submit" value="ADD TO CART">
                    </div>
                    </form>

                    <div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
    </footer>
</body>

</html>
