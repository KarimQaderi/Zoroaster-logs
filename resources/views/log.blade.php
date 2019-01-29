@extends('Zoroaster::layout')

@section('content')

    <div class="uk-child-width-1-2 resourceName_2 view_Details" uk-grid>
        <div>
            <h1 class="resourceName">مشاهدی خطای [ {{ $log->createdAt()->format('Y-m-d') }} ]</h1>
        </div>
        <div class="uk-text-left ResourceActions">
            <a uk-icon="download-2" href="{{ route('Zoroaster-log-viewer.download',[$log->createdAt()->format('Y-m-d')]) }}"></a>
            <button uk-icon="delete" date="{{ $log->createdAt()->format('Y-m-d') }}"
                    data-href="{{ route('Zoroaster-log-viewer.delete') }}?date={{ $log->createdAt()->format('Y-m-d') }}"></button>
        </div>
    </div>
    <div class="card-w uk-padding-small">
        <h1 class="resourceName">اطلاعات</h1>
        <table class="uk-table uk-table-middle">
            <tr>
                <td class="uk-text-right">مسیر فایل :</td>
                <td class="uk-text-right">{{ $info['path'] }}</td>
            </tr>
            <tr>
                <td class="uk-text-right">تعداد :</td>
                <td class="uk-text-right">{{ $info['entries'] }}</td>
            </tr>
            <tr>
                <td class="uk-text-right">حجم :</td>
                <td class="uk-text-right">{{ $info['size'] }}</td>
            </tr>
            <tr>
                <td class="uk-text-right">تاریخ ساخت :</td>
                <td class="uk-text-right">{{ $info['created_at'] }}</td>
            </tr>
            <tr>
                <td class="uk-text-right">به روز شده در :</td>
                <td class="uk-text-right">{{ $info['updated_at'] }}</td>
            </tr>
        </table>
    </div>

    <br>
    <div class="card-tool">
        <table class="uk-table dataTables uk-table-middle">
            <thead>
            <tr>
                <th style="width: 134px;text-align: center">
                    عملیات
                </th>
                <th class="uk-text-center">خطاها</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($entries->items() as $row)
                <tr>

                    <td class="action_btn" style="width: 134px;text-align: center">
                        <button uk-toggle="target: #stack_{{ str_slug($row->datetime ) }}" uk-icon="view"></button>
                    </td>
                    <td class="uk-text-left">
                        <div>
                            {{ $row->level }}
                            {{ $row->datetime }}
                        </div>
                        <br>
                        <div>
                            {{ $row->header }}
                        </div>
                        <div class="stack" id="stack_{{ str_slug($row->datetime ) }}" hidden>
                            {{ $row->stack }}
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        @include('Zoroaster::paginate.data',['data'=>$entries])

    </div>

    <script>
        click('[uk-icon="delete"]', function ($this) {
            var url = $($this).attr('data-href');
            var date = $($this).attr('date');
            Confirm_delete('حذف خطای ' + date, function () {
                window.location.href = url;
            })
        })
    </script>
@endsection