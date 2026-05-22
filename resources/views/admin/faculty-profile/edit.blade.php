@extends('layouts.admin')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,500;9..144,600&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

<style>
    .visi-page * { box-sizing: border-box; }

    .visi-page {
        font-family: 'DM Sans', sans-serif;
        background: #f5f4f0;
        min-height: 100vh;
        padding: 2.5rem 1.5rem;
    }

    /* Header */
    .vp-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 2.5rem;
    }
    .vp-header-left { display: flex; gap: 1rem; align-items: flex-start; }
    .vp-icon-badge {
        width: 52px; height: 52px; border-radius: 14px;
        background: #0F6E56;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .vp-icon-badge svg { width: 24px; height: 24px; color: white; }
    .vp-title {
        font-family: 'Fraunces', serif;
        font-size: 26px; font-weight: 500;
        color: #1a1a18; line-height: 1.2;
    }
    .vp-subtitle { font-size: 13px; color: #888780; margin-top: 4px; font-weight: 300; }
    .vp-timestamp {
        font-size: 12px; color: #b4b2a9;
        display: flex; align-items: center; gap: 6px;
        padding-top: 6px;
    }
    .vp-timestamp svg { width: 13px; height: 13px; }

    /* Alert */
    .vp-alert {
        display: flex; align-items: center; gap: 12px;
        padding: 14px 18px;
        background: #EAF3DE; border: 0.5px solid #639922;
        border-radius: 12px; margin-bottom: 1.5rem;
    }
    .vp-alert svg { width: 18px; height: 18px; color: #3B6D11; flex-shrink: 0; }
    .vp-alert span { font-size: 14px; color: #3B6D11; flex: 1; }
    .vp-alert button {
        border: none; background: transparent; cursor: pointer;
        color: #3B6D11; font-size: 18px; line-height: 1; padding: 0;
    }

    /* Section Card */
    .vp-card {
        background: #ffffff;
        border: 0.5px solid rgba(0,0,0,0.08);
        border-radius: 16px;
        margin-bottom: 1.25rem;
        overflow: hidden;
    }
    .vp-card-head {
        padding: 1rem 1.25rem;
        border-bottom: 0.5px solid rgba(0,0,0,0.06);
        display: flex; align-items: center; justify-content: space-between;
    }
    .vp-card-head-left { display: flex; align-items: center; gap: 12px; }
    .vp-section-icon {
        width: 36px; height: 36px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .vp-section-icon svg { width: 18px; height: 18px; color: white; }
    .icon-teal { background: #0F6E56; }
    .icon-blue { background: #185FA5; }
    .icon-purple { background: #534AB7; }
    .icon-amber { background: #C57A1A; }
    .vp-label { font-family: 'Fraunces', serif; font-size: 15px; font-weight: 500; color: #1a1a18; }
    .vp-desc { font-size: 11px; color: #b4b2a9; margin-top: 2px; }
    .vp-card-body { padding: 1.25rem; }

    /* Badge */
    .vp-badge {
        font-size: 11px; font-weight: 500;
        padding: 3px 10px; border-radius: 20px;
    }
    .badge-teal { background: #E1F5EE; color: #0F6E56; }
    .badge-blue { background: #E6F1FB; color: #185FA5; }
    .badge-purple { background: #EEEDFE; color: #534AB7; }
    .badge-amber { background: #FEF3E6; color: #C57A1A; }

    /* Textarea & Input */
    .vp-textarea {
        width: 100%; padding: 14px 16px;
        background: #f5f4f0;
        border: 0.5px solid rgba(0,0,0,0.1);
        border-radius: 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px; color: #2c2c2a;
        resize: vertical; line-height: 1.7;
        outline: none; min-height: 120px;
        transition: border-color 0.15s;
    }
    .vp-textarea:focus { border-color: #0F6E56; border-width: 1px; background: #fff; }
    
    .vp-input {
        width: 100%; padding: 14px 16px;
        background: #f5f4f0;
        border: 0.5px solid rgba(0,0,0,0.1);
        border-radius: 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px; color: #2c2c2a;
        outline: none; transition: border-color 0.15s;
    }
    .vp-input:focus { border-color: #0F6E56; border-width: 1px; background: #fff; }
    
    .vp-file-input {
        width: 100%; padding: 12px 16px;
        background: #f5f4f0;
        border: 0.5px solid rgba(0,0,0,0.1);
        border-radius: 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        cursor: pointer;
    }
    
    .vp-photo-preview {
        margin-top: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .vp-photo-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.08);
    }
    .vp-photo-label {
        font-size: 11px;
        color: #888780;
    }

    .vp-char-counter { text-align: right; font-size: 11px; color: #b4b2a9; margin-top: 6px; }

    /* Pillars Grid */
    .pillars-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: 8px;
    }
    .pillar-field {
        background: #f5f4f0;
        border-radius: 10px;
        padding: 12px;
    }
    .pillar-field label {
        display: block;
        font-size: 11px;
        font-weight: 500;
        color: #888780;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .pillar-field input {
        width: 100%;
        border: none;
        background: transparent;
        font-size: 13px;
        padding: 6px 0;
        outline: none;
        font-family: 'DM Sans', sans-serif;
    }
    .pillar-field input:focus {
        border-bottom: 1px solid #0F6E56;
    }

    /* List Item */
    .vp-list-item {
        display: flex; gap: 10px; align-items: flex-start;
        padding: 10px 12px;
        border: 0.5px solid rgba(0,0,0,0.08);
        border-radius: 10px; margin-bottom: 8px;
        background: #fff;
        transition: border-color 0.15s;
    }
    .vp-list-item:focus-within { border-color: rgba(0,0,0,0.2); }
    .vp-num {
        width: 22px; height: 22px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 500;
        flex-shrink: 0; margin-top: 8px;
    }
    .num-teal { background: #E1F5EE; color: #0F6E56; }
    .num-blue { background: #E6F1FB; color: #185FA5; }
    .num-purple { background: #EEEDFE; color: #534AB7; }
    .vp-list-input {
        flex: 1; border: none; background: transparent;
        font-family: 'DM Sans', sans-serif; font-size: 14px;
        color: #2c2c2a; outline: none; padding: 8px 0;
    }
    .vp-list-input::placeholder { color: #b4b2a9; font-weight: 300; }
    .vp-del-btn {
        flex-shrink: 0; border: none; background: transparent;
        cursor: pointer; padding: 6px; border-radius: 6px;
        color: #b4b2a9; opacity: 0;
        transition: all 0.15s; margin-top: 4px;
    }
    .vp-list-item:hover .vp-del-btn { opacity: 1; }
    .vp-del-btn:hover { color: #E24B4A; background: #FCEBEB; }
    .vp-del-btn svg { width: 14px; height: 14px; }

    /* Add button */
    .vp-add-btn {
        display: flex; align-items: center; justify-content: center; gap: 6px;
        width: 100%; padding: 9px 14px; margin-top: 4px;
        border: 0.5px dashed rgba(0,0,0,0.2);
        border-radius: 10px; background: transparent;
        cursor: pointer; font-family: 'DM Sans', sans-serif;
        font-size: 13px; color: #888780;
        transition: all 0.15s;
    }
    .vp-add-btn:hover { border-color: rgba(0,0,0,0.35); color: #2c2c2a; background: #f5f4f0; }
    .vp-add-btn svg { width: 14px; height: 14px; }

    /* Empty state */
    .vp-empty { text-align: center; padding: 2.5rem 1rem; color: #b4b2a9; }
    .vp-empty svg { width: 32px; height: 32px; margin: 0 auto 8px; opacity: 0.5; display: block; }
    .vp-empty p { font-size: 13px; }

    /* Actions */
    .vp-actions { display: flex; justify-content: flex-end; gap: 10px; padding-top: 0.5rem; }
    .vp-btn-reset {
        padding: 10px 22px;
        background: #fff; border: 0.5px solid rgba(0,0,0,0.15);
        border-radius: 10px; font-family: 'DM Sans', sans-serif;
        font-size: 14px; color: #5F5E5A;
        cursor: pointer; display: flex; align-items: center; gap: 8px;
        transition: all 0.15s;
    }
    .vp-btn-reset:hover { background: #f5f4f0; color: #2c2c2a; }
    .vp-btn-reset svg { width: 14px; height: 14px; }
    .vp-btn-save {
        padding: 10px 24px;
        background: #0F6E56; border: none;
        border-radius: 10px; font-family: 'DM Sans', sans-serif;
        font-size: 14px; font-weight: 500; color: white;
        cursor: pointer; display: flex; align-items: center; gap: 8px;
        transition: all 0.15s; box-shadow: 0 1px 3px rgba(15,110,86,0.3);
    }
    .vp-btn-save:hover { background: #085041; }
    .vp-btn-save:active { transform: scale(0.98); }
    .vp-btn-save svg { width: 14px; height: 14px; }

    /* Slide in animation */
    @keyframes vp-slide-in {
        from { opacity: 0; transform: translateY(-8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .vp-animate { animation: vp-slide-in 0.3s ease-out; }

    @media (max-width: 640px) {
        .vp-header { flex-direction: column; gap: 0.75rem; }
        .vp-title { font-size: 22px; }
        .vp-actions { flex-direction: column-reverse; }
        .vp-btn-reset, .vp-btn-save { width: 100%; justify-content: center; }
        .pillars-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="visi-page">
    <div style="max-width: 720px; margin: 0 auto;">

        {{-- Header --}}
        <div class="vp-header">
            <div class="vp-header-left">
                <div class="vp-icon-badge">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <div class="vp-title">Profil Fakultas</div>
                    <div class="vp-subtitle">Kelola visi, misi, tujuan, dan semua konten sambutan dekan</div>
                </div>
            </div>
            <div class="vp-timestamp">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                </svg>
                {{ now()->format('d M Y, H:i') }}
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
        <div class="vp-alert vp-animate" id="vpAlert">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('vpAlert').remove()" aria-label="Tutup">✕</button>
        </div>
        @endif

        {{-- FORM dengan enctype --}}
        <form action="{{ route('admin.faculty-profile.update') }}" 
              method="POST" 
              enctype="multipart/form-data"
              id="vpForm">
            @csrf

            {{-- ===================== SAMBUTAN DEKAN (LENGKAP) ===================== --}}
            <div class="vp-card">
                <div class="vp-card-head">
                    <div class="vp-card-head-left">
                        <div class="vp-section-icon icon-amber">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="vp-label">Sambutan Dekan</div>
                            <div class="vp-desc">Kelola semua konten profil dekan — 100% dinamis</div>
                        </div>
                    </div>
                    <span class="vp-badge badge-amber">Full CMS</span>
                </div>
                <div class="vp-card-body">

                    {{-- Nama Dekan --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Nama Lengkap Dekan
                        </label>
                        <input type="text"
                               name="dean_name"
                               value="{{ old('dean_name', $profile->dean_name ?? '') }}"
                               class="vp-input"
                               placeholder="Contoh: Prof. Dr. Ir. Ahmad Fauzi, M.T., IPU">
                    </div>

                    {{-- Role/Jabatan --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Jabatan / Role
                        </label>
                        <input type="text"
                               name="dean_role"
                               value="{{ old('dean_role', $profile->dean_role ?? '') }}"
                               class="vp-input"
                               placeholder="Contoh: Dekan Fakultas">
                    </div>

                    {{-- Periode Jabatan --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Periode Jabatan
                        </label>
                        <input type="text"
                               name="dean_period"
                               value="{{ old('dean_period', $profile->dean_period ?? '') }}"
                               class="vp-input"
                               placeholder="Contoh: Periode 2022 – 2026">
                    </div>

                    {{-- Judul Sambutan (Title) --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Judul Sambutan
                        </label>
                        <input type="text"
                               name="dean_title"
                               value="{{ old('dean_title', $profile->dean_title ?? '') }}"
                               class="vp-input"
                               placeholder="Contoh: Selamat Datang di Fakultas Kami">
                    </div>

                    {{-- Isi Sambutan --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Isi Sambutan
                        </label>
                        <textarea
                            name="dean_message"
                            rows="5"
                            class="vp-textarea"
                            placeholder="Tuliskan sambutan dekan untuk mahasiswa dan civitas akademika..."
                        >{{ old('dean_message', $profile->dean_message ?? '') }}</textarea>
                        <div class="vp-char-counter" id="deanCharCount">0 karakter</div>
                    </div>

                    {{-- Tiga Pilar (Pillar Tags) --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:10px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Tiga Pilar / Tagline Pendukung
                        </label>
                        <div class="pillars-grid">
                            <div class="pillar-field">
                                <label>Pilar 1</label>
                                <input type="text"
                                       name="dean_pillar_1"
                                       value="{{ old('dean_pillar_1', $profile->dean_pillar_1 ?? '') }}"
                                       placeholder="Contoh: Inovasi Riset">
                            </div>
                            <div class="pillar-field">
                                <label>Pilar 2</label>
                                <input type="text"
                                       name="dean_pillar_2"
                                       value="{{ old('dean_pillar_2', $profile->dean_pillar_2 ?? '') }}"
                                       placeholder="Contoh: Link & Match Industri">
                            </div>
                            <div class="pillar-field">
                                <label>Pilar 3</label>
                                <input type="text"
                                       name="dean_pillar_3"
                                       value="{{ old('dean_pillar_3', $profile->dean_pillar_3 ?? '') }}"
                                       placeholder="Contoh: Wawasan Global">
                            </div>
                        </div>
                    </div>

                    {{-- Tombol / Link --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Link Tombol "Profil Lengkap"
                        </label>
                        <input type="text"
                               name="dean_button_link"
                               value="{{ old('dean_button_link', $profile->dean_button_link ?? '') }}"
                               class="vp-input"
                               placeholder="Contoh: /profil/dekan atau https://...">
                        <div class="vp-char-counter" style="margin-top:4px;">
                            Kosongkan jika tidak ingin menampilkan tombol
                        </div>
                    </div>

                    {{-- Upload Foto Dekan --}}
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:6px; font-size:13px; font-weight:500; color:#2c2c2a;">
                            Foto Dekan
                        </label>
                        <input type="file"
                               name="dean_photo"
                               class="vp-file-input"
                               accept="image/*"
                               id="deanPhotoInput">
                        <div class="vp-photo-preview" id="deanPhotoPreview">
                            @if(!empty($profile->dean_photo))
                                <img src="{{ asset('storage/'.$profile->dean_photo) }}"
                                     alt="Foto Dekan"
                                     class="vp-photo-img">
                                <span class="vp-photo-label">Foto saat ini | Upload baru untuk mengganti</span>
                            @else
                                <span class="vp-photo-label">Belum ada foto. Pilih file untuk upload.</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            {{-- ===================== VISI ===================== --}}
            <div class="vp-card">
                <div class="vp-card-head">
                    <div class="vp-card-head-left">
                        <div class="vp-section-icon icon-teal">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="vp-label">Visi Fakultas</div>
                            <div class="vp-desc">Tujuan jangka panjang fakultas</div>
                        </div>
                    </div>
                </div>
                <div class="vp-card-body">
                    <textarea
                        name="visi"
                        id="visiInput"
                        rows="5"
                        class="vp-textarea"
                        placeholder="Tuliskan visi fakultas di sini..."
                    >{{ $profile->visi ?? '' }}</textarea>
                    <div class="vp-char-counter"><span id="visiCharCount">0</span> karakter</div>
                </div>
            </div>

            {{-- ===================== MISI ===================== --}}
            <div class="vp-card">
                <div class="vp-card-head">
                    <div class="vp-card-head-left">
                        <div class="vp-section-icon icon-blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="vp-label">Misi Fakultas</div>
                            <div class="vp-desc">Langkah-langkah mencapai visi</div>
                        </div>
                    </div>
                    <span class="vp-badge badge-blue" id="misiCount">{{ $profile->misi->count() ?? 0 }} item</span>
                </div>
                <div class="vp-card-body">
                    <div id="misiWrapper">
                        @forelse($profile->misi ?? [] as $index => $m)
                        <div class="vp-list-item">
                            <div class="vp-num num-blue">{{ $index + 1 }}</div>
                            <input type="text" name="misi[]" class="vp-list-input" value="{{ $m->content }}" placeholder="Masukkan misi...">
                            <button type="button" class="vp-del-btn" onclick="removeItem(this, 'misi')" aria-label="Hapus misi">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                        @empty
                        <div class="vp-empty" id="misiEmpty">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <p>Belum ada misi. Klik tambah untuk mulai.</p>
                        </div>
                        @endforelse
                    </div>
                    <button type="button" class="vp-add-btn" onclick="addItem('misi', 'blue')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Tambah Misi
                    </button>
                </div>
            </div>

            {{-- ===================== TUJUAN ===================== --}}
            <div class="vp-card">
                <div class="vp-card-head">
                    <div class="vp-card-head-left">
                        <div class="vp-section-icon icon-purple">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="vp-label">Tujuan Fakultas</div>
                            <div class="vp-desc">Target yang ingin dicapai</div>
                        </div>
                    </div>
                    <span class="vp-badge badge-purple" id="tujuanCount">{{ $profile->tujuan->count() ?? 0 }} item</span>
                </div>
                <div class="vp-card-body">
                    <div id="tujuanWrapper">
                        @forelse($profile->tujuan ?? [] as $index => $t)
                        <div class="vp-list-item">
                            <div class="vp-num num-purple">{{ $index + 1 }}</div>
                            <input type="text" name="tujuan[]" class="vp-list-input" value="{{ $t->content }}" placeholder="Masukkan tujuan...">
                            <button type="button" class="vp-del-btn" onclick="removeItem(this, 'tujuan')" aria-label="Hapus tujuan">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                        @empty
                        <div class="vp-empty" id="tujuanEmpty">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <p>Belum ada tujuan. Klik tambah untuk mulai.</p>
                        </div>
                        @endforelse
                    </div>
                    <button type="button" class="vp-add-btn" onclick="addItem('tujuan', 'purple')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Tambah Tujuan
                    </button>
                </div>
            </div>

            {{-- Actions --}}
            <div class="vp-actions">
                <button type="button" class="vp-btn-reset" onclick="resetForm()">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Reset
                </button>
                <button type="submit" class="vp-btn-save">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
// ===================== VISI CHARACTER COUNTER =====================
const visiInput = document.getElementById('visiInput');
const visiCharCount = document.getElementById('visiCharCount');
function updateVisiCount() {
    if (visiCharCount && visiInput) visiCharCount.textContent = visiInput.value.length;
}
if (visiInput) { visiInput.addEventListener('input', updateVisiCount); updateVisiCount(); }

// ===================== DEAN MESSAGE CHARACTER COUNTER =====================
const deanInput = document.querySelector('textarea[name="dean_message"]');
const deanCharCount = document.getElementById('deanCharCount');
function updateDeanCount() {
    if (deanCharCount && deanInput) deanCharCount.textContent = deanInput.value.length + ' karakter';
}
if (deanInput) { deanInput.addEventListener('input', updateDeanCount); updateDeanCount(); }

// ===================== FOTO PREVIEW =====================
const photoInput = document.getElementById('deanPhotoInput');
const previewContainer = document.getElementById('deanPhotoPreview');
if (photoInput) {
    photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                previewContainer.innerHTML = `
                    <img src="${ev.target.result}" class="vp-photo-img" alt="Preview Foto">
                    <span class="vp-photo-label">Foto baru (akan mengganti yang lama)</span>
                `;
            };
            reader.readAsDataURL(file);
        } else {
            // Kembalikan ke foto lama jika ada
            const oldPhoto = "{{ !empty($profile->dean_photo) ? asset('storage/'.$profile->dean_photo) : '' }}";
            if (oldPhoto) {
                previewContainer.innerHTML = `
                    <img src="${oldPhoto}" class="vp-photo-img" alt="Foto Dekan">
                    <span class="vp-photo-label">Foto saat ini | Upload baru untuk mengganti</span>
                `;
            } else {
                previewContainer.innerHTML = `<span class="vp-photo-label">Belum ada foto. Pilih file untuk upload.</span>`;
            }
        }
    });
}

// ===================== RENUMBER ITEMS =====================
function renumber(type) {
    const wrapper = document.getElementById(type + 'Wrapper');
    if (wrapper) {
        wrapper.querySelectorAll('.vp-num').forEach((dot, i) => { dot.textContent = i + 1; });
    }
}

// ===================== UPDATE ITEM COUNT BADGE =====================
function updateCount(type) {
    const wrapper = document.getElementById(type + 'Wrapper');
    if (!wrapper) return;
    
    const count = wrapper.querySelectorAll('.vp-list-item').length;
    const badge = document.getElementById(type + 'Count');
    if (badge) badge.textContent = count + ' item';

    // Empty state handling
    let emptyDiv = wrapper.querySelector('.vp-empty');
    const label = type === 'misi' ? 'misi' : 'tujuan';
    
    if (count === 0 && !emptyDiv) {
        const e = document.createElement('div');
        e.className = 'vp-empty';
        e.id = type + 'Empty';
        e.innerHTML = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg><p>Belum ada ${label}. Klik tambah untuk mulai.</p>`;
        wrapper.appendChild(e);
    } else if (count > 0 && emptyDiv) {
        emptyDiv.remove();
    }
}

// ===================== ADD ITEM =====================
function addItem(type, color) {
    const wrapper = document.getElementById(type + 'Wrapper');
    if (!wrapper) return;
    
    const empty = wrapper.querySelector('.vp-empty');
    if (empty) empty.remove();

    const idx = wrapper.querySelectorAll('.vp-list-item').length + 1;
    const label = type === 'misi' ? 'misi' : 'tujuan';
    const trashIcon = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>`;

    const div = document.createElement('div');
    div.className = 'vp-list-item';
    div.style.opacity = '0';
    div.style.transform = 'translateY(-6px)';
    div.style.transition = 'all 0.2s ease';
    div.innerHTML = `
        <div class="vp-num num-${color}">${idx}</div>
        <input type="text" name="${type}[]" class="vp-list-input" placeholder="Masukkan ${label}...">
        <button type="button" class="vp-del-btn" onclick="removeItem(this, '${type}')" aria-label="Hapus ${label}">${trashIcon}</button>
    `;
    wrapper.appendChild(div);

    // Animate in
    requestAnimationFrame(() => {
        div.style.opacity = '1';
        div.style.transform = 'translateY(0)';
    });

    updateCount(type);
    div.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    setTimeout(() => div.querySelector('input').focus(), 150);
}

// ===================== REMOVE ITEM =====================
function removeItem(btn, type) {
    const item = btn.closest('.vp-list-item');
    item.style.opacity = '0';
    item.style.transform = 'translateX(8px)';
    item.style.transition = 'all 0.18s ease';
    setTimeout(() => {
        item.remove();
        renumber(type);
        updateCount(type);
    }, 180);
}

// ===================== RESET FORM =====================
function resetForm() {
    if (confirm('Reset semua perubahan? Data yang belum disimpan akan hilang.')) {
        location.reload();
    }
}

// ===================== FORM VALIDATION =====================
const form = document.getElementById('vpForm');
if (form) {
    form.addEventListener('submit', function(e) {
        let hasEmpty = false;
        this.querySelectorAll('input[name="misi[]"], input[name="tujuan[]"]').forEach(inp => {
            if (!inp.value.trim()) {
                hasEmpty = true;
                inp.closest('.vp-list-item').style.borderColor = '#E24B4A';
            } else {
                inp.closest('.vp-list-item').style.borderColor = '';
            }
        });
        if (hasEmpty) {
            e.preventDefault();
            alert('Harap isi semua field misi dan tujuan terlebih dahulu.');
        }
    });
}

// Auto-clear error border
document.addEventListener('input', function(e) {
    if (e.target.matches('input[name="misi[]"], input[name="tujuan[]"]')) {
        if (e.target.value.trim()) {
            e.target.closest('.vp-list-item').style.borderColor = '';
        }
    }
});

// Initialize counts on load
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('misiWrapper')) updateCount('misi');
    if (document.getElementById('tujuanWrapper')) updateCount('tujuan');
});
</script>

@endsection