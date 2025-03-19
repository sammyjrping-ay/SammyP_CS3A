// Object to store cart items
const cart = {};

// Function to add a product to the cart
function addToCart(productName, productPrice) {
    // If the product is already in the cart, increase quantity and update total price
    if (cart[productName]) {
        cart[productName].quantity += 1;
        cart[productName].totalPrice += productPrice;
    } else {
        // If the product is not in the cart, add it with an initial quantity of 1
        cart[productName] = {
            quantity: 1,
            totalPrice: productPrice
        };
    }
    // Update the cart display after adding an item
    updateCartDisplay();
}

// Function to remove a product from the cart
function removeFromCart(productName, productPrice) {
    // Check if the product exists in the cart and has at least one quantity
    if (cart[productName] && cart[productName].quantity > 0) {
        cart[productName].quantity -= 1; // Decrease the quantity
        cart[productName].totalPrice -= productPrice; // Adjust the total price

        // If quantity reaches zero, remove the product from the cart
        if (cart[productName].quantity == 0) {
            delete cart[productName];
        }
    } else {
        // Alert the user if they try to remove an item not in the cart
        alert('The item is not in the cart!');
    }
    // Update the cart display after removing an item
    updateCartDisplay();
}

// Function to update the cart display on the webpage
function updateCartDisplay() {
    const cartList = document.getElementById('products');
    cartList.innerHTML = ''; // Clear the current cart list

    // Loop through the cart object and display each product
    for (let product in cart) {
        const listItem = document.createElement('li');
        listItem.innerText = `${product} 
                            - Quantity: ${cart[product].quantity} 
                            - Total Price: Php ${cart[product].totalPrice.toFixed(2)}`;
        cartList.appendChild(listItem); // Add the item to the cart list
    }
}