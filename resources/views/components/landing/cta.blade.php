@props(['settings'])

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
