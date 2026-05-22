<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>LPMI Access · Portal Mutu | Universitas Gunung Kidul</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-v2.png') }}">

    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* === PALET BARU === */
        :root {
            --primary:        #0B4650;
            --primary-light:  #155e6e;
            --primary-dark:   #072e38;
            --primary-mid:    #0e5262;

            --gold:           #E6FF2B;
            --gold-light:     #eeff55;
            --gold-dark:      #c4db00;

            --secondary:      #F9F7F2;
            --accent:         #fdfcf9;
            --accent2:        #f0ede5;
            --text-dark:      #072e38;
            --text-mid:       #0B4650;
            --text-light:     #898A8D;
            --white:          #ffffff;
            --border:         #dddbd5;

            --shadow-sm:  0 2px 8px rgba(11,70,80,0.08);
            --shadow-md:  0 8px 28px rgba(11,70,80,0.13);
            --shadow-lg:  0 20px 50px rgba(11,70,80,0.16);
            --shadow-xl:  0 32px 70px rgba(11,70,80,0.20);

            --font-primary: 'DM Sans', sans-serif;
            --font-heading: 'Cormorant Garamond', serif;
            --radius-sm:  8px;
            --radius-md:  14px;
            --radius-lg:  22px;
            --radius-xl:  32px;
            --transition: 0.25s cubic-bezier(0.4,0,0.2,1);

            /* Alias untuk kompatibilitas */
            --navy:       var(--primary);
            --navy-mid:   var(--primary-light);
            --navy-deep:  var(--primary-dark);
            --gold-lt:    var(--gold-light);
            --gold-dim:   rgba(230,255,43,0.18);
            --ink:        var(--text-dark);
            --muted:      var(--text-light);
            --off-white:  var(--secondary);
            --success-bg:     #ecfdf5;
            --success-border: #a7f3d0;
            --success-text:   #065f46;
            --error-bg:       #fef2f2;
            --error-border:   #fecaca;
            --error-text:     #991b1b;
            --ease-out: cubic-bezier(0.22, 1, 0.36, 1);
        }

        html, body {
            height: 100%;
            font-family: var(--font-primary);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--secondary);
            background-image: radial-gradient(circle at 10% 20%, rgba(230,255,43,0.07) 2%, transparent 2.5%),
                              radial-gradient(circle at 85% 70%, rgba(11,70,80,0.05) 1.8%, transparent 2%);
            background-size: 48px 48px, 36px 36px;
            padding: 1.5rem;
            min-height: 100vh;
        }

        /* MAIN CARD */
        .card {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 600px;
            border-radius: 36px;
            overflow: hidden;
            background: var(--white);
            box-shadow: var(--shadow-xl);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: rise 0.75s var(--ease-out) both;
        }

        @keyframes rise {
            0%   { opacity: 0; transform: translateY(32px) scale(0.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* LEFT PANEL */
        .panel-art {
            flex: 0 0 44%;
            position: relative;
            overflow: hidden;
            background: var(--primary-dark);
        }

        .art-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .panel-art:hover .art-svg {
            transform: scale(1.02);
        }

        .panel-art-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem 2rem;
            z-index: 3;
            background: linear-gradient(to top, rgba(7,46,56,0.92) 0%, rgba(7,46,56,0.35) 45%, transparent 100%);
        }

        .art-label {
            font-family: var(--font-heading);
            font-size: 2.7rem;
            font-weight: 300;
            color: var(--white);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            line-height: 1.1;
            margin-bottom: 0.5rem;
        }

        .art-label em {
            font-style: italic;
            color: var(--gold);
            font-weight: 500;
        }

        .art-inst {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 400;
        }

        .art-dot {
            width: 40px;
            height: 2px;
            background: var(--gold);
            margin-bottom: 1.2rem;
            opacity: 0.85;
        }

        /* RIGHT PANEL */
        .panel-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
            padding: 3rem 3rem;
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-title {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--ink);
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 0.4rem;
        }

        .form-sub {
            font-size: 0.85rem;
            color: var(--muted);
            letter-spacing: 0.02em;
            font-weight: 400;
            border-left: 2px solid var(--gold);
            padding-left: 0.7rem;
        }

        /* ALERTS */
        .alert {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 1rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
            font-weight: 450;
            backdrop-filter: blur(2px);
            animation: slideAlert 0.35s var(--ease-out) both;
        }

        @keyframes slideAlert {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: var(--success-bg);
            border-left: 4px solid #10b981;
            color: var(--success-text);
        }

        .alert-error {
            background: var(--error-bg);
            border-left: 4px solid #f43f5e;
            color: var(--error-text);
        }

        .alert-close {
            margin-left: auto;
            cursor: pointer;
            opacity: 0.55;
            font-size: 0.75rem;
            padding: 6px;
            transition: all 0.2s;
            border-radius: 50%;
        }

        .alert-close:hover {
            opacity: 1;
            background: rgba(0,0,0,0.05);
        }

        /* FIELDS */
        .field {
            margin-bottom: 1.6rem;
        }

        .field label {
            display: block;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap input {
            width: 100%;
            border: none;
            border-bottom: 1.8px solid var(--border);
            background: transparent;
            padding: 0.7rem 2.2rem 0.7rem 0;
            font-size: 1rem;
            font-family: var(--font-primary);
            color: var(--ink);
            outline: none;
            transition: border-color 0.25s, padding 0.2s;
        }

        .input-wrap input::placeholder {
            color: #cbc6bc;
            font-weight: 300;
            font-size: 0.9rem;
        }

        .input-wrap input:focus {
            border-bottom-color: var(--gold-dark);
        }

        .input-icon {
            position: absolute;
            right: 0;
            bottom: 0.7rem;
            font-size: 0.9rem;
            color: #b9b3a8;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap input:focus ~ .input-icon {
            color: var(--gold-dark);
        }

        .toggle-pw {
            position: absolute;
            right: 0;
            bottom: 0.7rem;
            background: none;
            border: none;
            cursor: pointer;
            color: #b9b3a8;
            font-size: 0.9rem;
            padding: 0;
            transition: color 0.2s;
        }

        .toggle-pw:hover {
            color: var(--navy);
        }

        /* FORGOT ROW */
        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin-top: -0.4rem;
            margin-bottom: 2rem;
        }

        .forgot-link {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--muted);
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s, transform 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .forgot-link i { font-size: 0.65rem; }

        .forgot-link:hover {
            color: var(--navy);
            text-decoration: underline;
        }

        /* BUTTON */
        .btn-submit {
            width: 100%;
            padding: 0.9rem 1.2rem;
            background: var(--navy);
            color: var(--white);
            border: none;
            border-radius: 40px;
            font-family: var(--font-primary);
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background 0.25s, transform 0.15s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            box-shadow: 0 6px 12px -6px rgba(11,70,80,0.35);
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(120deg, rgba(230,255,43,0) 0%, rgba(230,255,43,0.15) 50%, rgba(230,255,43,0) 100%);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .btn-submit:hover {
            background: var(--navy-mid);
            transform: translateY(-2px);
            box-shadow: 0 14px 22px -10px rgba(11,70,80,0.45);
        }

        .btn-submit:hover::after {
            transform: translateX(100%);
        }

        .btn-submit:active { transform: translateY(1px); }

        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .btn-submit.loading .btn-icon {
            animation: spin 0.85s linear infinite;
        }

        /* FOOTER */
        .form-footer {
            margin-top: 2.2rem;
            padding-top: 1.4rem;
            border-top: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .footer-support {
            font-size: 0.72rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-support i { color: var(--gold-dark); font-size: 0.7rem; }

        .footer-version {
            font-size: 0.65rem;
            color: #bfb9ae;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: var(--ink);
            color: #f2efea;
            padding: 0.7rem 1.6rem;
            border-radius: 60px;
            font-size: 0.8rem;
            font-weight: 500;
            opacity: 0;
            pointer-events: none;
            border: 1px solid rgba(230,255,43,0.4);
            backdrop-filter: blur(8px);
            transition: all 0.25s var(--ease-out);
            z-index: 9999;
            white-space: nowrap;
            letter-spacing: 0.01em;
            box-shadow: 0 10px 18px -6px rgba(0,0,0,0.2);
        }

        .toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* RESPONSIVE */
        @media (max-width: 820px) {
            body { padding: 1rem; align-items: flex-start; }

            .card {
                flex-direction: column;
                border-radius: 28px;
                max-width: 560px;
                min-height: auto;
                margin: 0 auto;
            }

            .panel-art { flex: 0 0 240px; height: 240px; }
            .panel-art-content { padding: 1.5rem 1.6rem; }
            .art-label { font-size: 2rem; }
            .panel-form { padding: 2rem 1.8rem; }
        }

        @media (max-width: 540px) {
            .panel-form { padding: 1.8rem 1.4rem; }
            .form-title { font-size: 2rem; }
            .btn-submit { padding: 0.75rem 1rem; }

            .toast {
                white-space: normal;
                max-width: 85vw;
                text-align: center;
                font-size: 0.75rem;
                padding: 0.5rem 1.2rem;
            }
        }

        @media (max-width: 400px) {
            .panel-form { padding: 1.5rem 1rem; }
            .art-label { font-size: 1.7rem; letter-spacing: 0.1em; }
        }
    </style>
</head>

<body>

<div class="card">

    <!-- LEFT PANEL - SVG dengan palet baru (teal gelap & lime yellow) -->
    <div class="panel-art">
        <svg class="art-svg" viewBox="0 0 400 620" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
            <defs>
                <radialGradient id="moonGlow" cx="70%" cy="16%" r="32%">
                    <stop offset="0%" stop-color="#155e6e" stop-opacity="0.75" />
                    <stop offset="100%" stop-color="#072e38" stop-opacity="0" />
                </radialGradient>
                <radialGradient id="templeLight" cx="48%" cy="48%" r="24%">
                    <stop offset="0%" stop-color="#E6FF2B" stop-opacity="0.18" />
                    <stop offset="100%" stop-color="#c4db00" stop-opacity="0" />
                </radialGradient>
                <filter id="softGlow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="3" />
                    <feMerge>
                        <feMergeNode in="offsetblur" />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
            </defs>

            <!-- Langit malam -->
            <rect width="400" height="620" fill="#072e38" />
            <rect width="400" height="620" fill="url(#moonGlow)" />

            <!-- Stars -->
            <g fill="#ffffff" opacity="0.7">
                <circle cx="34" cy="38" r="1.1" />
                <circle cx="72" cy="22" r="0.8" opacity="0.5" />
                <circle cx="124" cy="48" r="1.3" />
                <circle cx="168" cy="20" r="0.9" opacity="0.6" />
                <circle cx="216" cy="34" r="1.0" />
                <circle cx="274" cy="26" r="1.2" opacity="0.7" />
                <circle cx="312" cy="52" r="0.8" />
                <circle cx="358" cy="30" r="1.1" opacity="0.65" />
                <circle cx="48" cy="78" r="0.7" opacity="0.45" />
                <circle cx="98" cy="68" r="0.9" />
                <circle cx="148" cy="84" r="0.6" />
                <circle cx="200" cy="64" r="1.0" opacity="0.5" />
                <circle cx="260" cy="76" r="0.8" />
                <circle cx="330" cy="68" r="1.0" opacity="0.55" />
                <circle cx="380" cy="48" r="0.7" />
            </g>

            <!-- Bulan dengan aura lime -->
            <circle cx="290" cy="62" r="28" fill="#E6FF2B" opacity="0.07" />
            <circle cx="290" cy="62" r="20" fill="#eeff55" opacity="0.12" />
            <circle cx="290" cy="62" r="12" fill="#f5ff99" opacity="0.22" />

            <!-- Pegunungan (shades teal) -->
            <path d="M0,320 L55,210 L115,255 L165,190 L225,230 L280,170 L340,215 L400,190 L400,620 L0,620Z" fill="#0e5262" />
            <path d="M0,380 L45,275 L100,310 L150,250 L210,285 L265,240 L325,280 L400,260 L400,620 L0,620Z" fill="#155e6e" />

            <!-- Cahaya candi -->
            <rect width="400" height="620" fill="url(#templeLight)" />

            <!-- Candi dengan aksen lime yellow -->
            <g transform="translate(140, 270)">
                <rect x="12" y="60" width="74" height="48" rx="3" fill="#0B4650" opacity="0.95" />
                <rect x="20" y="68" width="12" height="12" rx="1.5" fill="#E6FF2B" opacity="0.4" />
                <rect x="66" y="68" width="12" height="12" rx="1.5" fill="#E6FF2B" opacity="0.4" />
                <rect x="37" y="78" width="24" height="30" rx="2" fill="#072e38" />
                <rect x="18" y="42" width="62" height="24" rx="2" fill="#0e5262" opacity="0.9" />
                <rect x="28" y="48" width="10" height="8" rx="1" fill="#E6FF2B" opacity="0.5" />
                <rect x="60" y="48" width="10" height="8" rx="1" fill="#E6FF2B" opacity="0.5" />
                <polygon points="0,42 49,16 98,42" fill="#072e38" />
                <polygon points="6,42 49,21 92,42" fill="#0B4650" />
                <rect x="42" y="4" width="14" height="16" rx="1" fill="#155e6e" />
                <polygon points="38,8 49,-2 60,8" fill="#E6FF2B" opacity="0.6" />
                <line x1="5" y1="42" x2="5" y2="48" stroke="#E6FF2B" stroke-width="1.8" opacity="0.7" />
                <line x1="93" y1="42" x2="93" y2="48" stroke="#E6FF2B" stroke-width="1.8" opacity="0.7" />
            </g>

            <!-- Hutan latar depan -->
            <g fill="#072e38" opacity="0.95">
                <ellipse cx="12" cy="510" rx="46" ry="100" />
                <ellipse cx="60" cy="525" rx="38" ry="88" />
                <ellipse cx="345" cy="505" rx="48" ry="102" />
                <ellipse cx="390" cy="520" rx="32" ry="84" />
            </g>

            <!-- Dedaunan tengah (teal) -->
            <g fill="#0B4650" opacity="0.9">
                <ellipse cx="85" cy="470" rx="62" ry="32" />
                <ellipse cx="180" cy="460" rx="70" ry="34" />
                <ellipse cx="285" cy="465" rx="65" ry="30" />
            </g>

            <!-- Aksen lime pada dedaunan -->
            <g opacity="0.5">
                <ellipse cx="100" cy="448" rx="20" ry="12" fill="#c4db00" />
                <ellipse cx="210" cy="440" rx="24" ry="14" fill="#E6FF2B" />
                <ellipse cx="300" cy="450" rx="18" ry="10" fill="#c4db00" />
                <ellipse cx="150" cy="452" rx="14" ry="8" fill="#eeff55" />
            </g>

            <!-- Path cahaya menuju candi -->
            <path d="M178,620 L198,530 L215,470 L205,490 L188,530 L178,620Z" fill="rgba(230,255,43,0.07)" />
            <path d="M230,620 L210,530 L195,470" fill="none" stroke="rgba(230,255,43,0.12)" stroke-width="10" />

            <!-- Lentera -->
            <line x1="142" y1="420" x2="142" y2="470" stroke="#E6FF2B" stroke-width="2.5" opacity="0.55" />
            <rect x="134" y="410" width="16" height="14" rx="2" fill="#0e5262" opacity="0.9" />
            <rect x="138" y="413" width="8" height="8" rx="1" fill="#E6FF2B" opacity="0.6" />
            <line x1="270" y1="428" x2="270" y2="475" stroke="#E6FF2B" stroke-width="2.5" opacity="0.5" />
            <rect x="262" y="418" width="16" height="14" rx="2" fill="#0e5262" opacity="0.85" />
            <rect x="266" y="421" width="8" height="8" rx="1" fill="#E6FF2B" opacity="0.55" />

            <!-- Kunang-kunang lime -->
            <circle cx="174" cy="388" r="2.2" fill="#eeff55" opacity="0.7" filter="url(#softGlow)" />
            <circle cx="234" cy="365" r="1.8" fill="#E6FF2B" opacity="0.55" />
            <circle cx="148" cy="412" r="2" fill="#c4db00" opacity="0.65" />
            <circle cx="260" cy="395" r="1.5" fill="#eeff55" opacity="0.5" />
            <circle cx="200" cy="372" r="1.6" fill="#f5ff99" opacity="0.7" />

            <!-- Tanah dasar -->
            <rect x="0" y="550" width="400" height="70" fill="#072e38" />
        </svg>

        <div class="panel-art-content">
            <div class="art-dot"></div>
            <div class="art-label"><em>Welcome back</em></div>
            <div class="art-inst">Lembaga Penjaminan Mutu Internal</div>
            <div class="art-inst" style="font-size: 0.55rem; margin-top: 6px;">Universitas Gunung Kidul</div>
        </div>
    </div>

    <!-- RIGHT PANEL Login Form -->
    <div class="panel-form">
        <div class="form-header">
            <div class="form-title">Akses Portal</div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" id="alertSession">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('status') }}</span>
                <i class="fas fa-times alert-close" onclick="this.closest('.alert').remove()"></i>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" id="alertError">
                <i class="fas fa-exclamation-triangle"></i>
                <div style="flex:1">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                <i class="fas fa-times alert-close" onclick="this.closest('.alert').remove()"></i>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
            @csrf

            <div class="field">
                <label for="email">Alamat Email</label>
                <div class="input-wrap">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="" autocomplete="username" autofocus required />
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>

            <div class="field">
                <label for="password">Kata Sandi</label>
                <div class="input-wrap">
                    <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required />
                    <button type="button" class="toggle-pw" id="togglePw" aria-label="Tampilkan sandi">
                        <i class="fas fa-eye-slash" id="pwIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit" id="loginBtn">
                <i class="fas fa-arrow-right-to-bracket btn-icon"></i>
                <span class="btn-label">Masuk ke Portal</span>
            </button>
        </form>
    </div>
</div>

<div id="toast" class="toast"></div>

<script>
    (function() {
        const toggleBtn = document.getElementById('togglePw');
        const pwField   = document.getElementById('password');
        const pwIcon    = document.getElementById('pwIcon');

        if (toggleBtn && pwField) {
            toggleBtn.addEventListener('click', () => {
                const isHidden = pwField.type === 'password';
                pwField.type = isHidden ? 'text' : 'password';
                pwIcon.classList.toggle('fa-eye-slash', !isHidden);
                pwIcon.classList.toggle('fa-eye', isHidden);
            });
        }

        function dismissAlert(id, delay) {
            const el = document.getElementById(id);
            if (!el) return;
            setTimeout(() => {
                el.style.transition = 'opacity 0.3s ease, transform 0.2s';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-10px)';
                setTimeout(() => el.remove(), 350);
            }, delay);
        }
        dismissAlert('alertSession', 5000);
        dismissAlert('alertError', 7000);

        function showToast(msg, duration = 3200) {
            const toast = document.getElementById('toast');
            if (!toast) return;
            toast.textContent = msg;
            toast.classList.add('show');
            if (toast._timer) clearTimeout(toast._timer);
            toast._timer = setTimeout(() => toast.classList.remove('show'), duration);
        }

        const form          = document.getElementById('loginForm');
        const loginBtn      = document.getElementById('loginBtn');
        const emailInput    = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        if (form && loginBtn) {
            form.addEventListener('submit', function(e) {
                let emailVal = emailInput?.value.trim() || '';
                let passVal  = passwordInput?.value || '';

                if (!emailVal) {
                    e.preventDefault();
                    showToast('✉️ Email harus diisi.');
                    emailInput?.focus();
                    return;
                }
                const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                if (!emailPattern.test(emailVal)) {
                    e.preventDefault();
                    showToast('📧 Format email tidak valid (contoh: nama@domain.ac.id).');
                    emailInput?.focus();
                    return;
                }
                if (!passVal) {
                    e.preventDefault();
                    showToast('🔒 Kata sandi tidak boleh kosong.');
                    passwordInput?.focus();
                    return;
                }

                const btnIcon  = loginBtn.querySelector('.btn-icon');
                const btnLabel = loginBtn.querySelector('.btn-label');
                if (btnIcon)  btnIcon.className = 'fas fa-circle-notch btn-icon';
                if (btnLabel) btnLabel.textContent = 'Memproses ...';
                loginBtn.classList.add('loading');
            });
        }
    })();
</script>
</body>
</html>