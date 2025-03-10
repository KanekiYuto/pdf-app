<style>
    .table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        margin: 12px 0;
    }

    .table th {
        border: 1px solid #333;
        font-size: 15px;
        text-align: center;
        padding: 0 8px;
    }

    .table td {
        border: 1px solid #333;
        font-size: 15px;
        text-align: center;
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
        <tr>
            <td>{{ $loop->iteration }}</td>
            @foreach($item as $text)
                <td>{{ $text }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
