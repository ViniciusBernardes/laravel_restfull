<?php

namespace App\Imports;

use App\Models\Residuos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportResiduos implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //cadastra no banco de dados de acordo com o titulo (espaços sao convertidos em underline)
        return new Residuos([
           'nome'        => $row['nome_comum_do_residuo'],
           'tipo'        => $row['tipo_de_residuo'],
           'categoria'   => $row['categoria'],
           'tratamento'  => $row['tecnologia_de_tratamento'],
           'classe'      => $row['classe'],
           'unidade'     => $row['unidade_de_medida'],
           'peso'        => $row['peso']
        ]);
    }

    //informa a linha na planilha que está o titulo.
    public function headingRow(): int
    {
        return 5;
    }
}
