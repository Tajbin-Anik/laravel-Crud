@extends('practice.layout.master')
@section('title', 'Creat - ')
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
            padding-bottom: 100px;
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

                    <h2>CREAT A BLOG</h2>

                    <form action="{{ route('practice.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">TITLE HERE</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <div class="alt alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">BODY HERE</label>
                            <textarea name="body" class="form-control" rows="4">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="alt alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">SELECT CATEGORY</label>

                            <select  name="category" class="form-control">

                                <option disabled selected>SELECT</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">IMAGE HERE</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="alt alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">CREAT</button>

                    </form>

                </div>
            </div>
        </div>

    </section>
@endsection
