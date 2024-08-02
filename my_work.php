<?php	
	include 'authorization.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));		

    $case_studies = mysqli_query($conn, "SELECT title, img_title, id_case_study FROM Case_study ORDER BY id_case_study;")
	    or die("Błąd w zapytaniu do tabeli Case_study");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="static_images/logo-square.png" type="image/png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/my_work.css">
    <link rel="stylesheet" href="styles/header-subpages.css">
    <link rel="stylesheet" href="styles/footer.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- body bold | body capslock | body italic | headers serif | headers capslock nonserif-->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wdth,wght@87.5,700&family=Noto+Sans+Display&family=Noto+Sans+Display:ital,wght@1,300&family=Oranienbaum&family=Noto+Sans+Display:wght@600&display=swap" rel="stylesheet">
        <!-- body -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wdth,wght@87.5;100,100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->
        <!-- icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>My work | Patrycja Bobowska</title>
</head>

<body class="noto-sans-display-body">

    <header class="header-subpages">
            <!-- navigation -->
            <div class="navigation">
                <!-- logo -->
                <a href="index.php"><img src="static_images/logo.png" alt="logo" class="logo-small" id="logoElement"></a>
                <!-- menu -->
                <input type="checkbox" id="menu-active">
                <label id="menu-overlay" for="menu-active"></label>
                <nav class="menu_container" aria-label='primary'>
                    <div class="menu">
                        <button><a type="button" class="button" href="my_work.php">my work</a></button>
                        <button><a type="button" class="button" href="about_me.html">about me</a></button>
                        <button><a type="button" class="button" href="contact.php">contact</a></button>
                    </div>
                    <label class="close-menu_button" for="menu-active">
                        <i class="material-symbols-outlined">close</i>
                    </label>
                </nav>
            </div>
            <!-- settings button | menu button -->
            <input type="checkbox" id="sidebar-active">
            <div class="settings-menu_container">
                <!-- settings button -->
                <label for="sidebar-active" class="open-sidebar_button">
                    <i class="material-symbols-outlined">discover_tune</i>
                </label>
                <!-- menu button -->
                <label for="menu-active" class="open-menu_button">
                    <i class="material-symbols-outlined menu_button">menu</i>
                </label>
            </div>
            <!-- settings sidebar -->
            <label id="settings-overlay" for="sidebar-active"></label>
            <div class="settings_container">
                <!-- close button -->
                <label class="close-sidebar_button" for="sidebar-active">
                    <i class="material-symbols-outlined">close</i>
                </label>
                <!-- language | dark mode -->
                <div class="settings"> 
                    <!-- <div class="language_button">
                        <i class="material-symbols-rounded">language</i>
                        <p>pl</p>
                    </div>
                    <div class="language_button">
                        <i class="material-symbols-rounded">language</i>
                        <p>eng</p>
                    </div> -->
                    <div class="settings_button" aria-label="toggle text increase" id="text-increase-toggle">
                        <i class="material-symbols-rounded">text_increase</i>
                    </div>
                    <div class="settings_button" aria-label="toggle text increase" id="text-decrease-toggle">
                        <i class="material-symbols-rounded">text_decrease</i>
                    </div>
                    <div class="settings_button" aria-label="toggle light mode" id="light-mode-toggle">
                        <i class="material-symbols-rounded">wb_sunny</i>
                    </div>
                    <div class="settings_button" aria-label="toggle dark mode" id="dark-mode-toggle">
                        <i class="material-symbols-rounded">dark_mode</i>
                    </div>
                </div>
            </div>
    </header>

    <main class="my-work_container_subpage">
        <!-- My work -->
        <h2>My work</h2>
        <div class="my-work_elements_subpage"> 
            <?php
                while($case_study = mysqli_fetch_array($case_studies)){
                    echo '<div class="my-work_image_container">';
                        echo '<p>'.$case_study['id_case_study'].'</p>'; 
                        echo '<h3>'.$case_study['title'].'</h3>';
                        echo '<a href="case_study.php?id_case_study=' .$case_study['id_case_study']. '"><img src="database_images/'.$case_study['img_title'].'" alt="" class="my-work_image"></a>';
                    echo '</div>';
                }
            ?>
        </div>
    </main>

    <footer>
        <p>© Patrycja Bobowska 2024, all rights reserved</p>
    </footer>

    <!-- <script src="styles/main.js"></script> -->
    <script src="scripts/dark-mode.js"></script>
    <script src="scripts/text-increase.js"></script>
</body>
</html>