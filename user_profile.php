<?php
  session_start();
    if(isset($_SESSION['userid'])){
        if(isset($_GET['platform'])){
            if($_GET['platform'] == "Twitter" || $_GET['platform'] == "Twitch" || $_GET['platform'] == "Instagram" || $_GET['platform'] == "Unsplash"){
                include_once 'header.php';
                require_once 'includes/db_function.php';
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
                    <?php
                    if($user->unsplash !== null){
                        echo 'hesap bulunmakta';
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
                    <?php
                    if($user->twitter !== null){?>
                       
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
                        <a class="my-pp-background" href="#">
                        
                            <div class="my-pp-background">
                                <?php
                                
                                if($user->picture !== null){
                                    echo '<img class="my-pp" src="data:image/png;base64,'.base64_encode($user->picture).'">
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
            <div class="bg-color"></div>
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
    
    