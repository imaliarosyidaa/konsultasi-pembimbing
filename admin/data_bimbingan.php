<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php 
        include '../fragments/navbar_admin.php';
    ?>
    <!--Data Pelanggan-->
    <div class="container shadow-sm mt-5 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Data Bimbingan Mahasiswa</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <th styles="width:10%"> No </th>
            <th styles="width:10%"> NIM </th>
            <th styles="width:20%"> Nama Mahasiswa </th>
            <th styles="width:10%"> NIP </th>
            <th styles="width:10%"> NamA Pembimbing </th>
            <th styles="width:10%"> Topik </th>
            <th styles="width:10%"> Post Terakhir </th>
            <th styles="width:10%"> KRS Disetujui </th>
            <th styles="width:10%"> Status </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require '../config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->query("SELECT * FROM dosen");
                    $row = $stmt -> fetch();

                    $stmt = $pdo->query("SELECT * FROM mahasiswa");
                    $row2 = $stmt -> fetch();

                    $stmt = $pdo->query("SELECT * FROM topik");
                    $row3 = $stmt -> fetch();

                    $stmt = $pdo->query("SELECT * FROM bimbingan");
                    $i = 1;
                    while ($row4 = $stmt->fetch()){
                    echo"<tr>
                        <td class='text-center'>$i</td>
                        <td>".$row2["nim"]."</td>
                        <td>".$row2["nama"]."</td>
                        <td>".$row["nip"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row3["topik"]."</td>
                        <td class='text-center'>".$row4["update_time"]."</td>
                        <td class='text-center'>".$row4["is_krs_approved"]."</td>
                        <td>".$row4["status"]."</td>
                    </tr>
                    "; $i++;}
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>