<?php 

require 'fungsi.php';

if( isset ($_POST["submit"])){


if(tambah($_POST) > 0 ){

    echo '<script>
            alert("Berhasil");
            document.location.href = "index.php";
    </script>';

}else{
    echo '<script>
            alert("Gagal");
            document.location.href = "index.php";
    </script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<body>
    <h1>Halaman Tambah Daftar Buku</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <table cellpadding="5" class="form-check" >
            <tr>
                <td><label for="judul">Masukkan Judul Buku : </label></td>
                <td><input type="text" name="judul" id="judul" class="form-control" > </td>
            </tr>

            <tr>
                <td><label for="pengarang">Masukkan Nama Pengarang : </label></td>
                <td><input type="text" name="pengarang" id="pengarang" class="form-control" > </td>
            </tr>

            <tr>
                <td><label for="penerbit">Masukkan Nama Penerbit : </label></td>
                <td><input type="text" name="penerbit" id="penerbit" class="form-control" > </td>
            </tr>

            <tr>
                <td><label for="harga">Masukkan Harga Buku : </label></td>
                <td><input type="text" name="harga" id="harga" class="form-control" > </td>
            </tr>
            <tr>
                <td><input type="file" name="cover" id="cover">
                </td>
            </tr>
        </table>

        <button type="submit" name="submit" class="btn btn-primary" style="margin-left:25px;">Submit</button>


    </form>
    
</body>
</html>