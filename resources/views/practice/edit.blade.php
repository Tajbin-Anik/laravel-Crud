@extends('practice.layout.master')
@section('title', "Edit - ")
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            position: relative;
        }

        .flx {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
        }

        form {
            margin-top: 10%;
        }

        .row {
            clear: both;
        }

        label {
            font-family: 'Raleway', sans-serif;
            color: black;
            font-weight: 400;
        }

        .form-control:focus {
            box-shadow: none !important;
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

        .alt {
            background: transparent;
            border: none;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            font-size: 11px;
            text-transform: uppercase;
            margin-top: 5px;
            padding: 0px !important;
            color: red;
        }
    </style>

    <section class="fom">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 flx">

                    <h2>EDIT BLOG</h2>

                    <form action="{{ route('practice.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">TITLE HERE</label>
                            <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
                            @error('title')
                                <div class="alt alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">BODY HERE</label>
                            <textarea name="body" class="form-control" rows="4">{{ $blog->body }}</textarea>
                            @error('body')
                                <div class="alt alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>

                    </form>

                </div>
            </div>
        </div>

    </section>
@endsection
