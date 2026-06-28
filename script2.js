function displayCartUI() {
  for (const productId in cartItems) {
    const rows = document.querySelectorAll(`.product-${productId}`);
    rows.forEach((row) => {
      const totalS = row.querySelector("span");
      if (totalS) {
        totalS.textContent = `x${cartItems[productId] || 0}`;
      }

      if (cartItems[productId] > 0) {
        row.classList.add("active");
      } else {
        row.classList.remove("active");
      }
    });
  }
}

async function cartUpdateDB(productId, action) {
  await fetch("api-cart.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `product_id=${encodeURIComponent(
      productId
    )}&action=${encodeURIComponent(action)}`,
  });

  if (action === "add") {
    cartItems[productId] = (cartItems[productId] || 0) + 1;
  } else if (action === "remove" && cartItems[productId] > 0) {
    cartItems[productId]--;
  }
  displayCartUI();
}

document.addEventListener("DOMContentLoaded", function () {
  displayCartUI();

  document.querySelectorAll(".real-add").forEach((btn) => {
    btn.addEventListener("click", () => {
      const productSelect = btn.closest("[class*='product-']");
      const productId = productSelect.className.match(/product-(\d+)/)[1];
      cartUpdateDB(productId, "add");
    });
  });

  document.querySelectorAll(".real-remove").forEach((btn) => {
    btn.addEventListener("click", () => {
      const productSelect = btn.closest("[class*='product-']");
      const productId = productSelect.className.match(/product-(\d+)/)[1];
      cartUpdateDB(productId, "remove");
    });
  });
});
