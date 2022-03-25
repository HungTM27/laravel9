@extends('admin.layouts.main')
@section('page-title','Danh Mục')
@section('content')
<div class="box">

    <div class="box-header">
        <h3 class="box-title">Danh sách danh mục</h3>
    </div>
    <section class="sidebar">
        <!-- search form -->
        <div class="col-md-4">
            <form action="" method="GET" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.search form -->
    </section>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Status Active</th>
            <th>
                Chức Năng
            </th>
        </thead>
        @foreach ($prods as $c )
        <tbody>
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $c->name }}</td>
                <td>
                    <img src="{{asset('storage/' . $c->image)}}" width="70">
                </td>
                <td>{{ $c->quantity }}</td>
                <td>{{ $c->price }}</td>
                <td>{{ $c->description }}</td>
                <td>{{ $c->status }}</td>
                <td>
                    <a href="" class="btn btn-green"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-green"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
<div class="nav-pagination">
    <nav aria-label="Page navigation example">
        {{$prods->appends(request()->query())->links() }}
    </nav>
</div>
@endsection
