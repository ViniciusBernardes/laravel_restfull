<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessaPlanilha;
use App\Models\Residuos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class ResiduosAPIController extends Controller
{
    //recebe a planilha e dispara a job
    function recebePlanilha(Request $request)
    {
        try
        {
            //carrega a planilha na variavel arquivo
            $arquivo = $request->file('file')->store('files');
            //dispara a job queue background
            ProcessaPlanilha::dispatch($arquivo)->delay(10);

            return Response::json("Planilha enviada com sucesso!", 200);
        } catch (\Exception $e) {
            return Response::json("Erro no envio da planinha".$e->getMessage(), 401);
        }
    }

    //mostra todos os registros
    function show()
    {
        try
        {
            $residuos = Residuos::all();
            return Response::json($residuos, 200);
        } catch (\Exception $e) {
            return Response::json($e->getMessage(), 401);
        }
    }

    //mostra o registro de acordo com id
    function showid(Request $request)
    {
        try
        {
            $residuos = Residuos::find($request->id);
            return Response::json($residuos, 200);
        } catch (\Exception $e) {
            return Response::json($e->getMessage(), 401);
        }
    }

    //edita o registro de acordo com o id
    function editar(Request $request)
    {
        try
        {
            Residuos::where("id", $request->id)->update(
                [
                    'nome'          => $request->nome,
                    'tipo'          => $request->tipo,
                    'categoria'     => $request->categoria,
                    'tratamento'    => $request->tratamento,
                    'classe'        => $request->classe,
                    'unidade'       => $request->unidade,
                    'peso'          => str_replace(',', '.', $request->peso)
                ]

            );
            return Response::json("Registro atualizado com sucesso!", 200);
        } catch (\Exception $e) {
            return Response::json($e->getMessage(), 401);
        }
    }

    //deleta o registro de acordo com id
    function deletar(Request $request)
    {
        try
        {
            Residuos::find($request->id)->delete();
            return Response::json("Registro deletado com sucesso!", 200);
        } catch (\Exception $e) {
            return Response::json("Erro ao deletar registro ".$e->getMessage(), 401);
        }
    }

    //verifica se a planilha foi enviada
    function statusPlanilhaEnviada()
    {
        $falha = DB::select('select count(*) as cont from failed_jobs');
        $aguardando = DB::select('select count(*) as cont from jobs');

        if($falha[0]->cont > 0){
            return Response::json("Erro ao processar planilha", 200);
            DB::delete('delete from failed_jobs');
        }
        else if($aguardando[0]->cont > 0)
            return Response::json("Planilha na fila de processamento", 200);
        else
            return Response::json("Planilha processada com sucesso!", 200);
    }
}
