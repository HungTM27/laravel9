@extends('admin.layouts.main')
@section('page-title','Products List')
@section('content')
<div class="box">

    <div class="box-header">
        <h3 class="box-title">Danh sách Products</h3>
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
        <button type="button" class="btn btn-default" data-toggle="modal" id="add-new" data-target="#modal-default">
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
                <td>{{$loop->iteration + $prods->firstItem() - 1 }}</td>
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
                    <button cate_id="{{ $c->id }}" class="btn-update btn btn-green">
                        <i class="fa fa-edit"></i>
                    </button>
                    <a href="{{ route('products.remove', $c->id) }}" class="btn btn-green"><i
                            class="fa fa-trash"></i></a>
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
                <h4 class="modal-title">Danh sách Sản Phẩm</h4>
                <button type="button" id="add-new" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">ảnh</label>
                        <input type="file" name="file_upload" id="file_upload" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea name="description" id="description" class="form-control" cols="30"
                            rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="cate_id" id="cate_id" class="form-control">
                    @foreach($cates as $c)
                    <option @if($c->id == old('cate_id')) selected @endif
                        value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <select name="status" id="status" class="form-control">
                    @foreach(config('common.ACTIVE') as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
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
<nav aria-label="Page navigation example">
    {{$prods->appends(request()->query())->links() }}
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#add-new').on('click', function(){
            $('#modal-default').modal('show');
        })
    });
    $('.btn-update').on('click', function(){
        var cateId = $(this).attr('cate_id');
        $.ajax({
        url: "{{ route('products.update') }}",
        method: 'POST',
        data:{
        "_token": "{{ csrf_token() }}",
        id: cateId,
        },
        dateType: 'JSON',
        success: function(rp){
            $('#modal-default').modal('show');
            $('#name').val(rp.name);
            $('#file_upload').val(rp.file_upload);
            $('#price').val(rp.price);
            $('#quantity').val(rp.quantity);
            $('#description').val(rp.description);

        }
    });

    })
</script>
@endsection
