    <?php
    session_start();
    ?>

    <link rel="stylesheet" href="styles/main_page/desktop_style.css<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/main_page/laptop_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/main_page/tablet_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/main_page/mobile_style.css?v=<?php echo time(); ?>">
</head>
<body>
    <article class="main">
        <p><?php echo $_SESSION["userid"]; ?></p>
        <a href="includes/logout.inc.php">çıkış yap</a>
        <p>asdasdasd</p>
