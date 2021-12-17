<?php

namespace DAO;

class News extends DbCon
{
    public function getNewsLiquore()
    {
        $sqlGet = "SELECT * FROM `viewLiquore`";
        $stmt = $this->connect()->prepare($sqlGet);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminEditNews.php?error=stmtfailed");
            exit();
        }

        $getLiquores = $stmt->fetchAll();

        foreach ($getLiquores as $getLiquore) {
            echo '<option value ="' . $getLiquore["ProductID"] . '">#' . $getLiquore["ProductID"] . ' : ' .  $getLiquore["pName"] . '</option>';
        }
    }
    public function getNewsWine()
    {
        $sqlGet = 'SELECT * FROM `viewWine`';
        $stmt = $this->connect()->prepare($sqlGet);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminEditNews.php?error=stmtfailed");
            exit();
        }

        $getWines = $stmt->fetchAll();

        foreach ($getWines as $getWine) {
            echo '<option value ="' . $getWine["ProductID"] . '">#' . $getWine["ProductID"] . ' : ' .  $getWine["pName"] . '</option>';
        }
    }


    public function getNewsCheese()
    {
        $sqlGet = 'SELECT * FROM `viewCheese`';
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminEditNews.php?error=stmtfailed");
            exit();
        }

        $getCheeses = $stmt->fetchAll();

        foreach ($getCheeses as $getCheese) {
            echo '<option value ="' . $getCheese["ProductID"] . '">#' . $getCheese["ProductID"] . ' : ' .  $getCheese["pName"] . '</option>';
        }
    }

    public function getAdminNews()
    {
        $sqlGet = 'SELECT * FROM news';
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../adminEditNews.php?error=stmtfailed");
            exit();
        }

        $getAdminNews = $stmt->fetchAll();
        return $getAdminNews;
    }


    public function getHomeNews()
    {
        $sqlGet = 'SELECT * FROM `viewNews`';
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ./index.php?error=stmtfailed");
            exit();
        }

        $homeNews = $stmt->fetchAll();
        // action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"];
        foreach ($homeNews as $Newsi) {
            echo '    <section class="swiper-slide"> ';
            echo '    <div class="home__content grid"> ';
            echo '      <div class="home__group"> ';
            echo '        <img style="height: 350px; margin-left: auto; margin-right: auto;" src="' . $Newsi["pImgUrl"] . '" /> ';
            echo '        <div style="left: 30% !important;" class="home__indicator"></div> ';
            echo '        <div style="right: 78% !important;" class="home__details-img"> ';
            echo '          <h4 class="home__details-title">' . $Newsi["pName"] . '</h4> ';
            echo '          <span class="home__details-subtitle">' . $Newsi["pType"] . '</span> ';
            echo '        </div> ';
            echo '      </div> ';
            echo '      <div class="home__data"> ';
            echo '        <h3 class="home__subtitle">' . $Newsi["newsTitle"];
            echo '        <h1 class="home__title">' . $Newsi["maintitle"] . '</h1> ';
            echo '        <p class="home__description">' . $Newsi["pDescription"] . '</p>';
            echo '        <div class="home__buttons"> ';
            echo '          <a href="./productView.php?action=?&code=' . $Newsi["ProductID"] . '" class="button">Buy Now</a> ';
            echo '        </div> ';
            echo '      </div> ';
            echo '    </div> ';
            echo '  </section> ';
        }
    }
    public function updateNews($newsID, $ProductID, $maintitle, $newsTitle)
    {

        $sqlInsert = "UPDATE news SET ProductID='$ProductID', maintitle='$maintitle', newsTitle='$newsTitle' WHERE newsID='$newsID' ";
        $stmt = $this->connect()->prepare($sqlInsert);
        $stmt->bindParam($newsID, $newsID, \PDO::PARAM_INT);
        $stmt->bindParam($ProductID, $ProductID, \PDO::PARAM_INT);
        $stmt->bindParam($maintitle, $maintitle, \PDO::PARAM_STR);
        $stmt->bindParam($newsTitle, $newsTitle, \PDO::PARAM_STR);
        if (!$stmt->execute(array($ProductID, $maintitle, $newsTitle))) {
            $stmt = null;
            header('Location: ../adminNews.php?error=stmtfailed');
            exit();
        }

        $stmt = null;
    }

    // to show product page 
    public function showNews($entryid)
    {
        //$entryID = $_GET['id'];


        $sqlGet = "SELECT * FROM news WHERE newsID=$entryid";
        $stmt = $this->connect()->prepare($sqlGet);
        $stmt->bindParam($entryid, $entryid, \PDO::PARAM_INT);

        if (!$stmt->execute()) {
            $stmt = null;
            header('Location: ./adminEditNews.php?error=stmtfailed');
            exit();
        }

        $getNews = $stmt->fetchAll();

        return $getNews;
    }
}
