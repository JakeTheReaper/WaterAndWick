window.addEventListener('DOMContentLoaded', decrementQuantity, incrementQuantity, totalPrice, inputCheck, setPrice false);


function decrementQuantity() {
    document.getElementById("qty").value--;

    if (document.getElementById("qty").value < 1) {
        document.getElementById("qty").value = 1;
    }

}

function incrementQuantity() {
    document.getElementById("qty").value++;
}

function totalPrice() {
    var small = document.getElementById("small").selected;
    var large = document.getElementById("large").selected;
    if (small) {
        document.getElementById("candle-price").innerHTML = "$" + parseFloat(20.00).toFixed(2);
    } else if (large) {
        document.getElementById("candle-price").innerHTML = "$" + parseFloat(50.00).toFixed(2);

    }

    var smallCandlePrice = document.getElementById("small").selected;

    var largeCandlePrice = document.getElementById("large").selected;

    var quantity = document.getElementById("qty").value;

        if (smallCandlePrice && quantity.length != 0 && quantity >= 1) {
            var smallTotal = document.getElementById("qty").value * parseFloat(20.00).toFixed(2);

            document.getElementById("candle-price").innerHTML = "$" + smallTotal.toFixed(2);
        } else if (largeCandlePrice && quantity.length != 0 && quantity >= 1) {
            var largeTotal = document.getElementById("qty").value * parseFloat(50.00).toFixed(2);

            document.getElementById("candle-price").innerHTML = "$" + largeTotal.toFixed(2);
        } 
 
}

function inputCheck() {
    var noInput = document.getElementById("qty").value;

    if (noInput.value.length == 0) {
        alert("Invalid Input! Minimum Quantity is 1");
        return false;
    } else if (noInput < 1) {
        alert("Invalid Input! Minimum Quantity is 1");
        return false;
    }
    else 
        return true;
}

var select = document.querySelector('select');
var candlePrice = document.querySelector('p');

select.addEventListener('change', setPrice);

function setPrice() {
    var choice = select.value;
    
    if(choice === 'small') {
        candlePrice.textContent = "$" + parseFloat(20.00).toFixed(2);
    } else if (choice === 'large') {
        candlePrice.textContent = "$" + parseFloat(30.00).toFixed(2);
    }
}