<?php

echo "<a href='cikis.php'>LOG OUT</a> <br>";
include "baglan.php";

if(isset($_GET['sil'])){
    $sqlsil="DELETE FROM `information` WHERE `information`.`id` = ?";
    $sorgusil=$baglan->prepare($sqlsil);
    $sorgusil->execute([
        $_GET['sil']
    ]);

    header('Location:islem.php');

}
$sql ="SELECT * FROM information";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTS</title>
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Plaka Tanıma Sistemi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="islem.php" class="btn btn-outline-primary">Tüm Araçlar</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Araç Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Plaka</th>
                                <th>Ad Soyad</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$satir['id']?></td>
                                <td><?=$satir['plaka']?></td>
                                <td><?=$satir['isim']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="detay.php?id=<?=$satir['id']?>" class="btn btn-success">Detay</a>
                                        <a href="guncelle.php?id=<?=$satir['id']?>" class="btn btn-secondary">Güncelle</a>
                                        <a href="?sil=<?=$satir['id']?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Kaldır</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </main>
    
</body>
</html>