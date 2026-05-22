@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="form-container">
        <div class="form-header">
            <div class="header-left">
                <h1>Edit Program Studi</h1>
                <p>Perbarui informasi program studi di bawah ini</p>
            </div>
            <div class="header-right">
                <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>

        <div class="form-card">
            <form action="{{ route('admin.study-programs.update', $study_program->id) }}" method="POST" class="study-form">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <!-- Nama Program Studi -->
                    <div class="form-group full-width">
                        <label for="name">Nama Program Studi <span class="required">*</span></label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $study_program->name) }}" 
                               placeholder="Contoh: Teknik Informatika" 
                               class="form-input"
                               required>
                        <small class="helper-text">Masukkan nama lengkap program studi</small>
                    </div>

                    <!-- Singkatan -->
                    <div class="form-group">
                        <label for="short_name">Singkatan</label>
                        <input type="text" 
                               id="short_name" 
                               name="short_name" 
                               value="{{ old('short_name', $study_program->short_name) }}" 
                               placeholder="Contoh: TI" 
                               class="form-input">
                        <small class="helper-text">Opsional</small>
                    </div>

                    <!-- Akreditasi -->
                    <div class="form-group">
                        <label for="accreditation">Akreditasi</label>
                        <select id="accreditation" name="accreditation" class="form-input">
                            <option value="">Pilih Akreditasi</option>
                            <option value="A" {{ old('accreditation', $study_program->accreditation) == 'A' ? 'selected' : '' }}>A (Unggul)</option>
                            <option value="B" {{ old('accreditation', $study_program->accreditation) == 'B' ? 'selected' : '' }}>B (Baik Sekali)</option>
                            <option value="C" {{ old('accreditation', $study_program->accreditation) == 'C' ? 'selected' : '' }}>C (Baik)</option>
                            <option value="Unggul" {{ old('accreditation', $study_program->accreditation) == 'Unggul' ? 'selected' : '' }}>Unggul</option>
                            <option value="Baik Sekali" {{ old('accreditation', $study_program->accreditation) == 'Baik Sekali' ? 'selected' : '' }}>Baik Sekali</option>
                            <option value="Baik" {{ old('accreditation', $study_program->accreditation) == 'Baik' ? 'selected' : '' }}>Baik</option>
                        </select>
                        <small class="helper-text">Status akreditasi saat ini</small>
                    </div>

                    <!-- Kaprodi -->
                    <div class="form-group">
                        <label for="head_of_program">Ketua Program Studi</label>
                        <input type="text" 
                               id="head_of_program" 
                               name="head_of_program" 
                               value="{{ old('head_of_program', $study_program->head_of_program) }}" 
                               placeholder="Contoh: Dr. Ahmad Rizki, M.Kom" 
                               class="form-input">
                        <small class="helper-text">Nama lengkap Kaprodi</small>
                    </div>

                    <!-- Website -->
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" 
                               id="website" 
                               name="website" 
                               value="{{ old('website', $study_program->website) }}" 
                               placeholder="https://ti.universitas.ac.id" 
                               class="form-input">
                        <small class="helper-text">Alamat website resmi</small>
                    </div>

                    <!-- Jumlah Mahasiswa -->
                    <div class="form-group">
                        <label for="students_count">Jumlah Mahasiswa</label>
                        <input type="number" 
                               id="students_count" 
                               name="students_count" 
                               value="{{ old('students_count', $study_program->students_count) }}" 
                               placeholder="Contoh: 350" 
                               class="form-input"
                               min="0">
                        <small class="helper-text">Total mahasiswa aktif</small>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group full-width">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="5" 
                                  class="form-input"
                                  placeholder="Tuliskan deskripsi lengkap tentang program studi ini...">{{ old('description', $study_program->description) }}</textarea>
                        <small class="helper-text">Informasi detail tentang program studi</small>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Update Program Studi
                    </button>
                    <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
:root {
    --gold: #E6FF2B;
    --gold-light: #eeff55;
    --gold-dark: #c4db00;
    --white: #ffffff;
    --gray-50: #fafafa;
    --gray-100: #f5f5f5;
    --gray-200: #e5e5e5;
    --gray-300: #d4d4d4;
    --gray-400: #a3a3a3;
    --gray-500: #737373;
    --gray-600: #525252;
    --gray-700: #404040;
    --gray-800: #262626;
    --gray-900: #171717;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.page-wrapper {
    min-height: 100vh;
    background: white;
    padding: 2rem;
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-container {
    max-width: 900px;
    margin: 0 auto;
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.header-left h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 0.25rem;
    position: relative;
    display: inline-block;
}

.header-left h1::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--gold);
    border-radius: 2px;
    animation: widthExpand 0.6s ease-out 0.3s both;
}

@keyframes widthExpand {
    from {
        width: 0;
    }
    to {
        width: 60px;
    }
}

.header-left p {
    color: var(--gray-500);
    font-size: 0.95rem;
    margin-top: 1rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    font-family: inherit;
}

.btn-primary {
    background: var(--gold);
    color: var(--gray-900);
}

.btn-primary:hover {
    background: var(--gold-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(230, 255, 43, 0.25);
}

.btn-secondary {
    background: white;
    color: var(--gray-700);
    border: 2px solid var(--gray-200);
}

.btn-secondary:hover {
    background: var(--gray-50);
    border-color: var(--gray-300);
    transform: translateY(-2px);
}

.form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    transition: box-shadow 0.3s ease;
    animation: cardRise 0.5s ease-out 0.2s both;
}

@keyframes cardRise {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-card:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.study-form {
    padding: 2rem;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    animation: fadeInUp 0.5s ease-out;
    animation-fill-mode: both;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.15s; }
.form-group:nth-child(3) { animation-delay: 0.2s; }
.form-group:nth-child(4) { animation-delay: 0.25s; }
.form-group:nth-child(5) { animation-delay: 0.3s; }
.form-group:nth-child(6) { animation-delay: 0.35s; }
.form-group:nth-child(7) { animation-delay: 0.4s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.full-width {
    grid-column: 1 / -1;
}

label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.required {
    color: #ef4444;
    font-size: 1rem;
}

.form-input {
    padding: 0.75rem 1rem;
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    font-size: 0.95rem;
    font-family: inherit;
    color: var(--gray-800);
    background: white;
    transition: all 0.3s ease;
    width: 100%;
}

.form-input:hover {
    border-color: var(--gray-300);
    background: var(--gray-50);
}

.form-input:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 0 4px rgba(230, 255, 43, 0.15);
    transform: translateY(-1px);
    background: white;
}

select.form-input {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%23525252' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1.25rem;
}

textarea.form-input {
    resize: vertical;
    min-height: 100px;
}

.helper-text {
    font-size: 0.75rem;
    color: var(--gray-500);
    margin-top: 0.5rem;
    line-height: 1.4;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 2px solid var(--gray-100);
    animation: fadeInUp 0.5s ease-out 0.45s both;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-wrapper {
        padding: 1rem;
    }

    .form-header {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }

    .header-left h1 {
        font-size: 1.5rem;
    }

    .header-left h1::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .study-form {
        padding: 1.5rem;
    }

    .form-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .form-actions {
        flex-direction: column;
        gap: 0.75rem;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }

    .form-card {
        border-radius: 16px;
    }
}

@media (max-width: 480px) {
    .page-wrapper {
        padding: 0.75rem;
    }

    .study-form {
        padding: 1rem;
    }

    label {
        font-size: 0.8rem;
    }

    .form-input {
        padding: 0.625rem 0.875rem;
        font-size: 0.875rem;
    }

    .helper-text {
        font-size: 0.7rem;
    }

    .btn {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>
@endsection