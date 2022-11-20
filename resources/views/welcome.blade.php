@extends('practice.layout.master')
@section('title', "Home - ")
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

        ul,
        li,
        a {
            list-style: none;
            text-decoration: none;
            margin-right: 5px;
            color: black;
            font-family: 'Raleway', sans-serif;
            margin-top: 5px;
        }

        ul {
            display: flex;
            justify-content: right;
        }

        h2 {
            font-family: 'Raleway', sans-serif;
            text-align: center;
            margin-top: 20%;
            color: rgba(0, 0, 0, 0.767);
        }
    </style>

    <h2>LARAVEL CRUD</h2>
@endsection
