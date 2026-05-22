@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #0B4650;
        --primary-light: #155e6e;
        --primary-dark: #072e38;
        --primary-mid: #0e5262;
        --gold: #E6FF2B;
        --gold-light: #eeff55;
        --gold-dark: #c4db00;
        --secondary: #F9F7F2;
        --surface: #ffffff;
        --surface-2: #fdfcf9;
        --surface-3: #f0ede5;
        --text-dark: #072e38;
        --text-mid: #0B4650;
        --text-light: #898A8D;
        --white: #ffffff;
        --border: #dddbd5;
        --green-bg: #ecfdf5;
        --green-text: #065f46;
        --green-border: #a7f3d0;
        --red-bg: #fef2f2;
        --red-text: #991b1b;
        --red-border: #fecaca;
        --blue-bg: #eff6ff;
        --blue-text: #1d4ed8;
        --blue-border: #bfdbfe;
        --teal-bg: #f0fdfa;
        --teal-text: #0f766e;
        --teal-border: #99f6e4;
        --orange-bg: #fff7ed;
        --orange-text: #9a3412;
        --orange-border: #fed7aa;
        --radius-xs: 4px;
        --radius-sm: 6px;
        --radius-md: 10px;
        --radius-lg: 14px;
        --radius-xl: 18px;
        --shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.04);
        --shadow-sm: 0 1px 4px rgba(11, 70, 80, 0.08);
        --shadow-md: 0 4px 14px rgba(11, 70, 80, 0.10);
        --shadow-lg: 0 10px 28px rgba(11, 70, 80, 0.13);
        --ease: cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--secondary);
        color: var(--text-dark);
        min-height: 100vh;
        overflow-x: hidden;
        width: 100%;
    }

    /* Dashboard Container */
    .dash {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: clamp(16px, 3vw, 28px);
    }

    /* Topbar */
    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 16px;
        flex-wrap: wrap;
    }

    .greeting {
        display: flex;
        align-items: center;
        gap: 14px;
        flex: 1;
        min-width: 0;
    }

    .avatar {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: var(--radius-lg);
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 18px;
        color: var(--gold);
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }

    .greeting-text {
        flex: 1;
        min-width: 0;
    }

    .greeting-text h1 {
        font-size: clamp(18px, 3vw, 22px);
        font-weight: 800;
        color: var(--text-dark);
        letter-spacing: -0.5px;
        margin-bottom: 4px;
    }

    .greeting-text p {
        font-size: 13px;
        color: var(--text-light);
    }

    .date-pill {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 40px;
        padding: 8px 18px;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-mid);
        box-shadow: var(--shadow-xs);
        white-space: nowrap;
        background: var(--surface);
    }

    .date-pill i {
        color: var(--primary);
        font-size: 12px;
    }

    /* Section Label */
    .sec-label {
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--text-light);
        margin-bottom: 14px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sec-label::before {
        content: '';
        display: block;
        width: 20px;
        height: 2px;
        background: var(--primary);
        border-radius: 2px;
        opacity: 0.4;
    }

    /* Maintenance Card */
    .maint-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 18px 24px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        box-shadow: var(--shadow-sm);
        transition: all 0.2s var(--ease);
    }

    .maint-card.active {
        border-color: var(--orange-border);
        background: var(--orange-bg);
    }

    .maint-left {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        flex: 1;
        min-width: 0;
    }

    .maint-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: var(--radius-md);
        background: var(--orange-bg);
        border: 1px solid var(--orange-border);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .maint-icon i {
        font-size: 22px;
        color: var(--orange-text);
    }

    .maint-title {
        font-size: 15px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 6px;
    }

    .maint-desc {
        font-size: 12px;
        color: var(--text-mid);
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .maint-tip {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: var(--text-light);
        background: var(--surface-2);
        padding: 4px 10px;
        border-radius: 20px;
        width: fit-content;
    }

    .maint-right {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        flex-shrink: 0;
    }

    /* Status Pill */
    .status-pill {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 700;
        padding: 8px 16px;
        border-radius: var(--radius-sm);
        white-space: nowrap;
    }

    .status-pill.online {
        background: var(--green-bg);
        color: var(--green-text);
        border: 1px solid var(--green-border);
    }

    .status-pill.offline {
        background: var(--red-bg);
        color: var(--red-text);
        border: 1px solid var(--red-border);
    }

    .status-pill .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .status-pill.online .dot {
        background: #22c55e;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.3);
        animation: pulse 2s infinite;
    }

    .status-pill.offline .dot {
        background: #ef4444;
        box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.3);
        animation: pulse 1s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    /* Maintenance Buttons */
    .btn-maint {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 20px;
        border: none;
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s var(--ease);
        white-space: nowrap;
    }

    .btn-maint.enable {
        background: var(--red-bg);
        color: var(--red-text);
        border: 1px solid var(--red-border);
    }

    .btn-maint.enable:hover {
        background: #fecaca;
        transform: translateY(-2px);
    }

    .btn-maint.disable {
        background: var(--green-bg);
        color: var(--green-text);
        border: 1px solid var(--green-border);
    }

    .btn-maint.disable:hover {
        background: #bbf7d0;
        transform: translateY(-2px);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }

    .scard {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        box-shadow: var(--shadow-xs);
        transition: all 0.2s var(--ease);
        position: relative;
        overflow: hidden;
    }

    .scard:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-3px);
    }

    .scard::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }

    .scard.s-pending-news::before {
        background: #3b82f6;
    }

    .scard.s-pending-agenda::before {
        background: #14b8a6;
    }

    .scard.s-approved::before {
        background: #22c55e;
    }

    .scard.s-rejected::before {
        background: #ef4444;
    }

    .scard-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
    }

    .scard-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .scard-num {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
        letter-spacing: -1px;
    }

    .scard-icon {
        width: 44px;
        height: 44px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .scard-icon i {
        font-size: 20px;
    }

    .scard-icon.blue {
        background: var(--blue-bg);
        color: var(--blue-text);
        border: 1px solid var(--blue-border);
    }

    .scard-icon.teal {
        background: var(--teal-bg);
        color: var(--teal-text);
        border: 1px solid var(--teal-border);
    }

    .scard-icon.green {
        background: var(--green-bg);
        color: var(--green-text);
        border: 1px solid var(--green-border);
    }

    .scard-icon.red {
        background: var(--red-bg);
        color: var(--red-text);
        border: 1px solid var(--red-border);
    }

    .scard-footer {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: var(--radius-sm);
        width: fit-content;
    }

    .scard-footer i {
        font-size: 11px;
    }

    .scard-footer.ok {
        background: var(--green-bg);
        color: var(--green-text);
    }

    .scard-footer.warn {
        background: #fffbeb;
        color: #92400e;
    }

    .scard-footer.muted {
        background: var(--surface-3);
        color: var(--text-light);
    }

    /* Charts Row */
    .charts-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }

    .ccard {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        transition: transform 0.2s var(--ease);
    }

    .ccard:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .ccard-hd {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        gap: 12px;
        flex-wrap: wrap;
    }

    .ccard-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .ccard-title i {
        color: var(--primary);
        font-size: 14px;
    }

    .ccard-badge {
        font-size: 11px;
        font-weight: 700;
        background: var(--surface-3);
        color: var(--text-light);
        padding: 4px 12px;
        border-radius: 40px;
        border: 1px solid var(--border);
        white-space: nowrap;
    }

    .ccard-body {
        padding: 20px;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 260px;
    }

    .ccard-body canvas {
        max-height: 220px;
        width: 100% !important;
        height: auto !important;
    }

    .chart-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 12px 20px;
        padding: 14px 20px;
        border-top: 1px solid var(--border);
        background: var(--surface-2);
    }

    .leg {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-mid);
    }

    .leg-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    /* Lists Row */
    .lists-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .lcard {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        display: flex;
        flex-direction: column;
        transition: transform 0.2s var(--ease);
    }

    .lcard:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .lcard-hd {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        gap: 12px;
    }

    .lcard-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .lcard-title i {
        color: var(--primary);
        font-size: 14px;
    }

    .count-chip {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 40px;
        white-space: nowrap;
    }

    .count-chip.blue {
        background: var(--blue-bg);
        color: var(--blue-text);
        border: 1px solid var(--blue-border);
    }

    .count-chip.teal {
        background: var(--teal-bg);
        color: var(--teal-text);
        border: 1px solid var(--teal-border);
    }

    .count-chip.empty {
        background: var(--surface-3);
        color: var(--text-light);
        border: 1px solid var(--border);
    }

    .lcard-info-bar {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        font-size: 11px;
        color: var(--text-mid);
        background: var(--surface-2);
        border-bottom: 1px solid var(--border);
    }

    .lcard-info-bar i {
        color: var(--primary);
        font-size: 12px;
    }

    .lcard-body {
        flex: 1;
        overflow-y: auto;
        max-height: 400px;
    }

    /* Custom Scrollbar */
    .lcard-body::-webkit-scrollbar {
        width: 4px;
    }

    .lcard-body::-webkit-scrollbar-track {
        background: var(--surface-2);
    }

    .lcard-body::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 4px;
    }

    .litem {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 20px;
        border-bottom: 1px solid var(--border);
        transition: background 0.2s;
    }

    .litem:last-child {
        border-bottom: none;
    }

    .litem:hover {
        background: var(--surface-2);
    }

    .litem-ico {
        width: 36px;
        height: 36px;
        min-width: 36px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .litem-ico i {
        font-size: 14px;
    }

    .litem-ico.blue {
        background: var(--blue-bg);
        color: var(--blue-text);
        border: 1px solid var(--blue-border);
    }

    .litem-ico.teal {
        background: var(--teal-bg);
        color: var(--teal-text);
        border: 1px solid var(--teal-border);
    }

    .litem-body {
        flex: 1;
        min-width: 0;
    }

    .litem-title {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.45;
        margin-bottom: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .litem-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .litem-meta span {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 10px;
        color: var(--text-light);
        font-weight: 500;
    }

    .litem-meta i {
        font-size: 10px;
        color: var(--primary);
        opacity: 0.6;
    }

    .litem-actions {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
        align-items: center;
    }

    /* Action Buttons */
    .btn-act {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-sm);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s var(--ease);
    }

    .btn-act.approve {
        background: var(--green-bg);
        color: var(--green-text);
        border: 1px solid var(--green-border);
    }

    .btn-act.approve:hover {
        background: #bbf7d0;
        transform: scale(1.05);
    }

    .btn-act.reject {
        background: var(--red-bg);
        color: var(--red-text);
        border: 1px solid var(--red-border);
    }

    .btn-act.reject:hover {
        background: #fecaca;
        transform: scale(1.05);
    }

    /* Tooltip */
    @media (hover: hover) {
        .btn-act {
            position: relative;
        }

        .btn-act::after {
            content: attr(data-tip);
            position: absolute;
            bottom: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-dark);
            color: var(--gold);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            padding: 4px 8px;
            border-radius: var(--radius-xs);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
            z-index: 100;
        }

        .btn-act:hover::after {
            opacity: 1;
        }
    }

    /* Empty State */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 48px 20px;
        gap: 12px;
    }

    .empty-state i {
        font-size: 40px;
        color: var(--primary);
        opacity: 0.3;
        margin-bottom: 8px;
    }

    .empty-state strong {
        font-size: 14px;
        font-weight: 700;
        color: var(--text-mid);
        display: block;
    }

    .empty-state p {
        font-size: 12px;
        color: var(--text-light);
    }

    /* See More Link */
    .see-more {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        font-size: 12px;
        font-weight: 700;
        color: var(--primary);
        background: var(--surface-2);
        border-top: 1px solid var(--border);
        text-decoration: none;
        transition: all 0.2s;
    }

    .see-more:hover {
        background: var(--surface-3);
        color: var(--primary-dark);
        gap: 12px;
    }

    /* Animations */
    .anim {
        animation: fadeUp 0.5s var(--ease) both;
    }

    .d1 {
        animation-delay: 0s;
    }

    .d2 {
        animation-delay: 0.05s;
    }

    .d3 {
        animation-delay: 0.1s;
    }

    .d4 {
        animation-delay: 0.15s;
    }

    .d5 {
        animation-delay: 0.2s;
    }

    .d6 {
        animation-delay: 0.25s;
    }

    .d7 {
        animation-delay: 0.3s;
    }

    .d8 {
        animation-delay: 0.35s;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Breakpoints */
    @media (max-width: 1200px) {
        .stats-grid {
            gap: 14px;
        }
    }

    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .charts-row {
            gap: 16px;
        }

        .lists-row {
            gap: 16px;
        }
    }

    @media (max-width: 768px) {
        .dash {
            padding: 16px;
        }

        .topbar {
            flex-direction: column;
            align-items: stretch;
        }

        .date-pill {
            align-self: flex-start;
        }

        .stats-grid {
            gap: 12px;
        }

        .scard {
            padding: 16px;
        }

        .charts-row {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .lists-row {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .maint-card {
            flex-direction: column;
            align-items: stretch;
            padding: 16px;
        }

        .maint-right {
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-maint {
            width: 100%;
            justify-content: center;
        }

        .status-pill {
            width: 100%;
            justify-content: center;
        }

        .litem-actions {
            flex-direction: column;
            gap: 6px;
        }

        .btn-act {
            width: 36px;
            height: 36px;
        }
    }

    @media (max-width: 576px) {
        .dash {
            padding: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            font-size: 14px;
        }

        .greeting-text h1 {
            font-size: 16px;
        }

        .greeting-text p {
            font-size: 11px;
        }

        .stats-grid {
            gap: 10px;
        }

        .scard {
            padding: 12px;
        }

        .scard-num {
            font-size: 26px;
        }

        .scard-label {
            font-size: 10px;
        }

        .scard-icon {
            width: 36px;
            height: 36px;
        }

        .scard-icon i {
            font-size: 16px;
        }

        .maint-left {
            flex-direction: column;
            gap: 12px;
        }

        .maint-icon {
            align-self: flex-start;
        }

        .litem {
            padding: 12px;
            gap: 10px;
        }

        .litem-title {
            font-size: 12px;
        }

        .ccard-hd,
        .lcard-hd {
            padding: 12px 16px;
        }

        .ccard-body {
            padding: 16px;
        }

        .chart-legend {
            padding: 12px 16px;
        }

        .lcard-info-bar {
            padding: 8px 16px;
        }

        .see-more {
            padding: 10px 16px;
        }

        .empty-state {
            padding: 32px 16px;
        }

        .empty-state i {
            font-size: 32px;
        }
    }

    @media (min-width: 1600px) {
        .dash {
            max-width: 1600px;
        }

        .stats-grid {
            gap: 24px;
        }

        .scard {
            padding: 24px;
        }

        .scard-num {
            font-size: 48px;
        }

        .lcard-body {
            max-height: 460px;
        }
    }

    @media (hover: none) and (pointer: coarse) {
        .btn-act {
            min-width: 44px;
            min-height: 44px;
        }

        .btn-maint {
            min-height: 48px;
        }
    }

    @media print {
        .maint-card,
        .btn-maint,
        .litem-actions,
        .see-more {
            display: none;
        }

        .scard,
        .ccard,
        .lcard {
            break-inside: avoid;
            box-shadow: none;
        }

        body {
            background: white;
            padding: 20px;
        }
    }
</style>

<div class="dash">
    <!-- Topbar -->
    <div class="topbar anim d1">
        <div class="greeting">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
            </div>
            <div class="greeting-text">
                <h1>Selamat datang, {{ auth()->user()->name ?? 'Admin' }}! 👋</h1>
                <p>Kelola dan pantau konten website dengan mudah</p>
            </div>
        </div>
        <div class="date-pill">
            <i class="fas fa-calendar-alt"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <!-- Maintenance Mode -->
    <div class="sec-label anim d2">Status Sistem</div>
    <div class="maint-card anim d2 {{ app()->isDownForMaintenance() ? 'active' : '' }}">
        <div class="maint-left">
            <div class="maint-icon">
                <i class="fas fa-tools"></i>
            </div>
            <div>
                <div class="maint-title">Mode Maintenance (Perawatan Website)</div>
                <div class="maint-desc">
                    Jika diaktifkan, pengunjung umum <strong>tidak bisa</strong> mengakses website sampai mode ini dinonaktifkan kembali.
                </div>
                <div class="maint-tip">
                    <i class="fas fa-lightbulb"></i>
                    Aktifkan hanya saat sedang pemeliharaan / perbaikan website
                </div>
            </div>
        </div>
        <div class="maint-right">
            @if(app()->isDownForMaintenance())
                <div class="status-pill offline">
                    <span class="dot"></span> Website sedang maintenance
                </div>
                <form action="{{ route('admin.maintenance.up') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-maint disable">
                        <i class="fas fa-check-circle"></i> Nonaktifkan Maintenance
                    </button>
                </form>
            @else
                <div class="status-pill online">
                    <span class="dot"></span> Website aktif & normal
                </div>
                <form action="{{ route('admin.maintenance.down') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-maint enable"
                        onclick="return confirm('⚠️ Peringatan\n\nMengaktifkan maintenance mode akan membuat website TIDAK BISA diakses oleh publik.\n\nPastikan kamu sudah tahu apa yang dilakukan.\n\nLanjutkan?')">
                        <i class="fas fa-power-off"></i> Aktifkan Maintenance
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Stats Cards -->
    @php
        $totalPending = $pendingNews->count() + $pendingAgenda->count();
        $totalApproved = $approvedCount ?? 0;
        $totalRejected = $rejectedCount ?? 0;
        $totalAll = $totalApproved + $pendingNews->count() + $pendingAgenda->count() + $totalRejected;
        
        $cApproved = $totalAll > 0 ? $totalApproved : 1;
        $cNews = $totalAll > 0 ? $pendingNews->count() : 1;
        $cAgenda = $totalAll > 0 ? $pendingAgenda->count() : 1;
        $cRejected = $totalAll > 0 ? $totalRejected : 1;
    @endphp

    <div class="sec-label anim d3" style="margin-top: 16px;">Ringkasan Konten</div>
    <div class="stats-grid">
        <div class="scard s-pending-news anim d3">
            <div class="scard-row">
                <div>
                    <div class="scard-label">Berita Menunggu</div>
                    <div class="scard-num">{{ $pendingNews->count() }}</div>
                </div>
                <div class="scard-icon blue">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
            @if($pendingNews->count() > 0)
                <div class="scard-footer warn">
                    <i class="fas fa-clock"></i> Ada {{ $pendingNews->count() }} berita perlu ditinjau
                </div>
            @else
                <div class="scard-footer ok">
                    <i class="fas fa-check-circle"></i> Semua berita sudah ditinjau
                </div>
            @endif
        </div>

        <div class="scard s-pending-agenda anim d4">
            <div class="scard-row">
                <div>
                    <div class="scard-label">Agenda Menunggu</div>
                    <div class="scard-num">{{ $pendingAgenda->count() }}</div>
                </div>
                <div class="scard-icon teal">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
            @if($pendingAgenda->count() > 0)
                <div class="scard-footer warn">
                    <i class="fas fa-clock"></i> Ada {{ $pendingAgenda->count() }} agenda perlu ditinjau
                </div>
            @else
                <div class="scard-footer ok">
                    <i class="fas fa-check-circle"></i> Semua agenda sudah ditinjau
                </div>
            @endif
        </div>

        <div class="scard s-approved anim d5">
            <div class="scard-row">
                <div>
                    <div class="scard-label">Sudah Disetujui</div>
                    <div class="scard-num">{{ $totalApproved }}</div>
                </div>
                <div class="scard-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="scard-footer ok">
                <i class="fas fa-globe"></i> Sudah tayang di website
            </div>
        </div>

        <div class="scard s-rejected anim d6">
            <div class="scard-row">
                <div>
                    <div class="scard-label">Ditolak</div>
                    <div class="scard-num">{{ $totalRejected }}</div>
                </div>
                <div class="scard-icon red">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
            <div class="scard-footer muted">
                <i class="fas fa-eye-slash"></i> Tidak ditampilkan ke publik
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="sec-label anim d7" style="margin-top: 8px;">Visualisasi Data</div>
    <div class="charts-row anim d7">
        <div class="ccard">
            <div class="ccard-hd">
                <div class="ccard-title">
                    <i class="fas fa-chart-pie"></i> Status Seluruh Konten
                </div>
                <span class="ccard-badge">Total: {{ $totalAll }}</span>
            </div>
            <div class="ccard-body">
                <canvas id="statusChart" style="max-height: 220px; width: 100%;"></canvas>
            </div>
            <div class="chart-legend">
                <div class="leg"><span class="leg-dot" style="background: #0B4650;"></span> Disetujui ({{ $cApproved }})</div>
                <div class="leg"><span class="leg-dot" style="background: #3b82f6;"></span> Berita pending ({{ $cNews }})</div>
                <div class="leg"><span class="leg-dot" style="background: #14b8a6;"></span> Agenda pending ({{ $cAgenda }})</div>
                <div class="leg"><span class="leg-dot" style="background: #ef4444;"></span> Ditolak ({{ $cRejected }})</div>
            </div>
        </div>

        <div class="ccard">
            <div class="ccard-hd">
                <div class="ccard-title">
                    <i class="fas fa-chart-bar"></i> Konten Menunggu Review
                </div>
                <span class="ccard-badge">Perlu tindakan</span>
            </div>
            <div class="ccard-body">
                <canvas id="pendingChart" style="max-height: 220px; width: 100%;"></canvas>
            </div>
            <div class="chart-legend">
                <div class="leg"><span class="leg-dot" style="background: #3b82f6;"></span> Berita: {{ $pendingNews->count() }}</div>
                <div class="leg"><span class="leg-dot" style="background: #14b8a6;"></span> Agenda: {{ $pendingAgenda->count() }}</div>
            </div>
        </div>
    </div>

    <!-- Content Lists -->
    <div class="sec-label anim d8" style="margin-top: 8px;">Daftar Konten Menunggu Persetujuan</div>
    <div class="lists-row anim d8">
        <!-- Berita Section -->
        <div class="lcard">
            <div class="lcard-hd">
                <div class="lcard-title">
                    <i class="fas fa-newspaper"></i> Berita Menunggu
                </div>
                <span class="count-chip {{ $pendingNews->count() > 0 ? 'blue' : 'empty' }}">
                    {{ $pendingNews->count() }} item
                </span>
            </div>

            @if($pendingNews->count() > 0)
                <div class="lcard-info-bar">
                    <i class="fas fa-info-circle"></i>
                    Klik <strong>✓</strong> untuk menyetujui atau <strong>✕</strong> untuk menolak setiap berita
                </div>
            @endif

            <div class="lcard-body">
                @forelse($pendingNews as $berita)
                    <div class="litem">
                        <div class="litem-ico blue">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="litem-body">
                            <div class="litem-title" title="{{ $berita->title }}">
                                {{ Str::limit($berita->title, 60) }}
                            </div>
                            <div class="litem-meta">
                                <span><i class="fas fa-user"></i> {{ $berita->user->name ?? 'Unknown' }}</span>
                                <span><i class="far fa-clock"></i> {{ $berita->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="litem-actions">
                            <form method="POST" action="{{ route('admin.news.approve', $berita->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-act approve" data-tip="Setujui"
                                    onclick="return confirm('Setujui berita:\n&quot;{{ addslashes(Str::limit($berita->title, 60)) }}&quot;?')">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.news.reject', $berita->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-act reject" data-tip="Tolak"
                                    onclick="return confirm('Tolak berita:\n&quot;{{ addslashes(Str::limit($berita->title, 60)) }}&quot;?')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-check-circle"></i>
                        <strong>Semua berita sudah ditinjau!</strong>
                        <p>Tidak ada berita yang menunggu persetujuan saat ini.</p>
                    </div>
                @endforelse
            </div>

            @if($pendingNews->count() > 5)
                <a href="{{ route('admin.news.index') }}" class="see-more">
                    Lihat semua {{ $pendingNews->count() }} berita <i class="fas fa-arrow-right"></i>
                </a>
            @endif
        </div>

        <!-- Agenda Section -->
        <div class="lcard">
            <div class="lcard-hd">
                <div class="lcard-title">
                    <i class="fas fa-calendar-alt"></i> Agenda Menunggu
                </div>
                <span class="count-chip {{ $pendingAgenda->count() > 0 ? 'teal' : 'empty' }}">
                    {{ $pendingAgenda->count() }} item
                </span>
            </div>

            @if($pendingAgenda->count() > 0)
                <div class="lcard-info-bar">
                    <i class="fas fa-info-circle"></i>
                    Klik <strong>✓</strong> untuk menyetujui atau <strong>✕</strong> untuk menolak setiap agenda
                </div>
            @endif

            <div class="lcard-body">
                @forelse($pendingAgenda as $agenda)
                    <div class="litem">
                        <div class="litem-ico teal">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="litem-body">
                            <div class="litem-title" title="{{ $agenda->title }}">
                                {{ Str::limit($agenda->title, 60) }}
                            </div>
                            <div class="litem-meta">
                                <span><i class="fas fa-user"></i> {{ $agenda->user->name ?? 'Unknown' }}</span>
                                <span><i class="fas fa-calendar-day"></i> {{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('d M Y') }}</span>
                                @if($agenda->location)
                                    <span><i class="fas fa-map-marker-alt"></i> {{ Str::limit($agenda->location, 25) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="litem-actions">
                            <form method="POST" action="{{ route('admin.agenda.approve', $agenda->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-act approve" data-tip="Setujui"
                                    onclick="return confirm('Setujui agenda:\n&quot;{{ addslashes(Str::limit($agenda->title, 60)) }}&quot;?')">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.agenda.reject', $agenda->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-act reject" data-tip="Tolak"
                                    onclick="return confirm('Tolak agenda:\n&quot;{{ addslashes(Str::limit($agenda->title, 60)) }}&quot;?')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-check-circle"></i>
                        <strong>Semua agenda sudah ditinjau!</strong>
                        <p>Tidak ada agenda yang menunggu persetujuan saat ini.</p>
                    </div>
                @endforelse
            </div>

            @if($pendingAgenda->count() > 5)
                <a href="{{ route('admin.agenda.index') }}" class="see-more">
                    Lihat semua {{ $pendingAgenda->count() }} agenda <i class="fas fa-arrow-right"></i>
                </a>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipBg = '#072e38';

        const tooltipDefaults = {
            backgroundColor: tooltipBg,
            titleColor: '#E6FF2B',
            bodyColor: '#F9F7F2',
            padding: 10,
            cornerRadius: 8,
            displayColors: true,
            boxPadding: 4,
        };

        // Donut Chart
        const ctx1 = document.getElementById('statusChart').getContext('2d');
        window.statusChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Disetujui', 'Berita Pending', 'Agenda Pending', 'Ditolak'],
                datasets: [{
                    data: [{{ $cApproved }}, {{ $cNews }}, {{ $cAgenda }}, {{ $cRejected }}],
                    backgroundColor: ['#0B4650', '#3b82f6', '#14b8a6', '#ef4444'],
                    hoverBackgroundColor: ['#155e6e', '#2563eb', '#0d9488', '#dc2626'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderColor: '#F9F7F2',
                    hoverOffset: 12,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutout: '65%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        ...tooltipDefaults,
                        callbacks: {
                            label: function(ctx) {
                                const total = {{ $totalAll > 0 ? $totalAll : 4 }};
                                const pct = Math.round((ctx.raw / total) * 100);
                                return ` ${ctx.label}: ${ctx.raw} konten (${pct}%)`;
                            }
                        }
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'easeInOutQuart',
                    animateRotate: true,
                    animateScale: true
                }
            }
        });

        // Bar Chart
        const ctx2 = document.getElementById('pendingChart').getContext('2d');
        window.pendingChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Berita', 'Agenda'],
                datasets: [{
                    label: 'Menunggu Persetujuan',
                    data: [{{ $pendingNews->count() }}, {{ $pendingAgenda->count() }}],
                    backgroundColor: ['rgba(59, 130, 246, 0.85)', 'rgba(20, 184, 166, 0.85)'],
                    hoverBackgroundColor: ['#2563eb', '#0d9488'],
                    borderRadius: 8,
                    borderSkipped: false,
                    barPercentage: 0.6,
                    categoryPercentage: 0.7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        ...tooltipDefaults,
                        callbacks: {
                            label: function(ctx) {
                                return ` Menunggu: ${ctx.raw} item`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#dddbd5',
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                            font: {
                                size: 11,
                                family: "'Plus Jakarta Sans', sans-serif"
                            },
                            color: '#898A8D',
                        },
                        border: {
                            dash: [4, 4]
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 13,
                                weight: '700',
                                family: "'Plus Jakarta Sans', sans-serif"
                            },
                            color: '#0B4650',
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeInOutQuart',
                    delay: 200
                }
            }
        });

        // Handle window resize for charts
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                if (window.statusChart) window.statusChart.resize();
                if (window.pendingChart) window.pendingChart.resize();
            }, 250);
        });
    });
</script>
@endsection