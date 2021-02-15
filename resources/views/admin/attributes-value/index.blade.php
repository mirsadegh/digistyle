@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">مقادیر ویژگی</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route('attributes-value.create') }}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    @if(Session::has('attributes'))
                        <div class="alert alert-success">
                            <div>{{ Session('attributes') }}</div>
                        </div>
                    @endif

                @if(Session::has('attributes-delete'))
                    <div class="alert alert-danger">
                        <div>{{ Session('attributes-delete') }}</div>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th> شناسه</th>
                            <th>عنوان</th>
                            <th>ویژگی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributesValue as $attribute)
                        <tr>
                            <td>{{ $attribute->id }}</td>
                            <td>{{ $attribute->title }}</td>
                            <td>{{ $attribute->attributeGroup->title }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('attributes-value.edit',$attribute->id) }}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/attributes-value/{{ $attribute->id }}">
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
