<?php
    session_start();
    error_reporting(E_ALL);
    
	include_once('tools.php');
    include_once('debug.php');
	topModule('Water And Wick');
?>

    <?php
    if(isset($_POST["submitButton"])) {
        processForm();
    } else {
        displayForm(array());
    }

    function validateField($fieldName, $missingFields) {
        if(in_array($fieldName, $missingFields) || trim($_POST['address']) == "") {
            echo ' class="error"';
        } 
    }

    function setValue($fieldName) {
        if(isset($_POST[$fieldName])) {
            echo $_POST[$fieldName];
        } 
    }
    function setChecked($fieldName, $fieldValue) {
        if(isset($_POST[$fieldName]) and $_POST[$fieldName] == $fieldValue) {
            echo ' checked="checked"';
        }
    }
    
    function setSelected($fieldName, $fieldValue) {
        if(isset($_POST[$fieldName]) and $_POST[$fieldName] == $fieldValue) {
            echo ' selected="selected"';
        }
    }

    function processForm() {
        $requiredFields = array( "name", "address", "mobileNo", "creditCard", "expiry");
        $missingFields = array();
        
        foreach($requiredFields as $requiredField) {
            if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]) {
                $missingFields[] = $requiredField;
            }
        }
        
        if($missingFields) {
            displayForm($missingFields);
        } else {
            displayThanks();
        }
    }

    function displayForm($missingFields) {
        
?>
        <div class="container">
            <div class="row">
                <div>
                    <h3 class="cart-heading">CHECKOUT</h3>
                    <?php if($missingFields) { ?>
                    <p class="error">There were some problems with the form you submitted.</p>
                    <?php } else { ?>
                    <p>Please fill in all details. Fields marked with an asterisk (*) are required.</p>
                    <?php } ?>

                    <form action="checkout.php" method="post">
                        <label for="name" <?php validateField( "name", $missingFields)?>>Name *</label>
                        <input type="text" name="name" id="name" value="<?php setValue(" name ") ?>" />
                        <label for="address" <?php validateField( "address", $missingFields)?>>Address *</label>
                        <textarea name="address" id="address" rows="4" cols="50"><?php setValue("address") ?></textarea>
                        <label for="mobileNo" <?php validateField( "mobileNo", $missingFields)?>>Mobile Phone No. *</label>
                        <input type="text" name="mobileNo" id="mobileNo" value="<?php setValue(" mobileNo ") ?>" />
                        <div>
                            <input type="submit" name="submitButton" id="submitButton" value="Send Details" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
        function displayThanks() {
    ?>
            <h1>Thank You</h1>
            <?php } ?>
            <?php
		endModule();
?>
