@extends('layouts.admin')

@section('title', 'Edit Quick Access')

<style>
/* ============================================================
   QUICK ACCESS FORM - COMPLETE STYLING
   Prefix: qa-
   ============================================================ */

/* --- Wrapper --- */
.qa-form-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* --- Card --- */
.qa-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
}

.qa-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 20px;
    background: #f9fafb;
    border-bottom: 1px solid #f3f4f6;
}

.qa-card-header-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: #eff6ff;
    color: #3b82f6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.qa-card-header h5 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.qa-card-body {
    padding: 20px;
}

/* --- Form Elements --- */
.qa-form-group {
    margin-bottom: 18px;
}

.qa-form-group:last-child {
    margin-bottom: 0;
}

.qa-label {
    display: block;
    font-size: 0.84rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
}

.qa-required {
    color: #ef4444;
}

.qa-input {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 0.9rem;
    color: #1f2937;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.qa-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.08);
}

.qa-input::placeholder {
    color: #9ca3af;
}

.qa-input-sm {
    max-width: 160px;
}

.qa-input-error {
    border-color: #fca5a5 !important;
}

.qa-input-error:focus {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.08) !important;
}

.qa-error {
    font-size: 0.8rem;
    color: #ef4444;
    margin-top: 5px;
}

.qa-hint {
    font-size: 0.78rem;
    color: #9ca3af;
    margin-top: 5px;
}

.qa-hint code {
    background: #f3f4f6;
    padding: 2px 7px;
    border-radius: 5px;
    font-size: 0.75rem;
    color: #6b7280;
}

/* --- Icon Section --- */
.qa-icon-row {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}

.qa-icon-preview-box {
    width: 72px;
    height: 72px;
    flex-shrink: 0;
    border-radius: 16px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #059669;
}

.qa-icon-input-wrap {
    flex: 1;
}

/* --- Icon Grid Picker --- */
.qa-icon-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
    gap: 8px;
    margin-top: 10px;
}

.qa-icon-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    padding: 12px 6px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    background: #fff;
    cursor: pointer;
    transition: all 0.15s;
}

.qa-icon-btn:hover {
    border-color: #86efac;
    background: #f0fdf4;
    transform: translateY(-1px);
}

.qa-icon-btn:active {
    transform: scale(0.96);
}

.qa-icon-btn.active {
    border-color: #059669;
    background: #d1fae5;
}

.qa-icon-btn i {
    font-size: 20px;
    color: #059669;
}

.qa-icon-btn span {
    font-size: 0.7rem;
    font-weight: 600;
    color: #374151;
    white-space: nowrap;
}

/* --- Preview --- */
.qa-preview-wrap {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #f9fafb;
    border: 1.5px dashed #e5e7eb;
    border-radius: 14px;
    padding: 20px;
    margin-top: 10px;
}

.qa-preview-icon {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    transition: background 0.3s, color 0.3s;
}

.qa-preview-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    word-break: break-word;
}

/* --- Color Picker --- */
.qa-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.qa-color-wrap {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 12px 14px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    margin-top: 6px;
}

.qa-color-input {
    width: 42px;
    height: 42px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    cursor: pointer;
    padding: 2px;
    background: #fff;
    flex-shrink: 0;
}

.qa-color-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.qa-color-text {
    font-size: 0.85rem;
    font-weight: 600;
    color: #1f2937;
    font-family: 'Consolas', monospace;
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
    gap: 12px;
    cursor: pointer;
}

.qa-switch input {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.qa-switch-slider {
    width: 48px;
    height: 26px;
    background: #e5e7eb;
    border-radius: 13px;
    position: relative;
    transition: background 0.25s;
    flex-shrink: 0;
}

.qa-switch-slider::after {
    content: '';
    position: absolute;
    width: 22px;
    height: 22px;
    background: #fff;
    border-radius: 50%;
    top: 2px;
    left: 2px;
    transition: transform 0.25s;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
}

.qa-switch input:checked + .qa-switch-slider {
    background: #10b981;
}

.qa-switch input:checked + .qa-switch-slider::after {
    transform: translateX(22px);
}

.qa-switch-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    user-select: none;
}

/* --- Buttons --- */
.qa-form-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.qa-btn-submit {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #059669;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    text-decoration: none;
}

.qa-btn-submit:hover {
    background: #047857;
    color: #fff;
}

.qa-btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: #fff;
    color: #374151;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s;
}

.qa-btn-back:hover {
    background: #f9fafb;
    color: #1f2937;
}

/* --- Page Title --- */
.qa-page-header {
    margin-bottom: 24px;
}

.qa-page-header h4 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #111827;
    margin: 0 0 4px 0;
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
        padding: 16px;
    }

    .qa-card-header {
        padding: 12px 16px;
    }

    .qa-icon-row {
        flex-direction: column;
        align-items: stretch;
    }

    .qa-icon-preview-box {
        width: 56px;
        height: 56px;
        font-size: 22px;
    }

    .qa-form-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .qa-icon-grid {
        grid-template-columns: repeat(auto-fill, minmax(75px, 1fr));
        gap: 6px;
    }

    .qa-icon-btn {
        padding: 10px 4px;
        gap: 4px;
    }

    .qa-icon-btn i {
        font-size: 17px;
    }

    .qa-icon-btn span {
        font-size: 0.65rem;
    }

    .qa-preview-wrap {
        flex-direction: column;
        text-align: center;
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
    }
}

@media (max-width: 480px) {
    .qa-icon-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .qa-form-wrapper {
        gap: 14px;
    }
}
</style>

@section('content')

<div class="container py-4">

    <div class="qa-page-header">
        <h4>Edit Quick Access</h4>
        <p class="qa-page-subtitle">Perbarui menu akses cepat</p>
    </div>

    <form action="{{ route('admin.quick-access.update', $quickAccess->id) }}" method="POST">
        @csrf
        @method('PUT')

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
                            <button type="button" class="qa-icon-btn {{ old('icon', $quickAccess->icon ?? '') == $class ? 'active' : '' }}" 
                                    data-icon="{{ $class }}" 
                                    title="{{ $label }}">
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
                    <span>Update Quick Access</span>
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

        iconPreview.innerHTML = `<i class="${iconClass}"></i>`;
        qaPreviewIconClass.className = iconClass;

        qaPreviewTitle.innerText = titleInput.value || 'Quick Access';

        qaPreviewIcon.style.background = bgColorInput.value;
        qaPreviewIcon.style.color      = textColorInput.value;

        bgColorText.innerText   = bgColorInput.value;
        textColorText.innerText = textColorInput.value;

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

    document.querySelectorAll('.qa-icon-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            iconInput.value = this.dataset.icon;
            updatePreview();

            document.querySelectorAll('.qa-icon-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            this.style.borderColor = '#10b981';
            this.style.background = '#d1fae5';
            setTimeout(() => {
                this.style.borderColor = '';
                this.style.background = '';
            }, 300);
        });
    });

    updatePreview();
});
</script>