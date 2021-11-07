<?php
   include_once 'header.php';
   require_once 'includes/db_function.php';
   $userinfo = getMyInfo();
   session_start();
    ?>
    <link rel="stylesheet" href="styles/my-profile/desktop_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/my-profile/laptop_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/my-profile/tablet_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/my-profile/mobile_style.css?v=<?php echo time();?>">
</head>
<body>
    <article class="main">
        <a class="logout-a" href="main.php">
            <div class="logout-div"></div>
        </a>
         <section class="search-form">
                <form class="search-form-desktop" action="#" method="post">
                    <input class="search-user" type="text" name="search-user" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
                </form>
            </section>
            <form class="form" action="includes/my_profile.inc.php" method="post" enctype="multipart/form-data">
        <section class="profile-section">
            
                <section class="my-profile-info-section">
                    <div class="my-info-section">
                        <div class="my-info-static-div">
                        <div class="my-info-pic-div">
                        
                        <label for="file-upload" class="my-pp-background">
                            <div class="my-pp-background">
                            <input class="file-input" type="file" name="image" id="file-upload">
                                <?php
                                if($userinfo->picture !== null){
                                    echo '<img class="my-pp" src="data:image/png;base64,'.base64_encode($userinfo ->picture).'">
                                    <div class="my-pp-p-div">
                                            <p class="my-pp-p">Resmi Değiştir</p>
                                    </div>
                                    </img>';
                                }else{
                                    echo '<img class="my-pp" src="imgs/user.png">
                                    <div class="my-pp-p-div">
                                            <p class="my-pp-p">Resmi Değiştir</p>
                                    </div>
                                </img>';
                                }
                                ?>
                            </div>
                        </label>
                    </div>
                        </div>
                    
                    <section class="my-profile-info-followers-section">
                    <div class="followers-div">
                        <p class="followers-count"><?php echo getMyFollowersCount() ?></p>
                        <p class="followers-text">takipçi</p>
                    </div>
                    <div class="follow-div">
                        <p class="follow-count"><?php echo getMyFollowed() ?></p>
                        <p class="followers-text">takip</p>
                    </div>

                </section>
                    </div>
                 
                </section>
                <section class="profile-form-section">
                    <div class="profile-form-div">
                    <div class="bio-div">
                        <h1 class="bio-text-h1">
                            Bio
                        </h1>
                        <input type="text" name="bio" class="profile-bio-text" value="<?php echo $userinfo->bio; ?>">
                    </div>
                        <div class="form-div">
                            <div class="input-div">
                                <p class="input-text">Twitch</p>
                                <input class="social-media-input" type="text" name="twitchUN" value="<?php echo $userinfo->twitch;?>">
                            </div>
                            <div class="input-div">
                                <p class="input-text">Unsplash</p>
                                <input class="social-media-input" type="text" name="unsplashUN" value="<?php echo $userinfo->unsplash;?>">
                            </div>
                            <div class="input-div">
                                <p class="input-text">Instagram</p>
                                <input class="social-media-input" type="text" name="instagramUN" value="<?php echo $userinfo->instagram;?>">
                            </div>
                            <div class="input-div">
                                <p class="input-text">Twitter</p>
                                <input class="social-media-input" type="text" name="twitterUN" value="<?php echo $userinfo->twitter;?>">
                            </div>
                            <button class="submit-button" type="submit" name="submit">Güncelle</button>
                        </div>
                    </div>
                </section>
           
        </section>
        </form>
        <div class="bg-text-div">
            <p class="bg-text">Merhaba <?php echo $userinfo->nickname ?></p>
        </div>
        <section class="bg-section">
            <div class="bg-color">
            </div>
        </section>