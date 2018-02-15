<?php
		function topModule($pageTitle) {
				$output = <<<"MAINHEADER"

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
    <script src="https://use.fontawesome.com/5f01efa180.js"></script>
    <script type="text/javascript" src="../a3/app.js"></script>
		<link rel="stylesheet" type="text/css" href="../a3/style.css" />
    <title>$pageTitle</title>
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
MAINHEADER;
		echo $output;
}

		function endModule() {
				$footer = <<<"MAINFOOTER"
    </main>

   <footer>
        <div class="footer">&copy; Copyright 2018 Water &amp; Wick</div>
    </footer>
</body>

</html>
MAINFOOTER;
		echo $footer;
}
?>
        

