@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="todo__alert">
  @if (session('message') )
    <div class="todo__alert--success">
      {{ session('message') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="todo__alert--danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>


<div class="todo__content">
  <form action="/todos" class="create-form" method="post">
    @csrf
    <div class="create-form__item">
      <input type="text" class="create-form__item-input" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">作成</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table_inner">
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
      </tr>
      @foreach ($todos as $todo)
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form action="/todos/update" class="update-form" method="post">
            <div class="update-form__item">
              <input type="text" class="update-form__item-input" name="content" value="{{ $todo['content'] }}">
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit" type="submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <form action="/todos/delete" class="delete-form" method="post">
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>


@endsection