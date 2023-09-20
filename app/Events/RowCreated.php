<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RowImported
{
    use Dispatchable, SerializesModels;

    public $row;

    public function __construct($row)
    {
        $this->row = $row;
    }
}

// Контроллер, где запись добавляется в таблицу rows
use App\Events\RowImported;
use App\Row;

class RowController extends Controller
{
    public function store(Request $request)
    {
        // Ваш код для сохранения записи

        // Отправка события, когда запись добавлена
        event(new RowImported($row));

        return response()->json($row);
    }
}
