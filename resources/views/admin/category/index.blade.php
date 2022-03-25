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
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
        Open Categories
    </button>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Chức Năng</th>
        </thead>
        @foreach($cates as $p)
        <tbody>
            <tr>
                <td> {{$loop->iteration + $cates->firstItem() - 1 }}</td>
                <td>{{ $p->name }}</td>
                {{-- <td>@if ($p->active == 1)
                    <p class="text-green">Active</p>
                    @else
                    <p class="text-black">Close</p>
                    @endif
                </td> --}}
                <td> <input data-id="{{$p->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $p->active ?
                    'checked' : '' }}></td>
                <td>
                    <a href="javascript:void(0){{route('categories.update',$p->id) }}" data-toggle="modal"
                        data-target="#myUpdate" data-id="{{ $p->id }}" class="btn btn-sm btn-outline-danger"><i
                            class="fa fa-edit"></i></a>
                    <a href="{{ route('categories.destroy', $p->id) }}" class="btn btn-green btn-remove"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{-- add - modals categories --}}
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Danh Mục</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name..." class="form-control"> <br>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="active">Active:</label>
                        <select name="active" class="form-control">
                            @foreach(config('common.ACTIVE') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
    <div>
        <nav aria-label="Page navigation example">
            {{$cates->appends(request()->query())->links() }}
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var active = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET"
                    , dataType: "json"
                    , url: '/categories/store'
                    , data: {
                        'active': active
                        , 'id': id
                    }
                    , success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                Swal.fire({
                    title: 'Cảnh báo!'
                    text: "Bạn chắc chắn muốn xóa danh mục này?"
                    icon: 'warning'
                    showCancelButton: true
                    confirmButtonColor: '#3085d6'
                    cancelButtonColor: '#d33'
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).attr('href');
                        window.location.href = url;
                    }
                })
                return false;
            });
        });

    </script>
    @endsection
