<!-- Bu index.php dosyası, uygulama ilk açıldığında kullanıcının karşısında çıkacak login ekranıdır. -->
<?php
include_once 'header.php'; //Header kısmının index.php sayfasına dahil edilmesi.
session_start();
require_once './includes/db.inc.php';
require_once './includes/functions/entity_functions/userfunc.php'
?>
<section class="main-info-section">
    <div class="main-info-div">
        <p class="main-info-p-first">
            <?php
            if (!isset($_SESSION['userid'])) {
                echo "Sosyofi'ye Hoşgeldin";
            } else {
                echo "Hoşgeldin <br>" . $_SESSION['nickname'] . ",";
            }
            ?>
        <section class="detail-product">
            <hr>
            <?php
            $db = new DBController();
            $follower = new userfunc($db); ?>
            <?php
            foreach ($follower->getFollowers($_SESSION['userid']) as $item) { ?>
                <div class="category-div">
                    <?php
                    print_r($item["nickname"]);
                    print_r($item["first_name"]);
                    print_r($item["last_name"]);
                    print_r($item["email"]);
                    print_r($item["picture"]);
                    print_r($item["instagram"]);
                    print_r($item["twitch"]);
                    print_r($item["twitter"]);
                    print_r($item["unsplash"]);
                    ?>
                </div>
            <?php } ?>

            <?php
            echo "Takipçi Sayısı : ", $follower->getFollowersCount($_SESSION['userid']);
            echo "Takip Edilen Sayısı : ", $follower->getFollowed($_SESSION['userid']) ?>
        </section>
        </p>
    </div>
</section>
<?php
include_once 'footer.php'; //Footer kısmının index.php sayfasına dahil edilmesi.
?>