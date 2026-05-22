@extends('layouts.admin')

@section('title', 'Pengaturan Situs')

@section('content')
<div class="settings-wrapper">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="header-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>
            </svg>
        </div>
        <div>
            <h1 class="page-title">Pengaturan Situs</h1>
            <p class="page-subtitle">Kelola informasi umum, kontak, sosial media, dan footer website</p>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert-success" id="successAlert">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="cards-grid">

            {{-- ==================== 01 IDENTITAS SITUS ==================== --}}
            <div class="card card-full">
                <div class="card-header">
                    <span class="card-badge badge-blue">01</span>
                    <div>
                        <h2 class="card-title">Identitas Situs</h2>
                        <p class="card-desc">Nama, subjudul, dan kontak utama website</p>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="site_name">
                                Nama Situs <span class="required">*</span>
                            </label>
                            <input type="text" id="site_name" name="site_name"
                                class="form-input @error('site_name') is-error @enderror"
                                value="{{ old('site_name', $settings->site_name ?? '') }}"
                                placeholder="Contoh: LPPMI">
                            @error('site_name')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="site_subtitle">Subjudul Situs</label>
                            <input type="text" id="site_subtitle" name="site_subtitle"
                                class="form-input"
                                value="{{ old('site_subtitle', $settings->site_subtitle ?? '') }}"
                                placeholder="Contoh: Universitas Gunung Kidul">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="phone">Nomor Telepon</label>
                            <div class="input-with-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.77 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 5.91 5.91l.91-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                                <input type="text" id="phone" name="phone"
                                    class="form-input has-icon"
                                    value="{{ old('phone', $settings->phone ?? '') }}"
                                    placeholder="+62 xxx-xxxx-xxxx">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-with-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                <input type="email" id="email" name="email"
                                    class="form-input has-icon @error('email') is-error @enderror"
                                    value="{{ old('email', $settings->email ?? '') }}"
                                    placeholder="admin@example.com">
                            </div>
                            @error('email')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">Alamat</label>
                        <div class="input-with-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <input type="text" id="address" name="address"
                                class="form-input has-icon"
                                value="{{ old('address', $settings->address ?? '') }}"
                                placeholder="Jl. Contoh No. 1, Kota">
                        </div>
                    </div>

                </div>
            </div>

            {{-- ==================== 02 LOGO ==================== --}}
            <div class="card card-full">
                <div class="card-header">
                    <span class="card-badge badge-purple">02</span>
                    <div>
                        <h2 class="card-title">Logo Situs</h2>
                        <p class="card-desc">Logo yang tampil di header website</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Logo</label>
                        <div class="upload-zone" onclick="document.getElementById('logo').click()">
                            @if(!empty($settings->logo))
                                <img src="{{ asset('storage/' . $settings->logo) }}"
                                     alt="Logo" class="preview-img" id="logoPreview">
                            @else
                                <div class="upload-placeholder" id="logoPlaceholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <circle cx="8.5" cy="8.5" r="1.5"/>
                                        <polyline points="21 15 16 10 5 21"/>
                                    </svg>
                                    <span>Klik untuk upload logo</span>
                                    <small>PNG, JPG, SVG (maks. 2MB)</small>
                                </div>
                                <img src="" alt="Logo Preview" class="preview-img d-none" id="logoPreview">
                            @endif
                        </div>
                        <input type="file" id="logo" name="logo" accept="image/*" class="d-none"
                               onchange="previewImage(this, 'logoPreview', 'logoPlaceholder')">
                        <p class="field-hint">Kosongkan jika tidak ingin mengganti logo.</p>
                    </div>
                </div>
            </div>

            {{-- ==================== 03 SOSIAL MEDIA ==================== --}}
            <div class="card card-full">
                <div class="card-header">
                    <span class="card-badge badge-teal">03</span>
                    <div>
                        <h2 class="card-title">Sosial Media</h2>
                        <p class="card-desc">Link akun sosial media yang ditampilkan di header & footer</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="social-grid">

                        <div class="social-item">
                            <div class="social-icon social-fb">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                                </svg>
                            </div>
                            <div class="form-group flex-1">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="url" id="facebook" name="facebook"
                                    class="form-input"
                                    value="{{ old('facebook', $settings->facebook ?? '') }}"
                                    placeholder="https://facebook.com/...">
                            </div>
                        </div>

                        <div class="social-item">
                            <div class="social-icon social-ig">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                    <circle cx="12" cy="12" r="4"/>
                                    <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                                </svg>
                            </div>
                            <div class="form-group flex-1">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input type="url" id="instagram" name="instagram"
                                    class="form-input"
                                    value="{{ old('instagram', $settings->instagram ?? '') }}"
                                    placeholder="https://instagram.com/...">
                            </div>
                        </div>

                        <div class="social-item">
                            <div class="social-icon social-tw">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                                </svg>
                            </div>
                            <div class="form-group flex-1">
                                <label class="form-label" for="twitter">Twitter / X</label>
                                <input type="url" id="twitter" name="twitter"
                                    class="form-input"
                                    value="{{ old('twitter', $settings->twitter ?? '') }}"
                                    placeholder="https://twitter.com/...">
                            </div>
                        </div>

                        <div class="social-item">
                            <div class="social-icon social-yt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                                    <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="currentColor" stroke="none"/>
                                </svg>
                            </div>
                            <div class="form-group flex-1">
                                <label class="form-label" for="youtube">YouTube</label>
                                <input type="url" id="youtube" name="youtube"
                                    class="form-input"
                                    value="{{ old('youtube', $settings->youtube ?? '') }}"
                                    placeholder="https://youtube.com/...">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- ==================== 04 FOOTER ==================== --}}
            <div class="card card-full">
                <div class="card-header">
                    <span class="card-badge badge-amber">04</span>
                    <div>
                        <h2 class="card-title">Pengaturan Footer</h2>
                        <p class="card-desc">Deskripsi, kontak, dan informasi di bagian bawah halaman</p>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label class="form-label" for="footer_description">Deskripsi Footer</label>
                        <textarea id="footer_description" name="footer_description"
                            class="form-textarea" rows="3"
                            placeholder="Deskripsi singkat lembaga yang tampil di footer...">{{ old('footer_description', $settings->footer_description ?? '') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="footer_address">Alamat Footer</label>
                            <input type="text" id="footer_address" name="footer_address"
                                class="form-input"
                                value="{{ old('footer_address', $settings->footer_address ?? '') }}"
                                placeholder="Alamat lengkap di footer">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="footer_phone">Telepon Footer</label>
                            <input type="text" id="footer_phone" name="footer_phone"
                                class="form-input"
                                value="{{ old('footer_phone', $settings->footer_phone ?? '') }}"
                                placeholder="+62 xxx-xxxx-xxxx">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="footer_email">Email Footer</label>
                            <input type="email" id="footer_email" name="footer_email"
                                class="form-input"
                                value="{{ old('footer_email', $settings->footer_email ?? '') }}"
                                placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="footer_website">Website</label>
                            <input type="url" id="footer_website" name="footer_website"
                                class="form-input"
                                value="{{ old('footer_website', $settings->footer_website ?? '') }}"
                                placeholder="https://example.ac.id">
                        </div>
                    </div>

                </div>
            </div>

            {{-- ==================== 05 TEMA WEBSITE (30 KOMBINASI WARNA) ==================== --}}
            <div class="card card-full">
                <div class="card-header">
                    <span class="card-badge badge-purple">05</span>
                    <div>
                        <h2 class="card-title">🎨 Tema Website</h2>
                        <p class="card-desc">
                            Pilih dari 30 kombinasi warna profesional atau atur manual
                        </p>
                    </div>
                </div>

                <div class="card-body">

                    {{-- LIVE PREVIEW PANEL --}}
                    <div class="theme-preview-panel" id="themePreviewPanel">
                        <div class="preview-header">
                            <span class="preview-badge">Live Preview</span>
                            <span class="preview-hint">Perubahan warna terlihat langsung di sini</span>
                        </div>
                        <div class="preview-samples">
                            <div class="sample-group">
                                <div class="sample-primary" id="previewPrimary" style="background-color: {{ old('primary_color', $settings->primary_color ?? '#0B4650') }}">
                                    <span>Primary Color</span>
                                </div>
                                <div class="sample-gold" id="previewGold" style="background-color: {{ old('gold_color', $settings->gold_color ?? '#E6FF2B') }}">
                                    <span>Gold Accent</span>
                                </div>
                            </div>
                            <div class="sample-text">
                                <div class="text-dark" id="previewTextDark">Contoh Teks Gelap</div>
                                <div class="text-light" id="previewTextLight">Contoh Teks Terang</div>
                            </div>
                        </div>
                    </div>

                    {{-- KATEGORI PRESET --}}
                    <div class="preset-categories">
                        <button type="button" class="category-btn active" data-category="all">Semua (30)</button>
                        <button type="button" class="category-btn" data-category="cool">❄️ Cool (6)</button>
                        <button type="button" class="category-btn" data-category="warm">🔥 Warm (6)</button>
                        <button type="button" class="category-btn" data-category="nature">🌿 Nature (6)</button>
                        <button type="button" class="category-btn" data-category="vibrant">💫 Vibrant (6)</button>
                        <button type="button" class="category-btn" data-category="elegant">👑 Elegant (6)</button>
                    </div>

                    {{-- PRESET GRID DENGAN 30 KOMBINASI --}}
                    <div class="form-group">
                        <label class="form-label">🎨 Pilih Kombinasi Warna</label>
                        <div class="preset-grid" id="presetGrid">
                            
                            {{-- ========== COOL THEMES (6) ========== --}}
                            <div class="preset-card" data-preset="ocean" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#0B4650"></span>
                                    <span class="color-chip" style="background:#E6FF2B"></span>
                                    <span class="color-chip" style="background:#F9F7F2"></span>
                                </div>
                                <span class="preset-name">🌊 Ocean Teal</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            <div class="preset-card" data-preset="sky" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#0284c7"></span>
                                    <span class="color-chip" style="background:#fcd34d"></span>
                                    <span class="color-chip" style="background:#f0f9ff"></span>
                                </div>
                                <span class="preset-name">☁️ Sky Blue</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            <div class="preset-card" data-preset="twilight" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#4c1d95"></span>
                                    <span class="color-chip" style="background:#f472b6"></span>
                                    <span class="color-chip" style="background:#faf5ff"></span>
                                </div>
                                <span class="preset-name">🌙 Twilight Purple</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            <div class="preset-card" data-preset="ice" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#0f172a"></span>
                                    <span class="color-chip" style="background:#38bdf8"></span>
                                    <span class="color-chip" style="background:#f8fafc"></span>
                                </div>
                                <span class="preset-name">🧊 Ice Blue</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            <div class="preset-card" data-preset="mint" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#134e4a"></span>
                                    <span class="color-chip" style="background:#2dd4bf"></span>
                                    <span class="color-chip" style="background:#f0fdfa"></span>
                                </div>
                                <span class="preset-name">🌿 Mint Fresh</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            <div class="preset-card" data-preset="navy" data-category="cool">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#1e3a8a"></span>
                                    <span class="color-chip" style="background:#818cf8"></span>
                                    <span class="color-chip" style="background:#eef2ff"></span>
                                </div>
                                <span class="preset-name">⚓ Navy Blue</span>
                                <span class="preset-badge cool">Cool</span>
                            </div>

                            {{-- ========== WARM THEMES (6) ========== --}}
                            <div class="preset-card" data-preset="sunset" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#be123c"></span>
                                    <span class="color-chip" style="background:#fbbf24"></span>
                                    <span class="color-chip" style="background:#fff7ed"></span>
                                </div>
                                <span class="preset-name">🌅 Sunset Rose</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            <div class="preset-card" data-preset="coral" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#e11d48"></span>
                                    <span class="color-chip" style="background:#f97316"></span>
                                    <span class="color-chip" style="background:#fff1f2"></span>
                                </div>
                                <span class="preset-name">🐠 Coral Reef</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            <div class="preset-card" data-preset="amber" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#b45309"></span>
                                    <span class="color-chip" style="background:#fde047"></span>
                                    <span class="color-chip" style="background:#fffbeb"></span>
                                </div>
                                <span class="preset-name">🪔 Amber Glow</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            <div class="preset-card" data-preset="peach" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#fb923c"></span>
                                    <span class="color-chip" style="background:#fed7aa"></span>
                                    <span class="color-chip" style="background:#fff7ed"></span>
                                </div>
                                <span class="preset-name">🍑 Peach Blush</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            <div class="preset-card" data-preset="terracotta" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#9a3412"></span>
                                    <span class="color-chip" style="background:#fdba74"></span>
                                    <span class="color-chip" style="background:#fff7ed"></span>
                                </div>
                                <span class="preset-name">🏺 Terracotta</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            <div class="preset-card" data-preset="maroon" data-category="warm">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#7f1d1d"></span>
                                    <span class="color-chip" style="background:#ef4444"></span>
                                    <span class="color-chip" style="background:#fef2f2"></span>
                                </div>
                                <span class="preset-name">🍷 Maroon Wine</span>
                                <span class="preset-badge warm">Warm</span>
                            </div>

                            {{-- ========== NATURE THEMES (6) ========== --}}
                            <div class="preset-card" data-preset="campus" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#166534"></span>
                                    <span class="color-chip" style="background:#fde047"></span>
                                    <span class="color-chip" style="background:#f0fdf4"></span>
                                </div>
                                <span class="preset-name">🌿 Campus Green</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            <div class="preset-card" data-preset="forest" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#064e3b"></span>
                                    <span class="color-chip" style="background:#a7f3d0"></span>
                                    <span class="color-chip" style="background:#ecfdf5"></span>
                                </div>
                                <span class="preset-name">🌲 Forest Deep</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            <div class="preset-card" data-preset="olive" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#3f6212"></span>
                                    <span class="color-chip" style="background:#fef08a"></span>
                                    <span class="color-chip" style="background:#fefce8"></span>
                                </div>
                                <span class="preset-name">🫒 Olive Garden</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            <div class="preset-card" data-preset="sage" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#4b5563"></span>
                                    <span class="color-chip" style="background:#9ca3af"></span>
                                    <span class="color-chip" style="background:#f9fafb"></span>
                                </div>
                                <span class="preset-name">🍃 Sage Green</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            <div class="preset-card" data-preset="lime" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#4d7c0f"></span>
                                    <span class="color-chip" style="background:#a3e635"></span>
                                    <span class="color-chip" style="background:#f7fee7"></span>
                                </div>
                                <span class="preset-name">🍋 Lime Zest</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            <div class="preset-card" data-preset="moss" data-category="nature">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#2d5a27"></span>
                                    <span class="color-chip" style="background:#c4e6b0"></span>
                                    <span class="color-chip" style="background:#f4f9f2"></span>
                                </div>
                                <span class="preset-name">🌾 Moss Green</span>
                                <span class="preset-badge nature">Nature</span>
                            </div>

                            {{-- ========== VIBRANT THEMES (6) ========== --}}
                            <div class="preset-card" data-preset="royal" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#1e3a8a"></span>
                                    <span class="color-chip" style="background:#facc15"></span>
                                    <span class="color-chip" style="background:#eff6ff"></span>
                                </div>
                                <span class="preset-name">👑 Royal Blue</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            <div class="preset-card" data-preset="electric" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#0891b2"></span>
                                    <span class="color-chip" style="background:#2dd4bf"></span>
                                    <span class="color-chip" style="background:#ecfeff"></span>
                                </div>
                                <span class="preset-name">⚡ Electric Cyan</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            <div class="preset-card" data-preset="sunshine" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#f59e0b"></span>
                                    <span class="color-chip" style="background:#ef4444"></span>
                                    <span class="color-chip" style="background:#fffbeb"></span>
                                </div>
                                <span class="preset-name">☀️ Sunshine Burst</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            <div class="preset-card" data-preset="magenta" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#be185d"></span>
                                    <span class="color-chip" style="background:#f472b6"></span>
                                    <span class="color-chip" style="background:#fff5f6"></span>
                                </div>
                                <span class="preset-name">🌸 Magenta Pop</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            <div class="preset-card" data-preset="neon" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#111827"></span>
                                    <span class="color-chip" style="background:#10b981"></span>
                                    <span class="color-chip" style="background:#ecfdf5"></span>
                                </div>
                                <span class="preset-name">💚 Neon Green</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            <div class="preset-card" data-preset="crimson" data-category="vibrant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#dc2626"></span>
                                    <span class="color-chip" style="background:#fca5a5"></span>
                                    <span class="color-chip" style="background:#fef2f2"></span>
                                </div>
                                <span class="preset-name">❤️ Crimson Red</span>
                                <span class="preset-badge vibrant">Vibrant</span>
                            </div>

                            {{-- ========== ELEGANT THEMES (6) ========== --}}
                            <div class="preset-card" data-preset="luxury" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#1f2937"></span>
                                    <span class="color-chip" style="background:#d4af37"></span>
                                    <span class="color-chip" style="background:#fef3c7"></span>
                                </div>
                                <span class="preset-name">✨ Luxury Gold</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                            <div class="preset-card" data-preset="minimal" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#3f3f46"></span>
                                    <span class="color-chip" style="background:#d4d4d8"></span>
                                    <span class="color-chip" style="background:#fafafa"></span>
                                </div>
                                <span class="preset-name">⚪ Minimal Neutral</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                            <div class="preset-card" data-preset="plum" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#6b21a5"></span>
                                    <span class="color-chip" style="background:#e9d5ff"></span>
                                    <span class="color-chip" style="background:#faf5ff"></span>
                                </div>
                                <span class="preset-name">🍇 Plum Elegance</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                            <div class="preset-card" data-preset="champagne" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#78350f"></span>
                                    <span class="color-chip" style="background:#fde68a"></span>
                                    <span class="color-chip" style="background:#fffbeb"></span>
                                </div>
                                <span class="preset-name">🥂 Champagne</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                            <div class="preset-card" data-preset="charcoal" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#1f2937"></span>
                                    <span class="color-chip" style="background:#94a3b8"></span>
                                    <span class="color-chip" style="background:#f1f5f9"></span>
                                </div>
                                <span class="preset-name">🖤 Charcoal</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                            <div class="preset-card" data-preset="rosegold" data-category="elegant">
                                <div class="preset-colors">
                                    <span class="color-chip" style="background:#831843"></span>
                                    <span class="color-chip" style="background:#fbcfe8"></span>
                                    <span class="color-chip" style="background:#fff5f6"></span>
                                </div>
                                <span class="preset-name">💎 Rose Gold</span>
                                <span class="preset-badge elegant">Elegant</span>
                            </div>

                        </div>
                    </div>

                    {{-- COLOR PICKERS dengan Preview Swatch Besar --}}
                    <div class="color-pickers-grid">

                        {{-- PRIMARY GROUP --}}
                        <div class="color-group">
                            <div class="color-group-header">
                                <span class="color-icon">🎨</span>
                                <label class="color-group-label">Warna Utama (Primary)</label>
                            </div>
                            <div class="color-input-wrapper">
                                <div class="color-swatch-large" id="swatchPrimary" style="background-color: {{ old('primary_color', $settings->primary_color ?? '#0B4650') }}"></div>
                                <div class="color-input-area">
                                    <input type="color"
                                        id="primary_color"
                                        name="primary_color"
                                        class="form-input color-picker"
                                        value="{{ old('primary_color', $settings->primary_color ?? '#0B4650') }}"
                                        oninput="updateColorPreview('primary_color', this.value)">
                                    <span class="color-hex" id="hexPrimary">{{ old('primary_color', $settings->primary_color ?? '#0B4650') }}</span>
                                </div>
                            </div>
                            <div class="color-variants">
                                <div class="variant-item">
                                    <label>Primary Light</label>
                                    <input type="color" id="primary_light" name="primary_light"
                                        class="form-input variant-picker"
                                        value="{{ old('primary_light', $settings->primary_light ?? '#155e6e') }}"
                                        oninput="updateColorPreview('primary_light', this.value)">
                                </div>
                                <div class="variant-item">
                                    <label>Primary Dark</label>
                                    <input type="color" id="primary_dark" name="primary_dark"
                                        class="form-input variant-picker"
                                        value="{{ old('primary_dark', $settings->primary_dark ?? '#072e38') }}"
                                        oninput="updateColorPreview('primary_dark', this.value)">
                                </div>
                            </div>
                        </div>

                        {{-- GOLD/ACCENT GROUP --}}
                        <div class="color-group">
                            <div class="color-group-header">
                                <span class="color-icon">🌟</span>
                                <label class="color-group-label">Warna Aksen (Accent)</label>
                            </div>
                            <div class="color-input-wrapper">
                                <div class="color-swatch-large" id="swatchGold" style="background-color: {{ old('gold_color', $settings->gold_color ?? '#E6FF2B') }}"></div>
                                <div class="color-input-area">
                                    <input type="color"
                                        id="gold_color"
                                        name="gold_color"
                                        class="form-input color-picker"
                                        value="{{ old('gold_color', $settings->gold_color ?? '#E6FF2B') }}"
                                        oninput="updateColorPreview('gold_color', this.value)">
                                    <span class="color-hex" id="hexGold">{{ old('gold_color', $settings->gold_color ?? '#E6FF2B') }}</span>
                                </div>
                            </div>
                            <div class="color-variants">
                                <div class="variant-item">
                                    <label>Gold Light</label>
                                    <input type="color" id="gold_light" name="gold_light"
                                        class="form-input variant-picker"
                                        value="{{ old('gold_light', $settings->gold_light ?? '#eeff55') }}"
                                        oninput="updateColorPreview('gold_light', this.value)">
                                </div>
                                <div class="variant-item">
                                    <label>Gold Dark</label>
                                    <input type="color" id="gold_dark" name="gold_dark"
                                        class="form-input variant-picker"
                                        value="{{ old('gold_dark', $settings->gold_dark ?? '#c4db00') }}"
                                        oninput="updateColorPreview('gold_dark', this.value)">
                                </div>
                            </div>
                        </div>

                        {{-- BACKGROUND GROUP --}}
                        <div class="color-group">
                            <div class="color-group-header">
                                <span class="color-icon">🖼️</span>
                                <label class="color-group-label">Warna Latar (Background)</label>
                            </div>
                            <div class="compact-colors">
                                <div class="compact-item">
                                    <label>Secondary</label>
                                    <input type="color" id="secondary_color" name="secondary_color"
                                        class="form-input compact-picker"
                                        value="{{ old('secondary_color', $settings->secondary_color ?? '#F9F7F2') }}"
                                        oninput="updateColorPreview('secondary_color', this.value)">
                                </div>
                                <div class="compact-item">
                                    <label>Accent 1</label>
                                    <input type="color" id="accent_color" name="accent_color"
                                        class="form-input compact-picker"
                                        value="{{ old('accent_color', $settings->accent_color ?? '#fdfcf9') }}"
                                        oninput="updateColorPreview('accent_color', this.value)">
                                </div>
                                <div class="compact-item">
                                    <label>Accent 2</label>
                                    <input type="color" id="accent2_color" name="accent2_color"
                                        class="form-input compact-picker"
                                        value="{{ old('accent2_color', $settings->accent2_color ?? '#f0ede5') }}"
                                        oninput="updateColorPreview('accent2_color', this.value)">
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- TIPS MEMILIH WARNA --}}
                    <div class="color-tips">
                        <div class="tip-icon">💡</div>
                        <div class="tip-text">
                            <strong>Tips memilih kombinasi warna:</strong> 
                            Pilih tema berdasarkan kategori yang sesuai dengan identitas website Anda. 
                            Cool untuk profesional modern, Warm untuk energi positif, Nature untuk kesan alami,
                            Vibrant untuk tampilan berani, Elegant untuk kesan mewah.
                        </div>
                    </div>

                </div>
            </div>

        </div>{{-- end cards-grid --}}

        <div class="form-actions">
            <button type="submit" class="btn-save">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>
                Simpan Pengaturan
            </button>
        </div>

    </form>
</div>

<style>
/* Styles sama seperti sebelumnya, hanya menambahkan beberapa penyesuaian untuk grid */
/* (stylesheet yang sama seperti di atas dengan sedikit modifikasi) */

:root {
    --acc:       #4361ee;
    --acc-light: #eef1fd;
    --acc-hover: #3451d1;
    --bdr:       #e8ecf4;
    --tp:        #1b1f2e;
    --ts:        #6b7491;
    --tm:        #9ba3bb;
    --r:         12px;
    --rsm:       8px;
    --sh:        0 2px 12px rgba(67,97,238,.07);
    --shm:       0 4px 24px rgba(67,97,238,.12);
}
.settings-wrapper {
    max-width: 1400px; margin: 0 auto; padding: 0 0 60px;
    font-family: 'Segoe UI', system-ui, sans-serif;
}
.page-header { display: flex; align-items: center; gap: 16px; margin-bottom: 28px; }
.header-icon {
    width: 48px; height: 48px; background: var(--acc-light); color: var(--acc);
    border-radius: var(--rsm); display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.page-title  { font-size: 22px; font-weight: 700; color: var(--tp); margin: 0 0 2px; letter-spacing: -.4px; }
.page-subtitle { font-size: 13.5px; color: var(--ts); margin: 0; }

.alert-success {
    display: flex; align-items: center; gap: 10px; padding: 13px 18px;
    background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: var(--rsm);
    color: #15803d; font-size: 14px; font-weight: 500; margin-bottom: 24px;
    animation: sd .3s ease;
}
@keyframes sd { from { opacity:0; transform:translateY(-8px); } to { opacity:1; transform:translateY(0); } }

.cards-grid { display: flex; flex-direction: column; gap: 20px; }
.card {
    background: #fff; border: 1px solid var(--bdr); border-radius: var(--r);
    box-shadow: var(--sh); overflow: hidden; transition: box-shadow .2s;
}
.card:hover { box-shadow: var(--shm); }
.card-header {
    display: flex; align-items: flex-start; gap: 14px;
    padding: 20px 24px; border-bottom: 1px solid var(--bdr); background: #fafbff;
}
.card-badge {
    width: 32px; height: 32px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; font-weight: 700; flex-shrink: 0;
}
.badge-blue   { background: #dbeafe; color: #1d4ed8; }
.badge-purple { background: #ede9fe; color: #7c3aed; }
.badge-teal   { background: #ccfbf1; color: #0f766e; }
.badge-amber  { background: #fef3c7; color: #b45309; }
.card-title { font-size: 15px; font-weight: 700; color: var(--tp); margin: 0 0 2px; }
.card-desc  { font-size: 12.5px; color: var(--ts); margin: 0; }
.card-body  { padding: 22px 24px; display: flex; flex-direction: column; gap: 20px; }

.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-group.flex-1 { flex: 1; }
.form-label { font-size: 13px; font-weight: 600; color: var(--tp); }
.required   { color: #ef4444; margin-left: 2px; }
.field-hint { font-size: 12px; color: var(--tm); margin: 4px 0 0; }
.form-input, .form-textarea {
    width: 100%; padding: 9px 13px; background: #f9fafc;
    border: 1.5px solid var(--bdr); border-radius: var(--rsm);
    font-size: 13.5px; color: var(--tp); outline: none;
    transition: border-color .2s, box-shadow .2s; box-sizing: border-box;
}
.form-input:focus, .form-textarea:focus {
    border-color: var(--acc); box-shadow: 0 0 0 3px rgba(67,97,238,.12); background: #fff;
}
.form-input.is-error { border-color: #ef4444; }
.form-textarea { resize: vertical; min-height: 80px; }
.form-error { font-size: 12px; color: #ef4444; }

.input-with-icon { position: relative; }
.input-with-icon svg {
    position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
    color: var(--tm); pointer-events: none;
}
.form-input.has-icon { padding-left: 36px; }

.upload-zone {
    border: 2px dashed var(--bdr); border-radius: var(--rsm);
    min-height: 110px; display: flex; align-items: center; justify-content: center;
    cursor: pointer; background: #f9fafc; transition: border-color .2s, background .2s; overflow: hidden;
}
.upload-zone:hover { border-color: var(--acc); background: var(--acc-light); }
.upload-placeholder {
    display: flex; flex-direction: column; align-items: center; gap: 6px;
    color: var(--tm); text-align: center; padding: 16px;
}
.upload-placeholder span  { font-size: 13px; font-weight: 500; color: var(--ts); }
.upload-placeholder small { font-size: 11.5px; }
.preview-img { max-width: 100%; max-height: 90px; object-fit: contain; border-radius: 6px; }
.d-none { display: none !important; }

.social-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.social-item { display: flex; align-items: flex-end; gap: 12px; }
.social-icon {
    width: 38px; height: 38px; border-radius: var(--rsm);
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.social-fb { background: #e7f0ff; color: #1877f2; }
.social-ig { background: #fde8f4; color: #e1306c; }
.social-tw { background: #e8f5fe; color: #1da1f2; }
.social-yt { background: #fee8e8; color: #ff0000; }

.form-actions { display: flex; justify-content: flex-end; margin-top: 24px; }
.btn-save {
    display: inline-flex; align-items: center; gap: 9px;
    padding: 11px 26px; background: var(--acc); color: #fff;
    border: none; border-radius: var(--rsm); font-size: 14px; font-weight: 600;
    cursor: pointer; transition: background .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 4px 14px rgba(67,97,238,.3);
}
.btn-save:hover {
    background: var(--acc-hover); transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(67,97,238,.38);
}

/* Theme Styles */
.theme-preview-panel {
    background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    border: 1px solid var(--bdr);
    border-radius: var(--r);
    padding: 16px 20px;
    margin-bottom: 8px;
}
.preview-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--bdr);
}
.preview-badge {
    background: var(--acc);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}
.preview-hint {
    font-size: 11px;
    color: var(--tm);
}
.preview-samples {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
}
.sample-group {
    display: flex;
    gap: 12px;
}
.sample-primary, .sample-gold {
    padding: 12px 24px;
    border-radius: var(--rsm);
    text-align: center;
    transition: all 0.3s ease;
}
.sample-primary span, .sample-gold span {
    color: white;
    font-size: 12px;
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.sample-gold span {
    color: #1f2937;
    text-shadow: none;
}
.sample-text {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.text-dark {
    font-size: 13px;
    font-weight: 500;
    color: #1f2937;
}
.text-light {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
}

/* PRESET CATEGORIES */
.preset-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--bdr);
}
.category-btn {
    padding: 6px 14px;
    background: #f3f4f6;
    border: 1px solid var(--bdr);
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    color: var(--ts);
    cursor: pointer;
    transition: all 0.2s ease;
}
.category-btn:hover {
    background: var(--acc-light);
    border-color: var(--acc);
    color: var(--acc);
}
.category-btn.active {
    background: var(--acc);
    border-color: var(--acc);
    color: white;
}

/* PRESET GRID */
.preset-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
    gap: 14px;
    margin-top: 8px;
}
.preset-card {
    position: relative;
    border: 2px solid var(--bdr);
    border-radius: var(--rsm);
    padding: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: #fff;
}
.preset-card:hover {
    border-color: var(--acc);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.preset-colors {
    display: flex;
    gap: 6px;
    margin-bottom: 10px;
}
.color-chip {
    width: 42px;
    height: 42px;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}
.preset-name {
    font-size: 12px;
    font-weight: 600;
    color: var(--tp);
    display: block;
    margin-bottom: 6px;
}
.preset-badge {
    font-size: 9px;
    padding: 2px 8px;
    border-radius: 12px;
    background: #f3f4f6;
    color: var(--ts);
    display: inline-block;
}
.preset-badge.cool { background: #dbeafe; color: #1e40af; }
.preset-badge.warm { background: #ffedd5; color: #9a3412; }
.preset-badge.nature { background: #dcfce7; color: #166534; }
.preset-badge.vibrant { background: #fce7f3; color: #be185d; }
.preset-badge.elegant { background: #f3e8ff; color: #6b21a5; }

/* COLOR PICKERS */
.color-pickers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
    margin-top: 12px;
}
.color-group {
    background: #f9fafc;
    padding: 18px;
    border-radius: var(--rsm);
    border: 1px solid var(--bdr);
}
.color-group-header {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--bdr);
}
.color-icon {
    font-size: 20px;
}
.color-group-label {
    font-size: 14px;
    font-weight: 700;
    color: var(--tp);
}
.color-input-wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}
.color-swatch-large {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    border: 2px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.color-input-area {
    flex: 1;
}
.color-picker {
    width: 100%;
    height: 45px;
    padding: 4px;
    cursor: pointer;
}
.color-hex {
    display: inline-block;
    margin-top: 6px;
    font-size: 11px;
    font-family: monospace;
    color: var(--ts);
    background: #fff;
    padding: 2px 8px;
    border-radius: 4px;
}
.color-variants {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px dashed var(--bdr);
}
.variant-item label, .compact-item label {
    font-size: 11px;
    font-weight: 600;
    color: var(--ts);
    display: block;
    margin-bottom: 6px;
}
.variant-picker, .compact-picker {
    width: 100%;
    height: 35px;
    padding: 2px;
    cursor: pointer;
}
.compact-colors {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.compact-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}
.compact-item label {
    margin-bottom: 0;
    min-width: 70px;
}
.compact-picker {
    width: 80px;
}

.color-tips {
    background: #fff9e6;
    border-left: 3px solid #fbbf24;
    padding: 12px 16px;
    border-radius: var(--rsm);
    display: flex;
    gap: 12px;
    align-items: flex-start;
    margin-top: 8px;
}
.tip-icon {
    font-size: 18px;
}
.tip-text {
    font-size: 12px;
    color: #78350f;
    line-height: 1.5;
}
.tip-text strong {
    font-weight: 700;
}

@media (max-width: 768px) {
    .form-row    { grid-template-columns: 1fr; }
    .social-grid { grid-template-columns: 1fr; }
    .color-pickers-grid { grid-template-columns: 1fr; }
    .preset-grid { grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); }
    .sample-group { flex-direction: column; }
    .preview-samples { flex-direction: column; align-items: stretch; }
    .preset-categories { justify-content: center; }
}
</style>

<script>
// Image preview
function previewImage(input, previewId, placeholderId) {
    const preview = document.getElementById(previewId);
    const ph      = document.getElementById(placeholderId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
            if (ph) ph.classList.add('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Auto close alert
const alertEl = document.getElementById('successAlert');
if (alertEl) {
    setTimeout(() => {
        alertEl.style.transition = 'opacity .4s';
        alertEl.style.opacity = '0';
        setTimeout(() => alertEl.remove(), 400);
    }, 4000);
}

// ==================== 30 THEME PRESETS WITH CATEGORIES ====================
const presets = {
    // Cool Themes (6)
    ocean: {
        primary_color: '#0B4650', primary_light: '#155e6e', primary_dark: '#072e38',
        gold_color: '#E6FF2B', gold_light: '#eeff55', gold_dark: '#c4db00',
        secondary_color: '#F9F7F2', accent_color: '#fdfcf9', accent2_color: '#f0ede5'
    },
    sky: {
        primary_color: '#0284c7', primary_light: '#38bdf8', primary_dark: '#075985',
        gold_color: '#fcd34d', gold_light: '#fef08a', gold_dark: '#f59e0b',
        secondary_color: '#f0f9ff', accent_color: '#e0f2fe', accent2_color: '#bae6fd'
    },
    twilight: {
        primary_color: '#4c1d95', primary_light: '#7c3aed', primary_dark: '#3b0764',
        gold_color: '#f472b6', gold_light: '#fbcfe8', gold_dark: '#db2777',
        secondary_color: '#faf5ff', accent_color: '#f3e8ff', accent2_color: '#e9d5ff'
    },
    ice: {
        primary_color: '#0f172a', primary_light: '#38bdf8', primary_dark: '#020617',
        gold_color: '#38bdf8', gold_light: '#7dd3fc', gold_dark: '#0284c7',
        secondary_color: '#f8fafc', accent_color: '#f1f5f9', accent2_color: '#e2e8f0'
    },
    mint: {
        primary_color: '#134e4a', primary_light: '#2dd4bf', primary_dark: '#042f2e',
        gold_color: '#2dd4bf', gold_light: '#5eead4', gold_dark: '#14b8a6',
        secondary_color: '#f0fdfa', accent_color: '#ccfbf1', accent2_color: '#99f6e4'
    },
    navy: {
        primary_color: '#1e3a8a', primary_light: '#6366f1', primary_dark: '#172554',
        gold_color: '#818cf8', gold_light: '#a5b4fc', gold_dark: '#4f46e5',
        secondary_color: '#eef2ff', accent_color: '#e0e7ff', accent2_color: '#c7d2fe'
    },
    
    // Warm Themes (6)
    sunset: {
        primary_color: '#be123c', primary_light: '#e11d48', primary_dark: '#881337',
        gold_color: '#fbbf24', gold_light: '#fcd34d', gold_dark: '#d97706',
        secondary_color: '#fff7ed', accent_color: '#ffedd5', accent2_color: '#fed7aa'
    },
    coral: {
        primary_color: '#e11d48', primary_light: '#fb7185', primary_dark: '#9f1239',
        gold_color: '#f97316', gold_light: '#fdba74', gold_dark: '#ea580c',
        secondary_color: '#fff1f2', accent_color: '#ffe4e6', accent2_color: '#fecdd3'
    },
    amber: {
        primary_color: '#b45309', primary_light: '#d97706', primary_dark: '#78350f',
        gold_color: '#fde047', gold_light: '#fef08a', gold_dark: '#ca8a04',
        secondary_color: '#fffbeb', accent_color: '#fef3c7', accent2_color: '#fde68a'
    },
    peach: {
        primary_color: '#fb923c', primary_light: '#fdba74', primary_dark: '#c2410c',
        gold_color: '#fed7aa', gold_light: '#fef3c7', gold_dark: '#fdba74',
        secondary_color: '#fff7ed', accent_color: '#ffedd5', accent2_color: '#fed7aa'
    },
    terracotta: {
        primary_color: '#9a3412', primary_light: '#c2410c', primary_dark: '#431407',
        gold_color: '#fdba74', gold_light: '#fed7aa', gold_dark: '#fb923c',
        secondary_color: '#fff7ed', accent_color: '#ffedd5', accent2_color: '#fed7aa'
    },
    maroon: {
        primary_color: '#7f1d1d', primary_light: '#991b1b', primary_dark: '#450a0a',
        gold_color: '#ef4444', gold_light: '#fca5a5', gold_dark: '#dc2626',
        secondary_color: '#fef2f2', accent_color: '#fee2e2', accent2_color: '#fecaca'
    },
    
    // Nature Themes (6)
    campus: {
        primary_color: '#166534', primary_light: '#22c55e', primary_dark: '#14532d',
        gold_color: '#fde047', gold_light: '#fef08a', gold_dark: '#eab308',
        secondary_color: '#f0fdf4', accent_color: '#dcfce7', accent2_color: '#bbf7d0'
    },
    forest: {
        primary_color: '#064e3b', primary_light: '#10b981', primary_dark: '#022c22',
        gold_color: '#a7f3d0', gold_light: '#6ee7b7', gold_dark: '#34d399',
        secondary_color: '#ecfdf5', accent_color: '#d1fae5', accent2_color: '#a7f3d0'
    },
    olive: {
        primary_color: '#3f6212', primary_light: '#65a30d', primary_dark: '#1a2e05',
        gold_color: '#fef08a', gold_light: '#fde047', gold_dark: '#eab308',
        secondary_color: '#fefce8', accent_color: '#fef08a', accent2_color: '#fde047'
    },
    sage: {
        primary_color: '#4b5563', primary_light: '#9ca3af', primary_dark: '#374151',
        gold_color: '#9ca3af', gold_light: '#d1d5db', gold_dark: '#6b7280',
        secondary_color: '#f9fafb', accent_color: '#f3f4f6', accent2_color: '#e5e7eb'
    },
    lime: {
        primary_color: '#4d7c0f', primary_light: '#84cc16', primary_dark: '#3f6212',
        gold_color: '#a3e635', gold_light: '#bef264', gold_dark: '#65a30d',
        secondary_color: '#f7fee7', accent_color: '#ecfccb', accent2_color: '#d9f99d'
    },
    moss: {
        primary_color: '#2d5a27', primary_light: '#65a30d', primary_dark: '#1a3a15',
        gold_color: '#c4e6b0', gold_light: '#d9f99d', gold_dark: '#84cc16',
        secondary_color: '#f4f9f2', accent_color: '#eaf7e5', accent2_color: '#d4f0c9'
    },
    
    // Vibrant Themes (6)
    royal: {
        primary_color: '#1e3a8a', primary_light: '#2563eb', primary_dark: '#172554',
        gold_color: '#facc15', gold_light: '#fde047', gold_dark: '#eab308',
        secondary_color: '#eff6ff', accent_color: '#dbeafe', accent2_color: '#bfdbfe'
    },
    electric: {
        primary_color: '#0891b2', primary_light: '#06b6d4', primary_dark: '#164e63',
        gold_color: '#2dd4bf', gold_light: '#5eead4', gold_dark: '#14b8a6',
        secondary_color: '#ecfeff', accent_color: '#cffafe', accent2_color: '#a5f3fc'
    },
    sunshine: {
        primary_color: '#f59e0b', primary_light: '#fbbf24', primary_dark: '#b45309',
        gold_color: '#ef4444', gold_light: '#f87171', gold_dark: '#dc2626',
        secondary_color: '#fffbeb', accent_color: '#fef3c7', accent2_color: '#fde68a'
    },
    magenta: {
        primary_color: '#be185d', primary_light: '#ec4899', primary_dark: '#831843',
        gold_color: '#f472b6', gold_light: '#fbcfe8', gold_dark: '#db2777',
        secondary_color: '#fff5f6', accent_color: '#fce7f3', accent2_color: '#fbcfe8'
    },
    neon: {
        primary_color: '#111827', primary_light: '#10b981', primary_dark: '#030712',
        gold_color: '#10b981', gold_light: '#34d399', gold_dark: '#059669',
        secondary_color: '#ecfdf5', accent_color: '#d1fae5', accent2_color: '#a7f3d0'
    },
    crimson: {
        primary_color: '#dc2626', primary_light: '#ef4444', primary_dark: '#991b1b',
        gold_color: '#fca5a5', gold_light: '#fecaca', gold_dark: '#f87171',
        secondary_color: '#fef2f2', accent_color: '#fee2e2', accent2_color: '#fecaca'
    },
    
    // Elegant Themes (6)
    luxury: {
        primary_color: '#1f2937', primary_light: '#374151', primary_dark: '#111827',
        gold_color: '#d4af37', gold_light: '#fbbf24', gold_dark: '#b45309',
        secondary_color: '#fef3c7', accent_color: '#fffbeb', accent2_color: '#fde68a'
    },
    minimal: {
        primary_color: '#3f3f46', primary_light: '#71717a', primary_dark: '#18181b',
        gold_color: '#d4d4d8', gold_light: '#e4e4e7', gold_dark: '#a1a1aa',
        secondary_color: '#fafafa', accent_color: '#f4f4f5', accent2_color: '#e4e4e7'
    },
    plum: {
        primary_color: '#6b21a5', primary_light: '#9333ea', primary_dark: '#4c1d95',
        gold_color: '#e9d5ff', gold_light: '#d8b4fe', gold_dark: '#c084fc',
        secondary_color: '#faf5ff', accent_color: '#f3e8ff', accent2_color: '#e9d5ff'
    },
    champagne: {
        primary_color: '#78350f', primary_light: '#b45309', primary_dark: '#451a03',
        gold_color: '#fde68a', gold_light: '#fef3c7', gold_dark: '#fcd34d',
        secondary_color: '#fffbeb', accent_color: '#fef3c7', accent2_color: '#fde68a'
    },
    charcoal: {
        primary_color: '#1f2937', primary_light: '#475569', primary_dark: '#0f172a',
        gold_color: '#94a3b8', gold_light: '#cbd5e1', gold_dark: '#64748b',
        secondary_color: '#f1f5f9', accent_color: '#e2e8f0', accent2_color: '#cbd5e1'
    },
    rosegold: {
        primary_color: '#831843', primary_light: '#be185d', primary_dark: '#4c0519',
        gold_color: '#fbcfe8', gold_light: '#fce7f3', gold_dark: '#f472b6',
        secondary_color: '#fff5f6', accent_color: '#fce7f3', accent2_color: '#fbcfe8'
    }
};

// Update all color previews
function updateAllPreviews() {
    const primaryColor = document.getElementById('primary_color').value;
    const goldColor = document.getElementById('gold_color').value;
    
    document.getElementById('swatchPrimary').style.backgroundColor = primaryColor;
    document.getElementById('swatchGold').style.backgroundColor = goldColor;
    document.getElementById('hexPrimary').textContent = primaryColor;
    document.getElementById('hexGold').textContent = goldColor;
    document.getElementById('previewPrimary').style.backgroundColor = primaryColor;
    document.getElementById('previewGold').style.backgroundColor = goldColor;
}

function updateColorPreview(colorId, value) {
    if (colorId === 'primary_color') {
        document.getElementById('swatchPrimary').style.backgroundColor = value;
        document.getElementById('hexPrimary').textContent = value;
        document.getElementById('previewPrimary').style.backgroundColor = value;
    } else if (colorId === 'gold_color') {
        document.getElementById('swatchGold').style.backgroundColor = value;
        document.getElementById('hexGold').textContent = value;
        document.getElementById('previewGold').style.backgroundColor = value;
    }
    updateAllPreviews();
}

function applyPreset(presetName) {
    const selected = presets[presetName];
    if (!selected) return;

    Object.keys(selected).forEach(key => {
        const input = document.getElementById(key);
        if (input) {
            input.value = selected[key];
            const event = new Event('input', { bubbles: true });
            input.dispatchEvent(event);
        }
    });
    
    updateAllPreviews();
    
    const presetCard = document.querySelector(`.preset-card[data-preset="${presetName}"]`);
    if (presetCard) {
        presetCard.style.transform = 'scale(0.98)';
        setTimeout(() => {
            presetCard.style.transform = '';
        }, 200);
    }
}

function filterPresets(category) {
    const presetCards = document.querySelectorAll('.preset-card');
    let count = 0;
    
    presetCards.forEach(card => {
        const cardCategory = card.dataset.category;
        if (category === 'all' || cardCategory === category) {
            card.style.display = '';
            count++;
        } else {
            card.style.display = 'none';
        }
    });
    
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.dataset.category === category) {
            btn.classList.add('active');
        }
    });
}

// Event Listeners
document.querySelectorAll('.preset-card').forEach(card => {
    card.addEventListener('click', function() {
        const preset = this.dataset.preset;
        applyPreset(preset);
    });
});

document.querySelectorAll('.category-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const category = this.dataset.category;
        filterPresets(category);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    updateAllPreviews();
    
    const colorInputs = document.querySelectorAll('input[type="color"]');
    colorInputs.forEach(input => {
        input.addEventListener('input', function() {
            updateAllPreviews();
        });
    });
});
</script>
@endsection