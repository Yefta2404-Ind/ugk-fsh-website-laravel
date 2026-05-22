<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>@yield('title', 'Fakultas Sosial & Humaniora - Universitas Gunung Kidul')</title>
    <meta name="description" content="Lembaga Pengendalian dan Penjaminan Mutu Internal Universitas Gunung Kidul. Meningkatkan kualitas pendidikan melalui sistem penjaminan mutu berkelanjutan.">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-v2.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @yield('styles')

    <style>
  /* ================= ROOT & RESET ================= */
:root {
    --primary: {{ $settings->primary_color ?? '#0B4650' }};
    --primary-light: {{ $settings->primary_light ?? '#155e6e' }};
    --primary-dark: {{ $settings->primary_dark ?? '#072e38' }};
    --primary-mid: {{ $settings->primary_mid ?? '#0e5262' }};

    --primary-rgb: 11, 70, 80;
    --primary-dark-rgb: 7, 46, 56;

    --gold: {{ $settings->gold_color ?? '#E6FF2B' }};
    --gold-light: {{ $settings->gold_light ?? '#eeff55' }};
    --gold-dark: {{ $settings->gold_dark ?? '#c4db00' }};

    --secondary: {{ $settings->secondary_color ?? '#F9F7F2' }};
    --accent: {{ $settings->accent_color ?? '#fdfcf9' }};
    --accent2: {{ $settings->accent2_color ?? '#f0ede5' }};

    --text-dark: {{ $settings->text_dark ?? '#072e38' }};
    --text-mid: {{ $settings->text_mid ?? '#0B4650' }};
    --text-light: {{ $settings->text_light ?? '#898A8D' }};

    --white: #ffffff;
    --border: {{ $settings->border_color ?? '#dddbd5' }};

    --shadow-sm: 0 1px 4px rgba(11,70,80,0.07);
    --shadow-md: 0 4px 16px rgba(11,70,80,0.10);
    --shadow-lg: 0 12px 32px rgba(11,70,80,0.13);
    --shadow-xl: 0 24px 56px rgba(11,70,80,0.18);

    --font-primary: 'DM Sans', sans-serif;
    --font-roboto: 'DM Sans', sans-serif;
    --font-heading: 'Cormorant Garamond', serif;

    --container-max: 1400px;
    --container-pad: 40px;

    /* Radius lebih bervariasi, tidak seragam */
    --radius-sm: 6px;
    --radius-md: 10px;
    --radius-lg: 16px;
    --radius-xl: 24px;

    --transition: 0.22s cubic-bezier(0.4,0,0.2,1);
}

/* ===== Z-INDEX SYSTEM ===== */
body { position: relative; z-index: 1; }
.site-header { z-index: 9500; }
.main-nav { z-index: 10000; }

.main-nav a:visited {
    color: rgba(255, 255, 255, 0.88) !important;
}

.menu-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(var(--primary-dark-rgb), 0.72);
    z-index: 8999;
    transition: opacity 0.3s ease;
}
.menu-overlay.active { display: block; }
.agenda-modal-overlay { z-index: 20000; }
#popup-overlay { z-index: 999999 !important; }

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }

body {
    font-family: var(--font-primary);
    line-height: 1.65;
    color: var(--text-dark);
    background: var(--secondary);
    overflow-x: hidden;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
}

body.menu-open { overflow: hidden; }

h1,h2,h3,h4,h5,h6 {
    font-family: var(--font-heading);
    font-weight: 600; /* turun dari 700, serif lebih hidup di weight lebih rendah */
    letter-spacing: -0.01em;
    color: var(--primary);
    line-height: 1.25;
}

/* ================= CONTAINERS ================= */
.site-container,
.survey-container,
.footer-container,
.lpm-container {
    width: 100%;
    max-width: var(--container-max);
    margin: 0 auto;
    padding: 0 var(--container-pad);
}

/* ================= TOP BAR ================= */
.top-bar {
    background: var(--primary-dark);
    color: rgba(255,255,255,0.85);
    padding: 8px 0;
    font-size: 0.8rem;
    border-bottom: 1px solid rgba(230,255,43,0.15);
    letter-spacing: 0.015em;
}

.top-bar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
}

.top-bar-left {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.top-bar-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: rgba(255,255,255,0.8);
    font-size: 0.78rem;
}

.top-bar-item i { color: var(--gold-light); font-size: 0.7rem; flex-shrink: 0; }

.top-bar-item span,
.top-bar-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: color var(--transition);
}

.top-bar-item a:hover { color: var(--gold-light); }

.top-bar-right {
    display: flex;
    align-items: center;
    gap: 4px;
}

.social-link {
    color: rgba(255,255,255,0.7);
    font-size: 0.82rem;
    width: 26px; height: 26px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 4px; /* lebih kotak, kurang template */
    text-decoration: none;
    transition: all var(--transition);
}

.social-link:hover { color: var(--primary-dark); background: var(--gold); }

/* ================= HEADER ================= */
.site-header {
    background: var(--primary);
    position: sticky;
    top: 0;
    width: 100%;
    box-shadow: 0 2px 12px rgba(var(--primary-dark-rgb), 0.35);
    overflow: visible;
}

.site-header::before {
    content: '';
    display: block;
    height: 3px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light), var(--gold));
}

.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 72px;
    padding: 10px 0;
    gap: 16px;
    width: 100%;
    overflow: visible;
}

.logo-title-group {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    min-width: 0;
}

.logo {
    width: 50px; height: 50px;
    flex-shrink: 0;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));
}
.logo svg, .logo img { width: 100%; height: 100%; display: block; }

.header-title {
    border-left: 1px solid rgba(230,255,43,0.3);
    padding-left: 12px;
    min-width: 0;
}

.header-title h1 {
    color: var(--white);
    font-family: var(--font-roboto);
    font-weight: 800;
    font-size: 1.1rem;
    line-height: 1.2;
    margin: 0 0 2px 0;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.header-title span {
    color: var(--gold-light);
    font-family: var(--font-roboto);
    font-weight: 400;
    font-size: 0.75rem;
    display: block;
    letter-spacing: 0.02em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.menu-toggle {
    display: none;
    background: rgba(230,255,43,0.12);
    border: 1px solid rgba(230,255,43,0.35);
    color: var(--white);
    font-size: 1.1rem;
    cursor: pointer;
    width: 40px; height: 40px;
    border-radius: var(--radius-sm);
    transition: background var(--transition);
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
}

.menu-toggle:hover { background: rgba(230,255,43,0.25); }

/* ================= NAVIGATION ================= */
.main-nav {
    display: flex;
    justify-content: flex-end;
    align-items: stretch;
    overflow: visible;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2px;
    align-items: stretch;
    overflow: visible;
}

.nav-menu > li {
    position: relative;
    display: block;
    overflow: visible;
}

.nav-link {
    color: rgba(255,255,255,0.88);
    text-decoration: none;
    padding: 0 clamp(10px, 1.5vw, 18px);
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
    font-size: clamp(0.7rem, 1vw, 0.88rem);
    height: clamp(45px, 6vw, 60px);
    transition: all 0.2s ease;
    white-space: nowrap;
    letter-spacing: 0.02em;
    background: transparent;
    border: none;
    border-bottom: 2px solid transparent; /* dari 3px ke 2px */
    cursor: pointer;
    border-radius: 0;
}

.nav-link:hover {
    color: var(--gold) !important;
    background: rgba(230,255,43,0.07) !important;
    border-bottom-color: var(--gold) !important;
}

.nav-link.active {
    color: var(--gold) !important;
    border-bottom-color: var(--gold) !important;
}

.nav-link i {
    font-size: 0.6rem;
    transition: transform 0.2s ease;
    margin-left: 2px;
    opacity: 0.6;
}

.nav-link:hover i { opacity: 1; color: var(--gold); }

.nav-dropdown {
    position: relative;
    display: block;
    overflow: visible;
}

.nav-submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: var(--primary-dark);
    min-width: 220px;
    max-width: calc(100vw - 16px);
    list-style: none;
    padding: 6px 0;
    margin: 0;
    border-radius: 0 0 var(--radius-sm) var(--radius-sm);
    border-top: 2px solid var(--gold);
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.18s ease, visibility 0.18s ease;
    pointer-events: none;
    z-index: 10000;
    margin-top: -2px;
}

.nav-submenu.flip-left { left: auto; right: 0; }

.nav-dropdown:hover > .nav-submenu {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.nav-submenu li {
    border-bottom: 1px solid rgba(255,255,255,0.06);
    position: relative;
    overflow: visible;
}

.nav-submenu li:last-child { border-bottom: none; }

.nav-submenu li a {
    display: block;
    padding: 11px 20px;
    color: rgba(255,255,255,0.78);
    text-decoration: none;
    font-size: 0.84rem;
    font-weight: 500;
    transition: all var(--transition);
    border-left: 2px solid transparent;
    white-space: nowrap;
}

.nav-submenu li a:hover {
    color: var(--gold-light);
    background: rgba(230,255,43,0.12);
    padding-left: 24px;
    border-left-color: var(--gold-dark);
}

.has-child > a {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.has-child > a::after {
    content: '\f054';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    font-size: 0.65rem;
    margin-left: 12px;
    opacity: 0.5;
    transition: transform var(--transition);
}

.has-child:hover > a::after {
    transform: translateX(3px);
    opacity: 1;
    color: var(--gold);
}

.child-menu {
    position: absolute;
    top: 0;
    left: 100%;
    background: var(--primary-dark);
    min-width: 210px;
    max-width: calc(100vw - 16px);
    list-style: none;
    padding: 6px 0;
    margin: 0;
    margin-left: -1px;
    border-radius: var(--radius-sm);
    border-left: 2px solid var(--gold);
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.18s ease, visibility 0.18s ease, transform 0.18s ease;
    pointer-events: none;
    z-index: 10100;
    transform: translateY(6px); /* lebih subtle dari 10px */
}

.child-menu.flip-left {
    left: auto; right: 100%;
    margin-left: 0; margin-right: -1px;
    border-left: none; border-right: 2px solid var(--gold);
}

.has-child:hover > .child-menu {
    opacity: 1; visibility: visible;
    pointer-events: auto; transform: translateY(0);
}

.child-menu li { border-bottom: 1px solid rgba(255,255,255,0.06); }
.child-menu li:last-child { border-bottom: none; }

.child-menu li a {
    display: block;
    padding: 10px 18px;
    color: rgba(255,255,255,0.78);
    text-decoration: none;
    font-size: 0.8rem;
    white-space: nowrap;
    transition: all var(--transition);
}

.child-menu li a:hover {
    color: var(--primary-dark);
    background: var(--gold);
    padding-left: 24px;
}

@media (min-width: 769px) and (max-width: 991px) {
    .nav-submenu { left: auto; right: 0; min-width: 200px; }
    .child-menu {
        left: auto; right: 100%;
        margin-left: 0; margin-right: -1px;
        border-left: none; border-right: 2px solid var(--gold);
    }
}

/* ================= HERO SECTION ================= */
.hero-section {
    position: relative;
    overflow: hidden;
    color: var(--white);
    min-height: 82vh;
    display: flex;
    align-items: center;
}

.hero-slider { position: absolute; inset: 0; width: 100%; height: 100%; }

.hero-slide {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1.4s ease;
}

.hero-slide.active { opacity: 1; }

.hero-section::after {
    content: '';
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            110deg,
            rgba(var(--primary-dark-rgb), 0.80) 0%,
            rgba(var(--primary-rgb), 0.45) 55%,
            transparent 100%
        ),
        linear-gradient(
            to top,
            rgba(var(--primary-dark-rgb), 0.60) 0%,
            transparent 50%
        );
    z-index: 1;
    pointer-events: none;
}

.hero-overlay {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 120px 0 100px;
    display: flex;
    align-items: center;
}

.hero-content { max-width: 740px; }

/* Eyebrow disederhanakan — hapus pulse animation */
.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(230,255,43,0.12);
    border: 1px solid rgba(230,255,43,0.4);
    color: var(--gold-light);
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 3px; /* kotak, lebih institutional */
    margin-bottom: 22px;
}

/* dot statis, tidak pulse */
.hero-eyebrow::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--gold);
}

.hero-title {
    font-size: 3.8rem;
    font-weight: 600; /* turun dari 800 */
    line-height: 1.1;
    margin-bottom: 20px;
    color: var(--white);
    letter-spacing: -0.02em;
}

.hero-title span {
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ================= SECTION SHARED ================= */
.section-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--gold-dark);
    margin-bottom: 10px;
}

.section-label::before {
    content: '';
    width: 20px; height: 2px;
    background: var(--gold);
    border-radius: 1px;
}

/* ================= AGENDA ================= */
.agenda-section {
    background: var(--secondary);
    padding: 96px 0;
    border-bottom: 1px solid var(--border);
    position: relative;
    overflow: hidden;
}

/* hapus pseudo radial gradient — terlalu dekoratif/template */

.agenda-header {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 48px;
    gap: 20px;
    flex-wrap: wrap;
}

.agenda-header-left { text-align: center; }

.agenda-title {
    font-size: 2.2rem;
    font-weight: 600;
    color: var(--primary);
    margin: 0;
    letter-spacing: -0.02em;
}

.agenda-subtitle {
    font-size: 0.92rem;
    color: var(--text-light);
    margin-top: 6px;
    font-weight: 400;
}

.agenda-horizontal-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.agenda-card-small {
    border-radius: var(--radius-md); /* dari radius-lg, lebih subtle */
    overflow: hidden;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 340px;
    position: relative;
    background: var(--primary);
    box-shadow: var(--shadow-md);
    transition: transform 0.28s ease, box-shadow 0.28s ease; /* hapus cubic bounce */
}

/* hover: translateY saja, hapus scale */
.agenda-card-small:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
}

.agenda-card-bg {
    position: absolute;
    inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    z-index: 0;
    transition: transform 0.5s ease;
}

.agenda-card-small:hover .agenda-card-bg { transform: scale(1.04); }

.agenda-card-small::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(7,46,56,0.08) 0%, rgba(7,46,56,0.35) 40%, rgba(7,46,56,0.88) 100%);
    z-index: 1;
}

/* garis bawah saat hover */
.agenda-card-small::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 2px; /* dari 3px */
    background: linear-gradient(90deg, var(--gold-dark), var(--gold));
    z-index: 3;
    transform: scaleX(0);
    transition: transform var(--transition);
}

.agenda-card-small:hover::after { transform: scaleX(1); }

.agenda-date-small {
    position: absolute;
    top: 16px; left: 16px;
    z-index: 2;
    background: rgba(230,255,43,0.88);
    border: none; /* hapus border, lebih bersih */
    padding: 10px 14px;
    border-radius: var(--radius-sm);
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 50px;
}

.date-day-small {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: var(--primary-dark);
    font-family: var(--font-heading);
}

.date-month-small {
    font-size: 0.58rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--primary-dark);
    margin-top: 3px;
}

.agenda-content-small {
    position: relative;
    z-index: 2;
    padding: 18px 20px 22px;
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.agenda-title-small {
    font-size: 0.97rem;
    font-weight: 600;
    color: var(--white);
    line-height: 1.35;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.agenda-meta-small { display: flex; gap: 12px; flex-wrap: wrap; }

.meta-item-small {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.72rem;
    color: rgba(255,255,255,0.7);
}

.meta-item-small i { color: var(--gold); font-size: 0.62rem; }

/* Empty state: sederhanakan, hapus pseudo circles dekoratif */
.agenda-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 64px 24px;
    background: var(--accent);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    text-align: center;
    animation: fadeInUp 0.4s ease both;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}

.agenda-empty-icon {
    width: 72px; height: 72px;
    background: var(--accent2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.agenda-empty-icon i {
    font-size: 1.8rem;
    color: var(--primary);
    opacity: 0.35;
}

.agenda-empty-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 8px;
}

.agenda-empty-desc {
    font-size: 0.88rem;
    color: var(--text-light);
    line-height: 1.65;
    max-width: 360px;
    margin: 0 auto 20px;
}

.agenda-empty-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(230,255,43,0.1);
    border: 1px solid rgba(230,255,43,0.35);
    color: var(--gold-dark);
    font-size: 0.73rem;
    font-weight: 600;
    padding: 5px 14px;
    border-radius: 3px;
    letter-spacing: 0.02em;
}

.agenda-empty-badge i { font-size: 0.68rem; }

.view-all-btn,
.view-all {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 40px;
    background: var(--gold);
    border: none;
    color: var(--primary-dark);
    font-size: 0.84rem;
    font-weight: 700;
    cursor: pointer;
    padding: 12px 28px;
    border-radius: 4px; /* dari 100px pill ke persegi panjang */
    transition: all var(--transition);
    letter-spacing: 0.03em;
    text-decoration: none;
}

.view-all-btn:hover,
.view-all:hover {
    background: var(--gold-dark);
    color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(230,255,43,0.3);
    text-decoration: none;
}

.agenda-footer { display: flex; justify-content: center; }

/* ================= AGENDA MODAL ================= */
.agenda-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(7,46,56,0.6);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    display: none;
    align-items: center;
    justify-content: center;
    pointer-events: none;
    padding: 16px;
    opacity: 0;
    transition: opacity 0.25s ease;
}

.agenda-modal-overlay.active { display: flex; opacity: 1; pointer-events: auto; }

.agenda-modal-content {
    background: var(--white);
    border-radius: var(--radius-lg);
    max-width: 580px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-xl);
    position: relative;
}

.modal-close {
    position: absolute;
    top: 14px; right: 14px;
    width: 34px; height: 34px;
    border-radius: 4px;
    background: rgba(0,0,0,0.28);
    border: 1px solid rgba(255,255,255,0.2);
    font-size: 1.2rem;
    color: var(--white);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: all 0.2s ease;
}

.modal-close:hover { background: var(--gold); color: var(--primary-dark); }

.modal-image-wrap {
    width: 100%;
    height: 210px;
    overflow: hidden;
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    position: relative;
}

.modal-image-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }

.modal-header {
    background: var(--primary);
    color: var(--white);
    padding: 32px 30px 28px;
    position: relative;
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    overflow: hidden;
}

.modal-image-wrap + .modal-header { border-radius: 0; }

.modal-header::before {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold));
}

.modal-date-box {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(230,255,43,0.12);
    border: 1px solid rgba(230,255,43,0.35);
    padding: 10px 16px;
    border-radius: var(--radius-sm);
    margin-bottom: 16px;
    position: relative; z-index: 1;
}

.modal-day { font-size: 1.9rem; font-weight: 600; line-height: 1; font-family: var(--font-heading); color: var(--white); }
.modal-month-year { font-size: 0.82rem; opacity: 0.88; line-height: 1.4; color: var(--gold-light); }
.modal-title { font-size: 1.15rem; font-weight: 600; line-height: 1.35; margin: 0; color: var(--white); position: relative; z-index: 1; }

.modal-body { padding: 26px 30px; }

.modal-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-bottom: 22px;
    padding: 14px;
    background: var(--accent);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
}

.modal-info-item { display: flex; align-items: center; gap: 10px; color: var(--text-dark); font-size: 0.88rem; }
.modal-info-item i { color: var(--gold-dark); font-size: 0.82rem; width: 16px; flex-shrink: 0; }

.modal-description { line-height: 1.75; color: var(--text-mid); font-size: 0.9rem; }
.modal-description p { margin-bottom: 12px; }

.modal-footer {
    padding: 16px 30px;
    background: var(--accent);
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: flex-end;
    border-radius: 0 0 var(--radius-lg) var(--radius-lg);
}

.modal-status { padding: 5px 16px; border-radius: 3px; font-size: 0.73rem; font-weight: 600; letter-spacing: 0.04em; }
.status-upcoming  { background: rgba(230,255,43,0.12); color: var(--gold-dark); border: 1px solid rgba(230,255,43,0.35); }
.status-ongoing   { background: rgba(34,197,94,0.1); color: #16a34a; border: 1px solid rgba(34,197,94,0.2); }
.status-completed { background: var(--accent); color: var(--text-light); border: 1px solid var(--border); }

/* ================= SURVEY ================= */
.survey-section {
    background: linear-gradient(rgba(7,46,56,0.58), rgba(7,46,56,0.58)), url('/images/qr2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 96px 0;
    color: white;
}

.survey-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
    position: relative;
    z-index: 1;
}

.survey-left { color: var(--white); }

.survey-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 14px;
}

.survey-label::before {
    content: '';
    width: 18px; height: 2px;
    background: var(--gold);
    border-radius: 1px;
}

.survey-title { font-size: 2.5rem; font-weight: 600; margin-bottom: 16px; line-height: 1.15; color: var(--white); letter-spacing: -0.02em; }
.survey-description { font-size: 1rem; line-height: 1.7; margin-bottom: 32px; color: rgba(255,255,255,0.72); }

.survey-right { display: flex; justify-content: center; align-items: center; }

.survey-qr {
    background: rgba(7,46,56,0.45);
    border-radius: var(--radius-lg);
    padding: 24px;
    border: 1px solid rgba(230,255,43,0.2);
    box-shadow: 0 16px 40px rgba(7,46,56,0.4);
    text-align: center;
}

.qr-box { background: var(--white); padding: 16px; border-radius: var(--radius-md); margin-bottom: 14px; box-shadow: var(--shadow-sm); }
.qr-image { width: 190px; height: 190px; display: block; margin: 0 auto; }

.qr-empty {
    width: 190px;
    height: 190px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: var(--accent2);
    border-radius: var(--radius-sm);
    margin: 0 auto;
}

.qr-empty i {
    font-size: 2.2rem;
    color: var(--primary);
    opacity: 0.28;
}

.qr-empty span {
    font-size: 0.73rem;
    font-weight: 600;
    color: var(--text-light);
    text-align: center;
    padding: 0 10px;
    line-height: 1.4;
}

/* ================= FOOTER ================= */
.main-footer {
    background: var(--primary-dark);
    color: rgba(255,255,255,0.82);
    padding: 60px 0 20px;
    font-size: 14px;
    position: relative;
}

.main-footer::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
}

/* fixed columns — lebih intentional dari auto-fit */
.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 48px;
    margin-bottom: 40px;
}

.footer-col h3 {
    color: var(--gold);
    margin-bottom: 14px;
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-family: var(--font-primary); /* heading di footer pakai sans agar lebih bersih */
}

.footer-brand { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; }
.footer-logo img { width: 52px; height: 52px; object-fit: contain; background: #fff; border-radius: 50%; padding: 4px; }
.footer-desc { margin-top: 10px; line-height: 1.65; color: rgba(255,255,255,0.58); font-size: 0.87rem; }

.footer-links { list-style: none; padding: 0; }
.footer-links li { margin-bottom: 7px; }
.footer-links a { color: rgba(255,255,255,0.65); text-decoration: none; transition: 0.2s; font-size: 0.88rem; }
.footer-links a:hover { color: var(--gold); }

.footer-col p { margin: 8px 0; display: flex; align-items: flex-start; gap: 8px; color: rgba(255,255,255,0.62); font-size: 0.86rem; line-height: 1.6; }
.footer-col i { color: var(--gold); flex-shrink: 0; margin-top: 3px; }

.footer-social a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 32px; height: 32px;
    background: rgba(255,255,255,0.07);
    border-radius: 4px; /* kotak, konsisten dengan desain lain */
    color: #fff;
    margin-right: 6px;
    transition: 0.2s;
    text-decoration: none;
}

.footer-social a:hover { background: var(--gold); color: var(--primary-dark); }

.footer-bottom {
    text-align: center;
    margin-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.08);
    padding-top: 16px;
    font-size: 12px;
    color: rgba(255,255,255,0.42);
}

/* ================= MISC ================= */
.main-container { margin: 0; padding: 0; }
.main-container section, section { margin-bottom: 0 !important; }

/* scrollbar — pakai warna sistem, bukan hardcode */
::-webkit-scrollbar { width: 5px; height: 5px; }
::-webkit-scrollbar-track { background: var(--accent2); }
::-webkit-scrollbar-thumb { background: var(--primary-light); border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: var(--primary-mid); }

.page-content { max-width: 100%; overflow-x: hidden; word-wrap: break-word; }
.page-content * { max-width: 100%; }
.page-content pre, .page-content code { white-space: normal; word-wrap: break-word; overflow-x: auto; }

.page-content table { width: 100% !important; border-collapse: collapse !important; margin: 24px 0 !important; }
.page-content table td, .page-content table th { border: 1px solid var(--border) !important; padding: 10px 14px !important; vertical-align: top !important; }
.page-content table tbody tr:first-child td { background-color: var(--primary) !important; color: #ffffff !important; font-weight: 600 !important; }
.page-content table tbody tr:nth-child(even) td { background-color: var(--accent) !important; }
.page-content table tbody tr:first-child:hover td { background-color: var(--primary-light) !important; }
.page-content table tbody tr:not(:first-child):hover td { background-color: var(--accent2) !important; }

.page-content img, .page-content table, .page-content iframe, .page-content video { max-width: 100% !important; height: auto !important; }
.page-content .table-responsive { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin: 20px 0; border-radius: 6px; }

.page-content h1 { font-size: clamp(1.5rem, 5vw, 2.2rem); }
.page-content h2 { font-size: clamp(1.3rem, 4vw, 1.8rem); }
.page-content h3 { font-size: clamp(1.1rem, 3.5vw, 1.4rem); }
.page-content h4 { font-size: clamp(1rem, 3vw, 1.2rem); }
.page-content p  { font-size: clamp(0.9rem, 2.5vw, 1rem); line-height: 1.6; }
.page-content ul, .page-content ol { padding-left: clamp(20px, 4vw, 30px); }
.page-content li { font-size: clamp(0.9rem, 2.5vw, 1rem); margin-bottom: 5px; }
.page-content blockquote { padding: clamp(15px,3vw,25px) clamp(20px,4vw,30px); font-size: clamp(0.9rem,2.5vw,1rem); margin: 20px 0; }
.page-content img { border-radius: clamp(6px,1.5vw,10px); margin: clamp(15px,3vw,25px) 0; }

.sidebar-news { padding: clamp(15px,3vw,24px); }
.sidebar-title { font-size: clamp(1.1rem,3vw,1.25rem); padding-bottom: clamp(8px,1.5vw,12px); margin-bottom: clamp(15px,2.5vw,20px); }
.sidebar-news-list a { font-size: clamp(0.85rem,2.5vw,0.95rem); }
.sidebar-news-list li { padding: clamp(8px,1.5vw,12px) 0; }
.page-layout { gap: clamp(20px,4vw,40px); }

.page-hero { min-height: clamp(200px,40vh,350px); padding: clamp(60px,10vh,100px) 0 clamp(30px,5vh,50px); }
.page-hero-title { font-size: clamp(1.2rem,5vw,2rem); }
.page-hero-title-wrap::before { min-height: clamp(24px,5vw,36px); width: clamp(3px,1vw,4px); }
.page-hero-breadcrumb { font-size: clamp(0.65rem,2vw,0.85rem); gap: clamp(4px,1vw,8px); margin-bottom: clamp(8px,1.5vh,15px); }

.py-5 { padding-top: clamp(1.5rem,5vh,3rem); padding-bottom: clamp(1.5rem,5vh,3rem); }

/* ================= POPUP ================= */
#popup-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.72);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: clamp(12px, 4vw, 32px);
    opacity: 0;
    animation: popupFadeIn 0.35s ease 0.3s forwards;
}

@keyframes popupFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes popupSlideUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

#popup-box {
    position: relative;
    width: min(600px, 90vw);
    max-height: min(90vh, 90dvh);
    animation: popupSlideUp 0.4s ease 0.35s both;
}

#popup-close-btn {
    position: absolute;
    top: -14px; right: -14px;
    width: 32px; height: 32px;
    background: var(--gold);
    color: var(--primary-dark);
    border: none;
    border-radius: 4px;
    font-size: 18px;
    font-weight: 700;
    line-height: 1;
    cursor: pointer;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    transition: background var(--transition), transform var(--transition);
}

#popup-close-btn:hover {
    background: var(--gold-dark);
    transform: scale(1.08);
}

#popup-img {
    width: 100%;
    height: auto;
    max-height: min(85vh, 85dvh);
    display: block;
    object-fit: contain;
    border-radius: var(--radius-md);
    box-shadow: 0 20px 50px rgba(7,46,56,0.5);
}

/* ================= RESPONSIVE ================= */
@media (min-width: 1400px) {
    .header-title h1 { font-size: 1.15rem; }
    .nav-link { font-size: 0.9rem; padding: 0 18px; }
    .hero-title { font-size: 4.2rem; }
}

@media (max-width: 1399px) { :root { --container-pad: 32px; } }

@media (max-width: 1199px) {
    :root { --container-pad: 24px; }
    .header-title h1 { font-size: 0.9rem; }
    .header-title span { font-size: 0.68rem; }
    .nav-link { font-size: 0.78rem; padding: 0 12px; }
    .logo { width: 44px; height: 44px; }
    .hero-title { font-size: 3rem; }
    .survey-title { font-size: 2.1rem; }
    .footer-grid { gap: 28px; }
}

@media (max-width: 991px) {
    :root { --container-pad: 20px; }
    .header-title h1 { font-size: 0.85rem; }
    .header-title span { font-size: 0.64rem; }
    .logo { width: 42px; height: 42px; }
    .logo-title-group { gap: 10px; }
    .header-container { min-height: 64px; padding: 8px 0; }
    .nav-link { font-size: 0.72rem; padding: 0 10px; height: 50px; }
    .top-bar-container { flex-direction: column; gap: 6px; }
    .top-bar-left { justify-content: center; gap: 14px; }
    .top-bar-right { justify-content: center; }
    .hero-section { min-height: 64vh; }
    .hero-title { font-size: 2.4rem; }
    .agenda-horizontal-wrapper { grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .agenda-card-small { height: 280px; }
    .survey-content { grid-template-columns: 1fr; gap: 36px; text-align: center; }
    .survey-right { justify-content: center; }
    .survey-title { font-size: 1.9rem; }
    .survey-label { justify-content: center; }
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 28px; }
    .page-layout { grid-template-columns: 1fr !important; }
    .page-sidebar { margin-top: 20px; }
}

@media (max-width: 768px) {
    :root { --container-pad: 16px; }

    .top-bar { padding: 6px 0; }
    .top-bar-container { flex-direction: column; gap: 4px; }
    .top-bar-left { flex-direction: column; gap: 3px; width: 100%; }
    .top-bar-item { justify-content: center; font-size: 0.7rem; width: 100%; }
    .top-bar-item span { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 260px; }
    .top-bar-right { width: 100%; justify-content: center; }

    .header-container { min-height: auto; padding: 8px 0; gap: 0; justify-content: space-between; }
    .logo-title-group { flex: 1; min-width: 0; gap: 8px; overflow: hidden; }
    .logo { width: 38px; height: 38px; flex-shrink: 0; }
    .header-title { padding-left: 10px; min-width: 0; flex: 1; overflow: hidden; }
    .header-title h1 { font-size: 0.78rem; }
    .header-title span { font-size: 0.6rem; }

    .menu-toggle {
        display: flex;
        flex-shrink: 0;
        width: 38px; height: 38px;
        margin-left: 8px;
        font-size: 1rem;
    }

    .main-nav {
        position: fixed;
        top: 0; right: -100%;
        width: 85%; max-width: 320px;
        height: 100vh;
        background: var(--primary-dark);
        transition: right 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        display: block;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .main-nav.active { right: 0; }

    .nav-menu {
        flex-direction: column;
        padding: 20px 0;
        gap: 0;
        width: 100%;
        align-items: stretch;
    }

    .nav-menu > li { display: block; width: 100%; }

    .nav-link {
        padding: 13px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.06) !important;
        border-left: none; border-right: none; border-top: none;
        border-radius: 0;
        font-size: 0.88rem;
        height: auto;
        white-space: normal;
        justify-content: space-between;
        width: 100%;
        display: flex;
    }

    .nav-link:hover {
        background: rgba(230,255,43,0.08) !important;
        padding-left: 26px;
        color: var(--gold) !important;
    }

    .nav-link.active {
        color: var(--gold) !important;
        background: rgba(230,255,43,0.12) !important;
        border-left: 3px solid var(--gold) !important;
        border-bottom: none !important;
    }

    .nav-submenu, .child-menu {
        position: static !important;
        opacity: 1 !important;
        visibility: visible !important;
        display: none !important;
        box-shadow: none;
        border: none;
        border-left: 2px solid var(--gold);
        margin-left: 15px;
        background: rgba(0,0,0,0.2);
        pointer-events: auto;
        width: auto;
        min-width: unset;
        transform: none !important;
    }

    .nav-submenu.flip-left, .child-menu.flip-left {
        left: auto !important; right: auto !important;
        margin-left: 15px !important; margin-right: 0 !important;
        border-left: 2px solid var(--gold) !important;
        border-right: none !important;
    }

    .nav-dropdown.open > .nav-submenu,
    .has-child.open > .child-menu { display: block !important; }

    .has-child > a::after { content: '\f078'; }
    .child-menu { margin-left: 0; }

    .hero-section { min-height: 50vh; }
    .hero-overlay { padding: 70px 0 60px; }
    .hero-title { font-size: 1.85rem; }
    .hero-eyebrow { font-size: 0.62rem; padding: 5px 11px; }

    .agenda-section { padding: 52px 0; }
    .agenda-header { flex-direction: column; align-items: center; gap: 8px; margin-bottom: 22px; }
    .agenda-title { font-size: 1.6rem; }
    .agenda-horizontal-wrapper { grid-template-columns: 1fr; gap: 14px; }
    .agenda-card-small { height: 230px; }
    .agenda-empty { padding: 40px 18px; }
    .agenda-empty-icon { width: 60px; height: 60px; }
    .agenda-empty-icon i { font-size: 1.5rem; }
    .agenda-empty-title { font-size: 0.97rem; }

    .survey-section { padding: 50px 0; }
    .survey-title { font-size: 1.55rem; }
    .survey-description { font-size: 0.88rem; }
    .survey-content { gap: 26px; }
    .qr-image { width: 150px; height: 150px; }
    .qr-empty { width: 150px; height: 150px; }

    .main-footer { padding: 40px 0 0; }
    .footer-grid { grid-template-columns: 1fr; gap: 20px; }
    .footer-bottom { flex-direction: column; text-align: center; gap: 6px; }
}

@media (max-width: 480px) {
    .logo { width: 34px; height: 34px; }
    .header-title { padding-left: 8px; }
    .header-title h1 { font-size: 0.72rem; }
    .header-title span { font-size: 0.56rem; }
    .menu-toggle { width: 36px; height: 36px; font-size: 0.95rem; }
    .hero-title { font-size: 1.55rem; }
    .agenda-title { font-size: 1.45rem; }
    .agenda-card-small { height: 205px; }
    .survey-title { font-size: 1.35rem; }
    .qr-image { width: 130px; height: 130px; }
    .qr-empty { width: 130px; height: 130px; }
    .view-all-btn, .view-all { font-size: 0.8rem; padding: 10px 20px; }
    .top-bar-item span { max-width: 220px; }
    #popup-box { max-width: 90%; }
    #popup-close-btn { top: -10px; right: -8px; width: 28px; height: 28px; font-size: 15px; }
    .main-nav { width: 85%; max-width: 280px; }
    .nav-link { font-size: 0.84rem; padding: 11px 16px; }
}

@media (prefers-reduced-motion: reduce) {
    * { animation-duration: 0.01ms !important; animation-iteration-count: 1 !important; transition-duration: 0.01ms !important; }
}
    </style>
</head>
<body>

@php
    $popupBanner = \App\Models\PopupBanner::where('is_active', true)->latest()->first();
@endphp

@if(request()->is('/') && $popupBanner && $popupBanner->image_path)
<div id="popup-overlay">
    <div id="popup-box">
        <button id="popup-close-btn" aria-label="Tutup">×</button>
        <img id="popup-img"
             src="{{ Storage::url($popupBanner->image_path) }}"
             alt="Informasi LPPMI">
    </div>
</div>
@endif

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="site-container">
            <div class="top-bar-container">
                <div class="top-bar-left">
                    <div class="top-bar-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $settings->phone }}</span>
                    </div>
                    <div class="top-bar-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                    </div>
                    <div class="top-bar-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $settings->address }}</span>
                    </div>
                </div>
                <div class="top-bar-right">
                    @if($settings->facebook)
                        <a href="{{ $settings->facebook }}" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($settings->twitter)
                        <a href="{{ $settings->twitter }}" class="social-link" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{ $settings->instagram }}" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($settings->youtube)
                        <a href="{{ $settings->youtube }}" class="social-link" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="site-header">
        <div class="site-container">
            <div class="header-container">
                <div class="logo-title-group">
                    <a href="{{ url('/') }}" class="logo">
                        @if(!empty($settings->logo))
                            <img src="{{ asset('storage/' . $settings->logo) }}"
                                 alt="Logo"
                                 style="width:100%;height:100%;object-fit:contain;filter:drop-shadow(0 2px 6px rgba(0,0,0,0.3));background:#F9F7F2;border-radius:50%;padding:3px;">
                        @else
                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="50" cy="50" r="45" fill="#F9F7F2" stroke="rgba(230,255,43,0.3)" stroke-width="1.5"/>
                                <image href="{{ asset('images/logo ugk.png') }}" x="15" y="15" width="70" height="70" preserveAspectRatio="xMidYMid meet"/>
                            </svg>
                        @endif
                    </a>
                    <div class="header-title">
                        <h1>{{ strtoupper($settings->site_name) }}</h1>
                        <span>{{ strtoupper($settings->site_subtitle) }}</span>
                    </div>
                </div>

                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>

                <nav class="main-nav" id="mainNav" aria-label="Menu utama">
                    <ul class="nav-menu" id="navMenu">
                        @foreach($menus as $menu)
                            @if($menu->children && $menu->children->count())
                                <li class="nav-dropdown">
                                    <a href="#" class="nav-link" onclick="return false;">
                                        {{ $menu->title }}
                                        <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <ul class="nav-submenu">
                                        @foreach($menu->children as $child)
                                            @if($child->children && $child->children->count())
                                                <li class="has-child">
                                                    <a href="{{ menu_url($child) }}">{{ $child->title }}</a>
                                                    <ul class="child-menu">
                                                        @foreach($child->children as $grandchild)
                                                            <li><a href="{{ menu_url($grandchild) }}">{{ $grandchild->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a href="{{ menu_url($child) }}">{{ $child->title }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ menu_url($menu) }}"
                                       class="nav-link {{ request()->url() === menu_url($menu) ? 'active' : '' }}">
                                        {{ $menu->title }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="menu-overlay" id="menuOverlay"></div>

    @php use Illuminate\Support\Facades\Storage; @endphp

    @if(request()->is('/') && isset($heroBanners) && $heroBanners->count())
    <section class="hero-section" id="heroSection">
        <div class="hero-slider" id="heroSlider">
            @foreach ($heroBanners as $index => $banner)
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                     style="background: url('{{ Storage::url($banner->image) }}'); background-size: cover; background-position: center;">
                </div>
            @endforeach
        </div>
        <div class="hero-overlay">
            <div class="site-container">
                <div class="hero-content">
                    <div class="hero-eyebrow">Universitas Gunung Kidul</div>
                    <h1 class="hero-title">Fakultas <span>Sosial & Humaniora</span> </h1>
                </div>
            </div>
        </div>
    </section>
    @endisset



    <main class="main-container">
        @yield('content')
    </main>

    

    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            @if(!empty($settings->logo))
                                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo">
                            @else
                                <img src="{{ asset('images/logo ugk.png') }}" alt="Logo">
                            @endif
                        </div>
                        <div>
                            <h3>{{ $settings->site_name }}</h3>
                        </div>
                    </div>
                    <p class="footer-desc">{{ $settings->footer_description }}</p>
                </div>

                <div class="footer-col">
                    <h3>Menu</h3>
                    <ul class="footer-links">
                        @foreach($menus as $menu)
                            <li><a href="{{ menu_url($menu) }}">{{ $menu->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-map-marker-alt"></i>{{ $settings->footer_address }}</p>
                    <p><i class="fas fa-phone-alt"></i>{{ $settings->footer_phone }}</p>
                    <p><i class="fas fa-envelope"></i>{{ $settings->footer_email }}</p>
                    <p><i class="fas fa-globe"></i>{{ $settings->footer_website }}</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>window.__agendaData = @json($agendas ?? []);</script>
    @yield('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const isMobile = () => window.innerWidth <= 768;

    /* ===== POPUP ===== */
    const popupOverlay = document.getElementById('popup-overlay');
    if (popupOverlay) {
        const closePopup = () => {
            popupOverlay.style.opacity = '0';
            setTimeout(() => popupOverlay.remove(), 300);
        };
        document.getElementById('popup-close-btn')?.addEventListener('click', e => { e.stopPropagation(); closePopup(); });
        popupOverlay.addEventListener('click', e => { if (e.target === popupOverlay) closePopup(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape' && document.getElementById('popup-overlay')) closePopup(); });
    }

    /* ===== MOBILE MENU ===== */
    const menuToggle  = document.getElementById('menuToggle');
    const mainNav     = document.getElementById('mainNav');
    const menuOverlay = document.getElementById('menuOverlay');

    const openMenu = () => {
        mainNav.classList.add('active');
        menuOverlay?.classList.add('active');
        document.body.classList.add('menu-open');
        if (menuToggle) menuToggle.innerHTML = '<i class="fas fa-times"></i>';
    };

    const closeMenu = () => {
        mainNav.classList.remove('active');
        menuOverlay?.classList.remove('active');
        document.body.classList.remove('menu-open');
        if (menuToggle) menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    };

    menuToggle?.addEventListener('click', e => {
        e.stopPropagation();
        mainNav.classList.contains('active') ? closeMenu() : openMenu();
    });

    menuOverlay?.addEventListener('click', closeMenu);

    window.addEventListener('resize', () => {
        if (!isMobile()) {
            closeMenu();
            document.querySelectorAll('.nav-dropdown.open, .has-child.open')
                .forEach(el => el.classList.remove('open'));
        }
    });

    /* ===== DROPDOWN MOBILE ===== */
    document.querySelectorAll('.nav-dropdown > .nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (!isMobile()) return;
            e.preventDefault(); e.stopPropagation();
            const parent = this.closest('.nav-dropdown');
            const isOpen = parent.classList.contains('open');
            document.querySelectorAll('.nav-dropdown.open').forEach(el => el.classList.remove('open'));
            if (!isOpen) parent.classList.add('open');
        });
    });

    document.querySelectorAll('.has-child > a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (!isMobile()) return;
            e.preventDefault(); e.stopPropagation();
            this.closest('.has-child').classList.toggle('open');
        });
    });

    document.querySelectorAll('.nav-submenu a:not(.has-child > a), .child-menu a').forEach(link => {
        link.addEventListener('click', function() {
            if (!isMobile()) return;
            const href = this.getAttribute('href');
            if (href && href !== '#') setTimeout(closeMenu, 150);
        });
    });

    document.querySelectorAll('.nav-menu > li:not(.nav-dropdown) > .nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (!isMobile()) return;
            const href = this.getAttribute('href');
            if (href && href !== '#') setTimeout(closeMenu, 150);
        });
    });

    /* ===== AGENDA MODAL ===== */
    const agendaModal = document.getElementById('agendaModal');
    const agendaData  = window.__agendaData || [];

    const openAgendaModal = (agendaId) => {
        const agenda = agendaData.find(a => a.id == agendaId);
        if (!agenda) return;

        const date = new Date(agenda.date);
        const day  = date.getDate().toString().padStart(2, '0');
        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        document.getElementById('modalDay').textContent = day;
        document.getElementById('modalMonthYear').textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;
        document.getElementById('modalTitle').textContent = agenda.title;
        document.getElementById('modalTime').textContent = agenda.time;
        document.getElementById('modalLocation').textContent = agenda.location;
        document.getElementById('modalDescription').innerHTML = agenda.description || '<p>Tidak ada deskripsi.</p>';

        const now = new Date();
        let cls = '', txt = '';
        if (date.toDateString() === now.toDateString()) { cls = 'status-ongoing';   txt = 'Berlangsung'; }
        else if (date < now)                            { cls = 'status-completed'; txt = 'Selesai'; }
        else                                            { cls = 'status-upcoming';  txt = 'Akan Datang'; }

        const statusEl = document.getElementById('modalStatus');
        statusEl.className = `modal-status ${cls}`;
        statusEl.textContent = txt;

        const imgWrap = document.getElementById('modalImageWrap');
        const imgEl   = document.getElementById('modalImage');
        if (agenda.image) { imgEl.src = '/storage/' + agenda.image; imgWrap.style.display = 'block'; }
        else              { imgWrap.style.display = 'none'; }

        agendaModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const closeAgendaModal = () => {
        agendaModal?.classList.remove('active');
        document.body.style.overflow = '';
    };

    document.querySelectorAll('.agenda-card-small').forEach(card => {
        card.addEventListener('click', () => openAgendaModal(card.getAttribute('data-agenda-id')));
    });

    document.getElementById('modalClose')?.addEventListener('click', closeAgendaModal);
    agendaModal?.addEventListener('click', e => { if (e.target === agendaModal) closeAgendaModal(); });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && agendaModal?.classList.contains('active')) closeAgendaModal();
    });

    /* ===== HERO SLIDER ===== */
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 1) {
        let cur = 0;
        setInterval(() => {
            slides[cur].classList.remove('active');
            cur = (cur + 1) % slides.length;
            slides[cur].classList.add('active');
        }, 5000);
    }
});
</script>
</body>
</html>