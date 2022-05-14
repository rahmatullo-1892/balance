@extends("components.template", ["title" => "Операции"])

@section("content")
    <div class="page-title">Операции</div>
    <form action="{{ url("histories") }}" method="get" autocomplete="off">
        <div class="row mb-3">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Поиск ..." name="search" value="{{ $search }}">
            </div>
        </div>
    </form>
    <table class="table table-bordered table-hover" id="histories_table">
        <thead>
        <tr>
            <th>#</th>
            <th onclick="sortCol()">Дата</th>
            <th>Сумма</th>
            <th>Комментарий</th>
        </tr>
        </thead>
        <tbody>
            @include("components.histories_table")
        </tbody>
    </table>
@endsection
