@extends('layouts.public')

@section('title', 'Fakultas Teknik dan Ilmu Komputer — Universitas Gunung Kidul')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
:root {
  --font-sans: 'DM Sans', system-ui, -apple-system, sans-serif;
  --primary: #0F2B3D;
  --primary-dark: #0A1E2C;
  --primary-light: #1A4A6F;
  --primary-mid: #2C5F82;
  --secondary: #FFFFFF;
  --accent: #F8FAFC;
  --border: #E2E8F0;
  --text-light: #64748B;
  --text-mid: #334155;
  --gold: #F59E0B;
  --gold-light: #FEF3C7;
  --gold-dark: #B45309;
}

/* ─── QUICK ACCESS BAR ─── */
.ftik-qa-bar {
  background: var(--primary-dark);
  border-bottom: 1px solid rgba(255,255,255,0.08);
  overflow: hidden;
  height: 44px;
  display: flex;
  align-items: center;
}
.ftik-qa-wrap {
  flex: 1;
  overflow: hidden;
  position: relative;
  -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 60px, #000 calc(100% - 60px), transparent 100%);
  mask-image: linear-gradient(to right, transparent 0%, #000 60px, #000 calc(100% - 60px), transparent 100%);
  cursor: default;
}
.ftik-qa-ticker {
  display: flex;
  align-items: center;
  will-change: transform;
  white-space: nowrap;
  user-select: none;
}
.ftik-qa-link {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 0 20px;
  height: 44px;
  font-size: 12.5px;
  font-weight: 500;
  font-family: var(--font-sans);
  color: rgba(255,255,255,0.75);
  border-right: 1px solid rgba(255,255,255,0.08);
  flex-shrink: 0;
  text-decoration: none;
}
.ftik-qa-link:hover { color: #fff; }
.ftik-qa-icon {
  width: 24px; height: 24px;
  border-radius: 4px;
  display: inline-flex; align-items: center; justify-content: center;
  font-size: 12px; line-height: 1; flex-shrink: 0;
  background: rgba(255,255,255,0.15) !important;
  border: 1px solid rgba(255,255,255,0.12);
}

/* ─── PAGE WRAPPER ─── */
.ftik-body { background: var(--secondary); }
.ftik-container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 40px;
}

/* ─── SECTION ─── */
.ftik-section {
  padding: 72px 0;
  border-bottom: 1px solid var(--border);
  background: var(--secondary);
}
.ftik-section.alt { background: var(--accent); }

.ftik-section-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 20px;
  margin-bottom: 40px;
  padding-bottom: 20px;
  border-bottom: 1px solid var(--border);
}
.ftik-section-title {
  font-family: var(--font-sans);
  font-size: clamp(1.6rem, 2.5vw, 2.2rem);
  font-weight: 600;
  color: var(--primary);
  line-height: 1.15;
  letter-spacing: -.01em;
}
.ftik-section-desc {
  font-size: .9rem;
  font-family: var(--font-sans);
  color: var(--text-light);
  margin-top: 6px;
  line-height: 1.6;
  max-width: 480px;
}
.ftik-see-all {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: .82rem;
  font-weight: 500;
  font-family: var(--font-sans);
  color: var(--primary);
  text-decoration: none;
  flex-shrink: 0;
  white-space: nowrap;
  border-bottom: 1px solid var(--primary);
  padding-bottom: 1px;
}
.ftik-see-all:hover { opacity: .7; }

/* ─── HERO / DEKAN ─── */
.ftik-hero {
  display: grid;
  grid-template-columns: 1fr 280px;
  min-height: 420px;
  border-bottom: 1px solid var(--border);
  background: var(--secondary);
}
.ftik-hero-left {
  padding: 56px 48px 56px 0;
  border-right: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 28px;
}
.ftik-hero-keterangan {
  font-size: .78rem;
  font-weight: 500;
  font-family: var(--font-sans);
  color: var(--text-light);
  margin-bottom: 10px;
  text-transform: uppercase;
  letter-spacing: .06em;
}
.ftik-hero-headline {
  font-family: var(--font-sans);
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 600;
  line-height: 1.15;
  color: var(--primary);
  letter-spacing: -.015em;
}
.ftik-hero-quote {
  padding: 18px 0 18px 18px;
  border-left: 2px solid var(--border);
}
.ftik-hero-quote p {
  font-family: var(--font-sans);
  font-size: .92rem;
  font-style: italic;
  line-height: 1.8;
  color: var(--text-mid);
  max-width: 520px;
}
.ftik-dean-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--primary);
  color: white;
  padding: 10px 24px;
  border-radius: 40px;
  font-size: 0.8rem;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.2s;
  margin-top: 8px;
}
.ftik-dean-button:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
}

/* Dekan sidebar */
.ftik-hero-right {
  background: var(--primary);
  padding: 36px 24px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
}
.ftik-dean-frame {
  width: 150px; height: 190px;
  background: rgba(255,255,255,.08);
  border-radius: 4px;
  overflow: hidden;
  display: flex; align-items: center; justify-content: center;
}
.ftik-dean-frame img { width: 100%; height: 100%; object-fit: cover; object-position: top; }
.ftik-dean-ph { font-size: 52px; opacity: .2; color: #fff; }
.ftik-dean-card {
  width: 100%;
  background: rgba(255,255,255,.07);
  border-radius: 4px;
  padding: 14px 16px;
  text-align: center;
}
.ftik-dean-role {
  font-size: .68rem;
  font-weight: 600;
  font-family: var(--font-sans);
  color: rgba(255,255,255,.55);
  margin-bottom: 5px;
  text-transform: uppercase;
  letter-spacing: .08em;
}
.ftik-dean-name {
  font-family: var(--font-sans);
  font-size: 1rem;
  font-weight: 600;
  color: #fff;
  margin-bottom: 3px;
  line-height: 1.3;
}
.ftik-dean-period {
  font-size: .72rem;
  font-family: var(--font-sans);
  color: rgba(255,255,255,.4);
}

/* ─── VISI MISI ─── */
.ftik-vm-layout {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 1px;
  background: var(--border);
  border: 1px solid var(--border);
  border-radius: 6px;
  overflow: hidden;
}
.ftik-vm-visi {
  background: var(--primary);
  padding: 40px 32px;
  display: flex; flex-direction: column;
}
.ftik-vm-misi { background: var(--secondary); padding: 32px; }
.ftik-vm-tujuan { background: var(--accent); padding: 32px; }

.ftik-vm-label {
  font-size: .7rem;
  font-weight: 600;
  font-family: var(--font-sans);
  text-transform: uppercase;
  letter-spacing: .08em;
  margin-bottom: 12px;
}
.ftik-vm-visi .ftik-vm-label { color: rgba(255,255,255,.45); }
.ftik-vm-misi .ftik-vm-label { color: var(--text-light); }
.ftik-vm-tujuan .ftik-vm-label { color: var(--text-light); }

.ftik-vm-heading {
  font-family: var(--font-sans);
  font-size: 1.5rem;
  font-weight: 600;
  line-height: 1.15;
  margin-bottom: 20px;
}
.ftik-vm-visi .ftik-vm-heading { color: #fff; }
.ftik-vm-misi .ftik-vm-heading,
.ftik-vm-tujuan .ftik-vm-heading { font-size: 1.2rem; color: var(--primary); }

.ftik-vm-text {
  font-family: var(--font-sans);
  font-size: .9rem;
  line-height: 1.8;
  color: rgba(255,255,255,.72);
  margin-top: auto;
}
.ftik-vm-list { list-style: none; }
.ftik-vm-list li {
  display: flex; gap: 10px; align-items: flex-start;
  padding: 9px 0;
  border-bottom: 1px solid var(--border);
  font-size: .87rem;
  font-family: var(--font-sans);
  color: var(--text-mid);
  line-height: 1.55;
}
.ftik-vm-list li:last-child { border: none; padding-bottom: 0; }
.ftik-vm-num {
  font-size: .68rem;
  font-weight: 600;
  font-family: var(--font-sans);
  color: #fff;
  background: var(--primary-light);
  width: 20px; height: 20px;
  border-radius: 3px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 2px;
}
.ftik-vm-num.sea { background: var(--primary); }

/* ─── PROGRAM STUDI ─── */
.ftik-prodi-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
  gap: 24px;
}

/* Jika hanya 2 prodi → tampil di tengah */
.ftik-prodi-grid.ftik-prodi-grid-center {
  grid-template-columns: repeat(2, minmax(340px, 420px));
  justify-content: center;
}

/* CARD bisa diklik seluruhnya */
.ftik-prodi-card {
  background: var(--secondary);
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: all 0.25s ease;
  cursor: pointer;
  text-decoration: none;
  color: inherit;
  position: relative;
}
.ftik-prodi-card:hover {
  border-color: var(--primary-light);
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0,0,0,0.08);
}
.ftik-prodi-top {
  padding: 24px 24px 20px;
  border-bottom: 1px solid var(--border);
  flex: 1;
}
.ftik-prodi-bottom {
  padding: 14px 24px;
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  background: var(--accent);
  border-top: 1px solid var(--border);
}
.ftik-prodi-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 12px;
  margin-bottom: 16px;
}
.ftik-prodi-badge {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform 0.2s;
}
.ftik-prodi-card:hover .ftik-prodi-badge {
  transform: scale(1.05);
}
.ftik-prodi-badge-text {
  font-size: 0.85rem;
  font-weight: 700;
  font-family: var(--font-sans);
  color: #fff;
}
.ftik-prodi-accr {
  font-size: 0.7rem;
  font-weight: 600;
  font-family: var(--font-sans);
  color: var(--gold-dark);
  background: var(--gold-light);
  padding: 4px 12px;
  border-radius: 30px;
  border: 1px solid var(--gold);
  white-space: nowrap;
}
.ftik-prodi-name {
  font-family: var(--font-sans);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--primary);
  line-height: 1.3;
  margin-bottom: 10px;
}
.ftik-prodi-desc {
  font-size: 0.85rem;
  font-family: var(--font-sans);
  color: var(--text-light);
  line-height: 1.65;
}
.ftik-prodi-meta {
  font-size: 0.75rem;
  font-weight: 500;
  font-family: var(--font-sans);
  color: var(--text-mid);
  display: flex;
  align-items: center;
  gap: 8px;
  background: white;
  padding: 5px 14px;
  border-radius: 30px;
  border: 1px solid var(--border);
}
.ftik-prodi-arrow {
  position: absolute;
  bottom: 16px;
  right: 20px;
  width: 28px;
  height: 28px;
  background: var(--primary);
  border-radius: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: all 0.2s;
  color: white;
  font-size: 12px;
}
.ftik-prodi-card:hover .ftik-prodi-arrow {
  opacity: 1;
  transform: translateX(4px);
}

/* ─── BERITA & AGENDA ─── */
.ftik-news-layout {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 36px;
  align-items: start;
}
.ftik-news-layout > div:first-child {
  min-width: 0;
}
.ftik-filter {
  display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px;
}
.ftik-f-btn {
  font-size: .75rem;
  font-weight: 500;
  font-family: var(--font-sans);
  padding: 6px 18px;
  border: 1px solid var(--border);
  background: transparent;
  color: var(--text-light);
  cursor: pointer;
  border-radius: 40px;
  transition: all 0.2s;
}
.ftik-f-btn.on, .ftik-f-btn:hover {
  background: var(--primary);
  color: #fff;
  border-color: var(--primary);
}
.ftik-news-scroll {
  overflow: hidden;
  position: relative;
  cursor: default;
}
.ftik-news-grid {
  display: flex;
  gap: 20px;
  will-change: transform;
  user-select: none;
  padding-left: 2px;
}
.ftik-news-card {
  background: var(--secondary);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
  width: 280px;
  transition: all 0.2s ease;
  text-decoration: none;
  color: inherit;
}
.ftik-news-card:hover {
  border-color: var(--primary-light);
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}
.ftik-news-thumb {
  width: 100%; height: 160px;
  overflow: hidden;
  background: var(--accent);
  position: relative;
}
.ftik-news-thumb img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.3s;
}
.ftik-news-card:hover .ftik-news-thumb img {
  transform: scale(1.05);
}
.ftik-news-thumb-ph {
  width: 100%; height: 100%;
  display: flex; align-items: center; justify-content: center;
  font-size: 40px;
  color: var(--text-light);
}
.ftik-news-cat {
  position: absolute; top: 12px; left: 12px;
  font-size: .65rem;
  font-weight: 600;
  font-family: var(--font-sans);
  background: var(--primary);
  color: #fff;
  padding: 4px 12px;
  border-radius: 30px;
}
.ftik-news-body {
  padding: 18px;
  flex: 1; display: flex; flex-direction: column;
}
.ftik-news-title {
  font-family: var(--font-sans);
  font-size: .95rem;
  font-weight: 600;
  line-height: 1.4;
  color: var(--primary);
  margin-bottom: 8px;
}
.ftik-news-excerpt {
  font-size: .82rem;
  font-family: var(--font-sans);
  line-height: 1.6;
  color: var(--text-light);
  margin-bottom: 12px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.ftik-news-footer {
  display: flex; align-items: center;
  justify-content: space-between;
  margin-top: auto;
  padding-top: 12px;
  border-top: 1px solid var(--border);
}
.ftik-news-date {
  font-size: .72rem;
  font-family: var(--font-sans);
  color: var(--text-light);
  display: flex; align-items: center; gap: 5px;
}
.ftik-news-badge {
  font-size: .65rem;
  font-weight: 600;
  font-family: var(--font-sans);
  background: var(--gold-light);
  color: var(--gold-dark);
  border: 1px solid var(--gold);
  padding: 2px 10px;
  border-radius: 30px;
}

/* Agenda sidebar */
.ftik-agenda-box {
  background: var(--primary);
  border-radius: 20px;
  padding: 24px;
  position: sticky;
  top: 90px;
}
.ftik-agenda-title {
  font-family: var(--font-sans);
  font-size: 1rem;
  font-weight: 600;
  color: #fff;
  margin-bottom: 20px;
}
.ftik-ag-item {
  display: flex; gap: 12px; align-items: flex-start;
  padding: 12px 0;
  border-bottom: 1px solid rgba(255,255,255,.1);
  cursor: pointer;
  background: none;
  width: 100%; text-align: left; color: inherit;
  transition: opacity 0.2s;
}
.ftik-ag-item:last-child { border-bottom: none; }
.ftik-ag-item:hover { opacity: .8; }
.ftik-ag-date {
  width: 44px; height: 48px;
  border-radius: 10px;
  flex-shrink: 0;
  display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 2px;
}
.ftik-ag-date.future { background: rgba(255,255,255,.12); }
.ftik-ag-date.today { background: var(--gold); }
.ftik-ag-date.past { background: rgba(255,255,255,.05); }
.ftik-ag-day {
  font-family: var(--font-sans);
  font-size: 1.1rem;
  font-weight: 700;
  color: #fff;
  line-height: 1;
}
.ftik-ag-date.today .ftik-ag-day,
.ftik-ag-date.today .ftik-ag-mon { color: var(--primary-dark); }
.ftik-ag-mon {
  font-size: .55rem;
  font-weight: 600;
  text-transform: uppercase;
  font-family: var(--font-sans);
  color: rgba(255,255,255,.6);
}
.ftik-ag-body { flex: 1; }
.ftik-ag-title {
  font-size: .82rem;
  font-family: var(--font-sans);
  font-weight: 500;
  color: rgba(255,255,255,.9);
  line-height: 1.4;
  margin-bottom: 4px;
}
.ftik-ag-meta {
  font-size: .68rem;
  font-family: var(--font-sans);
  color: rgba(255,255,255,.45);
}
.ftik-ag-arr {
  font-size: .9rem;
  color: rgba(255,255,255,.3);
  align-self: center;
  margin-left: auto;
}

/* ─── MODAL ─── */
.ftik-modal-overlay {
  position: fixed; inset: 0;
  background: rgba(0,0,0,0.6);
  backdrop-filter: blur(4px);
  z-index: 20000;
  display: none; align-items: center; justify-content: center;
  padding: 20px;
}
.ftik-modal-overlay.open { display: flex; }
.ftik-modal-box {
  background: var(--secondary);
  width: 100%; max-width: 520px;
  border-radius: 24px;
  border: 1px solid var(--border);
  padding: 28px;
  position: relative;
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}
.ftik-modal-close {
  position: absolute; top: 16px; right: 16px;
  background: var(--accent); border: 1px solid var(--border);
  cursor: pointer;
  font-size: 1.2rem; color: var(--text-light);
  width: 32px; height: 32px;
  display: flex; align-items: center; justify-content: center;
  border-radius: 50%;
  transition: all 0.2s;
}
.ftik-modal-close:hover {
  background: var(--border);
  color: var(--text-mid);
}
.ftik-modal-title {
  font-family: var(--font-sans);
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 16px;
  line-height: 1.3;
  padding-right: 32px;
}
.ftik-modal-chips {
  display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;
}
.ftik-modal-chip {
  font-size: .8rem;
  font-family: var(--font-sans);
  color: var(--text-mid);
  background: var(--accent);
  padding: 5px 14px;
  border-radius: 30px;
  border: 1px solid var(--border);
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.ftik-modal-body {
  font-size: .92rem;
  font-family: var(--font-sans);
  line-height: 1.75;
  color: var(--text-mid);
}

/* ─── RESPONSIVE ─── */
@media (max-width: 1199px) {
  .ftik-container { padding: 0 24px; }
  .ftik-news-layout { grid-template-columns: 1fr 280px; gap: 24px; }
}
@media (max-width: 991px) {
  .ftik-container { padding: 0 20px; }
  .ftik-hero { grid-template-columns: 1fr; }
  .ftik-hero-right { display: none; }
  .ftik-hero-left { padding: 40px 0; border-right: none; }
  .ftik-vm-layout { grid-template-columns: 1fr; }
  .ftik-vm-visi, .ftik-vm-misi, .ftik-vm-tujuan { padding: 28px 24px; }
  .ftik-prodi-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
  .ftik-prodi-grid.ftik-prodi-grid-center { grid-template-columns: repeat(2, 1fr); }
  .ftik-news-layout { grid-template-columns: 1fr; gap: 28px; }
  .ftik-agenda-box { position: static; }
  .ftik-section { padding: 52px 0; }
  .ftik-section-head { flex-direction: column; align-items: flex-start; gap: 10px; }
}
@media (max-width: 768px) {
  .ftik-container { padding: 0 16px; }
  .ftik-hero-left { padding: 28px 0; }
  .ftik-hero-headline { font-size: clamp(1.5rem, 5.5vw, 2rem); }
  .ftik-prodi-grid { grid-template-columns: 1fr; }
  .ftik-prodi-grid.ftik-prodi-grid-center { grid-template-columns: 1fr; }
  .ftik-prodi-top { padding: 20px 18px 16px; }
  .ftik-prodi-bottom { padding: 12px 18px; }
  .ftik-news-thumb { height: 150px; }
  .ftik-agenda-box { padding: 20px 16px; }
  .ftik-section { padding: 40px 0; }
}
@media (max-width: 480px) {
  .ftik-section-title { font-size: 1.5rem; }
  .ftik-news-thumb { height: 140px; }
  .ftik-modal-box { padding: 20px 16px; }
  .ftik-modal-title { font-size: 1.15rem; }
}
</style>
@endsection


@section('content')

<div class="ftik-body">

{{-- ═══ QUICK ACCESS BAR ══════════════════════════════════════════ --}}
<div class="ftik-qa-bar">
  <div class="ftik-container" style="overflow:hidden;">
    <div class="ftik-qa-wrap">
      <div class="ftik-qa-ticker" id="ftikTicker">
        @foreach($quickAccesses ?? [] as $item)
        @php
          $ic      = trim($item->icon ?? '');
          $bgColor = $item->bg_color ?? 'var(--primary-light)';
          $isFa    = $ic && (preg_match('/^fa[srlbd]?\s+fa-/', $ic) || preg_match('/^fa-[a-z]/', $ic));
          $isTag   = $ic && Str::startsWith($ic, '<');
        @endphp
        <a href="{{ $item->url }}" class="ftik-qa-link"
           @if(Str::startsWith($item->url, 'http')) target="_blank" rel="noopener" @endif>
          <span class="ftik-qa-icon" style="background:{{ $bgColor }};">
            @if($isFa)
              <i class="{{ $ic }}" style="font-size:12px;color:#fff;" aria-hidden="true"></i>
            @elseif($isTag)
              {!! $ic !!}
            @elseif($ic)
              <span style="font-size:13px;line-height:1;">{{ $ic }}</span>
            @else
              <span style="color:#fff;font-size:12px;">⚡</span>
            @endif
          </span>
          {{ $item->title }}
        </a>
        @endforeach
        @foreach($quickAccesses ?? [] as $item)
        @php
          $ic      = trim($item->icon ?? '');
          $bgColor = $item->bg_color ?? 'var(--primary-light)';
          $isFa    = $ic && (preg_match('/^fa[srlbd]?\s+fa-/', $ic) || preg_match('/^fa-[a-z]/', $ic));
          $isTag   = $ic && Str::startsWith($ic, '<');
        @endphp
        <a href="{{ $item->url }}" class="ftik-qa-link" aria-hidden="true" tabindex="-1"
           @if(Str::startsWith($item->url, 'http')) target="_blank" rel="noopener" @endif>
          <span class="ftik-qa-icon" style="background:{{ $bgColor }};">
            @if($isFa)
              <i class="{{ $ic }}" style="font-size:12px;color:#fff;" aria-hidden="true"></i>
            @elseif($isTag)
              {!! $ic !!}
            @elseif($ic)
              <span style="font-size:13px;line-height:1;">{{ $ic }}</span>
            @else
              <span style="color:#fff;font-size:12px;">⚡</span>
            @endif
          </span>
          {{ $item->title }}
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>


{{-- ═══ HERO / DEKAN ════════════════════════════════════════════════ --}}
<div class="ftik-container" id="profil">
<div class="ftik-hero">
  <div class="ftik-hero-left">
    <div>
      <div class="ftik-hero-keterangan">Sambutan Dekan</div>
      <h1 class="ftik-hero-headline">
        {!! $profile->dean_title ?? 'Selamat Datang di Fakultas Teknik &amp; Ilmu Komputer' !!}
      </h1>
    </div>
    <div>
      <div class="ftik-hero-quote">
        <p>{{ $profile->dean_message ?? 'Kami berkomitmen membentuk lulusan yang tidak hanya kompeten secara teknis, tetapi juga mampu berpikir kritis dan beradaptasi terhadap perubahan industri yang terus berkembang.' }}</p>
      </div>
      <div style="margin-top:24px;">
        <a href="#prodi" class="ftik-dean-button">
          <i class="fas fa-arrow-right"></i> Lihat Program Studi
        </a>
      </div>
    </div>
  </div>
  <div class="ftik-hero-right">
    <div class="ftik-dean-frame">
      @if($profile && $profile->dean_photo)
        <img src="{{ Storage::url($profile->dean_photo) }}" alt="Foto Dekan">
      @else
        <span class="ftik-dean-ph">👤</span>
      @endif
    </div>
    <div class="ftik-dean-card">
      <div class="ftik-dean-role">{{ $profile->dean_role ?? 'Dekan Fakultas' }}</div>
      <div class="ftik-dean-name">{{ $profile->dean_name ?? 'Prof. Dr. Ahmad Riyadi, M.T.' }}</div>
      <div class="ftik-dean-period">{{ $profile->dean_period ?? 'Periode 2021 – 2025' }}</div>
    </div>
  </div>
</div>
</div>


{{-- ═══ VISI MISI TUJUAN ════════════════════════════════════════════ --}}
<div class="ftik-section alt">
  <div class="ftik-container">
    <div class="ftik-section-head">
      <h2 class="ftik-section-title">Visi, Misi &amp; Tujuan</h2>
    </div>
    <div class="ftik-vm-layout">

      <div class="ftik-vm-visi">
        <div class="ftik-vm-label">Visi</div>
        <h3 class="ftik-vm-heading">Visi Fakultas</h3>
        <p class="ftik-vm-text">
          {{ $profile->visi ?? 'Menjadi Fakultas Teknik dan Ilmu Komputer yang unggul, inovatif, dan berdaya saing global dalam pengembangan ilmu pengetahuan dan teknologi pada tahun 2030.' }}
        </p>
      </div>

      <div class="ftik-vm-misi">
        <div class="ftik-vm-label">Misi</div>
        <h3 class="ftik-vm-heading">Misi Fakultas</h3>
        <ul class="ftik-vm-list">
          @forelse(($profile->misi ?? []) as $i => $misi)
          <li>
            <span class="ftik-vm-num">{{ $i + 1 }}</span>
            {{ $misi->content }}
          </li>
          @empty
          <li><span class="ftik-vm-num">1</span>Menyelenggarakan pendidikan tinggi yang berkualitas di bidang teknik dan komputer.</li>
          <li><span class="ftik-vm-num">2</span>Melaksanakan penelitian dan pengabdian yang bermanfaat bagi masyarakat.</li>
          <li><span class="ftik-vm-num">3</span>Menghasilkan lulusan yang kompeten dan berdaya saing global.</li>
          @endforelse
        </ul>
      </div>

      <div class="ftik-vm-tujuan">
        <div class="ftik-vm-label">Tujuan</div>
        <h3 class="ftik-vm-heading">Tujuan Strategis</h3>
        <ul class="ftik-vm-list">
          @forelse(($profile->tujuan ?? []) as $i => $tujuan)
          <li>
            <span class="ftik-vm-num sea">{{ $i + 1 }}</span>
            {{ $tujuan->content }}
          </li>
          @empty
          <li><span class="ftik-vm-num sea">1</span>Menghasilkan lulusan yang berkompeten di bidang teknik dan komputer.</li>
          <li><span class="ftik-vm-num sea">2</span>Meningkatkan kualitas penelitian dan publikasi internasional.</li>
          <li><span class="ftik-vm-num sea">3</span>Membangun kerjasama dengan industri dan institusi global.</li>
          @endforelse
        </ul>
      </div>

    </div>
  </div>
</div>


{{-- ═══ PROGRAM STUDI (CARD BISA DIKLIK) ═══════════════════════════════ --}}
<div class="ftik-section" id="prodi">
  <div class="ftik-container">
    <div class="ftik-section-head">
      <div>
        <h2 class="ftik-section-title">Program Studi</h2>
        <p class="ftik-section-desc">Program unggulan dengan akreditasi terjamin dan kurikulum berbasis kompetensi industri.</p>
      </div>
      @if(isset($studyPrograms) && $studyPrograms->count() > 0)
      <a href="{{ url('/program-studi') }}" class="ftik-see-all">
        Lihat Semua Prodi <i class="fas fa-arrow-right" style="font-size:.65rem;"></i>
      </a>
      @endif
    </div>

    @php
      $prodiAccentColors = [
        'var(--primary)', 'var(--primary-light)', 'var(--primary-mid)',
        'var(--gold)', 'var(--primary-dark)', '#C05621'
      ];
      
      $prodiCount = isset($studyPrograms) ? $studyPrograms->count() : 3;
      $gridClass = $prodiCount == 2 ? 'ftik-prodi-grid ftik-prodi-grid-center' : 'ftik-prodi-grid';
    @endphp

    @if(isset($studyPrograms) && $studyPrograms->count() > 0)
    <div class="{{ $gridClass }}">
      @foreach($studyPrograms as $index => $prodi)
      @php 
        $clr = $prodiAccentColors[$index % count($prodiAccentColors)];
        $prodiLink = $prodi->website ?? ($prodi->slug ? url('/program-studi/'.$prodi->slug) : '#');
      @endphp
      <a href="{{ $prodiLink }}" class="ftik-prodi-card">
        <div class="ftik-prodi-top">
          <div class="ftik-prodi-header">
            <div>
              <div class="ftik-prodi-name">{{ $prodi->name }}</div>
            </div>
            <div style="display:flex;flex-direction:column;align-items:flex-end;gap:8px;">
              <div class="ftik-prodi-badge" style="background:{{ $clr }};">
                <span class="ftik-prodi-badge-text">{{ $prodi->short_name ?? strtoupper(substr($prodi->name,0,3)) }}</span>
              </div>
              @if($prodi->accreditation)
              <span class="ftik-prodi-accr">{{ $prodi->accreditation }}</span>
              @endif
            </div>
          </div>
          <p class="ftik-prodi-desc">{{ Str::limit($prodi->description ?? 'Program studi yang dirancang untuk menghasilkan lulusan kompeten dan siap menghadapi tantangan global.', 110) }}</p>
        </div>
        <div class="ftik-prodi-bottom">
          <span class="ftik-prodi-meta">
            <i class="fas fa-users" style="font-size:11px;"></i> {{ number_format($prodi->students_count ?? 120) }} mahasiswa
          </span>
          <span class="ftik-prodi-meta">
            <i class="fas fa-user-tie" style="font-size:11px;"></i> {{ $prodi->head_of_program ?? 'Dr. Ahmad, M.T.' }}
          </span>
        </div>
        <div class="ftik-prodi-arrow">
          <i class="fas fa-arrow-right"></i>
        </div>
      </a>
      @endforeach
    </div>
    @else
    <div class="{{ $gridClass }}">
      @foreach([
        ['link'=>'#','short'=>'TI','name'=>'Teknik Informatika','desc'=>'Fokus pada pengembangan perangkat lunak, kecerdasan buatan, dan keamanan sistem informasi modern.','mhs'=>'820','dosen'=>'Dr. Ahmad Fauzi, M.T.','accr'=>'Unggul','clr'=>'var(--primary)'],
        ['link'=>'#','short'=>'SI','name'=>'Sistem Informasi','desc'=>'Mengintegrasikan teknologi informasi dengan manajemen bisnis untuk solusi enterprise yang efektif.','mhs'=>'640','dosen'=>'Dr. Sari Dewi, M.Kom.','accr'=>'Unggul','clr'=>'var(--primary-light)'],
        ['link'=>'#','short'=>'TE','name'=>'Teknik Elektro','desc'=>'Pembelajaran mendalam di bidang elektronika, tenaga listrik, dan sistem kontrol otomasi industri.','mhs'=>'510','dosen'=>'Prof. Budi Santoso, Ph.D.','accr'=>'A','clr'=>'var(--primary-mid)'],
      ] as $p)
      <a href="{{ $p['link'] }}" class="ftik-prodi-card">
        <div class="ftik-prodi-top">
          <div class="ftik-prodi-header">
            <div>
              <div class="ftik-prodi-name">{{ $p['name'] }}</div>
            </div>
            <div style="display:flex;flex-direction:column;align-items:flex-end;gap:8px;">
              <div class="ftik-prodi-badge" style="background:{{ $p['clr'] }};">
                <span class="ftik-prodi-badge-text">{{ $p['short'] }}</span>
              </div>
              <span class="ftik-prodi-accr">{{ $p['accr'] }}</span>
            </div>
          </div>
          <p class="ftik-prodi-desc">{{ $p['desc'] }}</p>
        </div>
        <div class="ftik-prodi-bottom">
          <span class="ftik-prodi-meta"><i class="fas fa-users"></i> {{ $p['mhs'] }} mahasiswa</span>
          <span class="ftik-prodi-meta"><i class="fas fa-user-tie"></i> {{ $p['dosen'] }}</span>
        </div>
        <div class="ftik-prodi-arrow">
          <i class="fas fa-arrow-right"></i>
        </div>
      </a>
      @endforeach
    </div>
    @endif
  </div>
</div>


{{-- ═══ BERITA & AGENDA ══════════════════════════════════════════════ --}}
<div class="ftik-section alt" id="berita">
  <div class="ftik-container">
    <div class="ftik-section-head">
      <h2 class="ftik-section-title">Berita &amp; Agenda</h2>
      <a href="{{ url('/news') }}" class="ftik-see-all">
        Semua Berita <i class="fas fa-arrow-right" style="font-size:.65rem;"></i>
      </a>
    </div>

    <div class="ftik-news-layout">
      <div>
        <div class="ftik-filter">
          <button class="ftik-f-btn on" data-cat="all">Semua</button>
          <button class="ftik-f-btn" data-cat="prestasi">Prestasi</button>
          <button class="ftik-f-btn" data-cat="akademik">Akademik</button>
          <button class="ftik-f-btn" data-cat="kerjasama">Kerjasama</button>
        </div>

        <div class="ftik-news-scroll" id="ftikNewsScroll">
        <div class="ftik-news-grid" id="ftikNewsGrid">
          @forelse(($news ?? collect())->take(6) as $item)
          @php
            $catLabel = is_string($item->category) ? $item->category : (is_object($item->category) ? ($item->category->name ?? 'Akademik') : 'Akademik');
            $catSlug  = strtolower($catLabel);
            $newsLink = $item->link ?? url('/news/'.$item->id);
          @endphp
          <a href="{{ $newsLink }}" class="ftik-news-card" data-cat="{{ $catSlug }}">
            <div class="ftik-news-thumb">
              @if($item->image)
                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}">
              @else
                <div class="ftik-news-thumb-ph">📰</div>
              @endif
              <span class="ftik-news-cat">{{ ucfirst($catLabel) }}</span>
            </div>
            <div class="ftik-news-body">
              <h4 class="ftik-news-title">{{ Str::limit($item->title, 65) }}</h4>
              <p class="ftik-news-excerpt">{{ Str::limit(strip_tags($item->content ?? ''), 100) }}</p>
              <div class="ftik-news-footer">
                <span class="ftik-news-date">
                  <i class="far fa-calendar-alt"></i>
                  {{ $item->created_at->translatedFormat('d M Y') }}
                </span>
                @if($loop->index < 2)
                <span class="ftik-news-badge">Terbaru</span>
                @endif
              </div>
            </div>
          </a>
          @empty
          @foreach([
            ['cat'=>'prestasi','icon'=>'🏆','link'=>'#','title'=>'Mahasiswa FTIK Raih Juara 1 Lomba Inovasi Teknologi Tingkat Nasional','excerpt'=>'Tim mahasiswa Fakultas Teknik dan Ilmu Komputer berhasil meraih juara pertama.','date'=>'15 Des 2024','new'=>true],
            ['cat'=>'kerjasama','icon'=>'🤝','link'=>'#','title'=>'FTIK Jalin Kerjasama Strategis dengan PT Telkom Indonesia','excerpt'=>'Fakultas resmi menjalin kerjasama dengan PT Telkom Indonesia.','date'=>'10 Des 2024','new'=>true],
            ['cat'=>'akademik','icon'=>'📚','link'=>'#','title'=>'Pendaftaran Mahasiswa Baru Gelombang II Dibuka','excerpt'=>'Pendaftaran mahasiswa baru gelombang II telah dibuka.','date'=>'5 Des 2024','new'=>false],
            ['cat'=>'prestasi','icon'=>'🎓','link'=>'#','title'=>'UKM Robotik FTIK Lolos ke Ajang Kontes Robot Internasional','excerpt'=>'UKM Robotik berhasil lolos ke kontes robot internasional.','date'=>'28 Nov 2024','new'=>false],
          ] as $d)
          <a href="{{ $d['link'] }}" class="ftik-news-card" data-cat="{{ $d['cat'] }}">
            <div class="ftik-news-thumb">
              <div class="ftik-news-thumb-ph">{{ $d['icon'] }}</div>
              <span class="ftik-news-cat">{{ ucfirst($d['cat']) }}</span>
            </div>
            <div class="ftik-news-body">
              <h4 class="ftik-news-title">{{ $d['title'] }}</h4>
              <p class="ftik-news-excerpt">{{ $d['excerpt'] }}</p>
              <div class="ftik-news-footer">
                <span class="ftik-news-date"><i class="far fa-calendar-alt"></i> {{ $d['date'] }}</span>
                @if($d['new'])<span class="ftik-news-badge">Terbaru</span>@endif
              </div>
            </div>
          </a>
          @endforeach
          @endforelse
        </div>
        </div>
      </div>

      <div class="ftik-agenda-box">
        <div class="ftik-agenda-title">Agenda Fakultas</div>
        @forelse(($agendas ?? collect())->take(5) as $agenda)
        @php
          $aDate     = \Carbon\Carbon::parse($agenda->date . ' ' . $agenda->time);
          $dateClass = $aDate->isToday() ? 'today' : ($aDate->isPast() ? 'past' : 'future');
        @endphp
        <button class="ftik-ag-item" onclick="ftikOpenModal({{ $agenda->id }})">
          <div class="ftik-ag-date {{ $dateClass }}">
            <span class="ftik-ag-day">{{ $aDate->format('d') }}</span>
            <span class="ftik-ag-mon">{{ $aDate->translatedFormat('M') }}</span>
          </div>
          <div class="ftik-ag-body">
            <div class="ftik-ag-title">{{ Str::limit($agenda->title, 42) }}</div>
            <div class="ftik-ag-meta">{{ $aDate->format('H:i') }} · {{ Str::limit($agenda->location ?? 'Kampus', 20) }}</div>
          </div>
          <span class="ftik-ag-arr">›</span>
        </button>
        @empty
        @foreach([
          ['d'=>'19','m'=>'Mei','cls'=>'today','title'=>'Seminar Nasional Kecerdasan Buatan 2025','meta'=>'09:00 · Aula Utama','idx'=>0],
          ['d'=>'22','m'=>'Mei','cls'=>'future','title'=>'Workshop UI/UX Design Thinking','meta'=>'13:00 · Lab Komputer B','idx'=>1],
          ['d'=>'28','m'=>'Mei','cls'=>'future','title'=>'Sidang Skripsi Periode II','meta'=>'08:00 · Ruang Sidang I–IV','idx'=>2],
          ['d'=>'5','m'=>'Jun','cls'=>'future','title'=>'Webinar: Tren Teknologi 2025','meta'=>'10:00 · Zoom Meeting','idx'=>3],
          ['d'=>'12','m'=>'Jun','cls'=>'future','title'=>'Studium Generale bersama Praktisi Industri','meta'=>'09:30 · Auditorium','idx'=>4],
        ] as $ag)
        <button class="ftik-ag-item" onclick="ftikOpenFallback({{ $ag['idx'] }})">
          <div class="ftik-ag-date {{ $ag['cls'] }}">
            <span class="ftik-ag-day">{{ $ag['d'] }}</span>
            <span class="ftik-ag-mon">{{ $ag['m'] }}</span>
          </div>
          <div class="ftik-ag-body">
            <div class="ftik-ag-title">{{ $ag['title'] }}</div>
            <div class="ftik-ag-meta">{{ $ag['meta'] }}</div>
          </div>
          <span class="ftik-ag-arr">›</span>
        </button>
        @endforeach
        @endforelse
      </div>
    </div>
  </div>
</div>

</div>

{{-- MODAL AGENDA --}}
<div class="ftik-modal-overlay" id="ftikModal">
  <div class="ftik-modal-box">
    <button class="ftik-modal-close" onclick="ftikCloseModal()">×</button>
    <h3 class="ftik-modal-title" id="ftikModalTitle"></h3>
    <div class="ftik-modal-chips" id="ftikModalChips"></div>
    <div class="ftik-modal-body" id="ftikModalBody"></div>
  </div>
</div>

@endsection


@section('scripts')
<script>
(function(){
  var wrap   = document.querySelector('.ftik-qa-wrap');
  var ticker = document.getElementById('ftikTicker');
  if(!wrap || !ticker) return;
  var speed=70, pos=0, paused=false, last=null, halfW=0;
  function getHalfW(){
    var items=ticker.children, half=Math.floor(items.length/2), w=0;
    for(var i=0;i<half;i++) w+=items[i].getBoundingClientRect().width;
    return w;
  }
  function step(ts){
    if(!last) last=ts;
    if(!paused){
      var dt=(ts-last)/1000;
      pos+=speed*dt;
      if(!halfW) halfW=getHalfW();
      if(pos>=halfW) pos-=halfW;
      ticker.style.transform='translateX(-'+pos.toFixed(2)+'px)';
    }
    last=ts;
    requestAnimationFrame(step);
  }
  setTimeout(function(){ halfW=getHalfW(); requestAnimationFrame(step); },200);
  wrap.addEventListener('mouseenter',function(){ paused=true; last=null; });
  wrap.addEventListener('mouseleave',function(){ paused=false; last=null; });
})();

/* ─── NEWS TICKER & FILTER ─── */
(function(){
  var scroll = document.getElementById('ftikNewsScroll');
  var grid   = document.getElementById('ftikNewsGrid');
  if(!scroll || !grid) return;

  var speed = 60, pos = 0, paused = false, last = null, halfW = 0, animId = null;
  var activeCat = 'all';

  function getCards(){ return Array.from(grid.querySelectorAll('.ftik-news-card:not(.ftik-clone)')); }

  function buildClones(){
    grid.querySelectorAll('.ftik-clone').forEach(function(el){ el.remove(); });
    getCards().forEach(function(card){
      var c = card.cloneNode(true);
      c.classList.add('ftik-clone');
      c.setAttribute('aria-hidden','true');
      grid.appendChild(c);
    });
    halfW = 0;
  }

  function getHalfW(){
    var cards = getCards();
    var w = 0;
    cards.forEach(function(c){ w += c.offsetWidth + 20; });
    return w;
  }

  function step(ts){
    if(!last) last = ts;
    if(!paused){
      var dt = (ts - last) / 1000;
      pos += speed * dt;
      if(!halfW) halfW = getHalfW();
      if(halfW > 0 && pos >= halfW) pos -= halfW;
      grid.style.transform = 'translateX(-' + pos.toFixed(2) + 'px)';
    }
    last = ts;
    animId = requestAnimationFrame(step);
  }

  function start(){
    if(animId) cancelAnimationFrame(animId);
    pos = 0; last = null; halfW = 0;
    grid.style.transform = '';
    buildClones();
    setTimeout(function(){ halfW = getHalfW(); animId = requestAnimationFrame(step); }, 100);
  }

  scroll.addEventListener('mouseenter', function(){ paused = true; last = null; });
  scroll.addEventListener('mouseleave', function(){ paused = false; last = null; });

  document.querySelectorAll('.ftik-f-btn').forEach(function(btn){
    btn.addEventListener('click', function(){
      activeCat = this.dataset.cat;
      document.querySelectorAll('.ftik-f-btn').forEach(function(b){ b.classList.remove('on'); });
      this.classList.add('on');
      getCards().forEach(function(card){
        card.style.display = (activeCat === 'all' || card.dataset.cat === activeCat) ? '' : 'none';
      });
      start();
    });
  });

  start();
})();

var ftikAgendas = @json($agendas ?? []);

function ftikOpenModal(id){
  var a=ftikAgendas.find(function(x){ return x.id==id; });
  if(!a) return;
  var dt=new Date(a.date+'T'+a.time);
  var dateStr=dt.toLocaleDateString('id-ID',{weekday:'long',day:'numeric',month:'long',year:'numeric'});
  var timeStr=dt.toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'})+' WIB';
  document.getElementById('ftikModalTitle').textContent=a.title;
  document.getElementById('ftikModalChips').innerHTML=
    '<span class="ftik-modal-chip">📅 '+dateStr+'</span>'+
    '<span class="ftik-modal-chip">🕐 '+timeStr+'</span>'+
    '<span class="ftik-modal-chip">📍 '+(a.location||'Kampus FTIK')+'</span>';
  document.getElementById('ftikModalBody').textContent=a.description||'Tidak ada deskripsi lengkap untuk agenda ini.';
  document.getElementById('ftikModal').classList.add('open');
  document.body.style.overflow='hidden';
}

var ftikFallbacks=[
  {title:"Seminar Nasional Kecerdasan Buatan 2025",date:"Senin, 19 Mei 2025",time:"09:00 – 16:00 WIB",loc:"Aula Utama",desc:"Seminar nasional tahunan FTIK menghadirkan pakar AI dari industri dan akademisi."},
  {title:"Workshop UI/UX Design Thinking",date:"Kamis, 22 Mei 2025",time:"13:00 – 17:00 WIB",loc:"Lab Komputer B",desc:"Workshop intensif bersama praktisi UX."},
  {title:"Sidang Skripsi Periode II — Gelombang 1",date:"Rabu, 28 Mei 2025",time:"08:00 – selesai",loc:"Ruang Sidang I–IV",desc:"Sidang skripsi gelombang pertama periode II."},
  {title:"Webinar: Tren Teknologi 2025",date:"Kamis, 5 Juni 2025",time:"10:00 – 12:00 WIB",loc:"Zoom Meeting",desc:"Membahas tren terkini AI generatif, cloud computing, dan cybersecurity."},
  {title:"Studium Generale bersama Praktisi Industri",date:"Kamis, 12 Juni 2025",time:"09:30 – 12:00 WIB",loc:"Auditorium",desc:"Mendapatkan wawasan langsung dari praktisi industri tentang dunia kerja."}
];

function ftikOpenFallback(idx){
  var a=ftikFallbacks[idx];
  document.getElementById('ftikModalTitle').textContent=a.title;
  document.getElementById('ftikModalChips').innerHTML=
    '<span class="ftik-modal-chip">📅 '+a.date+'</span>'+
    '<span class="ftik-modal-chip">🕐 '+a.time+'</span>'+
    '<span class="ftik-modal-chip">📍 '+a.loc+'</span>';
  document.getElementById('ftikModalBody').textContent=a.desc;
  document.getElementById('ftikModal').classList.add('open');
  document.body.style.overflow='hidden';
}

function ftikCloseModal(){
  document.getElementById('ftikModal').classList.remove('open');
  document.body.style.overflow='';
}
document.getElementById('ftikModal').addEventListener('click',function(e){
  if(e.target===this) ftikCloseModal();
});
document.addEventListener('keydown',function(e){
  if(e.key==='Escape') ftikCloseModal();
});
</script>
@endsection