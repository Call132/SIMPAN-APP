@extends('layouts.public')
@section('title', ($settings->nama_panti ?: 'Panti Asuhan') . ' | Berikan Harapan')
@section('content')
    <!-- Hero Section -->
    <x-landing.hero :settings="$settings" />

    <!-- Stats Section -->
    <x-landing.stats :total-anak="$totalAnak" :donasi-bulan-ini="$donasiBulanIni" :program-aktif="$programAktif" />

    <!-- Contact & Map Section -->

    <!-- Recent Donations & CTA -->
    <div class="py-24 bg-slate-50 border-t border-slate-100" id="donasi">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-landing.recent-donations :donasi-terbaru="$donasiTerbaru" />

            <!-- CTA Section -->
            <x-landing.cta :settings="$settings" />
        </div>
    </div>
    <x-landing.contact :settings="$settings" />
@endsection