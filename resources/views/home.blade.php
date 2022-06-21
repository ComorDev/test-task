@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input required type="url" class="form-control" name="url" placeholder="url">
                    </div>
                    <label for="frequence">Частота проверки</label>
                    <select name="frequence" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">1 минута</option>
                        <option value="5">5 минут</option>
                        <option value="10">10 минут</option>
                    </select>
                    <div class="form-group">
                        <label for="quantity">Количество повторов</label>
                        <input required type="number" max="10" min="0" class="form-control" name="quantity" placeholder="quantity">
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
