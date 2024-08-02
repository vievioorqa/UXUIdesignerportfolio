<?php	
	include 'authorization.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Bład połączenia z serwerem: '.mysqli_connect_error($conn));
    
    session_start();
    if (isset ($_GET['id_case_study']) ) {
        $_SESSION['id_case_study'] = $_GET['id_case_study'];	
    }
    if (!isset($_SESSION['id_case_study'])) {
        die('Case study ID not set.');
    }
    $chosen_case_study = $_SESSION['id_case_study'];

    $case_study = mysqli_query($conn, "SELECT id_case_study, title, objective FROM Case_study WHERE id_case_study='".$chosen_case_study."';");
    $case_studies_number = mysqli_query($conn, "SELECT COUNT(id_case_study) AS `number` FROM Case_study;");
    $limitations = mysqli_query($conn, "SELECT limitation FROM Limitations WHERE id_case_study='".$chosen_case_study."';");
    $persona = mysqli_query($conn, "SELECT * FROM Persona WHERE id_case_study='".$chosen_case_study."';");
    $needs = mysqli_query($conn, "SELECT need FROM Needs_Frustrations WHERE id_case_study='".$chosen_case_study."';");
    $frustrations = mysqli_query($conn, "SELECT frustration FROM Needs_Frustrations WHERE id_case_study='".$chosen_case_study."';");
    $wireframes = mysqli_query($conn, "SELECT img_title FROM Wireframes WHERE id_case_study='".$chosen_case_study."';");
    $fonts = mysqli_query($conn, "SELECT font, link FROM Typography WHERE id_case_study='".$chosen_case_study."';");
    $colors = mysqli_query($conn, "SELECT color FROM Color_palette WHERE id_case_study='".$chosen_case_study."';");
    $examples_before = mysqli_query($conn, "SELECT example_title, image_before FROM Example WHERE id_case_study='".$chosen_case_study."';");
    $examples_after = mysqli_query($conn, "SELECT example_title, image_after FROM Example WHERE id_case_study='".$chosen_case_study."';");
    // $example_descriptions = mysqli_query($conn, 
    // "SELECT Example_description.description_title, Example_description.description, Example.example_title, Example.image_before, Example.image_after 
    // FROM Example_description INNER JOIN Example ON 
    // Example_description.image_before=Example.image_before OR Example_description.image_after=Example.image_after 
    // WHERE Example.id_case_study='".$chosen_case_study."';");

    if ($persona) {
        $persona_array = mysqli_fetch_array($persona);
    }

    $number = mysqli_fetch_array($case_studies_number);
    define('CASE_STUDIES_NUMBER', $number['number']);

    $previous = $chosen_case_study - 1;
    $next = $chosen_case_study + 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo-square.png" type="image/png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/my_work-case_study.css">
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
    <title>Case study | Patrycja Bobowska</title>
</head>

<body class="noto-sans-display-body">

    <header class="header-subpages">
            <!-- navigation -->
            <div class="navigation">
                <!-- logo -->
                <a href="index.php"><img src="images/logo.png" alt="logo" class="logo-small" id="logoElement"></a>
                <!-- menu -->
                <input type="checkbox" id="menu-active">
                <label id="menu-overlay" for="menu-active"></label>
                <nav class="menu_container" aria-label='primary'>
                    <label class="close-menu_button" for="menu-active">
                        <i class="material-symbols-outlined">close</i>
                    </label>
                    <div class="menu">
                        <button><a type="button" class="button" href="my_work.php">my work</a></button>
                        <button><a type="button" class="button" href="about_me.html">about me</a></button>
                        <button><a type="button" class="button" href="contact.html">contact</a></button>
                    </div>
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

    <main class="casestudy_main">
        <div class="casestudy_navigation">
            <div class="my-work_breadcrumbs">
                <h3>My work</h3>
                <i class="material-symbols-rounded">keyboard_arrow_down</i>
            </div>
            <div class="previous-next_buttons">
                <?php
                // var_dump($chosen_case_study, $previous, $next, CASE_STUDIES_NUMBER);
                    if ($chosen_case_study > 1){
                        echo '<button><a type="button" class="button blue" href="case_study.php?id_case_study='.$previous.'">previous</a></button>';
                    }
                    if ($chosen_case_study < CASE_STUDIES_NUMBER ) {
                        echo '<button><a type="button" class="button blue" href="case_study.php?id_case_study='.$next.'">next</a></button>';
                    }
                ?>
            </div>
        </div>
        <div class="wavy-border_before" id="wavy-border_before"></div>
        <div class="wavy-border">
            <div class="casestudy_container">
                <div class="casestudy-number-title">
                    <?php
                        echo '<p class="casestudy-number">' .$chosen_case_study. ' / ' .CASE_STUDIES_NUMBER. '</p>';
                        if ( $case_study_array = mysqli_fetch_array($case_study) ) {
                            echo '<h1>'.$case_study_array['title'].'</h1>';
                        }
                    ?>
                </div>
                <div class="casestudy">
                    <div class="design-foundations_container border-top">
                        <h2 class="serif-capslock">Design foundations</h2>
                        <div class="design-foundations_objective-limitations">
                            <div class="design-foundations_element">
                                <h4>Project's objective</h4>
                                <?php
                                    echo '<p>' .$case_study_array['objective']. '</p>';
                                ?>
                            </div>
                            <div class="design-foundations_element">
                                <h4>Limitations</h4>
                                <ul>
                                    <?php
                                        while($limitation_array = mysqli_fetch_array($limitations)) {
                                            echo '<li>' .$limitation_array['limitation']. '</li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        if ($persona) {
                            echo '<div class="design-foundations_element">';
                            echo '    <h4>Persona</h4>';
                            echo '    <div class="persona">';
                            echo '    <p class="body-bold">' . $persona_array['name'] . '</p>';
                            echo '    <div class="persona_img-traits-description">';
                            echo '    <div class="persona_img-traits">';
                            echo '        <img src="database_images/' . $persona_array['image'] . '" alt="" class="persona_img">';
                            echo '        <ul class="persona_traits">';
                            echo '            <li>Age: ' . $persona_array['age'] . '</li>';
                            echo '            <li>Gender: ' . $persona_array['gender'] . '</li>';
                            echo '            <li>Residence: ' . $persona_array['residence'] . '</li>';
                            echo '            <li>Occupation: ' . $persona_array['occupation'] . '</li>';
                            echo '            <li>Hobbies: ' . $persona_array['hobbies'] . '</li>';
                            echo '            <li>Favorite brand: ' . $persona_array['favorite_brand'] . '</li>';                                                
                            echo '        </ul>';
                            echo '    </div>';
                            echo '    <div class="persona_description">';
                            echo '        <p>' . $persona_array['description'] . '</p>';
                            echo '    </div>';
                            echo '</div>';
                            echo '<div class="persona_needs-frustrations">';
                            echo '    <div class="persona_needs">';
                            echo '        <p class="body-bold">Goals & needs</p>';
                            echo '        <ul>';
                                                while ( $needs_array = mysqli_fetch_array($needs) ) {
                                                    echo '<li>' . $needs_array['need'] . '</li>';
                                                }
                            echo '        </ul>';
                            echo '    </div>';
                            echo '    <div class="persona_frustrations">';
                            echo '        <p class="body-bold">Frustrations</p>';
                            echo '        <ul>';
                                                while ( $frustrations_array = mysqli_fetch_array($frustrations) ) {
                                                    echo '<li>' . $frustrations_array['frustration'] . '</li>';
                                                }
                            echo '        </ul>';
                            echo '    </div>';
                            echo '</div>';
                        }
                        ?>
                        <div class="design-foundations_element">
                            <h4>Wireframes</h4>
                            <div class="wireframes">
                                <?php
                                    while ( $wireframes_array = mysqli_fetch_array($wireframes) ) {
                                        echo '<img src="database_images/'.$wireframes_array['img_title'].'" alt="" class="wireframe_img">';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="design-foundations_typography-colorpalette">
                            <div class="design-foundations_element">
                                <h4>Typography</h4>
                                <?php
                                    while ( $fonts_array = mysqli_fetch_array($fonts) ) {
                                        echo '<a class="body-bold bold-link" href="' .$fonts_array['link']. '"><p>'.$fonts_array['font'].'</p></a> ';
                                    }
                                ?>
                            </div>
                            <div class="design-foundations_element">
                                <h4>Color palette</h4>
                                <div class="color-palette">
                                    <?php
                                        while ( $colors_array = mysqli_fetch_array($colors) ) {
                                            echo '<div class="color-square">';
                                                echo '<div style="width: 50px; height: 50px; background-color: '.$colors_array['color'].';"></div>';
                                                echo $colors_array['color'] . '<br>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="design-comparison_container border-top">
                        <h2 class="serif-capslock">Design comparison</h2>
                        <div class="design-comparison">
                            <div class="design-comparison-before-after_container">
                                <h3>Before</h3>
                                <div class="design-comparison-before-after_examples">
                                    <div class="design-comparison-before-after_example">
                                        <?php
                                            while ( $examples_array = mysqli_fetch_array($examples_before) ) {
                                                echo '<h4>' .$examples_array['example_title']. '</h4>';
                                                echo '<div class="example_images-description">';
                                                echo '    <div class="example-images">';
                                                echo '        <img src="database_images/' .$examples_array['image_before']. '" alt="">';
                                                echo '    </div>';
                                                echo '    <div class="example-description">';
                                                echo '        <div>';
                                                            $example_descriptions_result = mysqli_query($conn, "SELECT description_title, description FROM Example_description WHERE image_before='" . $examples_array['image_before'] . "'");
                                                                while ( $example_descriptions_array = mysqli_fetch_array($example_descriptions_result) ) {
                                                                    echo ' <h5>' .$example_descriptions_array['description_title']. '</h5>';
                                                                    echo ' <p>' .$example_descriptions_array['description']. '</p>';
                                                                }
                                                echo '        </div>';
                                                echo '    </div>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                    <!-- <div class="design-comparison-before-after_example">
                                        <div class="design-comparison-before-after_example">
                                            <h4>Lecture</h4>
                                            <div class="example_images-description">
                                                <div class="example-images">
                                                    <img src="images/stare sfi prelekcja.png" alt="">
                                                </div>
                                                <div class="example-description">
                                                    <div>
                                                        <h5>Useless information</h5>
                                                        <p>The orange graphic with the name of the event draws most attention yet it is irrelevant for this lecture subpage. The user must have already seen it on the home page.</p>
                                                    </div>
                                                    <div>
                                                        <h5>Bad Information Architecture</h5>
                                                        <p>First information under the title is again name and number of the edition, which is repeatedly mentioned.
                                                            The name of the lecturer should be integral with the title of the lecture, yet it is placed far from it.
                                                            The date is not distinguished in any way from other, less important information. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="design-comparison-before-after_example">
                                        <div class="design-comparison-before-after_example">
                                            <h4>Download section</h4>
                                            <div class="example_images-description">
                                                <div class="example-images">
                                                    <img src="images/stare sfi sekcja pobieranina.png" alt="">
                                                    <img src="images/stare sfi mapa.png" alt="">
                                                </div>
                                                <div class="example-description">
                                                    <div>
                                                        <h5>Bla bla</h5>
                                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
                                                    </div>
                                                    <div>
                                                        <h5>Bla bla</h5>
                                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="design-comparison-before-after_container">
                                <h3>After</h3>
                                <?php
                                    while ( $examples_array = mysqli_fetch_array($examples_after) ) {
                                        echo '<h4>' .$examples_array['example_title']. '</h4>';
                                        echo '<div class="example_images-description">';
                                        echo '    <div class="example-images">';
                                        echo '        <img src="database_images/' .$examples_array['image_after']. '" alt="">';
                                        echo '    </div>';
                                        echo '    <div class="example-description">';
                                        echo '        <div>';
                                                    $example_descriptions_result = mysqli_query($conn, "SELECT description_title, description FROM Example_description WHERE image_after='" . $examples_array['image_after'] . "'");
                                                        while ( $example_descriptions_array = mysqli_fetch_array($example_descriptions_result) ) {
                                                            echo ' <h5>' .$example_descriptions_array['description_title']. '</h5>';
                                                            echo ' <p>' .$example_descriptions_array['description']. '</p>';
                                                        }
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wavy-border_after" id="wavy-border_after"></div>
        <div class="previous-next_buttons-end">
            <?php
            // var_dump($chosen_case_study, $previous, $next, CASE_STUDIES_NUMBER);
                if ($chosen_case_study > 1){
                    echo '<button><a type="button" class="button blue" href="case_study.php?id_case_study='.$previous.'">previous</a></button>';
                }
                if ($chosen_case_study < CASE_STUDIES_NUMBER ) {
                    echo '<button><a type="button" class="button blue" href="case_study.php?id_case_study='.$next.'">next</a></button>';
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