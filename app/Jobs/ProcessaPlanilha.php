<?php

namespace App\Jobs;

use App\Imports\ImportResiduos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ProcessaPlanilha implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $arq;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($arquivo)
    {
        $this->arq = $arquivo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Carrega o arquivo e importa no banco de dados através do ImportResiduos
        //foi utilizado Maatwebsite para manipulaçao da planilha excel
        Excel::Import(new ImportResiduos, $this->arq);
    }
}
