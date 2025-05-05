<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        /* === VARIABEL WARNA === */
        :root {
            --biru-tua:rgb(80, 44, 65);
            --biru-muda: #3498db;
            --hijau: #27ae60;
            --merah: #e74c3c;
            --putih:rgb(255, 255, 255);
            --background:rgb(211, 173, 181);
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
        
        /* === HEADER === */
        h1 {
            color: var(--biru-tua);
            text-align: center;
            margin-bottom: 10px;
        }
        
        h2 {
            color: #7f8c8d;
            text-align: center;
            font-weight: 400;
            margin-bottom: 20px;
        }
        
        p.deskripsi {
            text-align: center;
            margin-bottom: 30px;
            color: #555;
        }
        
        /* === TABLE === */
        table {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: var(--biru-tua);
            color: var(--putih);
            font-weight: 500;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #e9e9e9;
        }
        
        /* === ACTION BUTTONS === */
        .aksi a {
            color: var(--biru-muda);
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 3px;
            transition: all 0.3s;
        }
        
        .aksi a:first-child {
            color: var(--hijau);
        }
        
        .aksi a:last-child {
            color: var(--merah);
        }
        
        .aksi a:hover {
            background-color: #f0f0f0;
            text-decoration: none;
        }
        
        /* === FOOTER === */
        footer {
            text-align: center;
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <h2>Universitas Hamzanwadi</h2>
    <p class="deskripsi">Berikut daftar mahasiswa aktif Universitas Hamzanwadi, <br>
    Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require("koneksi.php");
            
            $dataTabel = "SELECT * FROM tbl_mahasiswa";
            $dataTampil = mysqli_query($koneksi, $dataTabel);
            
            if (!$dataTampil) {
                die("Error dalam query: " . mysqli_error($koneksi));
            }
            
            $urut = 1;
            
            while($data = mysqli_fetch_assoc($dataTampil)): 
            ?>
            <tr>
                <td><?= htmlspecialchars($urut) ?></td>
                <td><?= htmlspecialchars($data["npm"]) ?></td>
                <td><?= htmlspecialchars($data["nama"]) ?></td>
                <td><?= htmlspecialchars($data["prodi"]) ?></td>
                <td><?= htmlspecialchars($data["email"]) ?></td>
                <td><?= htmlspecialchars($data["alamat"]) ?></td>
                <td class="aksi">
                    <a href="ubah-data.php?idMhs=<?= htmlspecialchars($data['idMhs']) ?>" title="Ubah data">✏️ Ubah</a>
                    <a href="hapus-data.php?idMhs=<?= htmlspecialchars($data['idMhs']) ?>" 
                       onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($data['nama']) ?>?')" 
                       title="Hapus data">❌ Hapus</a>
                </td>
            </tr>
            <?php 
            $urut++; 
            endwhile; 
            
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
    
    <footer>
        &copy; <?= date('Y') ?> Sistem Informasi Mahasiswa - FMIPA Universitas Hamzanwadi
    </footer>
</body>
</html>