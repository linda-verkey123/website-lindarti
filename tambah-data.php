<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        /* === VARIABEL WARNA === */
        :root {
            --biru-tua: #2c3e50;
            --biru-muda:rgb(122, 23, 69);
            --abu: #7f8c8d;
            --putih:rgb(235, 187, 213);
            --background:rgb(71, 11, 39);
        }
        
        /* === BASE STYLE === */
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: var(--background);
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: var(--biru-tua);
        }
        
        /* === CARD FORM === */
        .form-card {
            max-width: 600px;
            margin: 30px auto;
            background: var(--putih);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* === HEADER === */
        h1 {
            color: var(--biru-tua);
            text-align: center;
            margin-bottom: 10px;
        }
        
        h2 {
            color: var(--abu);
            text-align: center;
            font-weight: 400;
            margin-bottom: 30px;
        }
        
        /* === FORM TABLE === */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        td {
            padding: 12px;
            vertical-align: top;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: var(--biru-muda);
            outline: none;
        }
        
        /* === BUTTON === */
        button[type="submit"] {
            background: var(--biru-muda);
            color: var(--putih);
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
        }
        
        button[type="submit"]:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h1>Entry Data Mahasiswa</h1>
        <h2>Universitas Hamzanwadi</h2>
        <p style="text-align: center;">Silahkan masukkan data mahasiswa berdasarkan formulir berikut:</p>

        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" required></td>
                </tr> 
                <tr>
                    <td><label for="npm">NPM</label></td>
                    <td><input type="text" name="npm" id="npm" required></td>
                </tr>
                <tr>
                    <td><label for="prodi">Program Studi</label></td>
                    <td>
                        <select name="prodi" id="prodi" required>
                            <option value="Pendidikan Informatika">Pendidikan Informatika</option>
                            <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                            <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                            <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                            <option value="Pendidikan IPA">Pendidikan IPA</option>
                            <option value="Statistika">Statistika</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><input type="text" name="alamat" id="alamat" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit">Tambah Data</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    require("koneksi.php");

    if(isset($_POST["submit"])){
        $npm = $_POST["npm"];
        $nama = $_POST["nama"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];

        $kirim = "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat)
                  VALUES('$npm', '$nama', '$prodi', '$email', '$alamat')";
        
        if(mysqli_query($koneksi, $kirim)){
            echo "<script>
                    alert('Data Berhasil disimpan');
                    document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: ".mysqli_error($koneksi)."');
                  </script>";
        }
    }
    ?>
</body>
</html>