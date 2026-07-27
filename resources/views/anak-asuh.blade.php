@extends('layouts.public')
@section('title', ($settings->nama_panti ?: 'Panti Asuhan') . ' | Anak Asuh')
@section('content')
    <!-- Header Section -->
    <div class="relative pt-32 pb-16 overflow-hidden animated-bg flex items-center shadow-sm">
        <div class="absolute inset-0 bg-white/40 backdrop-blur-[2px]"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full z-10">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-slate-900 tracking-tight mb-4 drop-shadow-sm">
                Anak Asuh <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-500">Kami</span>
            </h1>
            <p class="max-w-2xl text-lg text-slate-700 mx-auto leading-relaxed font-light">
                Kenali putra-putri asuh kami yang terus bersemangat meraih cita-cita bersama.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-12 min-h-screen">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @forelse ($anakAsuhList as $anak)
                    @php
                        $namaTampil = $anak->nama_panggilan ?: $anak->nama_lengkap;
                        $namaAvatar = $anak->nama_panggilan ?: 'Anak';
                        $umur = $anak->tanggal_lahir ? \Carbon\Carbon::parse($anak->tanggal_lahir)->age : '?';
                        $jenisKelamin = strtolower($anak->jenis_kelamin) == 'laki-laki' || strtolower($anak->jenis_kelamin) == 'l' ? 'Laki-laki' : 'Perempuan';
                    @endphp
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300 p-6 flex flex-col items-center text-center">
                        <img 
                            src="https://ui-avatars.com/api/?name={{ urlencode($namaAvatar) }}&background=6777ef&color=fff&size=128" 
                            alt="{{ $namaTampil }}" 
                            class="w-24 h-24 rounded-full mb-4 shadow-sm border-2 border-slate-50"
                        >
                        
                        <h3 class="font-semibold text-lg text-slate-900 mb-1 leading-tight">{{ $namaTampil }}</h3>
                        <p class="text-sm text-slate-500 mb-3">{{ $umur }} Tahun</p>
                        
                        <div class="w-full space-y-2 mt-auto">
                        
                        <div class="flex justify-center mt-3">
                            @if($jenisKelamin == 'Laki-laki')
                                <span class="bg-blue-50 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full border border-blue-100">
                                    Laki-laki
                                </span>
                            @else
                                <span class="bg-pink-50 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full border border-pink-100">
                                    Perempuan
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 lg:col-span-4 py-16 text-center bg-white rounded-xl shadow-sm border border-slate-100">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <p class="text-slate-500 font-medium">Belum ada data anak asuh untuk publik.</p>
                </div>
            @endforelse
        </div>
        
        @if ($anakAsuhList->hasPages())
        <div class="mt-10">
            {{ $anakAsuhList->links() }}
        </div>
        @endif
    </div>
@endsection
