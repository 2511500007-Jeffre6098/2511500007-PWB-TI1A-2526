<?php function hitungGrade($hadir, $akhir) {
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

            function hitungMutu($grade) {         
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
        echo "<h2>IPK: ".number_format($IPK,2)."</h2>"; ?>