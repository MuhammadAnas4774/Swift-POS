<?php
session_start();
$config = require 'config.php';
$contactError = $_SESSION['contact_error'] ?? '';
$contactSuccess = $_SESSION['contact_success'] ?? '';
unset($_SESSION['contact_error'], $_SESSION['contact_success']);

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SwiftPOS — Modern point of sale for growing retail</title>
  <meta name="description" content="Fast checkout, inventory you can trust, and insights that help you sell smarter. SwiftPOS is built for modern retail teams.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,600;0,9..144,700;1,9..144,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <a class="skip-link" href="#main">Skip to content</a>

  <header class="site-header" id="top">
    <div class="container header-inner">
      <a class="logo" href="#top" aria-label="SwiftPOS home">
        <span class="logo-mark" aria-hidden="true"></span>
        SwiftPOS
      </a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
        <span class="nav-toggle-bar"></span>
        <span class="visually-hidden">Menu</span>
      </button>
      <nav class="site-nav" id="site-nav" data-nav>
        <a href="#features">Features</a>
        <a href="#product">Product</a>
        <a href="#pricing">Pricing</a>
        <a href="#faq">FAQ</a>
        <a class="btn btn-sm btn-primary" href="#contact">Book a demo</a>
      </nav>
    </div>
  </header>

  <main id="main">
    <section class="hero">
      <div class="container hero-grid">
        <div class="hero-copy">
          <p class="eyebrow">Retail POS, rethought</p>
          <h1>Checkout that keeps pace with your floor.</h1>
          <p class="lead">SwiftPOS unifies registers, stock, and reporting so your team spends less time tapping and more time with customers.</p>
          <div class="hero-actions">
            <a class="btn btn-primary" href="#contact">Talk to sales</a>
            <a class="btn btn-ghost" href="#product">See the product</a>
          </div>
          <ul class="hero-stats" role="list">
            <li><strong>40%</strong> faster average checkout</li>
            <li><strong>99.9%</strong> uptime on cloud sync</li>
            <li><strong>24/7</strong> priority support</li>
          </ul>
        </div>
        <div class="hero-visual" aria-hidden="true">
          <div class="hero-glow"></div>
          <img src="assets/images/pos-mockup.png" width="640" height="480" alt="SwiftPOS register interface on a countertop display" loading="eager" decoding="async">
        </div>
      </div>
    </section>

    <section class="section logos-strip" aria-label="Trusted by teams like yours">
      <div class="container">
        <p class="logos-label">Loved by independent retailers and multi-location brands</p>
        <div class="logos-row">
          <span>NORTHLINE</span>
          <span>URBAN GOODS</span>
          <span>FIELD &amp; CO</span>
          <span>MERIDIAN</span>
          <span>STUDIO 14</span>
        </div>
      </div>
    </section>

    <section class="section" id="features">
      <div class="container">
        <header class="section-head">
          <p class="eyebrow">Why SwiftPOS</p>
          <h2>Everything on the counter, nothing in the way.</h2>
          <p class="section-lead">Purpose-built workflows for apparel, specialty food, electronics, and lifestyle retail—without the clutter of legacy POS.</p>
        </header>
        <div class="feature-grid">
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/speed.svg" width="40" height="40" alt="" role="presentation">
            <h3>Speed you can feel</h3>
            <p>Barcode, search, and favorites load instantly—even on busy Saturdays.</p>
          </article>
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/inventory.svg" width="40" height="40" alt="" role="presentation">
            <h3>Inventory that stays honest</h3>
            <p>Transfers, counts, and low-stock alerts sync across every store in real time.</p>
          </article>
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/payments.svg" width="40" height="40" alt="" role="presentation">
            <h3>Payments, your way</h3>
            <p>Tap to pay, wallets, gift cards, and split tenders with a single, clear flow.</p>
          </article>
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/security.svg" width="40" height="40" alt="" role="presentation">
            <h3>Enterprise-grade security</h3>
            <p>PCI-aware architecture, staff permissions, and audit trails built in from day one.</p>
          </article>
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/analytics.svg" width="40" height="40" alt="" role="presentation">
            <h3>Insights that sell</h3>
            <p>Margin, basket size, and associate performance—without exporting spreadsheets.</p>
          </article>
          <article class="feature-card">
            <img class="feature-icon" src="assets/images/icons/support.svg" width="40" height="40" alt="" role="presentation">
            <h3>Humans on standby</h3>
            <p>Onboarding specialists and a support team that knows retail, not scripts.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-alt" id="product">
      <div class="container split">
        <div>
          <p class="eyebrow">Inside the product</p>
          <h2>A register your staff will actually enjoy.</h2>
          <p class="section-lead">Large touch targets, dark mode for low-light floors, and guided flows for returns and exchanges reduce training time to hours, not weeks.</p>
          <ul class="checklist">
            <li>Offline mode keeps selling when the network hiccups</li>
            <li>Hardware kits or bring-your-own-device flexibility</li>
            <li>Native integrations with Shopify, Square, and major ERPs</li>
          </ul>
        </div>
        <figure class="product-shot">
          <img src="assets/images/pos-mockup.png" width="560" height="420" alt="Close-up of SwiftPOS cart screen with line items and tender options" loading="lazy" decoding="async">
        </figure>
      </div>
    </section>

    <section class="section" id="pricing">
      <div class="container">
        <header class="section-head">
          <p class="eyebrow">Pricing</p>
          <h2>Simple plans. No surprise fees.</h2>
        </header>
        <div class="pricing-grid">
          <article class="price-card">
            <h3>Starter</h3>
            <p class="price"><span class="currency">$</span>79<span class="per">/mo per register</span></p>
            <p class="price-note">Ideal for single-location boutiques.</p>
            <ul>
              <li>Cloud catalog &amp; reporting</li>
              <li>Email receipts</li>
              <li>Standard support</li>
            </ul>
            <a class="btn btn-secondary" href="#contact">Get started</a>
          </article>
          <article class="price-card price-card-featured">
            <p class="badge">Most popular</p>
            <h3>Growth</h3>
            <p class="price"><span class="currency">$</span>129<span class="per">/mo per register</span></p>
            <p class="price-note">For teams scaling to new channels.</p>
            <ul>
              <li>Multi-location inventory</li>
              <li>Advanced permissions</li>
              <li>Priority onboarding</li>
            </ul>
            <a class="btn btn-primary" href="#contact">Talk to sales</a>
          </article>
          <article class="price-card">
            <h3>Enterprise</h3>
            <p class="price">Custom</p>
            <p class="price-note">Franchise and high-volume retail.</p>
            <ul>
              <li>Dedicated success manager</li>
              <li>Custom integrations &amp; SLAs</li>
              <li>24/7 phone support</li>
            </ul>
            <a class="btn btn-secondary" href="#contact">Request proposal</a>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-alt" id="faq">
      <div class="container narrow">
        <header class="section-head">
          <p class="eyebrow">FAQ</p>
          <h2>Questions, answered.</h2>
        </header>
        <div class="faq-list">
          <details class="faq-item">
            <summary>Can we migrate from our current POS?</summary>
            <p>Yes. Our team imports catalogs, customers, and gift card balances with a structured migration plan and dry runs before go-live.</p>
          </details>
          <details class="faq-item">
            <summary>Do you support custom hardware?</summary>
            <p>SwiftPOS runs on approved tablets and all-in-one terminals. We publish a certified peripherals list and can validate your existing kit.</p>
          </details>
          <details class="faq-item">
            <summary>Is there a contract?</summary>
            <p>Starter and Growth are month-to-month with an annual discount optional. Enterprise agreements include tailored terms.</p>
          </details>
        </div>
      </div>
    </section>

    <section class="section cta-band">
      <div class="container cta-inner">
        <div>
          <h2>Ready for calmer checkouts?</h2>
          <p>Share a few details—we will reply within one business day.</p>
        </div>
        <a class="btn btn-primary btn-lg" href="#contact">Book a demo</a>
      </div>
    </section>

    <section class="section" id="contact">
      <div class="container contact-grid">
        <div>
          <p class="eyebrow">Contact</p>
          <h2>Tell us about your stores.</h2>
          <p class="section-lead">We will follow up with a tailored walkthrough. No spam, no hard sell—just a conversation about what you need.</p>
          <address class="contact-meta">
            <p><strong>Sales</strong><br><a href="mailto:hello@swiftpos.example">hello@swiftpos.example</a></p>
            <p><strong>HQ</strong><br>1200 Market Street<br>San Francisco, CA</p>
          </address>
        </div>
        <div class="contact-panel">
          <?php if ($contactError): ?>
            <p class="form-alert form-alert-error" role="alert"><?php echo htmlspecialchars($contactError, ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endif; ?>
          <?php if ($contactSuccess): ?>
            <p class="form-alert form-alert-success" role="alert"><?php echo htmlspecialchars($contactSuccess, ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endif; ?>
          <form class="contact-form" method="post" action="process-contact.php" novalidate>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
            <div class="hp-field" aria-hidden="true">
              <label>Leave blank <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </div>
            <label>
              <span>Name</span>
              <input type="text" name="name" required autocomplete="name" maxlength="120" placeholder="Alex Rivera">
            </label>
            <label>
              <span>Work email</span>
              <input type="email" name="email" required autocomplete="email" maxlength="254" placeholder="you@yourstore.com">
            </label>
            <label>
              <span>Company</span>
              <input type="text" name="company" autocomplete="organization" maxlength="160" placeholder="Store name">
            </label>
            <label>
              <span>Message</span>
              <textarea name="message" rows="5" required maxlength="4000" placeholder="Locations, current POS, timeline…"></textarea>
            </label>
            <button class="btn btn-primary btn-block" type="submit">Send message</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-grid">
      <div>
        <a class="logo logo-footer" href="#top"><span class="logo-mark"></span> SwiftPOS</a>
        <p class="footer-tag">Modern POS for teams who care about craft—and the clock.</p>
      </div>
      <div>
        <p class="footer-heading">Product</p>
        <ul>
          <li><a href="#features">Features</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#faq">FAQ</a></li>
        </ul>
      </div>
      <div>
        <p class="footer-heading">Company</p>
        <ul>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Privacy</a></li>
        </ul>
      </div>
    </div>
    <div class="container footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> SwiftPOS. Demo marketing site.</p>
    </div>
  </footer>

  <script src="assets/js/main.js" defer></script>
</body>
</html>
