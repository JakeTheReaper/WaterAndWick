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
// define variables and set to empty values
$nameErr = $addressErr = $mobileNoErr = $creditCardErr = $expiryErr = "";
$name = $address = $mobileNo = $creditCard = $expiry = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['name'])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST['name']);
    if(!preg_match("/^[a-zA-Z .,'-]*$/",$name)) {
        $nameErr = "Invalid Characters";
    }
  }
  
  if (empty($_POST["address"]) && trim($_POST['address']) == "") {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["mobileNo"])) {
    $mobileNoErr = "Mobile No. is required";
  } else {
    $mobileNo = test_input($_POST["mobileNo"]);
  }

  if (empty($_POST["creditCard"])) {
    $creditCardErr = "Credit Card No. is required";
  } else {
    $creditCard = test_input($_POST["creditCard"]);
  }

  if (empty($_POST["expiry"])) {
    $expiryErr = "Expiry is required";
  } else {
    $expiry = test_input($_POST["expiry"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
        <div class="container">
            <div class="row">
                <div>
                    <h3 class="cart-heading">CHECKOUT</h3>
                    
                    <p><span class="error">* required field.</span></p>
                    <form method="post" action="orders.php">
                        <label for="name">Name: <span class="error">* <?php echo $nameErr;?></span></label>
                        <input type="text" name="name" placeholder="Enter Name">
                        
                        <label for="address">Address: <span class="error">* <?php echo $addressErr;?></span></label>
                        <textarea name="address" rows="5" cols="40" placeholder="Enter Address"></textarea>
                        
                        <label for="mobileNo">Mobile No: <span class="error">* <?php echo $mobileNoErr;?></span></label>
                        <input type="text" name="mobileNo" value="+61">
                        
                        <label for="creditCard">Credit Card No: <span class="error">* <?php echo $creditCardErr;?></span></label>
                        <input type="text" id="visa" name="creditCard"  placeholder="Enter Credit Card No."><img oninput="visaInput()" class="u-img-responsive visa-logo" src="../img/visa-logo.png" al="Visa logo">
                        
                        <label for="expiry">Expiry Date: <span class="error">* <?php echo $expiryErr;?></span></label>
                        <input type="month" name="expiry">
                        
                        <br><input type="submit" name="submit" value="Submit">
                    </form>

                </div>
               
            </div>
        </div>

        <?php
	endModule();
?>
