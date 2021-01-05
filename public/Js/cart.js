function updateCartTotal() {
    let cartRows = document.querySelectorAll(".cart-row");
    let total = 0;
    Array.from(cartRows).forEach((cartRow) => {
      let priceElement = cartRow.querySelector(".cart-price");
      let quantityElement = cartRow.querySelector(".cart-quantity-input");
      let price = parseFloat(priceElement.innerHTML.replace("$", ""));
      let quantity = quantityElement.value;
      total += price * quantity;
      cartRow
        .querySelector(".cart-quantity-input")
        .addEventListener("change", qualityChange);
    });
  
    total = Math.round(total * 100) / 100;
    document.querySelector(".cart-total-price").innerHTML = "$ " + total;
  }
  function qualityChange(e) {
    let input = e.target;
    if (isNaN(input.value) || input.value <= -1) {
      input.value = 0;
      
    }
    updateCartTotal();
  }
  
  // window.addEventListener("change", () => {
  //   updateCartTotal();
  // });
  window.addEventListener("load", () => {
    updateCartTotal();
  });
  console.log("It's Worked!");