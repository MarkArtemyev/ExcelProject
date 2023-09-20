<?php
namespace App\Jobs;

use App\Row;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ParseExcelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $excelFilePath;

    public function __construct($excelFilePath)
    {
        $this->excelFilePath = $excelFilePath;
    }

    public function handle()
    {
        // Парсинг Excel-файла и сохранение данных в базу данных
        Excel::import(new YourExcelImportClass(), $this->excelFilePath);
        
        // Обновление информации о количестве обработанных строк в Redis
        $progressKey = 'excel_import_progress';
        redis()->incr($progressKey); // Увеличиваем счетчик
    }
}
