// Cart Array 
const cart = {};

// Paragraph element for total cost 
const pTotal = document.getElementById('total');

// Function to add product object in cart 
function addToCart(productName, productPrice) {
    if (cart[productName]) {  // Check if product exist
        cart[productName].quantity += 1;
        cart[productName].totalPrice += productPrice;
    } else {
        cart[productName] = {  // Add product to cart
            quantity: 1,
            totalPrice: productPrice,
            price: productPrice
        };
    }
    updateCartDisplay();
}

// Function to remove or reduce product object in cart 
function removeFromCart(productName, productPrice) {
    if (cart[productName] && cart[productName].quantity > 0) {  
        cart[productName].quantity -= 1;   // Decrease product quantity and total price
        cart[productName].totalPrice -= productPrice;

        if (cart[productName].quantity == 0) {  // Remove the product from the cart
            delete cart[productName];
        }
    } else {
        alert('The item is not in the cart!');  // Fallback code 
    }
    updateCartDisplay();
}

// Function to render or update the cart list 
function updateCartDisplay() {
    // Retrieve the cart list 
    const cartList = document.getElementById('cart');
    cartList.innerHTML = ''; 

    var total = 0;  // Variable for overall total cost

    for (let product in cart) {
        
        // Create elements for each products 
        const divProduct = document.createElement('div');
            divProduct.className = 'cart-product';
        const divTopCard = document.createElement('div');
            divTopCard.innerText = product;
            divTopCard.className = 'cart-top-card';
        const productImgSrc = document.getElementById(`${product}`).src;
        const productImg = document.createElement('img');
            productImg.src = productImgSrc;
        const pPrice = document.createElement('p');
            pPrice.innerText = 'Price: Php ' + cart[product].price.toFixed(2);
            pPrice.className = 'cart-price';
        const pQuantity = document.createElement('p');
            pQuantity.innerHTML = `Quantity: <button class="minus-btn" onclick="removeFromCart('${product}', ${cart[product].price})">-</button>${cart[product].quantity}<button class="add-btn" onclick="addToCart('${product}', ${cart[product].price})">+</button>`;
        const pTotalPrice = document.createElement('p');
            pTotalPrice.innerText = 'Total Price:  ' + cart[product].totalPrice.toFixed(2);

        // Append elements to the main div 
        divProduct.appendChild(divTopCard);
        divProduct.appendChild(productImg);
        divProduct.appendChild(pQuantity);
        divProduct.appendChild(pPrice);
        divProduct.appendChild(pTotalPrice);

        // Append the main div to cart list
        cartList.appendChild(divProduct); 
        total += cart[product].totalPrice
    }
    
    // Append paragraph element for total cost
    pTotal.innerText = "Total Cost: Php " + total.toFixed(2);
    cartList.appendChild(pTotal);
}