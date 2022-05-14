@extends("components.template", ["title" => "Личный кабинет"])

@section("content")
    <div class="page-title">Личный кабинет</div>
    <div class="row">
        <div class="col-4">
            <div class="info-row mb-3">
                <label class="label">ФИО</label>
                <label class="value">{{ $user->name }}</label>
            </div>
            <div class="info-row mb-3">
                <label class="label">Логин</label>
                <label class="value">{{ $user->login }}</label>
            </div>
            <div class="info-row mb-3">
                <label class="label">Текущий баланс</label>
                <label class="value">{{ number_format($user->balance->sum, 2, ",", " ") }}</label>
            </div>
        </div>
        <div class="col-8">
            <div class="text-end mb-2">
                <a href="{{ url("histories") }}">Показать всю историю</a>
            </div>
            <table class="table table-bordered table-hover" id="histories_table">
                <thead>
                <tr>
                    <th colspan="4">Последные операции</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>Сумма</th>
                    <th>Комментарий</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("js")
    <script>
        loadHistories();
    </script>
@endsection

