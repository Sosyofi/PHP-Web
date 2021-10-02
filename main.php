    <?php
   include_once 'header.php';
   require_once 'includes/db_function.php';
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
                <form class="search-form-desktop" action="#" method="post">
                    <input class="search-user" type="text" name="search-user" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
                </form>
                <section class="social-media-filter-section">
                    <a class="filter-twitch" href="?filter=twitch">Twitch</a>
                    <a class="filter-instagram" href="?filter=instagram">Instagram</a>
                    <a class="filter-unsplash" href="?filter=unsplash">Unsplash</a>
                    <a class="filter-twitter" href="?filter=twitter">Twitter</a>
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
                            <a class="photo-a" href="#">
                                <section class="followers-info-pic">
                                    <div class="follower-pp-background">
                                        <div class="follower-pp"></div>
                                    </div>
                                </section>
                            </a>
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
                            <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                            <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                            <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                            <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                             </section>
                             <section class="followers-social-media-section-4">
                            <div class="followers-social-media-4">
                                <a class="followers-twitch-4" href="#">Twitch</a>
                                <a class="followers-instagram-4" href="#">Instagram</a>
                            </div>
                            <div class="followers-social-media-4">
                                <a class="followers-unsplash-4" href="#">Unsplash</a>
                                <a class="followers-twitter-4" href="#">Twitter</a>
                            </div>
                            </section>
                            ';
                        } else {
                            echo '
                            <section class="followers-social-media-section">
                            ';
                            if($tmp->twitch !== null){
                                echo '
                                <a class="followers-twitch" href="#">Twitch</a>
                                ';
                            }
                            if($tmp->instagram !== null){
                                echo '
                                <a class="followers-instagram" href="#">Instagram</a>
                                ';
                            }
                            if($tmp->unsplash !== null){
                                echo '
                                <a class="followers-unsplash" href="#">Unsplash</a>
                                ';
                            }
                            if($tmp->twitter !== null){
                                echo '
                                <a class="followers-twitter" href="#">Twitter</a>
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
                            <a class="photo-a" href="#">
                                <section class="followers-info-pic">
                                    <div class="follower-pp-background">
                                        <div class="follower-pp"></div>
                                    </div>
                                </section>
                            </a>
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
                            <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                            <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                            <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                            <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                             </section>
                             <section class="followers-social-media-section-4">
                            <div class="followers-social-media-4">
                                <a class="followers-twitch-4" href="#">Twitch</a>
                                <a class="followers-instagram-4" href="#">Instagram</a>
                            </div>
                            <div class="followers-social-media-4">
                                <a class="followers-unsplash-4" href="#">Unsplash</a>
                                <a class="followers-twitter-4" href="#">Twitter</a>
                            </div>
                            </section>
                            ';
                        } else {
                            echo '
                            <section class="followers-social-media-section">
                            ';
                            if($tmp->twitch !== null){
                                echo '
                                <a class="followers-twitch" href="#">Twitch</a>
                                ';
                            }
                            if($tmp->instagram !== null){
                                echo '
                                <a class="followers-instagram" href="#">Instagram</a>
                                ';
                            }
                            if($tmp->unsplash !== null){
                                echo '
                                <a class="followers-unsplash" href="#">Unsplash</a>
                                ';
                            }
                            if($tmp->twitter !== null){
                                echo '
                                <a class="followers-twitter" href="#">Twitter</a>
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
                                    <a class="photo-a" href="#">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                                <div class="follower-pp"></div>
                                            </div>
                                        </section>
                                    </a>
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
                                    <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="#">Twitch</a>
                                        <a class="followers-instagram-4" href="#">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="#">Unsplash</a>
                                        <a class="followers-twitter-4" href="#">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="#">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="#">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="#">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="#">Twitter</a>
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
                                    <a class="photo-a" href="#">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                                <div class="follower-pp"></div>
                                            </div>
                                        </section>
                                    </a>
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
                                    <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="#">Twitch</a>
                                        <a class="followers-instagram-4" href="#">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="#">Unsplash</a>
                                        <a class="followers-twitter-4" href="#">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="#">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="#">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="#">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="#">Twitter</a>
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
                                    <a class="photo-a" href="#">
                                        <section class="followers-info-pic">
                                            <div class="follower-pp-background">
                                                <div class="follower-pp"></div>
                                            </div>
                                        </section>
                                    </a>
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
                                    <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                                    <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                                    <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                                    <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                                     </section>
                                     <section class="followers-social-media-section-4">
                                    <div class="followers-social-media-4">
                                        <a class="followers-twitch-4" href="#">Twitch</a>
                                        <a class="followers-instagram-4" href="#">Instagram</a>
                                    </div>
                                    <div class="followers-social-media-4">
                                        <a class="followers-unsplash-4" href="#">Unsplash</a>
                                        <a class="followers-twitter-4" href="#">Twitter</a>
                                    </div>
                                    </section>
                                    ';
                                } else {
                                    echo '
                                    <section class="followers-social-media-section">
                                    ';
                                    if($tmp->twitch !== null){
                                        echo '
                                        <a class="followers-twitch" href="#">Twitch</a>
                                        ';
                                    }
                                    if($tmp->instagram !== null){
                                        echo '
                                        <a class="followers-instagram" href="#">Instagram</a>
                                        ';
                                    }
                                    if($tmp->unsplash !== null){
                                        echo '
                                        <a class="followers-unsplash" href="#">Unsplash</a>
                                        ';
                                    }
                                    if($tmp->twitter !== null){
                                        echo '
                                        <a class="followers-twitter" href="#">Twitter</a>
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
                                <a class="photo-a" href="#">
                                    <section class="followers-info-pic">
                                        <div class="follower-pp-background">
                                            <div class="follower-pp"></div>
                                        </div>
                                    </section>
                                </a>
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
                                <a class="followers-twitch-4-desktop" href="#">Twitch</a>
                                <a class="followers-instagram-4-desktop" href="#">Instagram</a>
                                <a class="followers-unsplash-4-desktop" href="#">Unsplash</a>
                                <a class="followers-twitter-4-desktop" href="#">Twitter</a>
                                 </section>
                                 <section class="followers-social-media-section-4">
                                <div class="followers-social-media-4">
                                    <a class="followers-twitch-4" href="#">Twitch</a>
                                    <a class="followers-instagram-4" href="#">Instagram</a>
                                </div>
                                <div class="followers-social-media-4">
                                    <a class="followers-unsplash-4" href="#">Unsplash</a>
                                    <a class="followers-twitter-4" href="#">Twitter</a>
                                </div>
                                </section>
                                ';
                            } else {
                                echo '
                                <section class="followers-social-media-section">
                                ';
                                if($tmp->twitch !== null){
                                    echo '
                                    <a class="followers-twitch" href="#">Twitch</a>
                                    ';
                                }
                                if($tmp->instagram !== null){
                                    echo '
                                    <a class="followers-instagram" href="#">Instagram</a>
                                    ';
                                }
                                if($tmp->unsplash !== null){
                                    echo '
                                    <a class="followers-unsplash" href="#">Unsplash</a>
                                    ';
                                }
                                if($tmp->twitter !== null){
                                    echo '
                                    <a class="followers-twitter" href="#">Twitter</a>
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
                        <a class="my-pp-background" href="#">
                            <div class="my-pp-background">
                                <div class="my-pp">
                                    <div class="my-pp-p-div">
                                        <p class="my-pp-p">Profil</p>
                                    </div>

                                </div>
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
