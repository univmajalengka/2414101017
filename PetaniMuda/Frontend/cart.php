<?php
session_start();

// pastikan cart selalu ada
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// ambil input POST
$id    = isset($_POST['id']) ? trim((string)$_POST['id']) : null;
$name  = $_POST['name']  ?? null;
$price = $_POST['price'] ?? null;
$image = $_POST['image'] ?? null;

// fungsi bantu: amankan key
function cart_key($id) {
  return preg_replace('/[^a-zA-Z0-9_-]/', '', (string)$id);
}

if ($id !== null) {
  $key = cart_key($id);

  // === TAMBAH PRODUK ===
  if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'][$key])) {
      $_SESSION['cart'][$key]['qty']++;
    } else {
      $_SESSION['cart'][$key] = [
        'id'    => $key,
        'name'  => $name,
        'price' => (int)$price,
        'image' => $image,
        'qty'   => 1
      ];
    }

  // === TAMBAH (+) ===
  } elseif (isset($_POST['increase'])) {
    if (isset($_SESSION['cart'][$key])) {
      $_SESSION['cart'][$key]['qty']++;
    }

  // === KURANG (−) ===
  } elseif (isset($_POST['decrease'])) {
    if (isset($_SESSION['cart'][$key])) {
      $_SESSION['cart'][$key]['qty']--;
      if ($_SESSION['cart'][$key]['qty'] <= 0) {
        unset($_SESSION['cart'][$key]);
      }
    }

  // === HAPUS PRODUK ===
  } elseif (isset($_POST['remove'])) {
    unset($_SESSION['cart'][$key]);
  }
}

echo 'OK';
