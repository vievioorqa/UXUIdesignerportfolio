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
    <link rel="stylesheet" href="styles/girl&boy.css">
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
    <title>Patrycja Bobowska | UX/UI designer portfolio</title>
</head>
<body class="noto-sans-display-body">

        <header class="header">
            <div class="logosmall-menu-settings_container">

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
            </div>
        </header>

        <!-------------------- hero -------------------->
        <!-- logo       | name | profession | traits | navigation |       boy & girl-->
        <div class="hero">
            <!-- logo     | name | profession | traits | navigation -->
            <div class="hero__logo-namenav_container">
                <div class="hero__logo-namenav">
                    <!-- logo -->
                    <div class="logolarge_container">
                        <a href="index.php"><img src="static_images/logo.png" alt="logo" class="logo" id="logoElement"></a>
                    </div>
                    <!-- name | profession | traits | navigation -->
                    <div class="hero__namenav">
                        <!-- name | profession -->
                        <h1 class="name">Patrycja<br>Bobowska</h1>
                        <h2 class="serif-capslock">aspiring ux/ui designer</h2>
                        <!-- traits -->
                        <div class="traits border-top">
                            <ul class="no-bullets">
                                <li>creative</li>
                                <li>insightful</li>
                                <li>detail-oriented</li>
                            </ul>
                            <ul class="no-bullets">
                                <li>empathic</li>
                                <li>tasteful</li>
                                <li>well-organized</li>
                            </ul>
                            <ul class="no-bullets">
                                <li>reliable</li>
                                <li>extroverted</li>
                                <li>communicative</li>
                            </ul>
                        </div>
                        <!-- navigation -->
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
                </div>
            </div>
            <!-- boy & girl -->
            <div class="boy-and-girl">
                <img src="static_images/babka.png" class="character" alt="Grafika wektorowa inspirowana stylem Zosfii Stryjeńskiej, przedstawiająca tańczącą dziewczynę w stroju ludowym.">
                <img src="static_images/chłopak.png" class="character" alt="Grafika wektorowa inspirowana stylem Zosfii Stryjeńskiej, przedstawiająca tańczącego chłopaka w stroju ludowym.">
                <div class="character-description">
                    <p class="character-description-animation">me</p>
                    <p class="character-description-animation">UX/UI</p>
                </div>
            </div>
        </div>
        <!-------------------- end of hero -------------------->


        <main>
            <!-- My work -->
            <div class="my-work_container border-top"> <!--- container -->
                <h2>My work</h2>
                <div class="my-work_arrows_elements"> <!-- slider-container -->
                    <i class="material-symbols-outlined arrow-left" id="arrow-left-icon" onclick="slideLeft()">chevron_left</i> 
                    <div class="my-work_elements" id="my-work_carousel"> <!--- slider -->
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
                    <i class="material-symbols-outlined arrow-right" id="arrow-right-icon" onclick="slideRight()">chevron_right</i>
                </div>
            </div>
        </main>

        <footer>
            <p>© Patrycja Bobowska 2024, all rights reserved</p>
        </footer>

    <script src="scripts/main.js"></script>
    <script src="scripts/dark-mode.js"></script>
    <script src="scripts/text-increase.js"></script>
</body>
</html>