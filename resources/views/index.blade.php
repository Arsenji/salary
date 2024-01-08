@extends('layouts.app')
@section('title-block')Транзакции@endsection
@section('content')
    <form id="transactionForm" method="post" action="{{ route('index-form') }}">
    @csrf
        <input type="text" class="form-control" id="numberOfHours" name="numberOfHours" placeholder="Кол-во часов">
        <div id="totalHours">Доступно к выводу:</div>
        <div class="button-container">
            <button type="submit" id="hoursWork">Отправить данные</button>
            <button type="submit" id="salaryButton" formaction="/pay-salary">Запросить выплату</button>
        </div>
    </form>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

