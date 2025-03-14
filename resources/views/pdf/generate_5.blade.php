<x-pdf-layout>

    <style>
        .table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin: 12px 0;
        }

        .table th {
            border: 1px solid #333;
            font-size: 10px;
            text-align: center;
            padding: 8px;
        }

        .table td {
            border: 1px solid #333;
            font-size: 12px;
            text-align: center;
            padding: 6px;
        }

        .red {
            background-color: #ef7a82;
            color: #3b2e7e;
        }
    </style>

    <table @class(['table'])>
        <thead>
        <tr>
            @foreach($columns as $column)
                <th @style(['width: ' . $column['width'] . '%'])>{{ $column['name'] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr @class($item['class'])>
                <td>{{ $loop->iteration }}</td>
                @foreach($item['data'] as $text)
                    <td>{{ $text }}</td>
                @endforeach
                @for($i = 0; $i < (count($columns) - 1) - count($item['data']); $i++)
                    <td></td>
                @endfor
            </tr>
        @endforeach
        </tbody>
    </table>

</x-pdf-layout>
