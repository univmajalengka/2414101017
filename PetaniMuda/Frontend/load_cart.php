<?php
session_start();

if (empty($_SESSION['cart'])) {
  echo "<p class='text-muted text-center'>Keranjang masih kosong.</p>";
  exit;
}

foreach ($_SESSION['cart'] as $item) {
  echo "
  <div class='d-flex justify-content-between align-items-center border-bottom py-2'>
    <div class='d-flex align-items-center'>
      <img src='../admin/uploads/products/{$item['image']}' width='50' height='50' class='rounded me-2' alt='{$item['name']}'>
      <div>
        <strong>{$item['name']}</strong><br>
        <small>Rp " . number_format($item['price'], 0, ',', '.') . "</small>
      </div>
    </div>
    <div class='text-end'>
      <div class='d-flex align-items-center'>
        <button class='btn btn-sm btn-outline-secondary decrease-btn' data-id='{$item['id']}'>
          <i class='bi bi-dash'></i>
        </button>
        <span class='mx-2 cart-item-price' data-price='{$item['price']}' data-qty='{$item['qty']}'>
          {$item['qty']}
        </span>
        <button class='btn btn-sm btn-outline-secondary increase-btn' data-id='{$item['id']}'>
          <i class='bi bi-plus'></i>
        </button>
        <button class='btn btn-sm btn-outline-danger ms-2' onclick='removeFromCart({$item['id']})'>
          <i class='bi bi-trash'></i>
        </button>
      </div>
    </div>
  </div>";
}
?>
