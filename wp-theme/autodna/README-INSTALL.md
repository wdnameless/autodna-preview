# AutoDNA WordPress Theme (v1.0.0)

A pixel-faithful, responsive WordPress theme for the AutoDNA Canadian automotive platform.
Built directly from the official Figma design without guessing or artificial modifications.

## Features
- **Zero build step required**: Hand-crafted CSS design system (`assets/css/style.css`).
- **Interactive Component 7**: Main page dynamic services accordion (`data-services-accordion`).
- **Interactive Component 4**: SkipTheDealer dynamic 4-step protocol switcher (`data-step-switcher`).
- **Interactive Component 8**: AutoDNA Service dynamic hover/click 3-tab switcher (`data-service-switcher`) displaying SkipTheShop, DriveCarePlan telematics, and PaintBot robotics.
- **Form validation**: Client-side interactive validation with instant confirmation.
- **100% Mobile Responsive**: Clean stacked responsive layouts for desktop, tablet, and mobile (tested at 393px iPhone viewport with zero horizontal overflow).

## Installation
1. Log in to your WordPress admin panel (`/wp-admin`).
2. Go to **Appearance → Themes → Add New → Upload Theme**.
3. Upload `autodna-theme.zip` and click **Install Now**.
4. Click **Activate**.

## Page Setup
Create 4 pages in WordPress (**Pages → Add New**):

| Page Title | Recommended Slug | Template (Page Attributes) |
|---|---|---|
| **Home** | `home` (Set as static Front page in Settings → Reading) | AutoDNA — Home Page |
| **SkipTheDealer** | `skipthedealer` | AutoDNA — SkipTheDealer |
| **AutoDNA Flip** | `invest` | AutoDNA — AutoDNA Flip (Invest) |
| **AutoDNA Service** | `service` | AutoDNA — AutoDNA Service |

## Navigation
Go to **Appearance → Menus**, create a primary navigation menu and assign it to the **Primary Navigation** display location.
