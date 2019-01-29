@extends('Zoroaster::layout')

@section('content')

    <h1 class="resourceName">مشاهدی خطاها</h1>

    <div class="card-tool">
        <table class="uk-table dataTables uk-table-middle">
            <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="uk-text-center">{{ $header }}</th>
                @endforeach


                <th style="width: 134px;text-align: center">
                    عملیات
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach ($rows->items() as $row)
                <tr>
                    @foreach ($row as $item)
                        <td class="uk-text-center">{{ $item }}</td>
                    @endforeach

                    <td class="action_btn" style="width: 134px;text-align: center">
                        <a uk-icon="view" href="{{ route('Zoroaster-log-viewer.showByLevel',['date'=>$row['date'],'lavel'=>'all']) }}"></a>
                        <a uk-icon="download-2" href="{{ route('Zoroaster-log-viewer.download',[$row['date']]) }}"></a>
                        <button uk-icon="delete" date="{{ $row['date'] }}" data-href="{{ route('Zoroaster-log-viewer.delete') }}?date={{ $row['date'] }}"></button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        @include('Zoroaster::paginate.data',['data'=>$rows])

    </div>

    <script>
        click('.action_btn [uk-icon="delete"]', function ($this) {
            var url = $($this).attr('data-href');
            var date = $($this).attr('date');
            Confirm_delete('حذف خطای ' + date, function () {
                window.location.href = url;
            })
        })
    </script>

@endsection