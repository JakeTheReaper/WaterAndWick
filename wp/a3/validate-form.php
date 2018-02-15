<?php
    if(isset($_POST["submitButton"])) {
        processForm();
    } else {
        displayForm(array());
    }

    function validateField($fieldName, $missingFields) {
        if(in_array($fieldName, $missingFields)) {
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
    <h3 class="cart-heading">CHECKOUT</h3>
    <?php if($missingFields) { ?>
    <p class="error">There were some problems with the form you submitted.</p>
    <?php } else { ?>
    <p>Please fill in all details. Fields marked with an asterisk (*) are required.</p>
    <?php } ?>

<?php 
    
    function displayThanks() {
?>
    <h1>Thank You</h1>
    <?php } ?>