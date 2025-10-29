<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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