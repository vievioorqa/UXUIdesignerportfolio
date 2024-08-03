<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="static_images/logo-square.png" type="image/png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/contact.css">
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
    <title>Contact | Patrycja Bobowska</title>
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

    <main>
        <h1>Contact</h1>
        <div class="contact_container">
            <div class="photo-description_container">
                <img src="static_images/profilowe.jpg" alt="" class="my-photo">
                <p>Patrycja Bobowska</p>
            </div>
            <div class="call-email_container">
                <div class="call-me_container">
                    <h2>Call&nbsp;me</h2>
                    <p class="body-bold">+48&nbsp;395&nbsp;021&nbsp;953</p>
                </div>
                <div class="email_container">
                    <h2>E-mail me</h2>
                    <p class="body-bold">patrycja.bobowska@student.uj.edu.pl</p>
                    <?php
                    $notification = '';
                    $notificationClass = '';
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                        $message = htmlspecialchars($_POST['message']);
                        
                        // Recipient email
                        $to = "patrycja.bobowska@student.uj.edu.pl";
                        $subject = "New Message from Contact Form";
                        
                        // Email headers
                        $headers = "From: " . $email . "\r\n";
                        $headers .= "Reply-To: " . $email . "\r\n";
                        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                        
                        // Email body
                        $body = "<p><strong>Email:</strong> {$email}</p>
                                <p><strong>Message:</strong></p>
                                <p>{$message}</p>";
                        
                        // Send email
                        if (mail($to, $subject, $body, $headers)) {
                            $notification = "Message sent successfully!";
                            $notificationClass = 'notification success';
                        } else {
                            $notification = "Failed to send message. Please try again later.";
                            $notificationClass = 'notification error';
                        }
                    }
                    ?>
                    <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="your-email">
                            <label for="email">your&nbsp;email:</label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                        <div class="your-message">
                            <label for="message">your&nbsp;message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="button_container">
                            <input type="submit" value="send" class="button">
                        </div>
                    </form>

                    <?php if ($notification): ?>
                    <div id="notification" class="<?php echo $notificationClass; ?> body-italic notification-style">
                        <?php echo $notification; ?>
                    </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>© Patrycja Bobowska 2024, all rights reserved</p>
    </footer>
    
    <script src="scripts/dark-mode.js"></script>
    <script src="scripts/text-increase.js"></script>
</body>
</html>