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