<!DOCTYPE html>
<html lang="en">
<head>
    <title>Learning PHP Basic</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="laragron.php"></script>
</head>
<body>
    <h1><?php echo "Hello World, PHP" ; ?></h1>
    <?php $nama = "Jeffrey Deryata"; 
    $umur = 18; $tinggi = 160;
    $aktif = true;  echo "Nama: 
    $nama <br>"; echo "Umur: 
    $umur tahun <br>"; 
    
    echo "Tinggi: $tinggi cm <br>"; 
    echo "Status aktif: " . ($aktif ? "Ya" : "Tidak") . "<br>"; 
    var_dump($nama); 
    var_dump($umur); 
    var_dump($tinggi); 
    var_dump($aktif); ?> 
</body>
<footer>
    
</footer>
</html>
