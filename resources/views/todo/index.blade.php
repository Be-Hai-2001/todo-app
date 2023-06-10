@extends('layout.master')

@section('main')
<div class="main">
    <div class="title-app"> TO DO </div>
    <div class="content-center">
        <div id="form-add">
            <form action="">
                <input type="text" value="" id="gsearch" name="description" placeholder="   Create a new todo...">
                <button id="Submit" type="button"><i class="fa-solid fa-arrow-down" ></i></button>
            </form>
        </div>
        <div class="container-lst">
            <div class="lst-todo">
                @foreach ($todo_tanks as $todo)
                    <div class="radio-check" style="display: nones">
                        <input type="checkbox" id="{{ $todo->id }}" value="{{ $todo->id }}" onclick="check_input('{{ $todo->id }}')" class="check-box">
                        <input type="hidden" class="is_completed" value="{{ $todo->is_completed }}">
                        <div id="content_{{ $todo->id }}" class="description">{{ $todo->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('todo/js/style.js') }}"></script>
@endsection
