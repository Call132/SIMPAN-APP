@props(['settings'])

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
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('home') }}" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Beranda</a>
                        <a href="{{ route('tentang.public') }}" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Tentang Kami</a>
                        <a href="{{ route('anak-asuh.public') }}" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Anak Asuh</a>
                        <a href="{{ route('kegiatan.public') }}" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Kegiatan</a>
                        <a href="{{ route('home') }}#donasi" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Donasi</a>
                        <a href="{{ route('home') }}#kontak" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Kontak</a>
                        <a href="#donasi-sekarang" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2.5 rounded-full font-medium transition-all transform hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary-500/30">Donasi Sekarang</a>
                        <a href="{{ url('/dashboard') }}" class="border border-slate-300 hover:border-primary-600 text-slate-700 hover:text-primary-600 px-4 py-2 rounded-full font-medium transition-all text-sm">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
