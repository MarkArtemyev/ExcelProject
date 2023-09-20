<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка Excel</title>
</head>
<body>
    <h1>Загрузка Excel-файла</h1>
    <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file">
        <button type="submit">Загрузить</button>
    </form>
</body>
</html>
