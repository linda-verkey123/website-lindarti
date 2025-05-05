<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Mahasiswa | UNH</title>
    <style>
        /* RESET CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(68, 49, 49);
            line-height: 1.6;
            color: #333;
        }
        
        /* HEADER */
        header {
            background:rgb(68, 15, 35);
            color: white;
            text-align: center;
            padding: 2rem 0;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        h2 {
            font-weight: 300;
            color:rgb(243, 243, 243);
        }
        
        /* MAIN CONTENT */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .menu-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .menu-list {
            list-style: none;
        }
        
        .menu-item {
            margin: 1rem 0;
        }
        
        .menu-link {
            display: block;
            background:rgb(170, 40, 112);
            color: white;
            text-decoration: none;
            padding: 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-align: center;
            font-size: 1.1rem;
        }
        
        .menu-link:hover {
            background:rgb(170, 40, 112);
            transform: translateY(-3px);
        }
        
        /* FOOTER */
        footer {
            text-align: center;
            padding: 1rem;
            background:rgb(68, 15, 35);
            color: white;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Data Mahasiswa</h1>
        <h2>Universitas Hamzanwadi</h2>
    </header>

    <div class="container">
        <div class="menu-card">
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="tambah-data.php" class="menu-link">📝 Tambah Data Mahasiswa</a>
                </li>
                <li class="menu-item">
                    <a href="tampil-data.php" class="menu-link">👀 Lihat Data Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Sistem Informasi Mahasiswa FMIPA
    </footer>
</body>
</html>