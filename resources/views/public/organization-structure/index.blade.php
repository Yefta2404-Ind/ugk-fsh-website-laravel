@extends('layouts.public')
@section('title', 'Struktur Organisasi')
@section('styles')
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection
@section('content')

<style>
/* ================================================
   STRUKTUR ORGANISASI — PROFESSIONAL REDESIGN
   Theme: Clean Authority · Forest Green + Gold
   Font: DM Serif Display / DM Sans
   ================================================ */

/* ----- RESET ----- */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ----- PAGE HERO BANNER ----- */
.so-hero {
    position: relative;
    background: var(--primary);
    overflow: hidden;
    padding: 56px 0 44px;
}

.so-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 100% at 110% 50%, rgba(201,168,76,0.12) 0%, transparent 60%),
        radial-gradient(ellipse 50% 80% at -10% 50%, rgba(255,255,255,0.03) 0%, transparent 60%);
    pointer-events: none;
}

/* Decorative grid lines */
.so-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
}

.so-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 clamp(16px, 4vw, 40px);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
}

.so-hero-text {}

.so-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--gold-light);
    margin-bottom: 12px;
}

.so-hero-eyebrow::before {
    content: '';
    display: block;
    width: 20px; height: 2px;
    background: var(--gold-light);
    border-radius: 2px;
}

.so-hero-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(1.8rem, 4vw, 3rem);
    font-weight: 400;
    color: #fff;
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.so-hero-title em {
    font-style: italic;
    color: var(--gold-light);
}

.so-hero-sub {
    margin-top: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.55);
    font-weight: 400;
}

.so-hero-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.so-meta-chip {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 100px;
    padding: 8px 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 80px;
}

.so-meta-chip .num {
    font-family: 'DM Serif Display', serif;
    font-size: 1.6rem;
    color: var(--gold-light);
    line-height: 1;
}

.so-meta-chip .lbl {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.6rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.45);
    margin-top: 2px;
    font-weight: 600;
}

/* ----- MAIN CONTENT AREA ----- */
.so-page {
    background: #f4f6f5;
    min-height: 60vh;
    padding: clamp(32px, 5vw, 64px) 0;
}

.so-container {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 clamp(16px, 4vw, 40px);
}

/* ----- STRUCTURE BLOCK ----- */
.so-structure-block {
    margin-bottom: clamp(32px, 5vw, 56px);
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.55s cubic-bezier(0.22,1,0.36,1), transform 0.55s cubic-bezier(0.22,1,0.36,1);
}

.so-structure-block.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Block header */
.so-block-header {
    display: flex;
    align-items: stretch;
    gap: 0;
    margin-bottom: 0;
    border-radius: 16px 16px 0 0;
    overflow: hidden;
    box-shadow: 0 2px 0 rgba(0,0,0,0.04);
}

.so-block-accent {
    width: 6px;
    background: linear-gradient(180deg, var(--gold) 0%, var(--gold-dark) 100%);
    flex-shrink: 0;
    border-radius: 0;
}

.so-block-title-area {
    flex: 1;
    background: var(--primary);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
}

.so-block-index {
    font-family: 'DM Serif Display', serif;
    font-size: 0.75rem;
    font-weight: 400;
    color: rgba(255,255,255,0.35);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 2px;
}

.so-block-name {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(1rem, 2.5vw, 1.35rem);
    font-weight: 400;
    color: #fff;
    letter-spacing: -0.01em;
    line-height: 1.2;
}

.so-block-count {
    background: rgba(201,168,76,0.18);
    border: 1px solid rgba(201,168,76,0.3);
    color: var(--gold-light);
    font-family: 'DM Sans', sans-serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 100px;
    white-space: nowrap;
}

/* Block body */
.so-block-body {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-top: none;
    border-radius: 0 0 16px 16px;
    padding: clamp(20px, 4vw, 40px);
    box-shadow: 0 8px 32px rgba(10,61,46,0.06);
}

/* ----- LEVEL SECTION ----- */
.so-level {
    margin-bottom: 0;
}

.so-level + .so-level {
    margin-top: 8px;
}

/* Connector between levels */
.so-connector {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 4px 0 4px;
    gap: 0;
}

.so-conn-line {
    width: 2px;
    height: 20px;
    background: linear-gradient(180deg, var(--primary) 0%, rgba(10,61,46,0.2) 100%);
}

.so-conn-arrow {
    width: 0; height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid rgba(10,61,46,0.25);
}

/* Level label row */
.so-level-label-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.so-level-hr {
    flex: 1;
    height: 1px;
    background: #e4ebe7;
}

.so-level-badge {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 100px;
    white-space: nowrap;
}

/* Level badge color variants */
.so-level-badge.lv0 { background: var(--primary); color: #fff; }
.so-level-badge.lv1 { background: #1a6b47; color: #fff; }
.so-level-badge.lv2 { background: var(--gold-dark); color: #fff; }
.so-level-badge.lv3 { background: #2d8a5e; color: #fff; }
.so-level-badge.lv4 { background: #3a5a47; color: #fff; }
.so-level-badge.lv5 { background: #55657b; color: #fff; }

/* ----- MEMBER GRID ----- */
.so-member-grid {
    display: grid;
    gap: clamp(10px, 2vw, 18px);
    /* Default: responsive auto-fill */
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
}

@media (min-width: 480px) {
    .so-member-grid { grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); }
}
@media (min-width: 768px) {
    .so-member-grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
}
@media (min-width: 1024px) {
    .so-member-grid { grid-template-columns: repeat(auto-fill, minmax(170px, 1fr)); }
}

.so-member-grid.g-single   { grid-template-columns: 200px; justify-content: center; }
.so-member-grid.g-double   { grid-template-columns: repeat(2, 200px); justify-content: center; }
.so-member-grid.g-triple   { grid-template-columns: repeat(3, 1fr); max-width: 580px; margin: 0 auto; }

@media (max-width: 479px) {
    .so-member-grid.g-single  { grid-template-columns: minmax(130px, 180px); }
    .so-member-grid.g-double  { grid-template-columns: repeat(2, 1fr); }
    .so-member-grid.g-triple  { grid-template-columns: repeat(2, 1fr); }
}

/* ----- MEMBER CARD ----- */
.so-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 14px;
    padding: clamp(14px, 2.5vw, 22px) clamp(10px, 2vw, 16px) clamp(12px, 2vw, 18px);
    text-align: center;
    transition: transform 0.28s cubic-bezier(0.22,1,0.36,1),
                box-shadow 0.28s cubic-bezier(0.22,1,0.36,1),
                border-color 0.2s ease;
    position: relative;
    overflow: hidden;
    cursor: default;
}

.so-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.so-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 36px rgba(10,61,46,0.13);
    border-color: rgba(10,61,46,0.18);
}

.so-card:hover::after {
    transform: scaleX(1);
}

/* Avatar */
.so-avatar {
    width: clamp(56px, 10vw, 76px);
    height: clamp(56px, 10vw, 76px);
    border-radius: 50%;
    margin: 0 auto clamp(10px, 1.5vw, 14px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'DM Serif Display', serif;
    font-size: clamp(0.9rem, 2vw, 1.2rem);
    font-weight: 400;
    color: #fff;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    transition: box-shadow 0.25s ease, transform 0.25s ease;
    position: relative;
}

.so-card:hover .so-avatar {
    box-shadow: 0 8px 20px rgba(0,0,0,0.18);
    transform: scale(1.04);
}

.so-avatar img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
}

/* Avatar ring decoration */
.so-avatar::before {
    content: '';
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.3);
    pointer-events: none;
}

.av-0 { background: linear-gradient(135deg, var(--primary) 0%, #1a6b47 100%); }
.av-1 { background: linear-gradient(135deg, #1a6b47 0%, #2d8a5e 100%); }
.av-2 { background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%); }
.av-3 { background: linear-gradient(135deg, #2d8a5e 0%, var(--primary-light) 100%); }
.av-4 { background: linear-gradient(135deg, #3a5a47 0%, #1a6b47 100%); }
.av-5 { background: linear-gradient(135deg, #55657b 0%, #3a4f65 100%); }

/* Card text */
.so-card-name {
    font-family: 'DM Sans', sans-serif;
    font-size: clamp(0.75rem, 1.5vw, 0.875rem);
    font-weight: 700;
    color: #0f2d1f;
    line-height: 1.3;
    margin-bottom: 4px;
}

.so-card-pos {
    font-family: 'DM Sans', sans-serif;
    font-size: clamp(0.62rem, 1.2vw, 0.72rem);
    color: #6b8c7a;
    line-height: 1.35;
    font-weight: 500;
}

/* ----- SEPARATOR BETWEEN STRUCTURES ----- */
.so-sep {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: clamp(16px, 3vw, 28px) 0;
}

.so-sep-line {
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, transparent, #c8d9ce, transparent);
}

.so-sep-diamond {
    width: 8px; height: 8px;
    background: var(--gold);
    transform: rotate(45deg);
    flex-shrink: 0;
}

/* ----- EMPTY STATES ----- */
.so-empty-level {
    text-align: center;
    padding: 28px 20px;
    background: #f9fbfa;
    border-radius: 12px;
    border: 1px dashed #c8d9ce;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.85rem;
    color: #6b8c7a;
}

.so-empty-global {
    text-align: center;
    padding: clamp(48px, 8vw, 80px) 24px;
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(10,61,46,0.05);
}

.so-empty-icon {
    width: 72px; height: 72px;
    background: linear-gradient(135deg, #eaf4ee 0%, #d4e9dc 100%);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
}

.so-empty-title {
    font-family: 'DM Serif Display', serif;
    font-size: 1.2rem;
    font-weight: 400;
    color: var(--primary);
    margin-bottom: 8px;
}

.so-empty-desc {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.875rem;
    color: #6b8c7a;
}

/* ----- SCROLL OBSERVER ----- */
@media (prefers-reduced-motion: reduce) {
    .so-structure-block {
        opacity: 1 !important;
        transform: none !important;
        transition: none !important;
    }
}

/* ----- PRINT ----- */
@media print {
    .so-hero { padding: 20px 0; background: #fff !important; }
    .so-hero-title, .so-block-name { color: #000 !important; -webkit-text-fill-color: #000 !important; }
    .so-block-title-area { background: #eee !important; }
    .so-structure-block { opacity: 1 !important; transform: none !important; break-inside: avoid; }
    .so-card:hover { transform: none; }
    .so-card::after { display: none; }
}
</style>

@php
function soInitials(string $name): string {
    $words = preg_split('/\s+/', trim($name));
    if (count($words) >= 2) {
        return strtoupper(mb_substr($words[0],0,1) . mb_substr($words[1],0,1));
    }
    return strtoupper(mb_substr($name,0,2));
}

$levelNames  = ['','','','','',''];
$levelColors = ['lv0','lv1','lv2','lv3','lv4','lv5'];
$avatarColors= ['av-0','av-1','av-2','av-3','av-4','av-5'];

$totalMembers   = 0;
$totalStructures= $structures ? $structures->count() : 0;
if ($structures) {
    foreach ($structures as $s) {
        $totalMembers += $s->members->count();
    }
}
@endphp

{{-- ===== HERO ===== --}}
<div class="so-hero">
    <div class="so-hero-inner">
        <div class="so-hero-text">
            <div class="so-hero-eyebrow">FAKULTAS SAINS & TEKNOLOGI</div>
            <h1 class="so-hero-title">Struktur <em>Organisasi</em></h1>
            <p class="so-hero-sub">Susunan kepemimpinan dan keanggotaan resmi LPPMI</p>
        </div>
        <div class="so-hero-meta">
            <div class="so-meta-chip">
                <span class="num">{{ $totalStructures }}</span>
                <span class="lbl">Divisi</span>
            </div>
            <div class="so-meta-chip">
                <span class="num">{{ $totalMembers }}</span>
                <span class="lbl">Anggota</span>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN ===== --}}
<div class="so-page">
    <div class="so-container">

        @if($structures && $structures->count() > 0)

            @foreach($structures as $sIdx => $structure)

                @if($sIdx > 0)
                    <div class="so-sep">
                        <div class="so-sep-line"></div>
                        <div class="so-sep-diamond"></div>
                        <div class="so-sep-line"></div>
                    </div>
                @endif

                <div class="so-structure-block" data-observe>

                    {{-- Block Header --}}
                    <div class="so-block-header">
                        <div class="so-block-accent"></div>
                        <div class="so-block-title-area">
                            <div>
                                <div class="so-block-index">Struktur #{{ str_pad($sIdx+1, 2, '0', STR_PAD_LEFT) }}</div>
                                <div class="so-block-name">{{ $structure->name }}</div>
                            </div>
                            <span class="so-block-count">{{ $structure->members->count() }} Anggota</span>
                        </div>
                    </div>

                    {{-- Block Body --}}
                    <div class="so-block-body">
                        @if($structure->members->count() > 0)
                            @php
                                $grouped = $structure->members->sortBy('order')->groupBy('level')->sortKeys();
                            @endphp

                            @foreach($grouped as $level => $levelMembers)
                                @php
                                    $lvIdx = min((int)$level, 5);
                                    $cnt   = $levelMembers->count();
                                    $gCls  = match(true) {
                                        $cnt === 1 => 'g-single',
                                        $cnt === 2 => 'g-double',
                                        $cnt === 3 => 'g-triple',
                                        default    => '',
                                    };
                                @endphp

                                @if(!$loop->first)
                                    <div class="so-connector">
                                        <div class="so-conn-line"></div>
                                        <div class="so-conn-arrow"></div>
                                    </div>
                                @endif

                                <div class="so-level">
                                    {{-- Level label --}}
                                    <div class="so-level-label-row">
                                        <div class="so-level-hr"></div>
                                        <span class="so-level-badge {{ $levelColors[$lvIdx] }}">
                                            {{ $levelNames[$lvIdx] }}
                                        </span>
                                        <div class="so-level-hr"></div>
                                    </div>

                                    {{-- Members --}}
                                    <div class="so-member-grid {{ $gCls }}">
                                        @foreach($levelMembers as $member)
                                            <div class="so-card">
                                                <div class="so-avatar {{ $avatarColors[$lvIdx] }}">
                                                    @if($member->photo && Storage::disk('public')->exists($member->photo))
                                                        <img src="{{ asset('storage/' . $member->photo) }}"
                                                             alt="{{ $member->name }}" loading="lazy">
                                                    @else
                                                        {{ soInitials($member->name) }}
                                                    @endif
                                                </div>
                                                <div class="so-card-name">{{ $member->name }}</div>
                                                <div class="so-card-pos">{{ $member->position }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            @endforeach

                        @else
                            <div class="so-empty-level">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.5" style="vertical-align:middle;margin-right:6px;">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M12 8v4m0 4h.01"/>
                                </svg>
                                Belum ada data anggota untuk struktur ini.
                            </div>
                        @endif
                    </div>

                </div>

            @endforeach

        @else
            {{-- Global empty --}}
            <div class="so-empty-global">
                <div class="so-empty-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                         stroke="var(--primary)" stroke-width="1.5">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div class="so-empty-title">Data Belum Tersedia</div>
                <div class="so-empty-desc">Silakan hubungi administrator untuk mengisi data struktur organisasi.</div>
            </div>
        @endif

    </div>
</div>

@endsection

@section('scripts')
<script>
// Intersection Observer — reveal on scroll
(function () {
    const blocks = document.querySelectorAll('[data-observe]');
    if (!blocks.length) return;

    const obs = new IntersectionObserver((entries) => {
        entries.forEach((e, i) => {
            if (e.isIntersecting) {
                // stagger siblings a little
                const siblings = [...e.target.parentElement.querySelectorAll('[data-observe]')];
                const idx = siblings.indexOf(e.target);
                setTimeout(() => e.target.classList.add('visible'), idx * 80);
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    blocks.forEach(b => obs.observe(b));
})();
</script>
@endsection