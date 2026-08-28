<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System') | LSPU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --lspu-blue: #0072BC;
            --lspu-blue-deep: #00284B;
            --lspu-gold: #FDB913;
            --lspu-parchment: #FBF7EF;
            --lspu-ink: #1C2B39;
        }
        body { background: var(--lspu-parchment); color: var(--lspu-ink); font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Fraunces', serif; }
        .font-mono-lspu { font-family: 'IBM Plex Mono', monospace; }
        .lspu-hero {
            background: linear-gradient(160deg, var(--lspu-blue-deep) 0%, #003B6B 55%, var(--lspu-blue) 130%);
        }
        .lspu-hero::before {
            content: "";
            position: absolute; inset: 0;
            background-image: repeating-linear-gradient(45deg, rgba(253,185,19,0.06) 0px, rgba(253,185,19,0.06) 1px, transparent 1px, transparent 14px);
            pointer-events: none;
        }
        .lspu-card {
            box-shadow: 0 30px 60px -20px rgba(0, 40, 75, 0.35), 0 2px 6px rgba(0, 40, 75, 0.08);
        }
        .lspu-accent-line {
            height: 4px;
            background: linear-gradient(90deg, var(--lspu-blue) 0%, var(--lspu-gold) 50%, var(--lspu-blue) 100%);
        }
        .lspu-nav-pill a {
            transition: background-color .15s ease;
        }
    </style>
</head>
<body class="min-h-screen">

    <div class="lspu-hero relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 pt-12 pb-20 relative">
            <p class="text-[11px] tracking-[0.3em] uppercase font-mono-lspu" style="color: var(--lspu-gold);"></p>
            <h1 class="font-display text-4xl sm:text-5xl font-semibold text-white mt-2 leading-[1.05]">
                Laguna State Polytechnic<br class="hidden sm:block"> University
            </h1>
            <p class="text-blue-100/70 mt-3 text-sm sm:text-base">Student Registration System &middot; Office of the University Registrar</p>

            <div class="inline-flex lspu-nav-pill items-center gap-1 mt-7 bg-white/10 backdrop-blur-sm rounded-full p-1 border border-white/10">
                <a href="{{ route('students.create') }}" class="px-4 py-1.5 rounded-full text-sm text-white/90 hover:bg-white/15">Registration Form</a>
                <a href="{{ route('students.index') }}" class="px-4 py-1.5 rounded-full text-sm text-white/90 hover:bg-white/15">Student Registry</a>
            </div>
        </div>
    </div>

    <main class="max-w-4xl mx-auto px-6 -mt-12 pb-16 relative">
        <div class="lspu-card bg-white rounded-3xl overflow-hidden">
            <div class="lspu-accent-line"></div>
            <div class="p-6 sm:p-10">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="max-w-4xl mx-auto px-6 pb-10 text-center">
        <p class="text-xs text-slate-400 font-mono-lspu">
            Sta. Cruz &middot; Los Ba&ntilde;os &middot; San Pablo City &middot; Siniloan &middot; Nagcarlan
        </p>
        <p class="text-[11px] tracking-[0.15em] uppercase mt-1" style="color: var(--lspu-blue);">
            Integrity &middot; Professionalism &middot; Innovation
        </p>
    </footer>
</body>
</html>