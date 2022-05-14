<?php $i = 0; ?>
@foreach($histories as $row)
    <tr>
        <td>{{ ++$i }}</td>
        <td sort-val="{{ $row->created_at }}">{{ date("d-m-Y H:i", strtotime($row->created_at)) }}</td>
        <td class="text-end">{{ number_format($row->sum, 2, ",", " ") }}</td>
        <td>{{ $row->comments }}</td>
    </tr>
@endforeach
