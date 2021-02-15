@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">محصولات</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route('products.create') }}">
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
                            <th>کدمحصول</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->title }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/products/{{ $product->id }}">
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
                    <div class="col-md-12">{{ $products->links() }}</div>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection
