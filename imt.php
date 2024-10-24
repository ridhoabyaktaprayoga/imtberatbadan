<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4caf50; /* Ubah latar belakang menjadi hijau sukses */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            padding: 20px;
            background-color: #F5FFFA;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: calc(100% - 22px);
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h3 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            /* Menambah margin bawah agar tidak terlalu rapat dengan hasil */
        }

        .result {
            background-color: #dff0d8; /* Ganti dengan warna latar belakang hasil */
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 10px;
            /* Mengurangi margin atas agar lebih dekat dengan formulir */
        }

        .suggestion {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kalkulator Indeks Massa Tubuh (BMI)</h1>
        <form method="post" action="">
            Tinggi (cm): <input type="text" name="tinggi"
                value="<?php if(isset($_POST['tinggi'])) echo $_POST['tinggi']; ?>" /><br><br>
            Berat (kg): <input type="text" name="berat"
                value="<?php if(isset($_POST['berat'])) echo $_POST['berat']; ?>" /><br><br>
            <input type="submit" name="submit" value="Hitung BMI">
        </form>
        <?php
        if(isset($_POST['submit'])){
            $tinggi = $_POST['tinggi'] / 100; // Mengonversi tinggi dari cm ke m
            $berat = $_POST['berat'];
            
            // Menghitung BMI
            $bmi = $berat / ($tinggi * $tinggi);
            
            // Menampilkan hasil
            echo "<div class='result'>";
            echo "<h3>Hasil</h3>";
            echo "Tinggi: " . $tinggi . " m<br>";
            echo "Berat: " . $berat . " kg<br>";
            echo "BMI: " . number_format($bmi, 2); // Menampilkan BMI dengan 2 angka di belakang koma
            echo "<br>";
            
            // Menentukan kategori BMI
            if($bmi < 18.5){
                echo "Kamu memiliki berat badan kurang (underweight)";
                $ideal_min_weight = 18.5 * ($tinggi * $tinggi);
                $ideal_max_weight = 24.9 * ($tinggi * $tinggi);
                echo "<div class='suggestion'>Saran: Idealnya, berat badanmu antara " . number_format($ideal_min_weight, 2) . " kg hingga " . number_format($ideal_max_weight, 2) . " kg</div>";
            } elseif($bmi >= 18.5 && $bmi < 24.9){
                echo "Berat badanmu normal";
            } elseif($bmi >= 25 && $bmi < 29.9){
                echo "Kamu memiliki overweight";
                $ideal_min_weight = 18.5 * ($tinggi * $tinggi);
                $ideal_max_weight = 24.9 * ($tinggi * $tinggi);
                echo "<div class='suggestion'>Saran: Idealnya, berat badanmu antara " . number_format($ideal_min_weight, 2) . " kg hingga " . number_format($ideal_max_weight, 2) . " kg</div>";
            } else {
                echo "Kamu memiliki obesitas";
                $ideal_min_weight = 18.5 * ($tinggi * $tinggi);
                $ideal_max_weight = 24.9 * ($tinggi * $tinggi);
                echo "<div class='suggestion'>Saran: Idealnya, berat badanmu antara " . number_format($ideal_min_weight, 2) . " kg hingga " . number_format($ideal_max_weight, 2) . " kg</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
