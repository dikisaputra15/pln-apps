<?php

namespace App\Exports;

use App\Models\Realkpi;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RealisasiKPIExport implements FromArray, WithHeadings, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Jenis Indikator',
            'Unit Induk',
            'Unit Pelaksana',
            'Unit Layanan',
            'Indikator Kinerja / Sub KPI',
            'Bobot',
            'Polaritas',
            'Tahun',
            'Bulan',
            'Target',
            'Realisasi',
            'Pencapaian',
            'Nilai',
            'Status',
            'Penjelasan'
        ];
    }

    public function array(): array
    {
        $exportData = [];

        foreach ($this->data as $jenisIndikator => $kpiGroup) {
            // Tambahkan header Jenis Indikator
            $exportData[] = [$jenisIndikator, '', '', '', '', '', '', '', '', '', '', '', ''];

            foreach ($kpiGroup as $kpi_id => $items) {
                $firstItem = $items->first();

                // Tambahkan baris KPI utama
                $exportData[] = [
                    '', // Kosongkan kolom Jenis Indikator untuk data berikutnya
                    $firstItem->unit_induk,
                    $firstItem->unit_pelaksana,
                    $firstItem->unit_layanan,
                    $firstItem->indikator_kinerja,
                    $firstItem->bobot,
                    $firstItem->polaritas,
                    $firstItem->tahun,
                    $firstItem->bulan,
                    $firstItem->target ?? 0,
                    $firstItem->realisasi ?? 0,
                    $firstItem->target ?? 0,
                    $firstItem->nilai ?? 0,
                    $firstItem->status ?? 'Belum',
                    $firstItem->penjelasan ?? ''
                ];

                // Tambahkan Sub KPI jika ada
                foreach ($items as $item) {
                    if (!empty($item->nama_sub_kpi)) {
                        $exportData[] = [
                            '', // Kosongkan kolom Jenis Indikator
                            '',
                            '',
                            '',
                            '- ' . $item->nama_sub_kpi, // Menampilkan sub KPI dengan indentasi "-"
                            $item->bobot,
                            $item->polaritas,
                            $item->tahun,
                            $item->bulan,
                            $item->target ?? 0,
                            $item->realisasi ?? 0,
                            $item->target ?? 0,
                            $item->nilai ?? 0,
                            $item->status ?? 'Belum',
                            $item->penjelasan ?? ''
                        ];
                    }
                }
            }
        }

        return $exportData;
    }

}
