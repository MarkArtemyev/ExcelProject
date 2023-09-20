<?php
namespace App\Http\Controllers;

use App\Row;
use Illuminate\Http\Request;

class RowController extends Controller
{
    public function index()
    {
        // Выборка данных с группировкой по дате
        $data = Row::selectRaw('DATE(date) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        return response()->json($data);
    }
}
