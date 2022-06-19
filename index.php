<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD by Titus Erwin Milianto</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <section class="base">
    <h1 style="text-align: center; font-size: 200%"><strong>Data Barang Komputer</strong></h1>
    </section>
    <h3 style="text-align: center;">" Toko Jaya Abadi Com. "</h3>
    <br><br><br>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      include "koneksi.php";
      
      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
      
      // Jumlah data per halaman
      $limit = 10;

      $limitStart = ($page - 1) * $limit;
                
      $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk LIMIT ".$limitStart.",".$limit);
      
      $no = $limitStart + 1;
      
      while($row = mysqli_fetch_array($SqlQuery)){ 
      ?>
       <tr>
          <td><?php echo $no; ?></center></td>
          <td><img src="image/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?></td>
          <td>Rp.<?php echo $row['harga']; ?></td>
          <td>
            <a href="edit_produk.php?id=<?php echo $row['id']; ?>" style="background-color: green; border-left: solid 4px white; border-right: solid 4px white; color: #fff; padding: 10px; text-decoration: none; font-size: 12px; background-color: yellow; color: black;">Edit</a><a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"  style="background-color: red; background-color: green; border-left: solid 4px white; border-right: solid 4px white; color: #fff; padding: 10px; text-decoration: none; font-size: 12px;">Hapus</a></center>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
    <div>
      <ul class="pagination" align="left">
        <?php
        // Jika page = 1, maka LinkPrev disable
        if($page == 1){ 
        ?>        
          <!-- link Previous Page disable --> 
          <li class="disabled"><a href="#">Previous</a></li>
        <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;
        ?>
          <!-- link Previous Page --> 
          <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
        <?php
          }
        ?>

        <?php
        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk");        
        
        //Hitung semua jumlah data yang berada pada tabel Sisawa
        $JumlahData = mysqli_num_rows($SqlQuery);
        
        // Hitung jumlah halaman yang tersedia
        $jumlahPage = ceil($JumlahData / $limit); 
        
        // Jumlah link number 
        $jumlahNumber = 1; 

        // Untuk awal link number
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        
        // Untuk akhir link number
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
        
        for($i = $startNumber; $i <= $endNumber; $i++){
          $linkActive = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
          }
        ?>
        
        <!-- link Next Page -->
        <?php       
        if($page == $jumlahPage){ 
        ?>
          <li class="disabled"><a href="#">Next</a></li>
        <?php
        }
        else{
          $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
        ?>
          <li><a href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
    <center><a href="tambah_produk.php" style="background-color: green; border-left: solid 4px white; border-right: solid 4px white; color: #fff; padding: 10px; text-decoration: none; font-size: 12px; border: solid 1px #DDEEEE;">+ &nbsp;Tambah Barang</a>
    <br>
    <br><br><br><br><br><br><br><br>
    <h4><center>By Titus Erwin Milianto (2022)</h4>
  </body>
</html>