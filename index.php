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
            echo "Takipçi Sayısı : ", $follower->getFollowers($_SESSION['userid']);
            echo "Takip Edilen Sayısı : ", $follower->getFollowed($_SESSION['userid']) ?>
        </section>
        </p>
    </div>
</section>
<?php
include_once 'footer.php'; //Footer kısmının index.php sayfasına dahil edilmesi.
?>