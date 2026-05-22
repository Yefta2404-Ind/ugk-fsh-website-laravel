@extends('layouts.admin')

@section('title', 'Tambah Quick Access')

<style>
/* ============================================================
   QUICK ACCESS FORM - ENHANCED CARD MODE
   Prefix: qa-
   ============================================================ */

/* --- Wrapper --- */
.qa-form-wrapper {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* --- Card --- */
.qa-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
    transition: box-shadow 0.2s ease;
}

.qa-card:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.qa-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 18px 24px;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border-bottom: 1px solid #e5e7eb;
}

.qa-card-header-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    color: #3b82f6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
}

.qa-card-header h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
    letter-spacing: -0.01em;
}

.qa-card-body {
    padding: 24px;
}

/* --- Form Elements --- */
.qa-form-group {
    margin-bottom: 20px;
}

.qa-form-group:last-child {
    margin-bottom: 0;
}

.qa-label {
    display: block;
    font-size: 0.85rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
    letter-spacing: -0.01em;
}

.qa-required {
    color: #ef4444;
    margin-left: 2px;
}

.qa-input {
    width: 100%;
    padding: 10px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 0.9rem;
    color: #1f2937;
    background: #fff;
    outline: none;
    transition: all 0.2s ease;
}

.qa-input:hover {
    border-color: #d1d5db;
}

.qa-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.qa-input::placeholder {
    color: #9ca3af;
}

.qa-input-sm {
    max-width: 160px;
}

.qa-input-error {
    border-color: #fca5a5 !important;
    background: #fff5f5 !important;
}

.qa-input-error:focus {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

.qa-error {
    font-size: 0.8rem;
    color: #ef4444;
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.qa-error::before {
    content: '\f071';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 0.75rem;
}

.qa-hint {
    font-size: 0.78rem;
    color: #9ca3af;
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.qa-hint::before {
    content: '\f05a';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 0.7rem;
    opacity: 0.7;
}

.qa-hint code {
    background: #f3f4f6;
    padding: 2px 8px;
    border-radius: 6px;
    font-size: 0.8rem;
    color: #6b7280;
    font-weight: 500;
}

/* --- Icon Section --- */
.qa-icon-row {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.qa-icon-preview-box {
    width: 80px;
    height: 80px;
    flex-shrink: 0;
    border-radius: 18px;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border: 2px dashed #d1d5db;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: #059669;
    transition: all 0.2s ease;
}

.qa-icon-preview-box.has-icon {
    border-style: solid;
    border-color: #86efac;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
}

.qa-icon-input-wrap {
    flex: 1;
}

/* --- Icon Grid Picker --- */
.qa-icon-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 10px;
    margin-top: 12px;
}

.qa-icon-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 14px 8px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    background: #fff;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
}

.qa-icon-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    opacity: 0;
    transition: opacity 0.2s ease;
}

.qa-icon-btn:hover::before {
    opacity: 1;
}

.qa-icon-btn:hover {
    border-color: #86efac;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(5, 150, 105, 0.1);
}

.qa-icon-btn:active {
    transform: scale(0.95) translateY(0);
}

.qa-icon-btn.active {
    border-color: #059669;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    box-shadow: 0 0 0 2px rgba(5, 150, 105, 0.2);
}

.qa-icon-btn i {
    font-size: 22px;
    color: #059669;
    position: relative;
    z-index: 1;
}

.qa-icon-btn span {
    font-size: 0.7rem;
    font-weight: 600;
    color: #374151;
    white-space: nowrap;
    position: relative;
    z-index: 1;
}

/* --- Preview --- */
.qa-preview-wrap {
    display: flex;
    align-items: center;
    gap: 20px;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border: 2px dashed #d1d5db;
    border-radius: 16px;
    padding: 24px;
    margin-top: 12px;
    transition: all 0.3s ease;
}

.qa-preview-wrap:hover {
    border-color: #9ca3af;
}

.qa-preview-icon {
    width: 72px;
    height: 72px;
    flex-shrink: 0;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.qa-preview-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    word-break: break-word;
    letter-spacing: -0.01em;
}

/* --- Color Picker --- */
.qa-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.qa-color-wrap {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 14px 16px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    margin-top: 8px;
    transition: all 0.2s ease;
}

.qa-color-wrap:hover {
    background: #f3f4f6;
    border-color: #d1d5db;
}

.qa-color-input {
    width: 44px;
    height: 44px;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    cursor: pointer;
    padding: 2px;
    background: #fff;
    flex-shrink: 0;
    transition: all 0.2s ease;
}

.qa-color-input:hover {
    border-color: #9ca3af;
    transform: scale(1.05);
}

.qa-color-input::-webkit-color-swatch-wrapper {
    padding: 0;
}

.qa-color-input::-webkit-color-swatch {
    border: none;
    border-radius: 9px;
}

.qa-color-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.qa-color-text {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    font-family: 'SF Mono', 'Consolas', 'Monaco', monospace;
    letter-spacing: 0.5px;
}

.qa-color-desc {
    font-size: 0.75rem;
    color: #9ca3af;
}

/* --- Toggle Switch --- */
.qa-form-group-switch {
    display: flex;
    align-items: flex-end;
}

.qa-switch {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    cursor: pointer;
    padding: 8px 0;
}

.qa-switch input {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.qa-switch-slider {
    width: 52px;
    height: 28px;
    background: #e5e7eb;
    border-radius: 14px;
    position: relative;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.qa-switch-slider::after {
    content: '';
    position: absolute;
    width: 24px;
    height: 24px;
    background: #fff;
    border-radius: 50%;
    top: 2px;
    left: 2px;
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.qa-switch input:checked + .qa-switch-slider {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.qa-switch input:checked + .qa-switch-slider::after {
    transform: translateX(24px);
}

.qa-switch:hover .qa-switch-slider {
    background: #d1d5db;
}

.qa-switch input:checked:hover + .qa-switch-slider {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
}

.qa-switch-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    user-select: none;
    transition: color 0.2s ease;
}

.qa-switch input:checked ~ .qa-switch-label {
    color: #059669;
    font-weight: 600;
}

/* --- Buttons --- */
.qa-form-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    padding-top: 4px;
}

.qa-btn-submit {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(5, 150, 105, 0.25);
    letter-spacing: -0.01em;
}

.qa-btn-submit:hover {
    background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(5, 150, 105, 0.35);
    color: #fff;
}

.qa-btn-submit:active {
    transform: translateY(0);
    box-shadow: 0 1px 4px rgba(5, 150, 105, 0.2);
}

.qa-btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    background: #fff;
    color: #374151;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    letter-spacing: -0.01em;
}

.qa-btn-back:hover {
    background: #f9fafb;
    border-color: #d1d5db;
    color: #1f2937;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.qa-btn-back:active {
    transform: translateY(0);
}

/* --- Page Title --- */
.qa-page-header {
    margin-bottom: 28px;
}

.qa-page-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #111827;
    margin: 0 0 4px 0;
    letter-spacing: -0.02em;
}

.qa-page-subtitle {
    font-size: 0.875rem;
    color: #6b7280;
    margin: 0;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 767px) {
    .qa-card-body {
        padding: 18px;
    }

    .qa-card-header {
        padding: 14px 18px;
    }

    .qa-icon-row {
        flex-direction: column;
        align-items: stretch;
    }

    .qa-icon-preview-box {
        width: 64px;
        height: 64px;
        font-size: 26px;
        align-self: center;
    }

    .qa-form-row {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .qa-icon-grid {
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 8px;
    }

    .qa-icon-btn {
        padding: 12px 6px;
        gap: 6px;
    }

    .qa-icon-btn i {
        font-size: 18px;
    }

    .qa-icon-btn span {
        font-size: 0.65rem;
    }

    .qa-preview-wrap {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }

    .qa-input-sm {
        max-width: 100%;
    }

    .qa-form-actions {
        flex-direction: column;
    }

    .qa-btn-submit,
    .qa-btn-back {
        justify-content: center;
        width: 100%;
    }

    .qa-page-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .qa-icon-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 6px;
    }

    .qa-form-wrapper {
        gap: 16px;
    }

    .qa-card-body {
        padding: 14px;
    }

    .qa-icon-btn {
        padding: 10px 4px;
    }
}
</style>

@section('content')

<div class="container py-4">

    <div class="qa-page-header">
        <h4 class="qa-page-title">Tambah Quick Access</h4>
        <p class="qa-page-subtitle">Buat menu akses cepat baru untuk dashboard</p>
    </div>

    <form action="{{ route('admin.quick-access.store') }}" method="POST">
        @csrf

        <div class="qa-form-wrapper">

            {{-- Card 1: Icon & Preview --}}
            <div class="qa-card">
                <div class="qa-card-header">
                    <span class="qa-card-header-icon"><i class="fas fa-icons"></i></span>
                    <h5>Icon & Preview</h5>
                </div>
                <div class="qa-card-body">

                    <div class="qa-icon-row">
                        <div class="qa-icon-preview-box" id="iconPreview">
                            <i class="{{ old('icon', $quickAccess->icon ?? 'fas fa-link') }}"></i>
                        </div>
                        <div class="qa-icon-input-wrap">
                            <label class="qa-label">Icon FontAwesome <span class="qa-required">*</span></label>
                            <input type="text"
                                   name="icon"
                                   id="iconInput"
                                   class="qa-input @error('icon') qa-input-error @enderror"
                                   placeholder="fas fa-user-graduate"
                                   value="{{ old('icon', $quickAccess->icon ?? '') }}"
                                   required>
                            @error('icon')
                                <p class="qa-error">{{ $message }}</p>
                            @enderror
                            <p class="qa-hint">Gunakan class icon dari FontAwesome. Contoh: <code>fas fa-star</code></p>
                        </div>
                    </div>

                    <label class="qa-label mt-3">Pilih Icon Cepat</label>
                    <div class="qa-icon-grid">
                        @php
                            $icons = [
                                'fas fa-user-graduate' => 'PMB',
                                'fas fa-calendar-alt' => 'Kalender',
                                'fas fa-laptop' => 'E-Learning',
                                'fas fa-database' => 'Repository',
                                'fas fa-journal-whills' => 'Jurnal',
                                'fas fa-award' => 'Beasiswa',
                                'fas fa-file-download' => 'Dokumen',
                                'fas fa-clock' => 'Jadwal',
                                'fas fa-book' => 'Akademik',
                                'fas fa-users' => 'Mahasiswa',
                                'fas fa-building' => 'Fakultas',
                                'fas fa-globe' => 'Website',
                                'fas fa-graduation-cap' => 'Wisuda',
                                'fas fa-chalkboard-teacher' => 'Dosen',
                                'fas fa-envelope' => 'Email',
                                'fas fa-phone' => 'Kontak',
                                'fas fa-newspaper' => 'Berita',
                                'fas fa-video' => 'Video',
                                'fas fa-clipboard-list' => 'Survey',
                                'fas fa-sitemap' => 'Organisasi',
                            ];
                        @endphp

                        @foreach($icons as $class => $label)
                            <button type="button" class="qa-icon-btn" data-icon="{{ $class }}" title="{{ $label }}">
                                <i class="{{ $class }}"></i>
                                <span>{{ $label }}</span>
                            </button>
                        @endforeach
                    </div>

                    <label class="qa-label mt-3">Preview Menu</label>
                    <div class="qa-preview-wrap">
                        <div class="qa-preview-icon" id="qaPreviewIcon"
                             style="background: {{ old('bg_color', $quickAccess->bg_color ?? '#e3f2fd') }}; color: {{ old('text_color', $quickAccess->text_color ?? '#1565c0') }};">
                            <i id="qaPreviewIconClass" class="{{ old('icon', $quickAccess->icon ?? 'fas fa-link') }}"></i>
                        </div>
                        <p class="qa-preview-title" id="qaPreviewTitle">
                            {{ old('title', $quickAccess->title ?? 'Quick Access') }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- Card 2: Informasi Menu --}}
            <div class="qa-card">
                <div class="qa-card-header">
                    <span class="qa-card-header-icon"><i class="fas fa-info-circle"></i></span>
                    <h5>Informasi Menu</h5>
                </div>
                <div class="qa-card-body">

                    <div class="qa-form-group">
                        <label class="qa-label">Judul Menu <span class="qa-required">*</span></label>
                        <input type="text"
                               name="title"
                               id="titleInput"
                               class="qa-input @error('title') qa-input-error @enderror"
                               placeholder="Contoh: E-Learning"
                               value="{{ old('title', $quickAccess->title ?? '') }}"
                               required>
                        @error('title')
                            <p class="qa-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="qa-form-group">
                        <label class="qa-label">URL / Link <span class="qa-required">*</span></label>
                        <input type="text"
                               name="url"
                               class="qa-input @error('url') qa-input-error @enderror"
                               placeholder="https://elearning.kampus.ac.id"
                               value="{{ old('url', $quickAccess->url ?? '') }}"
                               required>
                        @error('url')
                            <p class="qa-error">{{ $message }}</p>
                        @enderror
                        <p class="qa-hint">Bisa menggunakan link internal maupun eksternal.</p>
                    </div>

                </div>
            </div>

            {{-- Card 3: Warna --}}
            <div class="qa-card">
                <div class="qa-card-header">
                    <span class="qa-card-header-icon"><i class="fas fa-palette"></i></span>
                    <h5>Warna</h5>
                </div>
                <div class="qa-card-body">

                    <div class="qa-form-row">
                        <div class="qa-form-group">
                            <label class="qa-label">Background</label>
                            <div class="qa-color-wrap">
                                <input type="color"
                                       name="bg_color"
                                       id="bgColorInput"
                                       class="qa-color-input"
                                       value="{{ old('bg_color', $quickAccess->bg_color ?? '#e3f2fd') }}">
                                <div class="qa-color-info">
                                    <span class="qa-color-text" id="bgColorText">{{ old('bg_color', $quickAccess->bg_color ?? '#e3f2fd') }}</span>
                                    <span class="qa-color-desc">Warna latar icon</span>
                                </div>
                            </div>
                        </div>
                        <div class="qa-form-group">
                            <label class="qa-label">Text / Icon</label>
                            <div class="qa-color-wrap">
                                <input type="color"
                                       name="text_color"
                                       id="textColorInput"
                                       class="qa-color-input"
                                       value="{{ old('text_color', $quickAccess->text_color ?? '#1565c0') }}">
                                <div class="qa-color-info">
                                    <span class="qa-color-text" id="textColorText">{{ old('text_color', $quickAccess->text_color ?? '#1565c0') }}</span>
                                    <span class="qa-color-desc">Warna icon & teks</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Card 4: Pengaturan --}}
            <div class="qa-card">
                <div class="qa-card-header">
                    <span class="qa-card-header-icon"><i class="fas fa-cog"></i></span>
                    <h5>Pengaturan</h5>
                </div>
                <div class="qa-card-body">

                    <div class="qa-form-row">
                        <div class="qa-form-group">
                            <label class="qa-label">Urutan Tampil</label>
                            <input type="number"
                                   name="order"
                                   class="qa-input qa-input-sm"
                                   value="{{ old('order', $quickAccess->order ?? 0) }}"
                                   min="0"
                                   placeholder="0">
                            <p class="qa-hint">Semakin kecil, semakin awal.</p>
                        </div>
                        <div class="qa-form-group qa-form-group-switch">
                            <div>
                                <label class="qa-label">Status</label>
                                <label class="qa-switch">
                                    <input type="checkbox"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', $quickAccess->is_active ?? true) ? 'checked' : '' }}>
                                    <span class="qa-switch-slider"></span>
                                    <span class="qa-switch-label">Aktifkan Menu</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="qa-form-actions">
                <button type="submit" class="qa-btn-submit">
                    <i class="fas fa-save"></i>
                    <span>Simpan Menu</span>
                </button>
                <a href="{{ route('admin.quick-access.index') }}" class="qa-btn-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>

        </div>

    </form>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const iconInput      = document.getElementById('iconInput');
    const iconPreview    = document.getElementById('iconPreview');
    const titleInput     = document.getElementById('titleInput');
    const bgColorInput   = document.getElementById('bgColorInput');
    const textColorInput = document.getElementById('textColorInput');
    const bgColorText    = document.getElementById('bgColorText');
    const textColorText  = document.getElementById('textColorText');

    const qaPreviewIcon      = document.getElementById('qaPreviewIcon');
    const qaPreviewIconClass = document.getElementById('qaPreviewIconClass');
    const qaPreviewTitle     = document.getElementById('qaPreviewTitle');

    function updatePreview() {
        const iconClass = iconInput.value.trim() || 'fas fa-link';

        // Update preview box
        iconPreview.innerHTML = `<i class="${iconClass}"></i>`;
        if (iconInput.value.trim()) {
            iconPreview.classList.add('has-icon');
        } else {
            iconPreview.classList.remove('has-icon');
        }

        qaPreviewIconClass.className = iconClass;

        qaPreviewTitle.innerText = titleInput.value || 'Quick Access';

        qaPreviewIcon.style.background = bgColorInput.value;
        qaPreviewIcon.style.color      = textColorInput.value;

        bgColorText.innerText   = bgColorInput.value;
        textColorText.innerText = textColorInput.value;

        // Update active state pada icon grid
        document.querySelectorAll('.qa-icon-btn').forEach(btn => {
            if (btn.dataset.icon === iconInput.value.trim()) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    iconInput.addEventListener('input', updatePreview);
    titleInput.addEventListener('input', updatePreview);
    bgColorInput.addEventListener('input', updatePreview);
    textColorInput.addEventListener('input', updatePreview);

    // Icon grid click handler dengan animasi ripple
    document.querySelectorAll('.qa-icon-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            iconInput.value = this.dataset.icon;
            updatePreview();

            // Remove active class from all buttons
            document.querySelectorAll('.qa-icon-btn').forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            // Create ripple effect
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                width: 20px;
                height: 20px;
                background: rgba(5, 150, 105, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;

            const rect = this.getBoundingClientRect();
            ripple.style.left = (e.clientX - rect.left - 10) + 'px';
            ripple.style.top = (e.clientY - rect.top - 10) + 'px';

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add ripple animation keyframes dynamically
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(10);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Initial update
    updatePreview();
});
</script>