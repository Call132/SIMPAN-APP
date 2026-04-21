@props(['totalAnak', 'donasiBulanIni', 'programAktif'])

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
