<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->nama_panti ?: 'Panti Asuhan' }} | Berikan Harapan</title>
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
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800 selection:bg-primary-500 selection:text-white">

    <!-- Header / Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
        <div class="glass-panel border-b border-white/30 transition-all duration-300" id="navbar-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-3">
                        @if($settings->logo_path)
                            <img src="{{ Storage::url($settings->logo_path) }}" alt="{{ $settings->nama_panti }}" class="w-11 h-11 rounded-full object-cover ring-2 ring-white/50">
                        @else
                            <div class="w-11 h-11 rounded-full bg-gradient-to-tr from-primary-500 to-emerald-300 flex items-center justify-center text-white font-bold text-xl shadow-lg ring-4 ring-white/50">
                                {{ substr(trim($settings->nama_panti), 0, 1) }}
                            </div>
                        @endif
                        <span class="font-display font-bold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600">{{ collect(explode(' ', $settings->nama_panti))->last() ?? 'Amanah' }}</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Beranda</a>
                        <a href="#kontak" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Kontak</a>
                        <a href="#donasi" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Aktivitas</a>
                        <a href="/dashboard" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Portal Pengurus</a>
                        <a href="#donasi-sekarang" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2.5 rounded-full font-medium transition-all transform hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary-500/30">Layanan Sosial</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden animated-bg min-h-screen flex items-center">
        <div class="absolute inset-0 bg-white/40 backdrop-blur-[2px]"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full z-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 border border-white shadow-sm mb-8 animate-bounce mt-10 md:mt-0">
                <span class="flex h-2.5 w-2.5 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary-500"></span>
                </span>
                <span class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Bersama Menebar Manfaat</span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-display font-bold text-slate-900 tracking-tight mb-8 drop-shadow-sm leading-tight">
                {{ collect(explode(' ', $settings->nama_panti))->slice(0, -1)->join(' ') }} <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-500">{{ collect(explode(' ', $settings->nama_panti))->last() ?? 'Panti' }}</span>
            </h1>
            
            <p class="mt-4 max-w-2xl text-lg md:text-xl text-slate-700 mx-auto mb-12 leading-relaxed font-light">
                Bantu kami menyediakan tempat tinggal layak, pendidikan berkualitas, dan kasih sayang tulus untuk anak-anak yang membutuhkan di {{ $settings->nama_panti }}.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#donasi-sekarang" class="px-8 py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-full font-medium text-lg transition-all transform hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-900/20 flex items-center justify-center gap-2">
                    Mulai Berdonasi
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="#kontak" class="px-8 py-4 bg-white/80 backdrop-blur-sm hover:bg-white text-slate-800 rounded-full font-medium text-lg border border-slate-200 transition-all transform hover:-translate-y-1 hover:shadow-lg flex items-center justify-center">
                    Hubungi Pengurus
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat 1 -->
            <div class="bg-white/90 backdrop-blur-xl p-8 border border-slate-100 rounded-3xl shadow-xl shadow-slate-200/50 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl group">
                <div class="w-14 h-14 bg-blue-50 group-hover:bg-blue-100 transition-colors rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-display font-bold text-slate-900 mb-2">{{ $totalAnak }}</h3>
                <p class="text-slate-500 font-medium">Anak Asuh Aktif</p>
                <div class="w-full h-1 bg-slate-100 mt-6 rounded-full overflow-hidden">
                    <div class="w-3/4 h-full bg-blue-500"></div>
                </div>
            </div>
            
            <!-- Stat 2 -->
            <div class="bg-white/90 backdrop-blur-xl p-8 border border-slate-100 rounded-3xl shadow-xl shadow-slate-200/50 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl group">
                <div class="w-14 h-14 bg-emerald-50 group-hover:bg-emerald-100 transition-colors rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-3xl font-display font-bold text-emerald-600 mb-2">Rp {{ number_format($donasiBulanIni, 0, ',', '.') }}</h3>
                <p class="text-slate-500 font-medium">Terkumpul Bulan Ini</p>
                <div class="w-full h-1 bg-slate-100 mt-6 rounded-full overflow-hidden">
                    <div class="w-2/4 h-full bg-emerald-500 animate-[pulse_2s_ease-in-out_infinite]"></div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white/90 backdrop-blur-xl p-8 border border-slate-100 rounded-3xl shadow-xl shadow-slate-200/50 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl group">
                <div class="w-14 h-14 bg-purple-50 group-hover:bg-purple-100 transition-colors rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-4xl font-display font-bold text-slate-900 mb-2">{{ $programAktif }}</h3>
                <p class="text-slate-500 font-medium">Program Aktif</p>
                <div class="w-full h-1 bg-slate-100 mt-6 rounded-full overflow-hidden">
                    <div class="w-full h-full bg-purple-500"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Map Section -->
    <div class="py-24 bg-white" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-display font-bold text-slate-900 mb-6">Informasi & Kontak</h2>
                    <p class="text-slate-600 mb-10 text-lg leading-relaxed">Pintu {{ $settings->nama_panti }} selalu terbuka bagi Anda yang ingin berkunjung dan berbagi kebahagiaan secara langsung bersama anak-anak asuh kami.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center justify-center text-primary-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg mb-1">Alamat Lengkap</h4>
                                <p class="text-slate-600">{{ $settings->alamat }}<br>{{ $settings->kota }} - {{ $settings->kode_pos }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl border border-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg mb-1">Telepon & WhatsApp</h4>
                                <p class="text-slate-600">{{ $settings->telepon }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-rose-50 rounded-2xl border border-rose-100 flex items-center justify-center text-rose-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-lg mb-1">Alamat Email</h4>
                                <p class="text-slate-600">{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($settings->maps_embed_url)
                <div class="w-full h-96 rounded-3xl overflow-hidden shadow-xl border border-slate-200">
                    <iframe src="{{ $settings->maps_embed_url }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Donations -->
    <div class="py-24 bg-slate-50 border-t border-slate-100" id="donasi">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-display font-bold text-slate-900 mb-4">Aksi Kebaikan Terbaru</h2>
                    <p class="text-lg text-slate-500 max-w-xl">Daftar para dermawan yang telah menyisihkan rezekinya untuk mendukung kebutuhan panti asuhan kami.</p>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-slate-50/80 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider grid grid-cols-12 gap-4">
                    <div class="col-span-6 md:col-span-5">Donatur</div>
                    <div class="col-span-3 hidden md:block">Tanggal</div>
                    <div class="col-span-6 md:col-span-4 text-right">Jumlah</div>
                </div>
                
                <ul class="divide-y divide-slate-100 bg-white">
                    @forelse ($donasiTerbaru as $donasi)
                    <li class="p-6 transition-all hover:bg-slate-50">
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <div class="col-span-6 md:col-span-5 flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center text-emerald-700 font-bold text-lg shadow-sm border border-emerald-200">
                                    {{ substr(optional($donasi->donatur)->nama ?? 'A', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-slate-900">
                                        {{ optional($donasi->donatur)->nama ?? 'Hamba Allah' }}
                                    </h4>
                                    <p class="text-xs text-primary-600 font-medium uppercase tracking-wide mt-0.5">Donasi Berhasil</p>
                                </div>
                            </div>
                            <div class="col-span-3 hidden md:block text-slate-500 font-medium">
                                {{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->translatedFormat('d M Y') }}
                            </div>
                            <div class="col-span-6 md:col-span-4 text-right">
                                <span class="inline-flex items-end flex-col">
                                    <span class="text-xl font-bold font-display text-emerald-600">
                                        Rp {{ number_format($donasi->jumlah_uang, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs text-slate-400 mt-1 block md:hidden">{{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->translatedFormat('d M Y') }}</span>
                                </span>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="py-16 text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada data donasi yang divalidasi ke dalam sistem publik.</p>
                    </li>
                    @endforelse
                </ul>
            </div>

            <!-- CTA Section -->
            <div id="donasi-sekarang" class="mt-20 bg-slate-900 rounded-3xl p-10 md:p-14 text-center relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-tr from-primary-900/40 to-teal-900/40 opacity-80 border border-white/10 rounded-3xl"></div>
                <div class="relative z-10 max-w-3xl mx-auto">
                    <h3 class="text-3xl md:text-5xl font-display font-bold text-white mb-6">Mari Wujudkan Senyum Mereka</h3>
                    <p class="text-slate-300 text-lg mb-10 leading-relaxed">Bantuan sekecil apapun akan sangat berarti. Salurkan sedekah dan donasi terbaik Anda langsung melalui rekening resmi kami di bawah ini.</p>
                    
                    <div class="grid md:grid-cols-2 gap-6 mt-10">
                        @if($settings->nomor_rekening_bank_a)
                        <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-md border border-white/20 text-left hover:bg-white/15 transition duration-300">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-sm text-primary-300 font-bold tracking-wider uppercase">Bank Tujuan Pembayaran</span>
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            </div>
                            <div class="text-2xl font-bold font-display text-white tracking-widest my-1">{{ $settings->nomor_rekening_bank_a }}</div>
                            <div class="text-base text-white/90 mt-2 font-medium">{{ $settings->nama_bank_a }}</div>
                            <div class="text-sm text-slate-300">a.n. {{ $settings->atas_nama_bank_a }}</div>
                        </div>
                        @endif

                        @if($settings->nomor_rekening_bank_b)
                        <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-md border border-white/20 text-left hover:bg-white/15 transition duration-300">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-sm text-primary-300 font-bold tracking-wider uppercase">Bank Tujuan Alternatif</span>
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            </div>
                            <div class="text-2xl font-bold font-display text-white tracking-widest my-1">{{ $settings->nomor_rekening_bank_b }}</div>
                            <div class="text-base text-white/90 mt-2 font-medium">{{ $settings->nama_bank_b }}</div>
                            <div class="text-sm text-slate-300">a.n. {{ $settings->atas_nama_bank_b }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-12 border-t border-slate-100 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center gap-3 mb-6">
                @if($settings->logo_path)
                    <img src="{{ Storage::url($settings->logo_path) }}" alt="{{ $settings->nama_panti }}" class="w-8 h-8 rounded-full object-cover">
                @else
                    <div class="w-8 h-8 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-sm">
                        {{ substr(trim($settings->nama_panti), 0, 1) }}
                    </div>
                @endif
                <span class="font-display font-medium text-xl text-slate-800">{{ $settings->nama_panti }}</span>
            </div>
            <p class="text-slate-500 text-sm">© {{ date('Y') }} Hak cipta dilindungi undang-undang. Platform Manajemen SIMPAN.</p>
        </div>
    </footer>
    
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
</body>
</html>
