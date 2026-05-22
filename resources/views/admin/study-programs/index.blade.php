@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="header-section">
        <div class="header-left">
            <h1>Program Studi</h1>
            <p>Kelola data program studi yang tersedia</p>
        </div>
        <div class="header-right">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari program studi..." class="search-input">
                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <a href="{{ route('admin.study-programs.create') }}" class="btn btn-primary">
                Tambah Program Studi
            </a>
        </div>
    </div>


    <div id="programsList">
        @forelse($studyPrograms as $program)
        <div class="program-card" data-name="{{ strtolower($program->name) }}" data-short="{{ strtolower($program->short_name ?? '') }}">
            <div class="card-header">
                <div class="program-info">
                    <h3>{{ $program->name }}</h3>
                    @if($program->short_name)
                        <span class="badge">{{ $program->short_name }}</span>
                    @endif
                </div>
                <div class="card-actions-mobile">
                    <div class="accreditation-badge {{ strtolower($program->accreditation) }}">
                        {{ $program->accreditation }}
                    </div>
                    <button class="mobile-toggle" onclick="toggleCardDetails(this)">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
                <div class="accreditation-badge desktop-only {{ strtolower($program->accreditation) }}">
                    {{ $program->accreditation }}
                </div>
            </div>

            <div class="card-details">
                <div class="card-body">
                    <div class="info-grid">
                        @if($program->head_of_program)
                        <div class="info-item">
                            <label>Ketua Program Studi</label>
                            <p>{{ $program->head_of_program }}</p>
                        </div>
                        @endif

                        @if($program->students_count)
                        <div class="info-item">
                            <label>Jumlah Mahasiswa</label>
                            <p>{{ number_format($program->students_count) }} orang</p>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($program->students_count / 500) * 100, 100) }}%"></div>
                            </div>
                        </div>
                        @endif

                        @if($program->website)
                        <div class="info-item full-width">
                            <label>Website</label>
                            <p>
                                <a href="{{ $program->website }}" target="_blank" rel="noopener noreferrer" class="website-link">
                                    {{ $program->website }}
                                </a>
                            </p>
                        </div>
                        @endif

                        @if($program->description)
                        <div class="info-item full-width">
                            <label>Deskripsi</label>
                            <p class="description">
                                {{ Str::limit($program->description, 150) }}
                                @if(strlen($program->description) > 150)
                                    <button class="read-more" onclick="toggleDescription(this)">Baca selengkapnya</button>
                                    <span class="full-description" style="display: none;">{{ $program->description }}</span>
                                @endif
                            </p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.study-programs.edit', $program->id) }}" class="btn-edit">
                        Edit
                    </a>
                    
                    <form action="{{ route('admin.study-programs.destroy', $program->id) }}" 
                          method="POST" 
                          class="delete-form"
                          onsubmit="return confirmDelete('{{ $program->name }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-content">
                <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3>Belum Ada Program Studi</h3>
                <p>Silakan tambah program studi baru dengan mengklik tombol di atas.</p>
                <a href="{{ route('admin.study-programs.create') }}" class="btn btn-primary">
                    Tambah Program Studi
                </a>
            </div>
        </div>
        @endforelse
    </div>

    @if(method_exists($studyPrograms, 'links'))
    <div class="pagination-wrapper">
        {{ $studyPrograms->links() }}
    </div>
    @endif
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
    --red-500: #ef4444;
    --red-600: #dc2626;
    --green-500: #10b981;
    --green-600: #059669;
    --blue-500: #3b82f6;
    --blue-600: #2563eb;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.page-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    background: white;
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Header Section */
.header-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.header-left h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 0.25rem;
}

.header-left p {
    color: var(--gray-500);
    font-size: 0.9rem;
}

.header-right {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

/* Search Box */
.search-box {
    position: relative;
}

.search-input {
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    font-size: 0.9rem;
    width: 250px;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(230, 255, 43, 0.1);
    width: 300px;
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    width: 18px;
    height: 18px;
    color: var(--gray-400);
}

/* Stats Section */
.stats-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    padding: 1.25rem;
    border-radius: 16px;
    text-align: center;
    border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border-color: var(--gold);
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.75rem;
    color: var(--gray-500);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Button */
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

/* Program Card */
.program-card {
    background: white;
    border-radius: 16px;
    margin-bottom: 1.25rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    animation: cardFadeIn 0.5s ease-out;
    animation-fill-mode: both;
}

.program-card:hover {
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

@keyframes cardFadeIn {
    from { opacity: 0; transform: scale(0.98); }
    to { opacity: 1; transform: scale(1); }
}

/* Card Header */
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--gray-100);
    flex-wrap: wrap;
    gap: 1rem;
}

.program-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    flex: 1;
}

.program-info h3 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--gray-900);
}

.badge {
    background: var(--gray-100);
    color: var(--gray-600);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
}

.card-actions-mobile {
    display: none;
    align-items: center;
    gap: 0.75rem;
}

.mobile-toggle {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.25rem;
    color: var(--gray-500);
    transition: transform 0.3s ease;
}

.mobile-toggle.active {
    transform: rotate(180deg);
}

.desktop-only {
    display: block;
}

/* Accreditation Badge */
.accreditation-badge {
    padding: 0.25rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.accreditation-badge.a,
.accreditation-badge.unggul {
    background: #ecfdf5;
    color: var(--green-600);
    border: 1px solid #a7f3d0;
}

.accreditation-badge.b,
.accreditation-badge.baik_sekali {
    background: #eff6ff;
    color: var(--blue-600);
    border: 1px solid #bfdbfe;
}

.accreditation-badge.c,
.accreditation-badge.baik {
    background: #fef3c7;
    color: #d97706;
    border: 1px solid #fde68a;
}

/* Card Details */
.card-details {
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .card-details {
        display: none;
    }
    .card-details.open {
        display: block;
    }
}

/* Card Body */
.card-body {
    padding: 1.25rem 1.5rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-item label {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--gray-500);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-item p {
    font-size: 0.875rem;
    color: var(--gray-700);
    line-height: 1.5;
}

/* Progress Bar */
.progress-bar {
    margin-top: 0.5rem;
    height: 6px;
    background: var(--gray-100);
    border-radius: 10px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--gold) 0%, var(--gold-dark) 100%);
    border-radius: 10px;
    transition: width 0.3s ease;
}

/* Website Link */
.website-link {
    color: var(--gold-dark);
    text-decoration: none;
    transition: color 0.2s ease;
    word-break: break-all;
}

.website-link:hover {
    color: var(--gold);
    text-decoration: underline;
}

/* Description */
.description {
    color: var(--gray-600);
    line-height: 1.6;
}

.read-more {
    background: none;
    border: none;
    color: var(--gold-dark);
    font-size: 0.75rem;
    font-weight: 500;
    cursor: pointer;
    margin-left: 0.5rem;
    text-decoration: underline;
}

.read-more:hover {
    color: var(--gold);
}

/* Card Footer */
.card-footer {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    border-top: 1px solid var(--gray-100);
    background: var(--gray-50);
    border-radius: 0 0 16px 16px;
}

.btn-edit,
.btn-delete {
    padding: 0.5rem 1.25rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-edit {
    background: white;
    color: var(--gray-700);
    border: 1px solid var(--gray-200);
}

.btn-edit:hover {
    background: var(--gray-50);
    border-color: var(--gray-300);
    transform: translateY(-1px);
}

.btn-delete {
    background: white;
    color: var(--red-500);
    border: 1px solid var(--gray-200);
}

.btn-delete:hover {
    background: #fef2f2;
    border-color: #fecaca;
    transform: translateY(-1px);
}

.delete-form {
    display: inline-block;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.empty-content {
    max-width: 400px;
    margin: 0 auto;
}

.empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    color: var(--gray-300);
}

.empty-content h3 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
}

.empty-content p {
    color: var(--gray-500);
    margin-bottom: 1.5rem;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.pagination-wrapper nav {
    display: inline-block;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-wrapper {
        padding: 1rem;
    }

    .header-section {
        flex-direction: column;
        align-items: stretch;
    }

    .header-left {
        text-align: center;
    }

    .header-left h1 {
        font-size: 1.5rem;
    }

    .header-right {
        flex-direction: column;
    }

    .search-box {
        width: 100%;
    }

    .search-input {
        width: 100%;
    }

    .search-input:focus {
        width: 100%;
    }

    .btn-primary {
        justify-content: center;
        width: 100%;
    }

    .stats-section {
        grid-template-columns: 1fr;
    }

    .card-header {
        flex-direction: row;
        align-items: center;
    }

    .program-info {
        flex: 1;
    }

    .card-actions-mobile {
        display: flex;
    }

    .desktop-only {
        display: none;
    }

    .info-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .card-footer {
        flex-direction: column;
    }

    .btn-edit,
    .btn-delete {
        justify-content: center;
        width: 100%;
    }
}

@media (max-width: 480px) {
    .page-wrapper {
        padding: 0.75rem;
    }

    .program-info {
        flex-direction: column;
        align-items: flex-start;
    }

    .card-header,
    .card-body,
    .card-footer {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .empty-state {
        padding: 2rem 1rem;
    }
}

/* Animations */
@keyframes highlight {
    0% { background-color: rgba(230, 255, 43, 0.3); }
    100% { background-color: transparent; }
}

.search-highlight {
    animation: highlight 1s ease-out;
}
</style>

<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.program-card');
    let hasResults = false;
    
    cards.forEach(card => {
        const name = card.dataset.name || '';
        const short = card.dataset.short || '';
        
        if (name.includes(searchTerm) || short.includes(searchTerm)) {
            card.style.display = '';
            hasResults = true;
        } else {
            card.style.display = 'none';
        }
    });
    
    // Show no results message if needed
    let noResultsMsg = document.querySelector('.no-results');
    if (!hasResults && searchTerm && cards.length > 0) {
        if (!noResultsMsg) {
            const msg = document.createElement('div');
            msg.className = 'empty-state no-results';
            msg.innerHTML = `
                <div class="empty-content">
                    <h3>Tidak ditemukan</h3>
                    <p>Tidak ada program studi yang cocok dengan pencarian "${searchTerm}"</p>
                </div>
            `;
            document.getElementById('programsList')?.appendChild(msg);
        }
    } else if (noResultsMsg) {
        noResultsMsg.remove();
    }
});

// Mobile toggle function
function toggleCardDetails(button) {
    const card = button.closest('.program-card');
    const details = card.querySelector('.card-details');
    button.classList.toggle('active');
    details.classList.toggle('open');
}

// Toggle description read more
function toggleDescription(button) {
    const fullDesc = button.nextElementSibling;
    const shortDesc = button.parentElement;
    
    if (fullDesc.style.display === 'none') {
        fullDesc.style.display = 'inline';
        button.textContent = 'Sembunyikan';
        shortDesc.style.display = 'none';
        fullDesc.parentElement.querySelector('.description').innerHTML = fullDesc.innerHTML + ' <button class="read-more" onclick="toggleDescription(this)">Sembunyikan</button>';
    } else {
        const descText = fullDesc.innerHTML;
        const shortText = descText.substring(0, 150) + '...';
        fullDesc.style.display = 'none';
        button.textContent = 'Baca selengkapnya';
        shortDesc.innerHTML = shortText + ' <button class="read-more" onclick="toggleDescription(this)">Baca selengkapnya</button>';
        shortDesc.style.display = 'inline';
    }
}

// Confirm delete with program name
function confirmDelete(programName) {
    return confirm(`Yakin ingin menghapus program studi "${programName}"?`);
}

// Auto-hide flash messages
document.addEventListener('DOMContentLoaded', function() {
    const flashMessage = document.querySelector('.flash-message');
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.opacity = '0';
            setTimeout(() => flashMessage.remove(), 300);
        }, 3000);
    }
});
</script>
@endsection