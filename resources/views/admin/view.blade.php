@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Url</th>
                            <th scope="col">Частота проверки</th>
                            <th scope="col">Количество повторов</th>
                            <th scope="col">Дата добавления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $checkUrl)
                            <tr>
                                <th scope="row">{{ $checkUrl['id'] }}</th>
                                <td>{{ $checkUrl['url'] }}</td>
                                <td>{{ $checkUrl['frequence'] }}</td>
                                <td>{{ $checkUrl['quantity'] }}</td>
                                <td>{{ $checkUrl['created_at'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
