<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings->nama_panti ?? 'Panti Asuhan')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .animated-bg {
            background: linear-gradient(-45deg, #dcfce7, #fef08a, #dbeafe, #f3e8ff);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        /* Prose styling for rich text editor content */
        .prose h1 { font-size: 2.25rem; font-weight: 800; margin-bottom: 1rem; color: #0f172a; }
        .prose h2 { font-size: 1.875rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #1e293b; }
        .prose h3 { font-size: 1.5rem; font-weight: 600; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #334155; }
        .prose p { margin-bottom: 1.25rem; line-height: 1.75; color: #475569; }
        .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.25rem; color: #475569; }
        .prose ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.25rem; color: #475569; }
        .prose li { margin-bottom: 0.5rem; }
        .prose strong { font-weight: 700; color: #0f172a; }
        .prose blockquote { border-left: 4px solid #cbd5e1; padding-left: 1rem; font-style: italic; color: #64748b; margin-top: 1.5rem; margin-bottom: 1.5rem; }
    </style>
    @stack('styles')
</head>
<body class="antialiased bg-slate-50 text-slate-800 selection:bg-primary-500 selection:text-white pb-10">

    <!-- Header / Navbar -->
    <x-landing.navbar :settings="$settings" />

    <!-- Main Content Wrapped by Yield -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-landing.footer :settings="$settings" />
    
    <script>
        // Navbar Smooth Scroll Effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            const navBg = document.getElementById('navbar-bg');
            if (window.scrollY > 20) {
                navBg.classList.add('bg-white/95', 'shadow-sm');
                navBg.classList.remove('border-white/30');
            } else {
                navBg.classList.remove('bg-white/95', 'shadow-sm');
                navBg.classList.add('border-white/30');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
