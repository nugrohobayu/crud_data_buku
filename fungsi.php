<?php 
//koneksi database

$conn = mysqli_connect("localhost","root","","tokobuku");



function query($query){

    global $conn;


    // rows sebagai wadahnya
    $rows=[];

    //result sebagai lemari bajunya
    $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }


    return $rows;
}

function tambah($data){
    global $conn;

    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $penerbit = $data["penerbit"];
    $harga = $data["harga"];

    $cover = upload();
    if(!$cover  ){
        return false;
    }


    $query= "INSERT INTO master_buku VALUES 
                    ('','$judul','$pengarang','$penerbit','$harga','$cover')
                ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmpName = $_FILES['cover']['tmp_name'];

    if($error === 4 ){
        echo '<script>
            alert("Pilih Gambar Terlebih Dahulu");
    </script>';
    }


    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo '<script>
            alert("Bukan Gambar!");
    </script>';

    return false;

    }

    if($ukuranFile > 100000000 ){
        echo '<script>
            alert("Gambar Terlalu Besar");
    </script>';

    return false;
    }

    move_uploaded_file($tmpName, 'img/' . $namaFile);

    return $namaFile;

}


function beli ($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM master_buku WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function cari($keyword){

    $query = "SELECT * FROM master_buku WHERE judul LIKE '%$keyword' ";
    
    return query($query);
}

function register($data){

    global $conn;

    $username = strtolower(stripcslashes( $data["username"]))  ;
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");

    if( mysqli_fetch_assoc($result) ){
        echo '<script>
            alert("username sudah terdaftar");
            </script>'; 
        return false;
    }


    //konfirmasi password

    if( $password !== $password2){
        echo '<script>
            alert("konfirmasi password tidak sesuai");
            </script>'; 

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($con, "INSERT INTO users VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);
}



?>
