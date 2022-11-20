@extends('practice.layout.master')
{{-- @section('title')
    {{ $categories->title . " - " }}
@endsection --}}

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

        .flx {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
        }

        table {
            margin-top: 10%;
        }

        .row {
            clear: both;
        }

        h2 {
            font-family: 'Raleway', sans-serif;
            text-align: center;
            margin-top: 5%;
            color: black;
        }

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
    </style>

    <section class="tab">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 flx">

                    <h2>VIEW MORE</h2>

                    <table class="table table-bodered">

                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>{{ $category->id }}</td>
                        </tr>

                        <tr>
                            <td>TITLE</td>
                            <td>:</td>
                            <td>{{ $category->name }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

    </section>
@endsection
