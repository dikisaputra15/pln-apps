<?php

namespace App\Imports;

use App\Models\Rkmdetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RkmdetailImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $selectedId;

    public function __construct($selectedId)
    {
        $this->selectedId = $selectedId;
    }

    public function model(array $row)
    {
        return new Rkmdetail([
            'id_rkm'     => $this->selectedId, // ID yang dipilih
            'id_pel'   => $row['id_pel'],
            'uraian_nama' => $row['uraian_nama'],
            'tanggal'          => $this->convertDate($row['tanggal']),

        ]);
    }

    private function convertDate($excelDate)
    {
        // Cek apakah nilai adalah angka (format tanggal Excel)
        if (is_numeric($excelDate)) {
            return Date::excelToDateTimeObject($excelDate)->format('Y-m-d');
        }

        // Jika format sudah string (misal: "2024-02-06"), langsung return
        return date('Y-m-d', strtotime($excelDate));
    }
}
