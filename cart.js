document.addEventListener('DOMContentLoaded', function () {
  const botonCarrito = document.getElementById('cart-btn');
  const panelCarrito = document.getElementById('cart');
  const botonCerrar = document.getElementById('close-cart');
  const botonPagar = document.getElementById('checkout-btn');
  const contadorCarrito = document.getElementById('cart-count');
  const contenedorItemsCarrito = document.getElementById('cart-items');
  const totalCarritoSpan = document.getElementById('cart-total');

  let carrito = JSON.parse(localStorage.getItem('bigotitos_carrito') || '{}');

  function guardarCarrito() {
    localStorage.setItem('bigotitos_carrito', JSON.stringify(carrito));
  }

  function actualizarContador() {
    const contador = Object.values(carrito).reduce((s, i) => s + i.qty, 0);
    contadorCarrito.textContent = contador;
  }

  function renderizarCarrito() {
    contenedorItemsCarrito.innerHTML = '';
    const ids = Object.keys(carrito);
    if (ids.length === 0) {
      contenedorItemsCarrito.innerHTML = '<p>Tu carrito está vacío.</p>';
      totalCarritoSpan.textContent = '0.00';
      actualizarContador();
      guardarCarrito();
      return;
    }
    let total = 0;
    ids.forEach(id => {
      const item = carrito[id];
      total += item.price * item.qty;
      const div = document.createElement('div');
      div.className = 'cart-item';
      div.innerHTML = `
        <img src="${item.img}" alt="${item.name}">
        <div class="meta">
          <div class="nombre">${item.name}</div>
          <div class="cantidad">Cantidad: ${item.qty} — $${(item.price*item.qty).toFixed(2)}</div>
        </div>
        <div class="controles">
          <button class="aumentar" data-id="${id}">+</button>
          <button class="disminuir" data-id="${id}">-</button>
          <button class="eliminar" data-id="${id}">x</button>
        </div>
      `;
      contenedorItemsCarrito.appendChild(div);
    });
    totalCarritoSpan.textContent = total.toFixed(2);
    actualizarContador();
    guardarCarrito();
  }

  contenedorItemsCarrito.addEventListener('click', function(e) {
    const id = e.target.dataset && e.target.dataset.id;
    if (!id) return;
    if (e.target.classList.contains('aumentar')) {
      carrito[id].qty++;
      renderizarCarrito();
    } else if (e.target.classList.contains('disminuir')) {
      carrito[id].qty--;
      if (carrito[id].qty <= 0) delete carrito[id];
      renderizarCarrito();
    } else if (e.target.classList.contains('eliminar')) {
      delete carrito[id];
      renderizarCarrito();
    }
  });

  document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
      const product = this.closest('.product');
      const id = product.dataset.id;
      const name = product.dataset.name;
      const price = parseFloat(product.dataset.price);
      const imagen = product.querySelector('img') ? product.querySelector('img').src : '';
      if (!carrito[id]) carrito[id] = { id, name, price, qty: 0, img: imagen };
      carrito[id].qty++;
      renderizarCarrito();
      abrirCarrito();
    });
  });

  function abrirCarrito() {
    panelCarrito.style.display = 'block';
    panelCarrito.setAttribute('aria-hidden', 'false');
  }

  function cerrarCarrito() {
    panelCarrito.style.display = 'none';
    panelCarrito.setAttribute('aria-hidden', 'true');
  }

  botonCarrito.addEventListener('click', function() {
    if (panelCarrito.style.display === 'block') cerrarCarrito(); else abrirCarrito();
  });

  botonCerrar.addEventListener('click', function() { cerrarCarrito(); });

  botonPagar.addEventListener('click', function() {
    const total = Object.values(carrito).reduce((s,i)=> s + i.price * i.qty, 0);
    if (total === 0) {
      alert('Tu carrito está vacío. Añade algún producto.');
      return;
    }
    if (confirm(`Total a pagar: $${total.toFixed(2)}\n\n¿Proceder al pago?`)) {
      carrito = {};
      renderizarCarrito();
      alert('¡Gracias por tu compra! (simulado)');
      cerrarCarrito();
    }
  });

  renderizarCarrito();
});
