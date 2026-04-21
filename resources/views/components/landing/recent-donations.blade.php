@props(['donasiTerbaru'])

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
