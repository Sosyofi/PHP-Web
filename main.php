<?php
    include_once 'header.php';
    include_once 'includes/search.inc.php';
   require_once 'includes/db_function.php';
    /*getInstagramUser('bestami_sarikaya');*/
    session_start();
    ?>
    <link rel="stylesheet" href="styles/main_page/desktop_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/main_page/laptop_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/main_page/tablet_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="styles/main_page/mobile_style.css?v=<?php echo time();?>">
</head>
<body>
    <article class="main">
        <a class="logout-a" href="includes/logout.inc.php">
            <div class="logout-div"></div>
        </a>
        <section class="main-page">
            <section class="followers-page-section">
            <form class="search-form-desktop" method="GET">
                    <input class="search-user" type="text" name="searchuser" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
</form>
<section class='search-result-section'>
<?php
   if($nickname !== null && !empty($nickname)){?>
<a href="main.php" class='close-result'></a>
<?php   
}
   foreach($nickname as $item){?>
        <div class="search-result-div" >
        <a href="user_profile.php?username=<?php echo $item['nickname'] ?>&platform=Unsplash" >
    <?php echo $item['nickname'] ?>
            </a>
        </div>
<?php
}
?>
</section>
                <section class="social-media-filter-section">
                <?php    
                if(isset($_GET['filter'])){
                    if($_GET['filter'] == 'twitch'){
                        echo '
                        <a class="filter-twitch" href="?">Temizle</a>
                        <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                        <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                        <a class="filter-twitter" href="?filter=twitter">Twitter</a>
                        ';
                    } elseif ($_GET['filter'] == 'instagram') {
                        echo '
                        <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                        <a class="filter-instagram" href="?">Temizle</a>
                        <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                        <a class="filter-twitter" href="?filter=twitter">Twitter</a>
                        ';
                    } elseif ($_GET['filter'] == 'unsplash') {
                        echo '
                        <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                        <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                        <a class="filter-unsplash" href="?">Temizle</a>
                        <a class="filter-twitter" href="?filter=twitter">Twitter</a>
                        ';
                    } elseif ($_GET['filter'] == 'twitter') {
                        echo '
                        <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                        <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                        <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                        <a class="filter-twitter" href="?">Temizle</a>
                        ';
                    } elseif ($_GET['filter'] !== 'twitch' && $_GET['filter'] !== 'instagram' && $_GET['filter'] !== 'unsplash' && $_GET['filter'] !== 'twitter'){
                        echo '
                        <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                        <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                        <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                        <a class="filter-twitter" href="?filter=twitter">Twitter</a>
                        ';
                    }
                }else{
                    echo '
                    <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                    <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                    <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                    <a class="filter-twitter" href="?filter=twitter">Twitter</a>
                    ';
                }
                ?>
                    
                </section>

                <section class="followers-tamplate-section">
                <?php 
                    foreach(getMyUsers() as $item) { 
                        $tmp = getUser($item['follower_id']); 
                        if(isset($_GET['filter'])){
                            if($_GET['filter'] == 'instagram' && $tmp->instagram !== null){
                                ?>
                        <div class="followers-tamplate-div">
                        <section class="followers-info-section">
                            <div class="photo-a">
                                <section class="followers-info-pic">
                                    <div class="follower-pp-background">
                                        <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                    </div>
                                </section>
                                    </div>
                            <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                            <section class="followers-info-foll">
                                <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                <p class="followers-info-foll-text">takipçi</p>
                            </section>
                            <section class="followers-info-mobile">
                                <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                <section class="followers-info-foll-mobile">
                                    <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                    <p class="followers-info-foll-text">takipçi</p>
                                </section>
                            </section>
                        </section>
                        <?php
                        if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                            echo '
                            <section class="followers-social-media-section-4-desktop">
                            <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                            <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                            <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                            <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                             </section>
                             <section class="followers-social-media-section-4">
                            <div class="followers-social-media-4">
                                <a class="followers-twitch-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                <a class="followers-instagram-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                            </div>
                            <div class="followers-social-media-4">
                                <a class="followers-unsplash-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                <a class="followers-twitter-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                            </div>
                            </section>
                            ';
                        } else {
                            echo '
                            <section class="followers-social-media-section">
                            ';
                            if($tmp->twitch !== null){
                                echo '
                                <a class="followers-twitch" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                ';
                            }
                            if($tmp->instagram !== null){
                                echo '
                                <a class="followers-instagram" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                ';
                            }
                            if($tmp->unsplash !== null){
                                echo '
                                <a class="followers-unsplash" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                ';
                            }
                            if($tmp->twitter !== null){
                                echo '
                                <a class="followers-twitter" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                ';
                            }
                           echo '
                             </section>
                            ';
                        }
                        ?>
                        
                    </div>
                    <?php
                            
                             }
                            elseif ($_GET['filter'] == 'twitter' && $tmp->twitter !== null) { 
                                ?>
                        <div class="followers-tamplate-div">
                        <section class="followers-info-section">
                            <div class="photo-a">
                                <section class="followers-info-pic">
                                    <div class="follower-pp-background">
                                    <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                    </div>
                                </section>
                                    </div>
                            <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                            <section class="followers-info-foll">
                                <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                <p class="followers-info-foll-text">takipçi</p>
                            </section>
                            <section class="followers-info-mobile">
                                <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                <section class="followers-info-foll-mobile">
                                    <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                    <p class="followers-info-foll-text">takipçi</p>
                                </section>
                            </section>
                        </section>
                        <?php
                        if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                            echo '
                            <section class="followers-social-media-section-4-desktop">

                            <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                            echo $tmp->nickname;
                             echo '&platform=Twitch">Twitch</a>

                            <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                            echo $tmp->nickname;
                             echo '&platform=Instagram">Instagram</a>


                            <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                            echo $tmp->nickname;
                             echo '&platform=Unsplash">Unsplash</a>


                            <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                            echo $tmp->nickname;
                             echo '&platform=Twitter">Twitter</a>


                             </section>
                             <section class="followers-social-media-section-4">
                            <div class="followers-social-media-4">
                                <a class="followers-twitch-4" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Twitch">Twitch</a>
                                <a class="followers-instagram-4" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Instagram">Instagram</a>
                            </div>
                            <div class="followers-social-media-4">
                                <a class="followers-unsplash-4" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Unsplash">Unsplash</a>
                                <a class="followers-twitter-4" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Twitter">Twitter</a>
                            </div>
                            </section>
                            ';
                        } else {
                            echo '
                            <section class="followers-social-media-section">
                            ';
                            if($tmp->twitch !== null){
                                echo '
                                <a class="followers-twitch" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Twitch">Twitch</a>
                                ';
                            }
                            if($tmp->instagram !== null){
                                echo '
                                <a class="followers-instagram" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Instagram">Instagram</a>
                                ';
                            }
                            if($tmp->unsplash !== null){
                                echo '
                                <a class="followers-unsplash" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Unsplash">Unsplash</a>
                                ';
                            }
                            if($tmp->twitter !== null){
                                echo '
                                <a class="followers-twitter" href="user_profile.php?username=';
                                echo $tmp->nickname;
                                 echo '&platform=Twitter">Twitter</a>
                                ';
                            }
                           echo '
                             </section>
                            ';
                        }
                        ?>
                        
                    </div>
                    <?php
                            
                             } elseif ($_GET['filter'] == 'twitch' && $tmp->twitch !== null) { 
                                ?>
                                <div class="followers-tamplate-div">
                                <section class="followers-info-section">
                                    <div class="photo-a">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                            <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                            </div>
                                        </section>
                                    </div>
                                    <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                                    <section class="followers-info-foll">
                                        <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                        <p class="followers-info-foll-text">takipçi</p>
                                    </section>
                                    <section class="followers-info-mobile">
                                        <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                        <section class="followers-info-foll-mobile">
                                            <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                            <p class="followers-info-foll-text">takipçi</p>
                                        </section>
                                    </section>
                                </section>
                                <?php
                                if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                                    echo '
                                    <section class="followers-social-media-section-4-desktop">
                                    <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                        <a class="followers-instagram-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Instagram">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                        <a class="followers-twitter-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Instagram">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                        ';
                                    }
                                   echo '
                                     </section>
                                    ';
                                }
                                ?>
                                
                            </div>
                            <?php
                                    
                             } elseif ($_GET['filter'] == 'unsplash' && $tmp->unsplash !== null) {
                                ?>
                                <div class="followers-tamplate-div">
                                <section class="followers-info-section">
                                    <div class="photo-a">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                            <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                            </div>
                                        </section>
                                    </div>
                                    <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                                    <section class="followers-info-foll">
                                        <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                        <p class="followers-info-foll-text">takipçi</p>
                                    </section>
                                    <section class="followers-info-mobile">
                                        <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                        <section class="followers-info-foll-mobile">
                                            <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                            <p class="followers-info-foll-text">takipçi</p>
                                        </section>
                                    </section>
                                </section>
                                <?php
                                if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                                    echo '
                                    <section class="followers-social-media-section-4-desktop">
                                    <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                        <a class="followers-instagram-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Instagram">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                        <a class="followers-twitter-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Instagram">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                        ';
                                    }
                                   echo '
                                     </section>
                                    ';
                                }
                                ?>
                                
                            </div>
                            <?php
                                    
                            } elseif ($_GET['filter'] !== 'instagram' && $_GET['filter'] !== 'twitter' && $_GET['filter'] !== 'twitch' && $_GET['filter'] !== 'unsplash') {
                                ?>
                                <div class="followers-tamplate-div">
                                <section class="followers-info-section">
                                    <div class="photo-a">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                            <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                            </div>
                                        </section>
                                    </div>
                                    <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                                    <section class="followers-info-foll">
                                        <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                        <p class="followers-info-foll-text">takipçi</p>
                                    </section>
                                    <section class="followers-info-mobile">
                                        <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                        <section class="followers-info-foll-mobile">
                                            <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                            <p class="followers-info-foll-text">takipçi</p>
                                        </section>
                                    </section>
                                </section>
                                <?php
                                if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                                    echo '
                                    <section class="followers-social-media-section-4-desktop">
                                    <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitch">Twitch</a>
                                        <a class="followers-instagram-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Instagram">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Unsplash">Unsplash</a>
                                        <a class="followers-twitter-4" href="user_profile.php?username=';
                                        echo $tmp->nickname;
                                         echo '&platform=Twitter">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                        ';
                                    }
                                   echo '
                                     </section>
                                    ';
                                }
                                ?>
                                
                            </div>
                            <?php
                                    
                            }
                         } else { ?>
                            <div class="followers-tamplate-div">
                            <section class="followers-info-section">
                                <div class="photo-a">
                                    <section class="followers-info-pic">
                                        <div class="follower-pp-background">
                                        <?php
                                        if($tmp->picture !== null){
                                            echo '<img class="follower-pp" src="data:image/png;base64,'.base64_encode($tmp->picture).'"/>';
                                        }else{
                                            echo '<img class="follower-pp" src="imgs/user.png"/>';
                                        }
                                            
                                        ?>
                                        </div>
                                    </section>
                                    </div>
                                <p class="followers-info-user-name"> <?php echo $tmp->nickname ?> </p>
                                <section class="followers-info-foll">
                                    <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                    <p class="followers-info-foll-text">takipçi</p>
                                </section>
                                <section class="followers-info-mobile">
                                    <p class="followers-info-user-name-mobile"><?php echo $tmp->nickname ?> </p>
                                    <section class="followers-info-foll-mobile">
                                        <p class="followers-info-foll-num"><?php echo getFollowersCount($tmp->id) ?></p>
                                        <p class="followers-info-foll-text">takipçi</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            if($tmp->instagram !== null && $tmp->twitter !== null && $tmp->twitch !== null && $tmp->unsplash !== null){
                                echo '
                                <section class="followers-social-media-section-4-desktop">
                                <a class="followers-twitch-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                <a class="followers-instagram-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                <a class="followers-unsplash-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                <a class="followers-twitter-4-desktop" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                 </section>
                                 <section class="followers-social-media-section-4">
                                <div class="followers-social-media-4">
                                    <a class="followers-twitch-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                    <a class="followers-instagram-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                </div>
                                <div class="followers-social-media-4">
                                    <a class="followers-unsplash-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                    <a class="followers-twitter-4" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                </div>
                                </section>
                                ';
                            } else {
                                echo '
                                <section class="followers-social-media-section">
                                ';
                                if($tmp->twitch !== null){
                                    echo '
                                    <a class="followers-twitch" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitch">Twitch</a>
                                    ';
                                }
                                if($tmp->instagram !== null){
                                    echo '
                                    <a class="followers-instagram" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Instagram">Instagram</a>
                                    ';
                                }
                                if($tmp->unsplash !== null){
                                    echo '
                                    <a class="followers-unsplash" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Unsplash">Unsplash</a>
                                    ';
                                }
                                if($tmp->twitter !== null){
                                    echo '
                                    <a class="followers-twitter" href="user_profile.php?username=';
                                    echo $tmp->nickname;
                                     echo '&platform=Twitter">Twitter</a>
                                    ';
                                }
                               echo '
                                 </section>
                                ';
                            }
                            ?>
                            
                        </div>
                        <?php
                                 }
                     } ?>
                    
                </section>
            </section>
        </section>
        <section class="laptop-search">
            <section class="search-form">
                <form class="search-form-laptop" action="#" method="post">
                    <input class="search-user" type="text" name="search-user" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
                </form>
            </section>
            <section class="my-profile-info-section">

                <section class="my-profile-info-header">
                    <p class="my-profile-p">Hoşgeldin!</p>
                    <div class="my-info-pic-div">
                        <a class="my-pp-background" href="./my_profile.php?user=<?php echo $_SESSION['username'] ?>">
                        
                            <div class="my-pp-background">
                                <?php
                                
                                if(getMyInfo()->picture !== null){
                                    echo '<img class="my-pp" src="data:image/png;base64,'.base64_encode(getMyInfo()->picture).'">
                                    <div class="my-pp-p-div">
                                            <p class="my-pp-p">Profil</p>
                                    </div>
                                    </img>';
                                }else{
                                    echo '<img class="my-pp" src="imgs/user.png">
                                    <div class="my-pp-p-div">
                                            <p class="my-pp-p">Profil</p>
                                    </div>
                                </img>';
                                }
                                    
                                
                                
                                ?>
                            </div>
                        </a>
                    </div>
                    <p class="my-user-name"><?php echo getMyInfo()->nickname ; ?></p>
                </section>
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
                <section class="my-profile-info-bio-section">
                    <p class="my-profile-bio"><?php echo getMyInfo()->bio ?></p>
                </section>
            </section>
        </section>
        </section>
        <section class="bg-section">
            <div class="bg-color"></div>
        </section>
