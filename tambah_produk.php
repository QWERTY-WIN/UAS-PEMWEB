<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TAMBAH BARANG</title>
    <link rel="stylesheet" href="css/styles3.css">
  </head>
  <body>
      <br><br><br><br><br><br><br>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
      <center>
        <h1>Tambah Barang</h1>
      <center>
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
          <label>Kategori</label>
         <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" required="" />
        </div>
        <div>
          <label>Gambar Produk</label>
         <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
         <button type="submit">Simpan Barang</button>
        </div>
        </section>
      </form>
  </body>
</html>