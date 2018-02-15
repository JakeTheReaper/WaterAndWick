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
                    <h3 class="desc-heading">LOGIN</h3>
                </div>
                <div >
                    <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=login" method="post" align="center">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" placeholder="example@example.com" required>
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="********" required >
                        <div class="row">
                            <input class="button-primary" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer login-footer" id="login-footer">&copy; Copyright 2018 Water &amp; Wick</div>
    </footer>
</body>

</html>
