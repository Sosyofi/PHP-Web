    <link rel="stylesheet" href="styles/login_signup/desktop_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/login_signup/laptop_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/login_signup/tablet_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/login_signup/mobile_style.css?v=<?php echo time(); ?>">
</head>
<body>
    <article class="main">
<section class="login-main-section">
            <section class="info-section">
                <div class="info-div">
                    <section class="info-h1-section">
                        <h1 class="info-h1-text">merhaba</h1>
                        <h1 class="info-h1-dot">.</h1>
                    </section>
                    <section class="info-socialmedia-section">
                        <div class="info-socialmedia-div">
                            <div class="info-socialmedia-circle"></div>
                            <div class="info-socialmedia-f-line-div">
                                <div class="info-socialmedia-f-line"></div>
                            </div>
                            <div class="info-socialmedia-s-line-div">
                                <div class="info-socialmedia-s-line"></div>
                            </div>
                            <div class="info-socialmedia-unsplash-div">
                                <div class="info-socialmedia-unsplash"></div>
                            </div>
                            <div class="info-socialmedia-instagram"></div>
                            <div class="info-socialmedia-twitch"></div>
                            <div class="info-socialmedia-twitter"></div>
                        </div>
                    </section>
                    <section class="info-text-section">
                        <div class="info-text-div">
                            <p class="info-p-text">Platformlar yerine sevdiğin kişiyi takip et veya senin tüm
                                hesaplarını
                                tek
                                bir yerden takip etsinler</p>
                        </div>

                    </section>
                </div>
            </section>
            <section class="form-section">
                <div class="form-div">
                    <section class="form-text-section">
                    <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "login"){
                                echo '
                                <p class="form-f-text">Tekrar Hoşgeldin ❤️</p>
                                ';
                            } elseif ($_GET['page'] == "step2") {
                                echo '
                                <p class="form-f-text">Seni aramızda görmek için sabırsızlanıyoruz 😁</p>
                                ';
                            }
                        }else{
                            echo '
                            <p class="form-f-text">Seni aramızda görmek için sabırsızlanıyoruz 😁</p>
                             <p class="form-s-text">1 dk’dan kısa sürede kayıt olabilirsin</p>
                            ';
                        }
                        ?>
                        
                    </section>
                    <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "login"){
                                echo '
                                <form action="includes/login.inc.php" method="post">
                                ';
                            }elseif ($_GET['page'] == "step2") {
                                echo '
                            <form action="includes/signup.inc.php" method="post">
                            ';
                            }
                        }else{
                            echo '
                            <form action="includes/signup.inc.php" method="post">
                            ';
                        }
                        ?>
                    
                    <section class="form-input">
                        <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "step2"){
                                echo '
                                <input type="text" class="form-text-input" placeholder="Kullanıcı Adı" name="nickname">
                                <input type="text" class="form-text-input" placeholder="İsim" name="first_name">
                                <input type="text" class="form-text-input" placeholder="Soyisim" name="last_name">
                                <input type="hidden" name="page" value="2">';
                            }
                            elseif ($_GET['page'] == "login") {
                                echo '
                                <input type="text" class="form-text-input" placeholder="Email" name="email">
                                <input type="password" class="form-text-input" placeholder="Parola" name="hashed_password">
                                ';
                            }
                        }
                        else{
                            echo '
                            <input type="text" class="form-text-input" placeholder="Email" name="email">
                            <input type="password" class="form-text-input" placeholder="Parola" name="hashed_password">
                            <input type="hidden" name="page" value="1">';
                        }
                        ?>

                        <?php
                        if(isset($_GET['error'])){
                            if($_GET['error'] == 'emptyForm' && $_GET['error'] !== 'login'){
                                echo'<p class="main-form-error" >Tüm alanları doldurunuz!</p>';
                            }
                            elseif ($_GET['error'] == 'invalidEmail' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Geçerli bir email giriniz!</p>';
                            }
                            elseif ($_GET['error'] == 'epostataken' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Email sisteme kayıtlı lütfen giriş yapınız!</p>';
                            }
                            elseif ($_GET['error'] == 'emptyinput' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Tüm alanları doldurunuz!</p>';
                            }
                            elseif ($_GET['error'] == 'invalidName' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Geçerli bir isim giriniz!</p>';
                            }
                            elseif ($_GET['error'] == 'invalidSurName' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Geçerli bir soyisim giriniz!</p>';
                            }
                            elseif ($_GET['error'] == 'nicknametaken' && $_GET['error'] !== 'login') {
                                echo '<p class="main-form-error" >Farklı bir kullanıcı adı seçiniz!</p>';
                            }

                            
                            elseif ($_GET['error'] == 'wronglogin' && $_GET['page'] == 'login') {
                                echo '<p class="main-form-error" >Kullanıcı Kaydı Bulunmamakta!</p>';
                            }
                            elseif ($_GET['error'] == 'emptyinput' && $_GET['page'] == 'login') {
                                echo '<p class="main-form-error" >Boş Alanları Doldurunuz!</p>';
                            }
                            elseif ($_GET['error'] == 'wrongPwd' && $_GET['page'] == 'login') {
                                echo '<p class="main-form-error" >Hatalı Şifre!</p>';
                            }
                            elseif ($_GET['error'] == 'invalidEmail' && $_GET['page'] == 'login') {
                                echo '<p class="main-form-error" >Geçerli Bir E-posta Adresi Giriniz!</p>';
                            }
                        }
                        ?>
                    
                        <button class="main-form-submit" type="submit" name="submit"> 
                        <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "login"){
                                echo '
                                Hoş Geldin
                                ';
                            } elseif ($_GET['page'] == "step2") {
                                echo '
                                Tamamdır
                                ';
                            }
                        }else{
                            echo '
                            Tamamdır
                            ';
                        }
                        ?>
                        </button>
                    </section>
                    </form>
                    <section class="form-login-section">
                        <div class="form-login-div">
                        <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "login"){
                                echo '
                                <p class="form-login-p">Hesabın yok mu?</p>
                            <a class="form-login-a" href="index.php">Kayıt ol!</a>
                                ';
                            }elseif ($_GET['page'] == "step2") {
                                echo '
                            <p class="form-login-p">Hesabın mı var?</p>
                            <a class="form-login-a" href="index.php?page=login">Giriş yap!</a>
                            ';
                            }
                        }else{
                            echo '
                            <p class="form-login-p">Hesabın mı var?</p>
                            <a class="form-login-a" href="index.php?page=login">Giriş yap!</a>
                            ';
                        }
                        ?>
                            
                        </div>

                    </section>
                </div>
                <div class="form-bg-color"></div>
            </section>
        </section>
        <section class="bg-colors">
            <div class="main-bg-color"></div>
            <?php
                        if (isset($_GET['page'])) {
                            if($_GET['page'] == "login"){
                                echo '
                                <div style="background-color: rgba(41, 204, 255, 1);" class="main-f-circle"></div>
                               
                                ';
                            }elseif ($_GET['page'] == "step2") {
                                echo '
                                <div style="background-color: rgba(255, 41, 41, 1);" class="main-f-circle"></div>
                                
                            ';
                            }
                        }else{
                            echo '
                            <div style="background-color: rgba(255, 144, 41, 1);" class="main-f-circle"></div>
                            
                            ';
                        }
                        ?>
                        <div style="background-color: rgba(63, 0, 113, 1);" class="main-s-circle"></div>
        </section>