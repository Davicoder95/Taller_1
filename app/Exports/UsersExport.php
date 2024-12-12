<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection
{

    public function collection()
{
    return DB::table('users')
        ->join('countries', 'users.country_id', '=', 'countries.id')
        ->select('users.id','users.name', 'users.lastname', 'users.gender', 'users.phone', 'users.email', 'countries.name as country', 'users.created_at')
        ->get();
}

public function headings(): array
{
    return ['Id','Nombre', 'Apellido', 'Género', 'Teléfono', 'Correo Electrónico', 'País', 'Fecha de Creación'];
}
}
