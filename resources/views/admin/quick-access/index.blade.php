@extends('layouts.admin')

@section('title', 'Quick Access')

<style>
/* ============================================================
   QUICK ACCESS INDEX - ENHANCED
   Prefix: qai-
   ============================================================ */

/* --- Container --- */
.qai-container {
    max-width: 1200px;
    animation: qaiFadeIn 0.5s ease-out;
}

@keyframes qaiFadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* --- Header --- */
.qai-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}

.qai-header-left h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 4px 0;
    color: #1e293b;
    letter-spacing: -0.02em;
    position: relative;
    display: inline-block;
}

.qai-header-left h2::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 40px;
    height: 3px;
    background: #0d6efd;
    border-radius: 2px;
}

.qai-header-left p {
    font-size: 0.875rem;
    color: #64748b;
    margin: 10px 0 0 0;
}

/* --- Buttons --- */
.qai-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
    letter-spacing: -0.01em;
    font-family: inherit;
}

.qai-btn-primary {
    background: #0d6efd;
    color: #fff;
    box-shadow: 0 2px 8px rgba(13, 110, 253, 0.2);
}

.qai-btn-primary:hover {
    background: #0b5ed7;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.qai-btn-outline {
    background: #fff;
    color: #64748b;
    border: 1.5px solid #e2e8f0;
}

.qai-btn-outline:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    color: #475569;
}

/* --- Stats --- */
.qai-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.qai-stat-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px 16px;
    text-align: center;
    transition: all 0.2s ease;
}

.qai-stat-card:hover {
    border-color: #cbd5e1;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transform: translateY(-2px);
}

.qai-stat-value {
    display: block;
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1.2;
}

.qai-stat-label {
    font-size: 0.78rem;
    color: #94a3b8;
    margin-top: 4px;
    display: block;
    font-weight: 500;
}

/* --- Filter --- */
.qai-filter {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 16px;
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    align-items: center;
}

.qai-filter-search {
    flex: 1;
    min-width: 200px;
    position: relative;
}

.qai-filter-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.85rem;
    pointer-events: none;
}

.qai-filter-input {
    width: 100%;
    padding: 9px 14px 9px 38px;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #334155;
    outline: none;
    transition: all 0.2s ease;
    font-family: inherit;
}

.qai-filter-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
}

.qai-filter-input::placeholder {
    color: #94a3b8;
}

.qai-filter-select {
    padding: 9px 14px;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #334155;
    background: #fff;
    cursor: pointer;
    outline: none;
    min-width: 150px;
    font-family: inherit;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
    padding-right: 32px;
}

.qai-filter-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
}

/* --- Table --- */
.qai-table-wrapper {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
}

.qai-table {
    width: 100%;
    border-collapse: collapse;
}

.qai-table thead {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

.qai-table th {
    padding: 14px 16px;
    font-size: 0.7rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    text-align: left;
}

.qai-table td {
    padding: 14px 16px;
    font-size: 0.875rem;
    color: #334155;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.qai-table-row:last-child td {
    border-bottom: none;
}

.qai-table-row {
    transition: background 0.15s ease;
}

.qai-table-row:hover {
    background: #f8fafc;
}

.qai-th-no,
.qai-td-no {
    width: 50px;
    text-align: center;
    color: #94a3b8;
    font-weight: 500;
}

.qai-th-action {
    text-align: center;
}

/* --- Menu Info --- */
.qai-menu-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qai-menu-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
}

.qai-menu-title {
    font-weight: 500;
    color: #1e293b;
}

.qai-td-link {
    font-size: 0.8rem;
    color: #64748b;
    word-break: break-all;
    max-width: 250px;
}

/* --- Badge --- */
.qai-badge {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 0.2px;
}

.qai-badge-active {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

.qai-badge-inactive {
    background: #f1f5f9;
    color: #64748b;
    border: 1px solid #e2e8f0;
}

/* --- Actions --- */
.qai-actions {
    display: flex;
    justify-content: center;
    gap: 6px;
}

.qai-btn-icon {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    border: 1.5px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    cursor: pointer;
    transition: all 0.2s ease;
    background: #fff;
    text-decoration: none;
}

.qai-btn-edit {
    border-color: #fcd34d;
    color: #d97706;
}

.qai-btn-edit:hover {
    background: #fef3c7;
    border-color: #fbbf24;
    transform: translateY(-1px);
}

.qai-btn-delete {
    border-color: #fca5a5;
    color: #dc2626;
    background: #fff;
    font-family: inherit;
}

.qai-btn-delete:hover {
    background: #fee2e2;
    border-color: #f87171;
    transform: translateY(-1px);
}

/* --- Empty State --- */
.qai-empty {
    text-align: center;
    padding: 48px 20px;
    color: #94a3b8;
}

.qai-empty-icon {
    font-size: 2.5rem;
    margin-bottom: 12px;
    display: block;
    opacity: 0.4;
}

.qai-empty p {
    font-size: 0.9rem;
    margin: 0;
}

/* --- Mobile Cards --- */
.qai-mobile {
    display: none;
}

.qai-mobile-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 12px;
    transition: all 0.2s ease;
}

.qai-mobile-card:hover {
    border-color: #cbd5e1;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.qai-mobile-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
    gap: 10px;
}

.qai-mobile-card-info {
    display: flex;
    gap: 10px;
    align-items: center;
    flex: 1;
    min-width: 0;
}

.qai-mobile-card-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 2px 0;
}

.qai-mobile-card-link {
    font-size: 0.75rem;
    color: #64748b;
    word-break: break-all;
}

.qai-mobile-card-actions {
    display: flex;
    gap: 8px;
}

.qai-mobile-form {
    flex: 1;
}

.qai-btn-edit-mobile {
    flex: 1;
    background: #fef3c7;
    color: #92400e;
    border: 1px solid #fcd34d;
    justify-content: center;
}

.qai-btn-edit-mobile:hover {
    background: #fde68a;
}

.qai-btn-delete-mobile {
    width: 100%;
    background: #fff;
    color: #dc2626;
    border: 1px solid #fca5a5;
    justify-content: center;
    font-family: inherit;
}

.qai-btn-delete-mobile:hover {
    background: #fee2e2;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 992px) {
    .qai-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .qai-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .qai-stat-card {
        padding: 14px 10px;
    }

    .qai-stat-value {
        font-size: 1.4rem;
    }

    .qai-stat-label {
        font-size: 0.7rem;
    }

    .qai-filter {
        padding: 12px;
    }

    .qai-filter-select {
        flex: 1;
        min-width: 120px;
    }

    .qai-table-wrapper {
        display: none;
    }

    .qai-mobile {
        display: block;
    }

    .qai-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .qai-header-left h2 {
        font-size: 1.3rem;
    }

    .qai-btn span {
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .qai-stats {
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .qai-stat-value {
        font-size: 1.2rem;
    }

    .qai-filter {
        flex-direction: column;
    }

    .qai-filter-search {
        min-width: 100%;
    }

    .qai-filter-select {
        width: 100%;
    }

    .qai-btn-outline {
        width: 100%;
        justify-content: center;
    }
}
</style>

@section('content')

<div class="qai-container">
    
    {{-- Header --}}
    <div class="qai-header">
        <div class="qai-header-left">
            <h2>Quick Access Menu</h2>
            <p>Kelola menu akses cepat halaman depan</p>
        </div>
        <a href="{{ route('admin.quick-access.create') }}" class="qai-btn qai-btn-primary">
            <i class="fas fa-plus"></i>
            <span>Tambah Menu</span>
        </a>
    </div>

    {{-- Statistik --}}
    <div class="qai-stats">
        <div class="qai-stat-card">
            <span class="qai-stat-value text-primary">{{ $items->count() }}</span>
            <span class="qai-stat-label">Total Menu</span>
        </div>
        <div class="qai-stat-card">
            <span class="qai-stat-value text-success">{{ $items->where('is_active', true)->count() }}</span>
            <span class="qai-stat-label">Aktif</span>
        </div>
        <div class="qai-stat-card">
            <span class="qai-stat-value text-secondary">{{ $items->where('is_active', false)->count() }}</span>
            <span class="qai-stat-label">Nonaktif</span>
        </div>
        <div class="qai-stat-card">
            <span class="qai-stat-value text-warning">{{ $items->max('order') ?? 0 }}</span>
            <span class="qai-stat-label">Urutan Tertinggi</span>
        </div>
    </div>

    {{-- Filter --}}
    <div class="qai-filter">
        <div class="qai-filter-search">
            <i class="fas fa-search qai-filter-icon"></i>
            <input type="text" id="searchInput" class="qai-filter-input" placeholder="Cari menu...">
        </div>
        <select id="statusFilter" class="qai-filter-select">
            <option value="">Semua Status</option>
            <option value="active">Aktif</option>
            <option value="inactive">Nonaktif</option>
        </select>
        <button id="resetFilter" class="qai-btn qai-btn-outline">
            <i class="fas fa-sync-alt"></i>
            <span>Reset</span>
        </button>
    </div>

    {{-- Tabel Desktop --}}
    <div class="qai-table-wrapper">
        <table class="qai-table" id="quickAccessTable">
            <thead>
                <tr>
                    <th class="qai-th-no">No</th>
                    <th>Menu</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th class="qai-th-action">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="qai-table-row" data-title="{{ strtolower($item->title) }}" data-status="{{ $item->is_active ? 'active' : 'inactive' }}">
                    <td class="qai-td-no">{{ $loop->iteration }}</td>
                    <td>
                        <div class="qai-menu-info">
                            <span class="qai-menu-icon" style="background: {{ $item->bg_color ?? '#f0f0f0' }}; color: {{ $item->text_color ?? '#333' }};">
                                <i class="{{ $item->icon }}"></i>
                            </span>
                            <span class="qai-menu-title">{{ $item->title }}</span>
                        </div>
                    </td>
                    <td class="qai-td-link">{{ $item->url }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="qai-badge qai-badge-active">Aktif</span>
                        @else
                            <span class="qai-badge qai-badge-inactive">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="qai-actions">
                            <a href="{{ route('admin.quick-access.edit', $item->id) }}" class="qai-btn-icon qai-btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.quick-access.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="qai-btn-icon qai-btn-delete" onclick="return confirm('Hapus menu ini?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <div class="qai-empty">
                            <i class="fas fa-inbox qai-empty-icon"></i>
                            <p>Belum ada data quick access</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Card Mobile --}}
    <div class="qai-mobile" id="mobileView">
        @forelse($items as $item)
        <div class="qai-mobile-card" data-title="{{ strtolower($item->title) }}" data-status="{{ $item->is_active ? 'active' : 'inactive' }}">
            <div class="qai-mobile-card-top">
                <div class="qai-mobile-card-info">
                    <span class="qai-menu-icon" style="background: {{ $item->bg_color ?? '#f0f0f0' }}; color: {{ $item->text_color ?? '#333' }};">
                        <i class="{{ $item->icon }}"></i>
                    </span>
                    <div>
                        <h6 class="qai-mobile-card-title">{{ $item->title }}</h6>
                        <span class="qai-mobile-card-link">{{ $item->url }}</span>
                    </div>
                </div>
                @if($item->is_active)
                    <span class="qai-badge qai-badge-active">Aktif</span>
                @else
                    <span class="qai-badge qai-badge-inactive">Nonaktif</span>
                @endif
            </div>
            <div class="qai-mobile-card-actions">
                <a href="{{ route('admin.quick-access.edit', $item->id) }}" class="qai-btn qai-btn-edit-mobile">
                    <i class="fas fa-edit"></i>Edit
                </a>
                <form action="{{ route('admin.quick-access.destroy', $item->id) }}" method="POST" class="qai-mobile-form">
                    @csrf @method('DELETE')
                    <button type="submit" class="qai-btn qai-btn-delete-mobile" onclick="return confirm('Hapus menu ini?')">
                        <i class="fas fa-trash-alt"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="qai-empty">
            <i class="fas fa-inbox qai-empty-icon"></i>
            <p>Belum ada data quick access</p>
        </div>
        @endforelse
    </div>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const resetFilter = document.getElementById('resetFilter');

    function filterItems() {
        const term = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;

        // Filter table rows
        document.querySelectorAll('#quickAccessTable tbody tr').forEach(tr => {
            if (!tr.getAttribute('data-title')) return;
            const title = tr.getAttribute('data-title');
            const itemStatus = tr.getAttribute('data-status');
            tr.style.display = (title.includes(term) && (!status || itemStatus === status)) ? '' : 'none';
        });

        // Filter mobile cards
        document.querySelectorAll('.qai-mobile-card').forEach(card => {
            const title = card.getAttribute('data-title');
            const itemStatus = card.getAttribute('data-status');
            if (!title) return;
            card.style.display = (title.includes(term) && (!status || itemStatus === status)) ? '' : 'none';
        });
    }

    if (searchInput) searchInput.addEventListener('keyup', filterItems);
    if (statusFilter) statusFilter.addEventListener('change', filterItems);
    if (resetFilter) {
        resetFilter.addEventListener('click', function() {
            searchInput.value = '';
            statusFilter.value = '';
            filterItems();
        });
    }
});
</script>