<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function index()
    {
        return view('excel-import-form');
    }

    public function store(Request $request)
    {
        // Здесь вы будете обрабатывать загруженный файл Excel и сохранять данные в БД.
        // Используйте пакет для парсинга Excel, который вы выбрали вместо maatwebsite/excel.

        // После сохранения данных, вы можете добавить событие (event), если необходимо.

        return redirect()->route('import.index')->with('success', 'Excel-файл успешно обработан и данные сохранены.');
    }
}
