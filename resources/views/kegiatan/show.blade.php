@extends('layouts.public')
@section('title', $kegiatan->nama_kegiatan . ' | Panti Asuhan')

@section('content')
    <!-- Detail Header -->
    <div class="bg-white border-b border-slate-100 pt-32 pb-12 rounded-b-3xl shadow-sm relative z-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $kategoriBg = [
                    'keagamaan' => 'bg-purple-100 text-purple-700',
                    'pendidikan' => 'bg-blue-100 text-blue-700',
                    'sosial' => 'bg-emerald-100 text-emerald-700',
                    'keterampilan' => 'bg-orange-100 text-orange-700',
                    'lainnya' => 'bg-slate-100 text-slate-700'
                ];
                $badgeClass = $kategoriBg[$kegiatan->kategori] ?? 'bg-slate-100 text-slate-700';
            @endphp
            
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('kegiatan.public') }}" class="text-slate-400 hover:text-primary-600 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
                <span class="{{ $badgeClass }} px-3 py-1 rounded-full text-xs font-bold capitalize">
                    {{ $kegiatan->kategori }}
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-display font-bold text-slate-900 mb-6 leading-tight">
                {{ $kegiatan->nama_kegiatan }}
            </h1>
            
            <div class="flex flex-wrap gap-6 text-sm text-slate-600">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->translatedFormat('l, d M Y') }}
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('H:i') }} WIB
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $kegiatan->tempat }}
                </div>
                @if($kegiatan->penanggung_jawab)
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    {{ $kegiatan->penanggung_jawab }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Content Body -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-20 -translate-y-6 relative z-0">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
            
            <!-- Photo Gallery Grid -->
            @if($kegiatan->dokumentasi && is_array($kegiatan->dokumentasi) && count($kegiatan->dokumentasi) > 0)
                <div class="mb-12">
                    <h2 class="text-xl font-bold font-display text-slate-800 mb-6">Dokumentasi</h2>
                    <div class="grid grid-cols-1 {{ count($kegiatan->dokumentasi) > 1 ? 'md:grid-cols-2' : '' }} gap-4">
                        @foreach($kegiatan->dokumentasi as $foto)
                            <div class="relative rounded-xl overflow-hidden shadow-sm aspect-video bg-slate-100">
                                <img src="{{ Storage::url($foto) }}" alt="Dokumentasi {{ $kegiatan->nama_kegiatan }}" class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr class="border-slate-100 mb-12">
            @else
                <div class="mb-12">
                    <div class="relative rounded-2xl overflow-hidden shadow-sm aspect-[21/9] bg-slate-100 flex items-center justify-center">
                        <img src="https://placehold.co/1200x600/e2e8f0/64748b?text=Belum+Ada+Foto" alt="Placeholder {{ $kegiatan->nama_kegiatan }}" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-multiply">
                        <div class="relative z-10 text-center px-4 flex flex-col items-center">
                            <span class="inline-flex p-4 shadow-sm bg-white rounded-full mb-4 text-slate-400 border border-slate-100">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </span>
                            <p class="text-slate-600 font-medium text-lg text-shadow-sm">Dokumentasi kegiatan belum ditambahkan</p>
                        </div>
                    </div>
                </div>
                <hr class="border-slate-100 mb-12">
            @endif

            <h2 class="text-xl font-bold font-display text-slate-800 mb-6">Deskripsi Kegiatan</h2>
            <div class="prose max-w-none prose-slate prose-img:rounded-xl">
                @if($kegiatan->deskripsi)
                    {!! $kegiatan->deskripsi !!}
                @else
                    <p class="text-slate-500 italic">Tidak ada deskripsi rinci untuk kegiatan ini.</p>
                @endif
            </div>
            
        </div>
    </div>
@endsection
