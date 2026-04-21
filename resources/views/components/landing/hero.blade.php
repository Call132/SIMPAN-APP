@props(['settings'])

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
