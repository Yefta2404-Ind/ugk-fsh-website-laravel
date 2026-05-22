<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pemeliharaan — LPPM Universitas Gunung Kidul</title>
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ─── Reset & Base ─── */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root {
  /* === PALET BARU DENGAN DOMINAN GOLD/LIME === */
  --primary:        #0B4650;   /* teal gelap (aksen pendukung) */
  --primary-light:  #155e6e;   /* teal medium */
  --primary-dark:   #072e38;   /* teal sangat tua */
  --primary-mid:    #0e5262;   /* teal tengah */

  /* === WARNA DOMINAN: LIME YELLOW (GOLD) === */
  --gold:           #E6FF2B;   /* lime yellow utama */
  --gold-light:     #eeff55;   /* lime terang */
  --gold-dark:      #c4db00;   /* lime tua */

  /* === WARNA NETRAL & UI === */
  --secondary:      #F9F7F2;   /* off-white utama */
  --accent:         #fdfcf9;   /* off-white sangat terang */
  --accent2:        #f0ede5;   /* off-white lebih hangat */
  --text-dark:      #072e38;   /* teal sangat gelap */
  --text-mid:       #0B4650;   /* teal medium */
  --text-light:     #898A8D;   /* gray muted */
  --white:          #ffffff;
  --border:         #dddbd5;   /* border netral */

  /* === SHADOW dengan sentuhan gold === */
  --shadow-sm:  0 2px 8px rgba(11,70,80,0.08);
  --shadow-md:  0 8px 28px rgba(11,70,80,0.13);
  --shadow-lg:  0 20px 50px rgba(11,70,80,0.16);
  --shadow-xl:  0 32px 70px rgba(11,70,80,0.20);
  --shadow-gold: 0 8px 20px rgba(230,255,43,0.25);

  --font-primary: 'DM Sans', sans-serif;
  --font-roboto:  'DM Sans', sans-serif;
  --font-heading: 'Cormorant Garamond', serif;
  --container-max: 1400px;
  --container-pad: 40px;
  --radius-sm:  8px;
  --radius-md:  14px;
  --radius-lg:  22px;
  --radius-xl:  32px;
  --transition: 0.25s cubic-bezier(0.4,0,0.2,1);
}

html { scroll-behavior: smooth; }

body {
  font-family: var(--font-primary);
  background: var(--white);
  color: var(--text-dark);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  -webkit-font-smoothing: antialiased;
}

/* ─── Top Nav ─── */
.topnav {
  position: sticky;
  top: 0;
  z-index: 100;
  background: rgba(255,255,255,.94);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-bottom: 1px solid var(--border);
  padding: 0 clamp(1.2rem, 5vw, 3rem);
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.nav-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
}

.nav-logo-icon {
  width: 34px;
  height: 34px;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
  background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.nav-logo-icon svg { color: var(--primary-dark); stroke-width: 1.8; }

.nav-logo-label {
  font-size: 13px;
  font-weight: 600;
  color: var(--text-dark);
  line-height: 1.3;
  font-family: var(--font-primary);
}

.nav-logo-label span {
  display: block;
  font-size: 10px;
  font-weight: 400;
  color: var(--text-light);
}

.nav-badge {
  display: flex;
  align-items: center;
  gap: 8px;
  font-family: var(--font-primary);
  font-size: 11px;
  font-weight: 500;
  color: var(--primary-dark);
  background: var(--gold-light);
  border: 1px solid var(--gold-dark);
  border-radius: 100px;
  padding: 5px 14px;
  letter-spacing: .04em;
  box-shadow: var(--shadow-gold);
}

.nav-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--primary-dark);
  animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
  0%,100% { opacity: 1; box-shadow: 0 0 0 0 rgba(11,70,80,.4); }
  50%      { opacity: .6; box-shadow: 0 0 0 5px rgba(230,255,43,0.6); }
}

/* ─── Main Layout ─── */
main {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: clamp(2.5rem, 8vw, 5rem) clamp(1.2rem, 5vw, 2rem);
}

.hero {
  width: 100%;
  max-width: 540px;
  text-align: center;
  animation: fadeUp .7s cubic-bezier(.16,1,.3,1) both;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(18px); }
  to   { opacity: 1; transform: none; }
}

/* ─── Icon dengan dominasi gold ─── */
.icon-wrap {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 76px;
  height: 76px;
  border-radius: var(--radius-lg);
  background: linear-gradient(145deg, var(--gold-light), var(--gold));
  border: 1px solid var(--gold-dark);
  margin-bottom: 28px;
  box-shadow: var(--shadow-gold);
  animation: fadeUp .7s .05s cubic-bezier(.16,1,.3,1) both;
}

.icon-wrap svg {
  color: var(--primary-dark);
  animation: rock 3.5s ease-in-out infinite;
  transform-origin: center;
  stroke-width: 1.6;
}

@keyframes rock { 0%,100% { transform: rotate(-10deg); } 50% { transform: rotate(10deg); } }

/* ─── Typography dengan aksen gold ─── */
.eyebrow {
  font-family: var(--font-primary);
  font-size: 11px;
  font-weight: 600;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--gold-dark);
  background: linear-gradient(135deg, var(--gold-dark), var(--primary));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 14px;
  animation: fadeUp .7s .08s cubic-bezier(.16,1,.3,1) both;
}

h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 6vw, 3.2rem);
  font-weight: 600;
  color: var(--text-dark);
  line-height: 1.12;
  letter-spacing: -.02em;
  margin-bottom: 16px;
  animation: fadeUp .7s .1s cubic-bezier(.16,1,.3,1) both;
}

h1 em {
  font-style: italic;
  background: linear-gradient(135deg, var(--gold-dark), var(--gold));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.desc {
  font-size: 15px;
  color: var(--text-mid);
  line-height: 1.65;
  font-weight: 400;
  max-width: 400px;
  margin: 0 auto 36px;
  animation: fadeUp .7s .12s cubic-bezier(.16,1,.3,1) both;
}

/* ─── Countdown dengan border gold ─── */
.countdown-wrap {
  margin-bottom: 32px;
  animation: fadeUp .7s .14s cubic-bezier(.16,1,.3,1) both;
}

.countdown-label {
  font-family: var(--font-primary);
  font-size: 10.5px;
  font-weight: 500;
  color: var(--text-light);
  letter-spacing: .09em;
  text-transform: uppercase;
  margin-bottom: 14px;
}

.countdown {
  display: inline-flex;
  align-items: flex-end;
  gap: 0;
  background: var(--white);
  border: 1px solid var(--gold);
  border-radius: var(--radius-md);
  padding: 18px 26px 14px;
  box-shadow: var(--shadow-gold);
  backdrop-filter: blur(2px);
}

.t-unit { display: flex; flex-direction: column; align-items: center; min-width: 58px; }

.t-num {
  font-family: var(--font-primary);
  font-size: clamp(2.8rem, 6vw, 3.8rem);
  font-weight: 600;
  background: linear-gradient(145deg, var(--primary-dark), var(--primary));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  line-height: 1;
  font-variant-numeric: tabular-nums;
  letter-spacing: -.02em;
}

.t-lbl {
  font-family: var(--font-primary);
  font-size: 9.5px;
  font-weight: 500;
  color: var(--gold-dark);
  letter-spacing: .09em;
  text-transform: uppercase;
  margin-top: 6px;
}

.t-sep {
  font-family: var(--font-primary);
  font-size: clamp(2rem, 4vw, 2.8rem);
  color: var(--gold);
  font-weight: 300;
  line-height: 1;
  padding: 0 6px;
  margin-bottom: 22px;
  flex-shrink: 0;
  text-shadow: 0 0 2px rgba(230,255,43,0.5);
}

/* ─── Progress dengan fill gold ─── */
.progress-wrap {
  margin-bottom: 32px;
  animation: fadeUp .7s .16s cubic-bezier(.16,1,.3,1) both;
}

.progress-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
}

.progress-top span {
  font-size: 11px;
  font-weight: 500;
  color: var(--text-light);
  font-family: var(--font-primary);
  letter-spacing: .04em;
}

.progress-top strong {
  font-size: 11px;
  font-weight: 600;
  background: linear-gradient(135deg, var(--gold-dark), var(--gold));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-family: var(--font-primary);
}

.progress-track {
  height: 4px;
  background: var(--accent2);
  border-radius: 100px;
  overflow: hidden;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
}

.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
  border-radius: 100px;
  transition: width 1.2s ease;
  position: relative;
  overflow: hidden;
  box-shadow: 0 0 6px var(--gold);
}

.progress-fill::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.5), transparent);
  animation: shim 2.4s ease-in-out infinite;
  transform: translateX(-100%);
}

@keyframes shim { to { transform: translateX(200%); } }

/* ─── ETA Row dengan aksen gold ─── */
.eta-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 18px;
  background: linear-gradient(120deg, var(--secondary), #fff8e0);
  border: 1px solid var(--gold);
  border-radius: var(--radius-md);
  margin-bottom: 28px;
  text-align: left;
  box-shadow: var(--shadow-gold);
  animation: fadeUp .7s .18s cubic-bezier(.16,1,.3,1) both;
}

.eta-icon {
  width: 32px; height: 32px;
  border-radius: var(--radius-sm);
  background: var(--gold-light);
  border: 1px solid var(--gold-dark);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}

.eta-icon svg { color: var(--primary-dark); }

.eta-text { 
  font-size: 13px; 
  color: var(--text-mid); 
  line-height: 1.5; 
  font-weight: 500;
}

.eta-text strong { 
  background: linear-gradient(145deg, var(--gold-dark), var(--gold));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 700;
}

/* ─── Contact dengan link berwarna gold ─── */
.contact {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: var(--text-light);
  animation: fadeUp .7s .20s cubic-bezier(.16,1,.3,1) both;
}

.contact a {
  color: var(--gold-dark);
  text-decoration: none;
  font-weight: 600;
  transition: all var(--transition);
  border-bottom: 1px dotted transparent;
}

.contact a:hover { 
  color: var(--gold);
  border-bottom-color: var(--gold-dark);
  text-shadow: 0 0 2px rgba(230,255,43,0.3);
}

/* ─── Footer dengan sentuhan gold ─── */
footer {
  border-top: 1px solid var(--gold);
  background: linear-gradient(180deg, var(--secondary), #fffef7);
  padding: 22px clamp(1.2rem, 5vw, 3rem);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
}

.foot-copy {
  font-size: 12px;
  color: var(--text-light);
  font-weight: 400;
}

.foot-links {
  display: flex;
  gap: 24px;
  flex-wrap: wrap;
}

.foot-links a {
  font-size: 12px;
  color: var(--gold-dark);
  text-decoration: none;
  transition: color var(--transition);
  font-weight: 500;
}

.foot-links a:hover { color: var(--gold); text-shadow: 0 0 2px rgba(230,255,43,0.4); }

/* ─── Responsive ─── */
@media (max-width: 600px) {
  .nav-logo-label span { display: none; }
  .countdown { padding: 14px 18px; }
  .t-unit { min-width: 48px; }
  .t-sep { padding: 0 3px; margin-bottom: 18px; }
  footer {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }
  .foot-links { gap: 16px; }
}

@media (max-width: 400px) {
  .countdown { padding: 12px 14px; gap: 0; }
  .t-unit { min-width: 40px; }
  .t-sep { padding: 0 2px; }
  .eta-row { padding: 10px 14px; }
}

/* ─── Print ─── */
@media print {
  .topnav, .countdown-wrap, .progress-wrap, .eta-row { display: none; }
  body { background: white; }
}
</style>
</head>
<body>

<!-- ═══ TOP NAV (nama diubah menjadi LPPM) ═══ -->
<nav class="topnav">
  <a href="#" class="nav-logo">
    <div class="nav-logo-icon">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
        <path d="M6 12v5c0 1.7 2.7 3 6 3s6-1.3 6-3v-5"/>
      </svg>
    </div>
    <div class="nav-logo-label">
      LPPM Universitas Gunung Kidul
      <span>Lembaga Penelitian & Pengabdian Masyarakat</span>
    </div>
  </a>
  <div class="nav-badge">
    <span class="nav-dot"></span>
    Maintenance Mode
  </div>
</nav>

<!-- ═══ MAIN ═══ -->
<main>
  <div class="hero">

    <div class="icon-wrap">
      <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
      </svg>
    </div>

    <p class="eyebrow">Pemeliharaan Terjadwal</p>

    <h1>Kami sedang<br>memperbarui <em>sistem</em></h1>

    <p class="desc">Website LPPM sedang dalam pemeliharaan rutin untuk meningkatkan performa dan keandalan layanan. Mohon bersabar — kami segera kembali.</p>

    <!-- Countdown -->
    <div class="countdown-wrap">
      <p class="countdown-label">Estimasi waktu selesai</p>
      <div class="countdown">
        <div class="t-unit">
          <span class="t-num" id="hours">02</span>
          <span class="t-lbl">Jam</span>
        </div>
        <div class="t-sep">:</div>
        <div class="t-unit">
          <span class="t-num" id="minutes">00</span>
          <span class="t-lbl">Menit</span>
        </div>
        <div class="t-sep">:</div>
        <div class="t-unit">
          <span class="t-num" id="seconds">00</span>
          <span class="t-lbl">Detik</span>
        </div>
      </div>
    </div>

    <!-- Progress -->
    <div class="progress-wrap">
      <div class="progress-top">
        <span>Progress pemeliharaan</span>
        <strong id="pctLabel">74%</strong>
      </div>
      <div class="progress-track">
        <div class="progress-fill" id="progressFill" style="width:74%"></div>
      </div>
    </div>

    <!-- ETA dengan aksen gold -->
    <div class="eta-row">
      <div class="eta-icon">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <polyline points="12 6 12 12 16 14"/>
        </svg>
      </div>
      <div class="eta-text">Perkiraan selesai: <strong id="etaText">± 1–2 jam lagi</strong></div>
    </div>

    <!-- Kontak support dengan warna gold -->
    <div class="contact">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
        <polyline points="22,6 12,13 2,6"/>
      </svg>
      <span>Ada pertanyaan? <a href="mailto:lppm@ugk.ac.id">lppm@ugk.ac.id</a></span>
    </div>

  </div>
</main>

<footer>
  <div class="foot-copy">© 2025 LPPM Universitas Gunung Kidul — Membangun inovasi</div>
  <div class="foot-links">
    <a href="#">Beranda</a>
    <a href="#">Pengumuman</a>
    <a href="#">Kontak</a>
    <a href="#">Status</a>
  </div>
</footer>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script>
(function () {
  /* ── Countdown — persist via localStorage ── */
  var KEY = 'lppm_maint_end';   /* diubah jadi LPPM */
  var stored = localStorage.getItem(KEY);
  var end = stored ? parseInt(stored, 10) : Date.now() + (2 * 60 + 8) * 60000;
  if (!stored) localStorage.setItem(KEY, String(end));

  function pad(n) { return String(Math.floor(n)).padStart(2, '0'); }

  function tick() {
    var d = end - Date.now();
    if (d <= 0) {
      document.getElementById('hours').textContent   = '00';
      document.getElementById('minutes').textContent = '00';
      document.getElementById('seconds').textContent = '00';
      document.getElementById('etaText').innerHTML = 'sebentar lagi';
      return;
    }
    document.getElementById('hours').textContent   = pad(d / 3600000);
    document.getElementById('minutes').textContent = pad(d % 3600000 / 60000);
    document.getElementById('seconds').textContent = pad(d % 60000 / 1000);
  }
  tick();
  setInterval(tick, 1000);

  /* ── Progress — persist via localStorage ── */
  var PKEY = 'lppm_maint_pct';  /* diubah jadi LPPM */
  var p = parseFloat(localStorage.getItem(PKEY) || '74');
  var fill  = document.getElementById('progressFill');
  var label = document.getElementById('pctLabel');
  var eta   = document.getElementById('etaText');

  fill.style.width  = p + '%';
  label.textContent = Math.round(p) + '%';
  if      (p >= 88) eta.innerHTML = '< 30 menit lagi';
  else if (p >= 78) eta.innerHTML = '± 1 jam lagi';

  setInterval(function () {
    if (p >= 94) return;
    p = Math.min(94, parseFloat((p + Math.random() * 0.8 + 0.25).toFixed(1)));
    localStorage.setItem(PKEY, String(p));
    fill.style.width  = p + '%';
    label.textContent = Math.round(p) + '%';
    if      (p >= 88) eta.innerHTML = '< 30 menit lagi';
    else if (p >= 78) eta.innerHTML = '± 1 jam lagi';
  }, 7000);
})();
</script>
</body>
</html>