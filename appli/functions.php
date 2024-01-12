<?php

function getNumberOfProductsInSession() {
    return isset($_SESSION['products']) ? count($_SESSION['products']) : 0;
}

// function validateQuantity(action, currentQuantity) {
//     if (action === 'minus' && currentQuantity <= 0) {
//         alert("Quantity cannot go below 0.");
//         return false; // Prevent form submission
//     }

//     return true; // Allow form submission
// }
?>
