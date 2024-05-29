@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
    <div class="category__alert">
      @if (session('message'))
          <div class="category__alert--success">
            {{ session('message') }}
          </div>
      @endif
      @if ($errors->any())
        <div class="categoy__alert--danger">
          <ul>
            @foreach ($errors->any() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
    <div class="category__content">
      <form action="" class="create-form">
        <div class="create-form__item">
          <input type="text" class="create-form__item-input">
        </div>
        <div class="create-form__button">
          <button class="create-form__button-submit">作成</button>
        </div>
      </form>
      <div class="category-table">
        <table class="category-table__inner">
          <tr class="category-table__row">
            <th class="category-table__header">category</th>
          </tr>
          @foreach ($categories as $category)
          <tr class="category-table__row">
            <td class="category-table__item">
              <form action="" class="update-form">
                <div class="update-form__item">
                  <input type="text" class="update-form__item-input" />
                </div>
                <div class="update-form__button">
                  <button class="update_form__button-submit" type="submit">更新</button>
                </div>
              </form>
            </td>
            <td class="category-table__item">
              <form action="" class="delete-form">
                <div class="delete-form__item">
                  <input type="text" class="delete-form__item-input" />
                </div>
                <div class="delete-form__button">
                  <button class="delete_form__button-submit" type="submit">更新</button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
@endsection