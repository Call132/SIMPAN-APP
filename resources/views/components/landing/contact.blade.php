@props(['settings'])

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
