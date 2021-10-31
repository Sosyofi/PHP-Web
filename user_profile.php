<?php
  session_start();
    if(isset($_SESSION['userid'])){
        if(isset($_GET['platform'])){
            if($_GET['platform'] == "Twitter" || $_GET['platform'] == "Twitch" || $_GET['platform'] == "Instagram" || $_GET['platform'] == "Unsplash"){
                include_once 'header.php';
                require_once 'includes/db_function.php';
                require_once 'includes/entity/unsplash/unsplash.php';
                $user = getUserUN($_GET['username']);
                ?>
                 <link rel="stylesheet" href="styles/users-profile/desktop_style.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="styles/users-profile/laptop_style.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="styles/users-profile/tablet_style.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="styles/users-profile/mobile_style.css?v=<?php echo time();?>">
    </head>
    <body>
    <article class="main">
        <a class="logout-a" href="main.php">
            <div class="logout-div"></div>
        </a>
        <section class="main-page">
        <div class="search-select-div">
                <form class="search-form-desktop" action="#" method="post">
                   
                    <input class="search-user" type="text" name="search-user" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
                </form>
                
                    <?php
                    if( $_GET['platform'] == "Twitch"){?>
                    <div class="change-social-media-div">
                        <a class="left-a" href="?username=<?php echo $user->nickname ?>&platform=Twitter">
                        <div class="logout-div"></div>
                        </a>
                         <p class="social-media-name"><?php echo $_GET['platform'] ?></p>
                         <a class="right-a" href="?username=<?php echo $user->nickname ?>&platform=Instagram">
                        <div class="logout-div"></div>
                         </a>
                         </div>
                         </div>
                        <?php
                        if($user->twitch !== null){
                            if(getTwitchLiveStatus($user->twitch) == "live"){?>
                                <section class="twitch-embed-section" >
                                    <div class="twitch-embed-bg">
                                    <div id="twitch-embed" class="twitch-embed-div"></div>
                                    </div>
                                
                                <script src="https://embed.twitch.tv/embed/v1.js"></script>

                                <script type="text/javascript">
                                new Twitch.Embed("twitch-embed", {
                                    name: "asdas",
                                    width: "100%",
                                    height: "100%",
                                    channel: "<?php echo strtolower($user->twitch)?>",
                                    parent: ["embed.example.com", "othersite.example.com"]
                                });
                                </script>
                                </section>
                                <section class="twitch-bg">
                                    <div class="twitch-logo"></div>
                                    <p class="twitch-bg-text">Ne kadar şanslısın!</p>
                                </section>
                        
                        <?php
                            }
                            else{
                                ?>
                                <section class="twitch-embed-section" >
                                    <div class="twitch-embed-bg">
                                    <div id="twitch-embed" class="twitch-embed-div"></div>
                                    </div>
                                
                                <script src="https://embed.twitch.tv/embed/v1.js"></script>

                                <script type="text/javascript">
                                new Twitch.Embed("twitch-embed", {
                                    name: "asdas",
                                    width: "100%",
                                    height: "100%",
                                    channel: "<?php echo strtolower($user->twitch)?>",
                                    parent: ["embed.example.com", "othersite.example.com"]
                                });
                                </script>
                                </section>
                                <section class="twitch-bg">
                                    <div class="twitch-logo"></div>
                                    <p class="twitch-bg-text">Ne kadar şanslısın!</p>
                                </section>
                        
                                <section class="twitch-bg">
                                    <div class="twitch-logo"></div>
                                    <p class="twitch-bg-text">Bir dahaki sefere</p>
                                </section>

                                 <?php
                            }
                            ?>
                             
                        <?php
                         }else{
                             echo 'hesap bulunamadı';
                         }
                    } elseif ($_GET['platform'] == "Instagram") {?>
                    <div class="change-social-media-div">
                        <a class="left-a" href="?username=<?php echo $user->nickname ?>&platform=Twitch">
                            <div class="logout-div"></div>
                        </a>
                        <p class="social-media-name"><?php echo $_GET['platform'] ?></p>
                        <a class="right-a" href="?username=<?php echo $user->nickname ?>&platform=Unsplash">
                            <div class="logout-div"></div>
                        </a>
                    </div>
                    </div>
                    <?php
                    if($user->instagram !== null){
                       echo 'hesap bulunmakta';
                    }else{
                        echo 'hesap bulunamadı';
                    }
                    } elseif ( $_GET['platform'] == "Unsplash") {?>
                    <div class="change-social-media-div">
                        <a class="left-a" href="?username=<?php echo $user->nickname ?>&platform=Instagram">
                        <div class="logout-div"></div>
                        </a>
                         <p class="social-media-name"><?php echo $_GET['platform'] ?></p>
                         <a class="right-a" href="?username=<?php echo $user->nickname ?>&platform=Twitter">
                        <div class="logout-div"></div>
                         </a>
                         </div>
                         </div>
                    <?php
                    if($user->unsplash !== null){
                        $photos = getPics($user->unsplash);
                        ?>
                    <section class="twitter-timeline-section">
                    <div class="twitter-timeline-div">
                        <div class="unsplash-timeline-bg"><?php
                       foreach($photos as $photo){?>
                       <a target="_blank" class='unsplash-pic-a' href="<?php echo $photo['links']['html'] ?>">
                           <img class='unsplash-photos' src="<?php echo $photo['urls']['regular'] ?>" alt="">
                       </a>
<?php
                       }
                       ?>
                        </div>
                    </div>
                    </section>
                    <?php
                     }else{
                        echo 'hesap bulunamadı';
                    }
                    } elseif ( $_GET['platform'] == "Twitter") {?>
                    <div class="change-social-media-div">
                        <a class="left-a" href="?username=<?php echo $user->nickname ?>&platform=Unsplash">
                        <div class="logout-div"></div>
                        </a>
                         <p class="social-media-name"><?php echo $_GET['platform'] ?></p>
                         <a class="right-a" href="?username=<?php echo $user->nickname ?>&platform=Twitch">
                        <div class="logout-div"></div>
                         </a>
                         </div>
                         </div>
                    <?php
                    if($user->twitter !== null){
                        $twitterInfo = getTwitterInfo($user->twitter);
                        ?>
                    <section class="twitter-timeline-section">
                    <div class="twitter-timeline-div">
                        <div class="twitter-timeline-info">
                            <div style="background-image: url('<?php echo $twitterInfo[0] ?>')" class="twitter-timeline-pp"></div>
                            <div class="twitter-timeline-count">
                                <p class="twitter-timeline-followers-count"><?php echo $twitterInfo[1] ?> Takipçi</p>
                                <p class="twitter-timeline-followed-count"><?php echo $twitterInfo[2] ?> Takip</p>
                            </div>
                        </div>
                        <div class="twitter-timeline-bg">
                            <div class="twitter-timeline-width">
                                <a class="twitter-timeline" data-lang="tr" data-theme="dark" href="https://twitter.com/<?php echo $user->twitter ?>?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                    </section>
                    <?php
                     }else{
                        echo 'hesap bulunamadı';
                    }
                    }
                    ?>
                    
                
        </section>
        <section class="laptop-search">
            <section class="search-form">
                <form class="search-form-laptop" action="#" method="post">
                    <input class="search-user" type="text" name="search-user" placeholder="Kimi Bulmak İstiyorsun ⚡ ">
                </form>
            </section>
            <section class="my-profile-info-section">
                <section class="my-profile-info-header">
                    <div class="my-info-pic-static">
                    <div class="my-info-pic-div">
                        <?php
                    if(isItFollower($_GET['username']) == true){?>
                                         <a class="my-pp-background" href="includes/unfollow.php?username=<?php echo $_GET['username'] ?>&platform=<?php echo $_GET['platform'] ?>">
                                        <?php
                                    }else {?>
                                         <a class="my-pp-background" href="includes/unfollow.php?username=<?php echo $_GET['username'] ?>&platform=<?php echo $_GET['platform'] ?>">
                                        <?php
                                    }?>
                       
                        
                            <div class="my-pp-background">
                                <?php
                                
                                if($user->picture !== null){
                                    echo '<img class="my-pp" src="data:image/png;base64,'.base64_encode($user->picture).'">
                                    <div class="my-pp-p-div">';
                                    if(isItFollower($_GET['username']) == true){?>
                                        <p class="my-pp-p">Takipten Çıkart</p>
                                        <?php
                                    }else {?>
                                        <p class="my-pp-p">Takip Et</p>
                                        <?php
                                    }?>
                                    </div>
                                    </img>
                                    <?php
                                }else{
                                    echo '<img class="my-pp" src="imgs/user.png">
                                    <div class="my-pp-p-div">';
                                    if(isItFollower($_GET['username']) == true){?>
                                        <p class="my-pp-p">Takipten Çıkart</p>
                                        <?php
                                    }else {?>
                                        <p class="my-pp-p">Takip Et</p>
                                        <?php
                                    }?>
                                    </div>
                                </img>
                                <?php
                                }
                                ?>
                            </div>
                        </a>
                    </div>
                    </div>
                    <p class="my-user-name"><?php echo $user->nickname ; ?></p>
                </section>
                <section class="my-profile-info-followers-section">
                    <div class="followers-div">
                        <p class="followers-count"><?php echo getFollowersCount($user->id) ?></p>
                        <p class="followers-text">takipçi</p>
                    </div>
                    <div class="follow-div">
                        <p class="follow-count"><?php echo getFollowed($user->id) ?></p>
                        <p class="followers-text">takip</p>
                    </div>

                </section>
                <section class="my-profile-info-bio-section">
                    <p class="my-profile-bio"><?php echo $user->bio ?></p>
                </section>
            </section>
        </section>
        </section>
        <section class="bg-section">
        <?php
                    if( $_GET['platform'] == "Twitch"){
                        if($user->twitch !== null){
                            if(getTwitchLiveStatus($user->twitch) == "live"){?>
                              
                                <div class="bg-color"></div>
                          
                        <?php
                            }
                            else{
                                ?>
                                <div class="bg-color1"></div>
                                 <?php
                            }
                            ?>
                        <?php
                         }else{ ?>
                                <div class="bg-color1"></div>
                          <?php
                         }
                    } elseif ($_GET['platform'] == "Instagram") {?>
                        <div class="bg-color"></div>
                        <?php
                    } elseif ($_GET['platform'] == "Unsplash") {?>

                        <div class="bg-color3"></div>
                    <?php
                    } elseif ($_GET['platform'] == "Twitter") {?>

                        <div class="bg-color2"></div>
                        <?php
                    }?>
                    
        </section> 
           <?php }else{
        header('location: ./index.php');
    }
        }else{
            header('location: ./index.php');
        }
    }else{
        header('location: ./index.php');
    }
    ?>
    
    