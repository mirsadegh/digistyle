@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">برند ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route('brands.create') }}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{ Session('error') }}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{ Session('success') }}</div>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th> شناسه</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->title }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('brands.edit',$brand->id) }}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/brands/{{ $brand->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-danger">حذف</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection
