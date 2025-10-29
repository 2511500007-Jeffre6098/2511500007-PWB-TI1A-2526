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
    $nama = "Yohanes Setiawan Japriadi"; 
    $umur = 25; $tinggi = 1.75; 
    $aktif = true; $hobi = ["Coding", "Memasak", "Musik"]; 
    $mahasiswa = (object)[   
        "nim" => "2511500007",   
        "nama" => "Jeffrey Deryata",   
        "prodi" => "Teknik Informatika" ]; 
    
    $nilai_akhir = NULL; 
    echo "<h2>Demo Tipe Data PHP</h2>";  

    echo "<pre>"; 

    echo "String:\n"; 
    var_dump($nama);  

    echo "\nInteger:\n"; 
    var_dump($umur);  

    echo "\nFloat:\n"; 
    var_dump($tinggi); 

    echo "\nBoolean:\n"; 
    var_dump($aktif);  

    echo "\nArray:\n"; 
    var_dump($hobi);
    
    echo "\nObject:\n"; var_dump($mahasiswa);  
    echo "\nNULL:\n"; 

    var_dump($nilai_akhir); 
    echo "</pre>"; ?> 
</body>
<footer>
    
</footer>
</html>
