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
    
	include_once('tools.php');
    include_once('debug.php');
	topModule('Water And Wick');
?>
    
<?php
// define variables and set to empty values
$nameErr = $addressErr = $mobileNoErr = $creditCardErr = $expiryErr = "";
$name = $address = $mobileNo = $creditCard = $expiry = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["address"]) && trim($_POST['address']) == "") {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
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
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                        <label for="name">Name: <span class="error">* <?php echo $nameErr;?></span></label>
                        <input type="text" name="name">
                        
                        <label for="address">Address:<span class="error">* <?php echo $addressErr;?></span></label>
                        <textarea name="address" rows="5" cols="40"></textarea>
                        
                        <br><br> Website: <input type="text" name="website">
                        <span class="error"><?php echo $websiteErr;?></span>
                        <br><br> <span>Comment: </span><textarea name="comment" rows="5" cols="40"></textarea>
                        <br><br> Gender:
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <span class="error">* <?php echo $genderErr;?></span>
                        <br><br>
                        <input type="submit" name="submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
        <?php
	endModule();
?>
