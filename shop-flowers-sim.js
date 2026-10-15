const cart = new Map();
const currency = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  maximumFractionDigits: 0,
});

const cartPanel = document.querySelector('[data-cart-panel]');
const cartOverlay = document.querySelector('[data-cart-overlay]');
const cartItems = document.querySelector('[data-cart-items]');
const cartCount = document.querySelector('[data-cart-count]');
const cartTotal = document.querySelector('[data-cart-total]');
const emptyMessage = document.querySelector('[data-cart-empty]');

function openCart() {
  if (cartPanel) {
    cartPanel.classList.add('is-open');
    cartPanel.setAttribute('aria-hidden', 'false');
  }
  if (cartOverlay) {
    cartOverlay.classList.add('is-open');
  }
}

function closeCart() {
  if (cartPanel) {
    cartPanel.classList.remove('is-open');
    cartPanel.setAttribute('aria-hidden', 'true');
  }
  if (cartOverlay) {
    cartOverlay.classList.remove('is-open');
  }
}

function addToCart(name, price) {
  const currentItem = cart.get(name) || { name, price: Number(price), quantity: 0 };
  currentItem.quantity += 1;
  cart.set(name, currentItem);
  renderCart();
  openCart();
}

function changeQuantity(name, amount) {
  const item = cart.get(name);
  if (!item) return;

  item.quantity += amount;

  if (item.quantity <= 0) {
    cart.delete(name);
  } else {
    cart.set(name, item);
  }

  renderCart();
}

function createCartItem(item) {
  const row = document.createElement('article');
  row.className = 'cart-item';

  const details = document.createElement('div');
  const name = document.createElement('p');
  const meta = document.createElement('p');

  name.className = 'cart-item__name';
  name.textContent = item.name;
  meta.className = 'cart-item__meta';
  meta.textContent = currency.format(item.price) + ' x ' + item.quantity;

  details.append(name, meta);

  const actions = document.createElement('div');
  const decrease = document.createElement('button');
  const quantity = document.createElement('span');
  const increase = document.createElement('button');

  actions.className = 'cart-item__actions';
  decrease.type = 'button';
  decrease.textContent = '-';
  decrease.dataset.decrease = item.name;
  decrease.setAttribute('aria-label', 'Remove one ' + item.name);

  quantity.textContent = item.quantity;

  increase.type = 'button';
  increase.textContent = '+';
  increase.dataset.increase = item.name;
  increase.setAttribute('aria-label', 'Add one ' + item.name);

  actions.append(decrease, quantity, increase);
  row.append(details, actions);

  return row;
}

function renderCart() {
  if (cartItems) cartItems.innerHTML = '';

  let totalItems = 0;
  let totalPrice = 0;

  cart.forEach((item) => {
    totalItems += item.quantity;
    totalPrice += item.price * item.quantity;
    if (cartItems) cartItems.append(createCartItem(item));
  });

  if (cartCount) cartCount.textContent = totalItems;
  if (cartTotal) cartTotal.textContent = currency.format(totalPrice);
  if (emptyMessage) emptyMessage.hidden = cart.size > 0;
}

document.querySelectorAll('[data-add-to-cart]').forEach((button) => {
  button.addEventListener('click', () => {
    addToCart(button.dataset.name, button.dataset.price);
  });
});

const openCartBtn = document.querySelector('[data-open-cart]');
if (openCartBtn) openCartBtn.addEventListener('click', openCart);

const closeCartBtn = document.querySelector('[data-close-cart]');
if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart);

if (cartOverlay) cartOverlay.addEventListener('click', closeCart);

if (cartItems) {
  cartItems.addEventListener('click', (event) => {
    const decrease = event.target.closest('[data-decrease]');
    const increase = event.target.closest('[data-increase]');

    if (decrease) changeQuantity(decrease.dataset.decrease, -1);
    if (increase) changeQuantity(increase.dataset.increase, 1);
  });
}

const checkoutBtn = document.querySelector('[data-checkout]');
if (checkoutBtn) {
  checkoutBtn.addEventListener('click', () => {
    if (cart.size === 0) {
      alert('Your cart is empty.');
      return;
    }

    alert('Thank you! Your car rental reservation request has been received.');
    cart.clear();
    renderCart();
    closeCart();
  });
}

document.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') closeCart();
});

renderCart();

