@php
    $record = $getRecord();
    $monitorings = $record ? $record->monitorings : collect();
@endphp

<div class="space-y-4">
    @if($monitorings->isEmpty())
        <div class="flex flex-col items-center justify-center p-8 text-center rounded-xl border border-dashed border-gray-300 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/30">
            <div class="p-3 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-500 mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                </svg>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Belum ada catatan observasi untuk anak ini.
            </p>
            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                Gunakan tombol "Tambah Monitoring" di bagian atas untuk menambahkan riwayat observasi.
            </p>
        </div>
    @else
        <div class="relative pl-6 border-l-2 border-primary-200 dark:border-primary-800 space-y-6 my-2">
            @foreach($monitorings as $item)
                <div class="relative group">
                    <div class="absolute -left-[31px] top-1.5 w-4 h-4 rounded-full bg-primary-500 ring-4 ring-white dark:ring-gray-900 border-2 border-white"></div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm border border-gray-100 dark:border-gray-700/60 transition hover:shadow-md">
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-primary-50 text-primary-700 dark:bg-primary-950 dark:text-primary-300">
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </span>
                            <span class="text-[11px] text-gray-400 dark:text-gray-500">
                                {{ $item->created_at ? $item->created_at->diffForHumans() : '' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-line leading-relaxed">
                            {{ $item->catatan }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
