const orderBtns = document.querySelectorAll(".order-btn");
const cart = document.querySelector("header .cart span");

const dataFromLocalstorage = localStorage.getItem("cartItems")
  ? JSON.parse(localStorage.getItem("cartItems"))
  : [];

console.log(dataFromLocalstorage);

cart.textContent = dataFromLocalstorage.length;

orderBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    const id = e.target.attributes[0].nodeValue;
    const name = e.target.attributes[1].nodeValue;
    const price = e.target.attributes[2].nodeValue;
    const image = e.target.attributes[3].nodeValue;
    console.log(id, name, price, image);

    const data = {
      id,
      name,
      price,
      image,
    };

    addToCart(data);
  });
});

function addToCart(data) {
  if (dataFromLocalstorage.find((d) => d.id === data.id)) {
    alert("Product already exist in cart");
    return;
  }

  dataFromLocalstorage.push(data);
  localStorage.setItem("cartItems", JSON.stringify(dataFromLocalstorage));
  cart.textContent = dataFromLocalstorage.length;
}

function removeFromCart(id) {
  const filtered = dataFromLocalstorage.filter((d) => d !== id);
  localStorage.setItem("cartItems", JSON.stringify(filtered));
}
