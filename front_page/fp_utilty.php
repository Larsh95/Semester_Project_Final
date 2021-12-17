      <!--==================== UTILITY ====================-->
      <section class="section utility" id="utility">
        <h2 class="section__title">Here are Six Recommended Products</h2>
        <p class="section__title">definitely not randomly generated...</p>

        <div class="utility__container container grid">
          <?php

          use DAO\Shop;

          $random = new Shop();
          $random->getRandom();
          ?>
        </div>
      </section>