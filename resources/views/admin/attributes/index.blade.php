@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">دسته بندی ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route('attributes-group.create') }}">
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
                            <th>نوع</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributesGroup as $attribute)
                        <tr>
                            <td>{{ $attribute->id }}</td>
                            <td>{{ $attribute->title }}</td>
                            <td>{{ $attribute->type }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('attributes-group.edit',$attribute->id) }}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/attributes-group/{{ $attribute->id }}">
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
