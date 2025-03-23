const cart = {};
const pTotal = document.getElementById('total');

function addToCart(productName, productPrice) {
    if (cart[productName]) {
        cart[productName].quantity += 1;
        cart[productName].totalPrice += productPrice;
    } else {
        cart[productName] = {
            quantity: 1,
            totalPrice: productPrice
        };
    }
    updateCartDisplay();
}

function removeFromCart(productName, productPrice) {
    if (cart[productName] && cart[productName].quantity > 0) {
        cart[productName].quantity -= 1; 
        cart[productName].totalPrice -= productPrice;

        if (cart[productName].quantity == 0) {
            delete cart[productName];
        }
    } else {
        alert('The item is not in the cart!');
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartList = document.getElementById('cart');
    cartList.innerHTML = ''; 
    var total = 0;
    for (let product in cart) {
        const divProduct = document.createElement('div');
            divProduct.className = 'cart-product';
        const divTopCard = document.createElement('div');
            divTopCard.innerText = product;
            divTopCard.className = 'cart-top-card';
        const productImgSrc = document.getElementById(`${product}`).src;
        const productImg = document.createElement('img');
            productImg.src = productImgSrc;
        const pQuantity = document.createElement('p');
            pQuantity.innerText = 'Quantity:  ' + cart[product].quantity;
        const pTotalPrice = document.createElement('p');
            pTotalPrice.innerText = 'Total Price:  ' + cart[product].totalPrice.toFixed(2);

        divProduct.appendChild(divTopCard);
        divProduct.appendChild(productImg);
        divProduct.appendChild(pQuantity);
        divProduct.appendChild(pTotalPrice);

        cartList.appendChild(divProduct); 
        total += cart[product].totalPrice
    }
    
    pTotal.innerText = "Total Cost: Php " + total.toFixed(2);

    cartList.appendChild(pTotal);
}