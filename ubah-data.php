<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
    <style>
        /* CSS Sederhana */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color:rgb(211, 176, 193);
            color: #333;
        }
        
        h1, h2 {
            color: #2c3e50;
            text-align: center;
        }
        
        h1 {
            margin-bottom: 5px;
        }
        
        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #7f8c8d;
        }
        
        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        td {
            padding: 10px;
            vertical-align: top;
        }
        
        td:first-child {
            width: 30%;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            padding: 8px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        
        button[type="submit"] {
            background-color: #3498db;
            color: white;
        }
        
        button[type="submit"]:hover {
            background-color: #2980b9;
        }
        
        button[type="button"] {
            background-color: #e74c3c;
            color: white;
        }
        
        button[type="button"]:hover {
            background-color: #c0392b;
        }
    </style>
</head> 
<body>

<?php
require("koneksi.php");

// Validasi idMhs dari URL
if (!isset($_GET["idMhs"])) {
    die("ID mahasiswa tidak ditemukan di URL.");
}

$idMhs = intval($_GET["idMhs"]); // pakai intval buat keamanan

// Ambil data mahasiswa
$query = "SELECT * FROM tbl_mahasiswa WHERE idMhs = $idMhs";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data mahasiswa tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);
?>

<!-- Hanya satu bagian judul yang ditampilkan -->
<h1>Ubah Data Mahasiswa</h1>
<h2>Universitas Hamzanwadi</h2>
<p style="text-align: center;">Silahkan ubah data mahasiswa</p>

<form method="POST">
    <table>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']); ?>"></td>
        </tr>
        <tr>
            <td><label for="npm">NPM</label></td>
            <td><input type="text" name="npm" id="npm" value="<?= htmlspecialchars($data['npm']); ?>"></td>
        </tr>
        <tr>
            <td><label for="prodi">Program Studi</label></td>
            <td>
                <select name="prodi" id="prodi">
                    <?php
                    $prodiList = ["Pendidikan Informatika", "Pendidikan Matematika", "Pendidikan Biologi", "Pendidikan Fisika", "Pendidikan IPA", "Statistika"];
                    foreach ($prodiList as $p) {
                        $selected = ($data['prodi'] == $p) ? "selected" : "";
                        echo "<option value='$p' $selected>$p</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" id="email" value="<?= htmlspecialchars($data['email']); ?>"></td>
        </tr>
        <tr>
            <td><label for="alamat">Alamat</label></td>
            <td><input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($data['alamat']); ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">Ubah Data</button>
                <button type="button" onclick="window.location.href='tampil-data.php'">Batal</button>
            </td>
        </tr>
    </table>
</form>

<?php
// Proses update data
if (isset($_POST["submit"])) {
    $nama   = $_POST["nama"];
    $npm    = $_POST["npm"];
    $prodi  = $_POST["prodi"];
    $email  = $_POST["email"];
    $alamat = $_POST["alamat"];

    $queryUpdate = "UPDATE tbl_mahasiswa SET
        nama = '$nama',
        npm = '$npm',
        prodi = '$prodi',
        email = '$email',
        alamat = '$alamat'
        WHERE idMhs = $idMhs";

    $resultUpdate = mysqli_query($koneksi, $queryUpdate);

    if ($resultUpdate && mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'tampil-data.php';
              </script>";
    } else {
        echo "<script>alert('Data gagal diubah atau tidak ada perubahan.');</script>";
    }
}
?>

</body>
</html>