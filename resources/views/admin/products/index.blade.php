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
    <div class="div-container" style="float:right; padding-right:24px;">
        {{-- <a href="" class="btn btn-success"><i class="fa fa-plus"> Thêm Mới</i></a> --}}
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            Open Add Products
        </button>
    </div>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Status Active</th>
            <th>Cate_id</th>
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
                <td>@if ($c->status == 1)
                    <p class="text-green">Active</p>
                    @else
                    <p class="text-black">Close</p>
                    @endif
                </td>
                <td>{{$c->category->name}}</td>
                <td>
                    <a href="" class="btn btn-green"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-green"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
<div class="modal" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm Sản Phẩm</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">ảnh</label>
                        <input type="file" name="file_upload" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <input type="text" name="description" class="form-control" value="{{old('quantity')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            {{-- @foreach($cates as $c)
                            <option @if($c->id == old('cate_id')) selected @endif
                                value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Modal footer -->
</div>
</div>
</div>
@endsection
