<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> <!-- Supaya pas di refresh halaman style.cssnya gak ke cache -->
</head>
<script>
    window.onbeforeunload = function() { // Biar pas refresh halaman, posisi scrollnya balik ke atas
        window.scrollTo(0, 0); // Maaf pak, saya tambahin ini karena pas di refresh halaman, posisi scrollnya di tengah-tengah
    };
</script>

<body>
    <header>
        <h1>Main Menu</h1>
        <button class="menu-toggle" id="menuToggle" arial-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#gpa">GPA</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2><?php echo "Hello User!"; ?></h2>
            <h2>Welcome to My Website!</h2>
            <p><?php echo "I'm Jeffrey!"; ?></p>
            <p>This is the sample paragraph in Html </p>
            <p>Where we experimenting with Html, PHP, JavaScript and style.css.</p>
        </section>
        <section id="about">
            <?php
            $nim = "2511500007";
            $NIM = "2511500001";
            $Nim = "";
            $nIm = "null";
            $NiM = "2511500003";
            $niM = "2511500040";
            $NIM = "2511500011";
            $nama = "Jeffrey Deryata";
            ?>
            <h2><strong>About Us!</strong></h2>
            <p><strong>🆔 NIM:</strong> <?php echo $nim; ?></p>
            <p><strong>👤 Full Name:</strong> <?php echo $nama ?></p>
            <p><strong>🏫 Class:</strong> TI1A</p>
            <p><strong>📌 Birth Place:</strong> Sungailiat</p>
            <p><strong>📆 Birth Date:</strong> 30 April 2007</p>
            <p class="hobby"><strong>Hobby:</strong> Gaming 🎮, Aviation ✈️, And Music 🎸</p>
            <p class="pasangan"><strong>Status:</strong> None 😢</p>
            <p class="Job"><strong>Job:</strong> Student 📚</p>
            <p><strong>Parents Name:</strong> Null &amp; Null</p>
            <p><strong>Siblings Name:</strong> Null</p>
            <p><strong>Younger Siblings Name:</strong> Guurl</p>
        </section>
        <section id="gpa">
            
            <?php
            $namaMatkul1 = "Kalkulus";
            $namaMatkul2 = "Logika Informatika";
            $namaMatkul3 = "Pengantar Teknik Informatika";
            $namaMatkul4 = "Aplikasi Perkantoran";
            $namaMatkul5 = "Dasar Basis Data";

            $sksMatkul1 = "3";
            $sksMatkul2 = "3";
            $sksMatkul3 = "3";
            $sksMatkul4 = "3";
            $sksMatkul5 = "3";

            $nilaiHadir1 = 90;  $nilaiTugas1 = 84;  $nilaiUTS1 = 89;  $nilaiUAS1 = 81;
            $nilaiHadir2 = 96;  $nilaiTugas2 = 90;  $nilaiUTS2 = 95;  $nilaiUAS2 = 89;
            $nilaiHadir3 = 100; $nilaiTugas3 = 100; $nilaiUTS3 = 92;  $nilaiUAS3 = 90;
            $nilaiHadir4 = 88;  $nilaiTugas4 = 81;  $nilaiUTS4 = 86;  $nilaiUAS4 = 91;
            $nilaiHadir5 = 100; $nilaiTugas5 = 92;  $nilaiUTS5 = 90;  $nilaiUAS5 = 86;

            $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1);
            $nilaiAkhir2 = (0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
            $nilaiAkhir3 = (0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3);
            $nilaiAkhir4 = (0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
            $nilaiAkhir5 = (0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);

            function hitungGrade($hadir, $akhir): string {
                if ($hadir < 70) return "E";
                elseif ($akhir >= 90) return "A";
                elseif ($akhir >= 80) return "A-";
                elseif ($akhir >= 75) return "B+";
                elseif ($akhir >= 70) return "B";   
                elseif ($akhir >= 65) return "B-";
                elseif ($akhir >= 60) return "C+";
                elseif ($akhir >= 55) return "C";
                elseif ($akhir >= 50) return "C-";
                elseif ($akhir >= 35) return "D";
                else return "E";
            }

            function hitungMutu($grade): float {         
            switch ($grade) {
                case "A": return 4.0;
                case "A-": return 3.7;
                case "B+": return 3.3;
                case "B": return 3.0;
                case "B-": return 2.7;
                case "C+": return 2.3;
                case "C": return 2.0;
                case "C-": return 1.7;
                case "D": return 1.0;
                default: return 0.0;
                
            }
        }

            $grade1 = hitungGrade($nilaiHadir1, $nilaiAkhir1);
            $grade2 = hitungGrade($nilaiHadir2, $nilaiAkhir2);
            $grade3 = hitungGrade($nilaiHadir3, $nilaiAkhir3);
            $grade4 = hitungGrade($nilaiHadir4, $nilaiAkhir4);
            $grade5 = hitungGrade($nilaiHadir5, $nilaiAkhir5);

            $mutu1 = hitungMutu($grade1);
            $mutu2 = hitungMutu($grade2);
            $mutu3 = hitungMutu($grade3);
            $mutu4 = hitungMutu($grade4);
            $mutu5 = hitungMutu($grade5);

            $bobot1 = $mutu1 * $sksMatkul1;
            $bobot2 = $mutu2 * $sksMatkul2;
            $bobot3 = $mutu3 * $sksMatkul3;
            $bobot4 = $mutu4 * $sksMatkul4;
            $bobot5 = $mutu5 * $sksMatkul5;


            $status1 = ($grade1 == "D" || $grade1 == "E") ? "Gagal" : "Lulus";
            $status2 = ($grade2 == "D" || $grade2 == "E") ? "Gagal" : "Lulus";
            $status3 = ($grade3 == "D" || $grade3 == "E") ? "Gagal" : "Lulus";
            $status4 = ($grade4 == "D" || $grade4 == "E") ? "Gagal" : "Lulus";
            $status5 = ($grade5 == "D" || $grade5 == "E") ? "Gagal" : "Lulus";
                    
            $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
            $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
            $IPK = $totalBobot / $totalSKS;

            function display($nama, $sks, $hadir, $tugas, $uts, $uas, $akhir, $grade, $mutu, $bobot, $status) {
        echo "<h2>My GPA</h2>";
        echo "<h3>$nama</h3>";
        echo "<p><strong>SKS:</strong> $sks</p>";
        echo "<p><strong>Kehadiran:</strong> $hadir</p>";
        echo "<p><strong>Tugas:</strong> $tugas</p>";
        echo "<p><strong>UTS:</strong> $uts</p>";
        echo "<p><strong>UAS:</strong> $uas</p>";
        echo "<p><strong>Nilai Akhir:</strong> ".number_format($akhir,2)."</p>";
        echo "<p><strong>Grade:</strong> $grade</p>";
        echo "<p><strong>Angka Mutu:</strong> $mutu</p>";
        echo "<p><strong>Bobot:</strong> ".number_format($bobot,2)."</p>";
        echo "<p><strong>Status:</strong> $status</p>";
        echo "<hr>";
    }

        display($namaMatkul1,$sksMatkul1,$nilaiHadir1,$nilaiTugas1,$nilaiUTS1,$nilaiUAS1,$nilaiAkhir1,$grade1,$mutu1,$bobot1,$status1);
        display($namaMatkul2,$sksMatkul2,$nilaiHadir2,$nilaiTugas2,$nilaiUTS2,$nilaiUAS2,$nilaiAkhir2,$grade2,$mutu2,$bobot2,$status2);
        display($namaMatkul3,$sksMatkul3,$nilaiHadir3,$nilaiTugas3,$nilaiUTS3,$nilaiUAS3,$nilaiAkhir3,$grade3,$mutu3,$bobot3,$status3);
        display($namaMatkul4,$sksMatkul4,$nilaiHadir4,$nilaiTugas4,$nilaiUTS4,$nilaiUAS4,$nilaiAkhir4,$grade4,$mutu4,$bobot4,$status4);
        display($namaMatkul5,$sksMatkul5,$nilaiHadir5,$nilaiTugas5,$nilaiUTS5,$nilaiUAS5,$nilaiAkhir5,$grade5,$mutu5,$bobot5,$status5);

        echo "<h3>Total Bobot: ".number_format($totalBobot,2)."</h3>";
        echo "<h3>Total SKS: $totalSKS</h3>";
        echo "<h2>IPK: ".number_format($IPK,2)."</h2>";
            
    ?>
        </section>
        <section id="contact">
            <h2>Contact Us</h2>
            <form action="" method="get">
                <label for="txtNama"><span>Name:</span>
                    <input type="text" id="txtNama" name="txtNama" placeholder="Enter Name" autocomplete="name">
                </label>
                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Enter Email" autocomplete="email">
                </label>
                <label for="txtPesan"><span>Pesan:</span>
                    <textarea id="txtPesan" maxlength="400" name="txtPesan" rows="4" placeholder="Write Your Message..."></textarea>
                    <small id="charCount">0/400 characters</small>
                </label>
                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 My Website. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>