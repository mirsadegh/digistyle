@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">کد های تخفیف</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route('coupons.create') }}">
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
                    <table class="table no-margin text-center">
                        <thead>
                        <tr>
                            <th> شناسه</th>
                            <th>عنوان</th>
                            <th>کد</th>
                            <th>قیمت</th>
                            <th>وضیعت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->title }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->price }}</td>
                            @if($coupon->status == 0)
                               <td><span class="tag tag-pill tag-danger">غیرفعال</span></td>
                            @else
                            <td><span class="tag tag-pill tag-success">فعال</span></td>
                            @endif
                            <td>
                                <a class="btn btn-warning" href="{{ route('coupons.edit',$coupon->id) }}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/coupons/{{ $coupon->id }}">
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
