# AutoDNA — Marketing Platform (Figma 1:1 Implementation)

Clean, responsive, interactive implementation of the AutoDNA Canadian automotive platform.
Built directly from the official Figma boards according to exact design specifications and video walkthrough.

---

## Live Links & Repositories

- **Private GitHub Repository**: [https://github.com/wdnameless/autodna-site](https://github.com/wdnameless/autodna-site)
- **Live Preview URL (Cloudflare Tunnel)**: [https://extensions-feeling-electronic-airport.trycloudflare.com/index.html](https://extensions-feeling-electronic-airport.trycloudflare.com/index.html)
- **Local Dev Server**: `http://localhost:8323/`

---

## 4 Canonical Pages Architecture

### 1. Main Page (`index.html` / `front-page.php`)
- **Preloader**: 1–2s branded DNA logo transition on initial entry.
- **Header**: Minimalist HUD header with brand logo and fullscreen menu trigger button.
- **Hero**: Vehicle triptych showcase, oversized Orbitron typography (`the genetic code to your car has already been found`), and **Explore Rail** linking directly to the 3 sub-pages.
- **Carlears**: "We don’t call ourselves a dealer, we don’t like that word. We’re starting a new slang term: CARLEARS" with 4 benefit cards (*High quality, Wide choice, Save more, True value*).
- **Value Proposition**: Radiating hairline connector to 5 benefit pillars (*No surprises, Affordable dealer prices, Changing the game, Flexible options, Real value*).
- **Price Comparison**: Benchmark table comparing Dealers vs Marketplace vs AutoDNA, with Toyota Corolla Hatchback visual.
- **Services (Component 7)**: Interactive 3-card grid linking to SkipTheDealer, AutoDNA Flip, and AutoDNA Service.
- **Audited Metrics**: 5 performance indicators (12 Stages of inspection, 450+ Clients said wow, 10+ Years in industry, 3–4 Weeks, 30–50% Save).
- **Corporate Vision**: Calgary HQ showroom facility presentation.
- **DNA Auto Club**: 4 driver perks (*Service 30% off, Carwash every 2nd free, Wheel alignment $70, Tire change $60*).
- **Community & Footer**: "We don't just sell cars", leadership team, full contact details (`info@autodna.com`, `+1 (403) 312-8306`, `730 2 Ave SW, Calgary`).

### 2. SkipTheDealer™ (`skipthedealer.html` / `page-skipthedealer.php`)
- **Hero**: "Buy cars up to 40% cheaper / SkipTheDealer / You pay the real price, not someone else's markup."
- **Two Scenarios**: *1. Buy and profit* vs *2. Drive without losing*.
- **Interactive 4-Step Switcher (Figma Component 4)**:
  - Step buttons (`Step 1`, `Step 2`, `Step 3`, `Step 4`) switch content dynamically on click.
  - **Step 1**: Introduction & Car Selection (itemized financial overview & savings formula).
  - **Step 2**: Daily Selection & Auctions (multi-vehicle hunting & auction bidding).
  - **Step 3**: Purchase & Restoration (diagnostic protocol for intact vs damaged cars).
  - **Step 4**: Inspection & Documents (clean status registration vs AMVIC rebuilt certification).
- **Real Savings on Every Car**: 4-column savings table (*2019 Honda Civic save $5,700, 2020 VW Tiguan save $7,600, 2021 Hyundai Elantra save $6,500*) with delivered customer car photography.
- **Why It Works**: 5 benefit cards (*30–40% cheaper, Full inspection, Zero dealer markup, Exclusive auctions, Long-term value*).
- **Referral Offer**: "Your friends are our friends!" 30% discount with family photo.
- **Intake Form**: 6-field quote request with client-side validation.

### 3. AutoDNA Flip™ (`invest.html` / `page-invest.php`)
- **Hero**: "Invest in cars. / Earn from $2,000 on each vehicle." Handshake photo with 3 investment facts (*Tangible assets, Up to 40% ROI, Lower risk*).
- **How It Works**: 4-step investor cycle with goals.
- **Fleet Strip**: Real inventory photography banner.
- **Profit Examples**: Benchmark return table ($10,000 → $2,500; $30,000 → $6,000–$9,000; $50,000 → $8,000–$15,000/mo).
- **Investor Benefits**: 5 cards (*High returns, Reliable investment, All-inclusive service, Full transparency, Fast turnover*).
- **Guarantee & Documentation**: Certified official auctions, AMVIC standards, and itemized financial statements.
- **Comparison Table**: Bank deposit (3–5%) vs Stock market vs Crypto vs AutoDNA Flip (20–30% per deal).
- **Investor Intake Form**: Capital allocation inquiry.

### 4. AutoDNA Service™ (`service.html` / `page-service.php`)
- **Hero**: Full-width collage banner.
- **Facility Intro**: "The future of service is already here. Innovation. Technology. Trust." Showroom visual.
- **Interactive Component 8 (One DNA. Multiple Services.)**:
  - 3 interactive tabs: **SkipTheShop**, **DriveCarePlan**, **PaintBot**.
  - Dynamically updates content and photos on **hover and click**:
    - **SkipTheShop**: Concierge valet pickup, enclosed transport carrier photos, and zero-waiting promise.
    - **DriveCarePlan**: Real-time vehicle telematics OBD II module photo and automatic predictive maintenance tracking.
    - **PaintBot**: Industrial 6-axis robotic body shop painting photo and flawless factory finish specifications.
- **Inside the Mind of AutoDNA**: Workshop leadership quotes and master technician team.
- **Direct Concierge Callout & Footer**.

---

## WordPress Integration (`autodna-theme.zip`)

The project includes a production-ready custom WordPress theme in `wp-theme/autodna/` and pre-built archive `autodna-theme.zip`.

### Installation
1. Go to **Appearance → Themes → Add New → Upload Theme**.
2. Upload `autodna-theme.zip` and click **Activate**.
3. Create 4 pages in WordPress:
   - **Home**: assign template `AutoDNA — Home Page`.
   - **SkipTheDealer**: assign template `AutoDNA — SkipTheDealer` (slug: `skipthedealer`).
   - **AutoDNA Flip**: assign template `AutoDNA — AutoDNA Flip (Invest)` (slug: `invest`).
   - **AutoDNA Service**: assign template `AutoDNA — AutoDNA Service` (slug: `service`).
4. Set Home as the Static Front Page in **Settings → Reading**.

---

## Technical Stack & Quality Assurance

- **Typography**: Google Fonts `Orbitron` (400, 500, 600, 700) and `DM Sans` (300, 400, 500, 600).
- **CSS Architecture**: Clean modular CSS (`assets/css/style.css`) with custom HUD brackets, glowing radial gradients, and responsive grid layouts.
- **Zero Horizontal Overflow**: Thoroughly verified via Playwright headless engine at 1440px desktop, 1024px tablet, and 393px mobile.
- **JavaScript Engine**: Vanilla JS (`assets/js/main.js`) powering all interactive step switchers, service tabs, modal overlays, and form validation.
