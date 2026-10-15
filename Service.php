<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Affordable and reliable car rental services in Cambodia. Modern vehicles for road trips and daily city rides.">
  <title>Joul Rental - Rental Car Service</title>
  <link rel="stylesheet" href="style1.css">
  <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Odibee+Sans&family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Grenze+Gotisch:wght@100..900&family=Neucha&family=Odibee+Sans&family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
</head>
<body>
  <header class="site-header">
    <a class="logo" href="Service.php" aria-label="Joul Rental home">Joul Rental</a>
    <nav class="site-nav" aria-label="Main navigation">
      <a href="#catalog">Catalog</a>
      <a href="#mission">Mission</a>
      <a href="#contact">Contact</a>
      <a href="second.php">City Cars</a>
      <a href="dashboard.php">Dashboard</a>
    </nav>
    <div style="display: flex; align-items: center; gap: 12px;">
      <button class="cart-button" type="button" data-open-cart>
        Cart <span data-cart-count>0</span>
      </button>
      <?php if(isset($_SESSION['username'])): ?>
        <span style="font-weight: 600; color: #232323;">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
        <a href="logout.php"><button class="cart-button" style="background: #444;" type="button">Logout</button></a>
      <?php else: ?>
        <a href="login.php"><button class="cart-button" type="button">Login</button></a>
      <?php endif; ?>
    </div>
  </header>

  <main id="top">
    <section class="hero" aria-labelledby="hero-title">
      <div class="hero__content">
        <p class="eyebrow">Explore the world with rental cars</p>
         <h1 id="hero-title">On The Road To Adventure</h1>
        <p>
          Discover the freedom of the open road with our rental cars. Whether you're planning a weekend getaway or a long road trip, we have the perfect vehicle for your journey.
        </p>
        <a class="primary-link" href="#catalog">Shop the catalog</a>
      </div>
      <div class="hero__image-wrap">
        <img src="img/car1.png" alt="Featured rental car" class="hero__image">
      </div>
    </section>

    <section class="use-cases" aria-label="Rental uses">
      <div>City Commuting</div>
      <div>Weekend Roadtrips</div>
      <div>Business Travel</div>
      <div>Family Adventures</div>
    </section>

    <section class="section" id="mission" aria-labelledby="mission-title">
      <p class="eyebrow">Our mission</p>
      <h2 id="mission-title">Explore the world</h2>
      <div class="mission-grid">
        <article>
          <h3>Getting the best experience</h3>
          <p>Your journey starts with safety, affordability, and reliability.</p>
        </article>
        <article>
          <h3>Affordable</h3>
          <p>Rent smart. Drive safe. Travel affordably.</p>
        </article>
        <article>
          <h3>Safety and insurance</h3>
          <p>Your trusted partner for safe, reliable, and affordable travel</p>
        </article>
      </div>
    </section>
    

    <section class="section" id="catalog" aria-labelledby="catalog-title">
      <p class="eyebrow">Catalog</p>
      <h2 id="catalog-title">Choose Your Service Choice.</h2>
      <div class="product-grid">
        <article class="product-card">
          <img src="img/car2.png" alt="Red Mercedes City Car" loading="lazy">
          <div class="product-card__body">
            <p class="product-card__category">Red Mercedes</p>
            <h3>CITY CARS</h3>
            <div class="product-card__footer">
              <span class="product-card__price">$55</span>
              <a href="second.php"><button type="button">
                View Cars
              </button></a>
            </div>
          </div>
        </article>
        <article class="product-card">
          <img src="img/car4.png" alt="Passenger Van" loading="lazy">
          <div class="product-card__body">
            <p class="product-card__category">Family & Group</p>
            <h3>VANS</h3>
            <div class="product-card__footer">
              <span class="product-card__price">$75</span>
              <button type="button" data-add-to-cart data-name="Passenger Van Rental" data-price="75">
                Add to cart
              </button>
            </div>
          </div>
        </article>
        <article class="product-card">
          <img src="img/car5.png" alt="Scooter Rental" loading="lazy">
          <div class="product-card__body">
            <p class="product-card__category">Urban Commute</p>
            <h3>SCOOTERS</h3>
            <div class="product-card__footer">
              <span class="product-card__price">$18</span>
              <button type="button" data-add-to-cart data-name="Urban Scooter Rental" data-price="18">
                Add to cart
              </button>
            </div>
          </div>
        </article>
        <article class="product-card">
          <img src="img/car6.png" alt="City Bicycle" loading="lazy">
          <div class="product-card__body">
            <p class="product-card__category">Eco Friendly</p>
            <h3>BICYCLES</h3>
            <div class="product-card__footer">
              <span class="product-card__price">$10</span>
              <button type="button" data-add-to-cart data-name="City Bicycle Rental" data-price="10">
                Add to cart
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>

    <section class="contact" id="contact" aria-labelledby="contact-title">
      <div>
        <p class="eyebrow">Get in touch</p>
        <h2 id="contact-title">Do you have any questions?</h2>
      </div>
      <p>
       Our team is ready to assist you. Contact us anytime for quick and friendly support. 
      </p>
      <a class="primary-link primary-link--light" href="mailto:Rentalcar@gmail.com">Rental@gmail.com</a>
    </section>
  </main>

  <aside class="cart-panel" aria-labelledby="cart-title" aria-hidden="true" data-cart-panel>
    <div class="cart-panel__header">
      <h2 id="cart-title">Your cart</h2>
      <button class="icon-button" type="button" aria-label="Close cart" data-close-cart>&times;</button>
    </div>
    <div class="cart-items" data-cart-items></div>
    <p class="cart-empty" data-cart-empty>Your cart is empty.</p>
    <div class="cart-panel__footer">
      <div class="cart-total">
        <span>Total</span>
        <strong data-cart-total>$0</strong>
      </div>
      <button class="checkout-button" type="button" data-checkout>Checkout</button>
    </div>
  </aside>
  <div class="cart-overlay" data-cart-overlay></div>
  <script src="shop-flowers-sim.js" defer></script>
</body>
</html>