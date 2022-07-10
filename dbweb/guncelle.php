<?php
 
include "baglan.php";
 
if(isset($_POST['guncelle'])){
 
    $sql = "UPDATE `information` 
        SET `plaka` = ?, 
            `isim` = ?, 
            `unvan` = ? 
            WHERE `information`.`id` = ?";
    $dizi=[
        $_POST['plaka'],
        $_POST['isim'],
        $_POST['unvan'],
        $_POST['id']
    ];
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);
 
    header("Location:islem.php");
}
 
$sql ="SELECT * FROM information WHERE id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['id']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
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
        <form action="" method="post" class="row mt-4 g-3">
            <input type="hidden" name="id" value="<?=$satir['id']?>">
            <div class="col-6">
                <label for="plaka" class="form-label">Plaka</label>
                <input type="text" class="form-control" name="plaka" value="<?=$satir['plaka']?>">
            </div>
            <div class="col-6">
                <label for="isim" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control" name="isim" value="<?=$satir['isim']?>">
            </div>
            <div class="col">
                <label for="unvan" class="form-label">Ünvan</label>
                <select name="unvan" class="form-control">
                        <option value="">Ünvan Seçin</option>
                        <option value="Ogretim Gorevlisi">Öğretim Görevlisi</option>
                        <option value="Personel">Personel</option>
                        <option value="Ogrenci">Öğrenci</option>
                </select>
            </div>
            
            <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>