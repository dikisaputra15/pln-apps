<?php

namespace App\Exports;

use App\Models\Realkpi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RealisasiKPIExport implements FromQuery, WithHeadings,  WithMapping, ShouldAutoSize
{

    public function query()
    {
        return Realkpi::query()->select([
            'id', 'id_unit_induk', 'id_pelaksana', 'id_layanan', 'id_indikator_kpi',
            'bulan', 'target', 'realisasi', 'pencapaian', 'nilai', 'status',
            'penjelasan'
        ]);
    }

    public function headings(): array
    {
        return [
            'id', 'id_unit_induk', 'id_pelaksana', 'id_layanan', 'id_indikator_kpi',
            'bulan', 'target', 'realisasi', 'pencapaian', 'nilai', 'status',
            'penjelasan'
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->id_unit_induk,
            $row->id_pelaksana,
            $row->id_layanan,
            $row->id_indikator_kpi,
            $row->bulan,
            $row->target ?? 0,
            $row->realisasi ?? 0,
            $row->pencapaian ?? 0,
            $row->nilai ?? 0,
            $row->status,
            $row->penjelasan,
        ];
    }

}
