@extends('layouts.public')
@section('title', ($settings->nama_panti ?: 'Panti Asuhan') . ' | Tentang Kami')
@section('content')
    <!-- Header Section -->
    <div class="relative pt-32 pb-16 overflow-hidden animated-bg flex items-center shadow-sm">
        <div class="absolute inset-0 bg-white/40 backdrop-blur-[2px]"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full z-10">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-slate-900 tracking-tight mb-4 drop-shadow-sm">
                Tentang <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-500">Kami</span>
            </h1>
            <p class="max-w-2xl text-lg text-slate-700 mx-auto leading-relaxed font-light">
                Mengenal lebih dekat perjalanan, misi, dan harapan panti asuhan kami.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16 min-h-screen space-y-8">

        @if($settings->logo_path)
            <div class="flex justify-center mb-6">
                <img src="{{ Storage::url($settings->logo_path) }}" alt="{{ $settings->nama_panti }}"
                    class="w-32 h-32 rounded-full object-cover shadow-md border-4 border-white">
            </div>
        @endif

        <!-- Card Sejarah -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-10 relative overflow-hidden transition-all hover:shadow-md">
            <div class="absolute top-0 left-0 w-2 h-full bg-blue-500"></div>
            <h2 class="text-2xl font-display font-bold text-slate-900 mb-6 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 shadow-sm border border-blue-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6l4 2M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                Sejarah Singkat
            </h2>
            <div class="prose max-w-none prose-slate">
                {!! $settings->sejarah_panti ?? '<p class="text-slate-500 italic">Belum ada data sejarah singkat.</p>' !!}
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 relative overflow-hidden transition-all hover:shadow-md">
                <div class="absolute top-0 left-0 w-2 h-full bg-emerald-500"></div>
                <h2 class="text-2xl font-display font-bold text-slate-900 mb-6 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 shadow-sm border border-emerald-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    Visi
                </h2>
                <div class="prose max-w-none prose-slate text-justify">
                    {!! $settings->visi_panti ?? '<p class="text-slate-500 italic">Belum ada data visi.</p>' !!}
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 relative overflow-hidden transition-all hover:shadow-md">
                <div class="absolute top-0 left-0 w-2 h-full bg-orange-500"></div>
                <h2 class="text-2xl font-display font-bold text-slate-900 mb-6 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 shadow-sm border border-orange-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    Misi
                </h2>
                <div class="prose max-w-none prose-slate prose-li:marker:text-orange-500 text-justify">
                    {!! $settings->misi_panti ?? '<p class="text-slate-500 italic">Belum ada data misi.</p>' !!}
                </div>
            </div>
        </div>
    </div>
@endsection