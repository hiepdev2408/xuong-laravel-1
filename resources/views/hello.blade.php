<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Câu 1:</h2>
        <table class="table">
            <tr>
                <th>Năm</th>
                <th>Tháng</th>
                <th>Tổng doanh thu</th>
            </tr>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->year }}</td>
                    <td>{{ $sale->month }}</td>
                    <td>{{ number_format($sale->total_sales) }}</td>
                </tr>
            @endforeach
        </table>
        <hr>
        <h2 class="mt-5">Câu 2:</h2>
        <table class="table">
            <tr>
                <th>Năm</th>
                <th>Tháng</th>
                <th>Tổng chi phí</th>
            </tr>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->year }}</td>
                    <td>{{ $expense->month }}</td>
                    <td>{{ number_format($expense->total_expenses) }}</td>
                </tr>
            @endforeach
        </table>
        <hr>
        <h2 class="mt-5">Câu 3:</h2>
        
    </div>
</body>
</html>

