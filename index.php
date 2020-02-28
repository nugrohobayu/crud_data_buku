<?php 

require 'fungsi.php';



$books = query("SELECT * FROM master_buku ");

// jika tombol ditekan

if(isset($_POST["cari"]) ){
    $books = cari ($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
<body  >
    <div class="container">
     <h1 class="mt-4">Halaman Utama</h1>

        <a href="tambah.php" ><button  >Tambah Daftar Buku</button></a>

        <div class="row">
            <div class="col-md-4">
            
                <form action="" method="post " >

                         <input type="text" name="keyword" class="form-check" size="20" autofocus >
                        <button class="btn alert-primary" name="cari" type="submit" >Search</button>

                </form>            
            </div>
        </div>



                <table cellspacing="0"  >

                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Harga</th>
                            <th>Cover</th>
                            <th >Pilihan</th>
                        </tr>

                        <?php $i=1; ?>
                        <?php foreach($books as $book) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $book["judul"]; ?></td>
                            <td><?= $book["pengarang"]; ?></td>
                            <td><?= $book["penerbit"]; ?></td>
                            <td>Rp. <?= $book["harga"]; ?> ,-</td>
                            <td><img src="<?= $book["cover"]; ?>" width="50"></td>
                            <td>
                                <a  href="beli.php?id=<?= $book["id"]?>"><button class="btn alert-primary" onclick="return confirm('yakin membeli?');">Beli</button></a> || 
                                <a  href="pinjam.php?id = <?= $book["id"]?>"><button class="btn alert-primary" onclick="return confirm('yakin meminjam?');">Pinjam</button></a>

                            </td>
                        </tr>

                        <?php $i++; ?>
                        <?php endforeach ; ?>

                </table>
        
    </div>
       
</body>
</html>