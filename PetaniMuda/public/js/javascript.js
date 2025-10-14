function loadCart() {
  fetch('load_cart.php')
    .then(res => res.text())
    .then(data => {
      document.getElementById('cart-items').innerHTML = data;
      updateTotal();
    });
}

function updateTotal() {
  let total = 0;
  document.querySelectorAll('.cart-item-price').forEach(el => {
    total += parseInt(el.dataset.price) * parseInt(el.dataset.qty);
  });
  document.getElementById('cart-total').textContent = 'Rp ' + total.toLocaleString('id-ID');
}

function removeFromCart(id) {
  fetch('cart.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'remove=1&id=' + id
  }).then(() => loadCart());
}

// Tambah jumlah produk
function increaseQty(id) {
  fetch('cart.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'increase=1&id=' + id
  }).then(() => loadCart());
}

// Kurangi jumlah produk
function decreaseQty(id) {
  fetch('cart.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'decrease=1&id=' + id
  }).then(() => loadCart());
}

// === SEMUA EVENT DIKONSOLIDASIKAN DALAM SATU DOMContentLoaded ===
document.addEventListener('DOMContentLoaded', () => {
  // Load awal keranjang
  loadCart();

  // Delegasi tombol tambah/kurang
  document.getElementById('cart-items').addEventListener('click', e => {
    if (e.target.closest('.increase-btn')) {
      const id = e.target.closest('.increase-btn').dataset.id;
      increaseQty(id);
    }
    if (e.target.closest('.decrease-btn')) {
      const id = e.target.closest('.decrease-btn').dataset.id;
      decreaseQty(id);
    }
    if (e.target.closest('.remove-btn')) {
      const id = e.target.closest('.remove-btn').dataset.id;
      removeFromCart(id);
    }
  });

  // Tambah produk ke keranjang
  document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      const name = btn.dataset.name;
      const price = btn.dataset.price;
      const image = btn.dataset.image;

      fetch('cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `add=1&id=${id}&name=${encodeURIComponent(name)}&price=${price}&image=${encodeURIComponent(image)}`
      })
      .then(res => res.text())
      .then(() => {
        // Reload keranjang dari server
        loadCart();

        // Buka offcanvas keranjang
        const offcanvasEl = document.getElementById('cartOffcanvas');
        const bsOffcanvas = new bootstrap.Offcanvas(offcanvasEl);
        bsOffcanvas.show();

        // Notifikasi sukses
        Swal.fire({
          icon: 'success',
          title: `${name} ditambahkan ke keranjang!`,
          showConfirmButton: false,
          timer: 1200
        });
      });
    });
  });
});
