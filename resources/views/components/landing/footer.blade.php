@props(['settings'])

    <footer class="bg-white py-12 border-t border-slate-100 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center gap-3 mb-6">
                @if($settings->logo_path)
                    <img src="{{ Storage::url($settings->logo_path) }}" alt="{{ $settings->nama_panti }}" class="w-8 h-8 rounded-full object-cover">
                @else
                    <div class="w-8 h-8 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-sm">
                        {{ substr(trim($settings->nama_panti), 0, 1) }}
                    </div>
                @endif
                <span class="font-display font-medium text-xl text-slate-800">{{ $settings->nama_panti }}</span>
            </div>
            <p class="text-slate-500 text-sm">© {{ date('Y') }} Hak cipta dilindungi undang-undang. Platform Manajemen SIMPAN.</p>
        </div>
    </footer>
