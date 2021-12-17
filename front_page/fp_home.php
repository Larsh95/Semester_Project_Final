      <!--==================== HOME ====================-->
      <section class="home container" id="home">

        <div class="swiper home-swiper">

          <div class="swiper-wrapper">

            <!-- HOME SLIDERs -->
            <?php
            $viewHomeNews = new \DAO\News();
            $viewHomeNews->getHomeNews();
            ?>

          </div>
          <div class="swiper-pagination"></div>

        </div>
      </section>