<!--==================== NEW ARRIVALS ====================-->
<section class="section new" id="new">
  <h2 class="section__title">New Arrivals</h2>

  <div class="new__container container">
    <div class="swiper new-swiper">
      <div class="swiper-wrapper">
        <?php

        use DAO\Shop;

        $arrival = new Shop;
        $arrival->getArrivals();
        ?>
      </div>
    </div>
  </div>
</section>