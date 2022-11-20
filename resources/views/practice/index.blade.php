@extends('practice.layout.master')
<link rel="stylesheet" href="{{ asset('build/css/main.css') }}">

@section('title', 'Index - ')

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

table {
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

h2 {
    font-family: 'Raleway', sans-serif;
    text-align: center;
    margin-top: 5%;
    color: black;
}

.alt {
    background: transparent;
    border: none;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 15px;
    text-transform: uppercase;
    margin-top: 30px;
    padding: 0px !important;
    color: green;
    text-align: center;
}

input {
    margin-top: 5px;
}

.col-lg-6 {
    width: 100%;
}

    </style>

    <section class="tab">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 flx">
                    <h2>ALL BLOG</h2>

                    @if (Session::has('success'))
                        <div class=" alt alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <table class="table table-bodered">

                        <tr>
                            <td>ID</td>
                            <th>PICTURE</th>
                            <th>CATEGORY</th>
                            <th>TITLE</th>
                            <th>BODY</th>
                            <th>ACTION</th>

                        </tr>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <img src="{{ asset('Storage/photos/' . $post->image) }}" alt="IMAGE" width="40">
                                </td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ Str::limit($post->title, 20, '...') }}</td>
                                <td>{{ Str::limit($post->body, 20, '...') }}</td>

                                <td>
                                    <a href="{{ route('practice.view', $post->id) }}"
                                        class="btn btn-sm btn-outline-info">VIEW</a>

                                    <a href="{{ route('practice.edit', $post->id) }}"
                                        class="btn btn-sm btn-outline-success">EDIT</a>

                                    <form class="d-inline" action="{{ route('practice.delete', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-sm btn-outline-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </table>

                    {{ $posts->links() }}

                </div>
            </div>
        </div>

    </section>
@endsection
