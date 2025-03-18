<?php

namespace App\Imports;

use App\Models\Realkpi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RealisasiKPIImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Realkpi::updateOrCreate(
            [
                'id' => $row['id']
            ],
            [
                'id_unit_induk' => $row['id_unit_induk'],
                'id_pelaksana' => $row['id_pelaksana'],
                'id_layanan' => $row['id_layanan'],
                'id_indikator_kpi' => $row['id_indikator_kpi'],
                'nama_sub_kpi' => $row['nama_sub_kpi'],
                'bulan' => $row['bulan'],
                'target' => $row['target'],
                'realisasi' => $row['realisasi'],
                'pencapaian' => $row['pencapaian'],
                'nilai' => $row['nilai'],
                'status' => $row['status'],
                'penjelasan' => $row['penjelasan'],
            ]
        );
    }
}
