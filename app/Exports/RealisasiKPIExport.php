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
            'id',
            'id_unit_induk',
            'id_pelaksana',
            'id_layanan',
            'id_indikator_kpi',
            'nama_sub_kpi',
            'bulan',
            'target',
            'realisasi',
            'pencapaian',
            'Nilai',
            'Status',
            'Penjelasan'
        ];
    }

    public function array(): array
    {
        $result = [];

        foreach ($this->data as $row) {
            $result[] = [
                $row->id,
                $row->id_unit_induk,
                $row->id_pelaksana,
                $row->id_layanan,
                $row->id_indikator_kpi,
                $row->nama_sub_kpi,
                $row->bulan,
                $row->target,
                $row->realisasi,
                $row->pencapaian,
                $row->nilai,
                $row->status,
                $row->penjelasan,
            ];
        }

        return $result;
    }

}
