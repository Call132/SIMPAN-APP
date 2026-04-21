@extends('layouts.public')
@section('title', ($settings->nama_panti ?? 'Panti Asuhan') . ' | Kegiatan')

@section('content')
    <!-- Header Section -->
    <div class="relative pt-32 pb-16 overflow-hidden animated-bg flex items-center shadow-sm">
        <div class="absolute inset-0 bg-white/40 backdrop-blur-[2px]"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full z-10">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-slate-900 tracking-tight mb-4 drop-shadow-sm">
                Kegiatan <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-500">Panti</span>
            </h1>
            <p class="max-w-2xl text-lg text-slate-700 mx-auto leading-relaxed font-light">
                Potret kebersamaan dan berbagai aktivitas yang kami lakukan.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16 min-h-screen">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($kegiatanList as $kegiatan)
                @php
                    $kategoriBg = [
                        'keagamaan' => 'bg-purple-100 text-purple-700',
                        'pendidikan' => 'bg-blue-100 text-blue-700',
                        'sosial' => 'bg-emerald-100 text-emerald-700',
                        'keterampilan' => 'bg-orange-100 text-orange-700',
                        'lainnya' => 'bg-slate-100 text-slate-700'
                    ];
                    $badgeClass = $kategoriBg[$kegiatan->kategori] ?? 'bg-slate-100 text-slate-700';
                    $tanggal = \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->translatedFormat('d M Y');
                    $foto = ($kegiatan->dokumentasi && is_array($kegiatan->dokumentasi) && count($kegiatan->dokumentasi) > 0) 
                            ? Storage::url($kegiatan->dokumentasi[0]) 
                            : 'https://placehold.co/600x400/e2e8f0/64748b?text=Foto+Kegiatan';
                @endphp
                <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $foto }}" alt="{{ $kegiatan->nama_kegiatan }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="{{ $badgeClass }} text-xs font-bold px-3 py-1 rounded-full shadow-sm capitalize">
                                {{ $kegiatan->kategori }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-display font-bold text-xl text-slate-900 mb-3 group-hover:text-primary-600 transition-colors line-clamp-2">
                            {{ $kegiatan->nama_kegiatan }}
                        </h3>
                        
                        <div class="space-y-2 mt-auto">
                            <div class="flex items-center text-sm text-slate-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $tanggal }}
                            </div>
                            <div class="flex items-center text-sm text-slate-500 line-clamp-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $kegiatan->tempat }}
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 py-20 text-center bg-white rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-xl font-medium text-slate-800 mb-2">Belum ada kegiatan publik</h3>
                    <p class="text-slate-500">Kegiatan panti baru akan muncul di sini setelah dipublikasikan secara aman.</p>
                </div>
            @endforelse
        </div>
        
        @if ($kegiatanList->hasPages())
        <div class="mt-12">
            {{ $kegiatanList->links() }}
        </div>
        @endif
    </div>
@endsection
