@extends('practice.layout.master')
@section('title', 'Creat Category - ')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

        .mt {
            margin-top: 30px;
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

        .alt_2 {
            background: transparent;
            border: none;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            font-size: 11px;
            text-transform: uppercase;
            margin-top: 10px;
            padding: 0px !important;
            color: green;
            text-align: center;
        }
    </style>




    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class=" alt_2 alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="col-lg-8 mt">
                <div class="card">

                    <div class="card-header">
                        <h3>CREAT A CATEGORY</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>ACTION</th>
                            </tr>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>

                                    <td>

                                        <a class="btn btn-sm btn-outline-info"
                                            href="{{ route('category.show', $category->id) }}">VIEW</a>

                                        <a class="btn btn-sm btn-outline-info"
                                            href="{{ route('category.edit', $category->id) }}">EDIT</a>

                                        <form class="d-inline" method="POST" action="{{ route('category.destroy', $category->id) }}">

                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="DELET" class="btn btn-sm btn-outline-danger">

                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt">
                <div class="card">
                    <div class="card-header">
                        <h3>CREAT A CATEGORY</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">NAME HERE</label>
                                <input type="name" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alt alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">CREAT</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection
