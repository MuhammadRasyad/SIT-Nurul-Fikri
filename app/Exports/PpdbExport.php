<?php

namespace App\Exports;

use App\Models\Ppdb;
use Maatwebsite\Excel\Concerns\FromCollection;

class PpdbExport implements FromCollection
{
    protected $ppdb_id;

    public function __construct($ppdb_id)
    {
        $this->ppdb_id = $ppdb_id;
    }

    public function collection()
    {
        // Fetch PPDB and related applicants data
        return Ppdb::findOrFail($this->ppdb_id)
                   ->units()
                   ->with('applicants') // Include applicants data
                   ->get();
    }
}
