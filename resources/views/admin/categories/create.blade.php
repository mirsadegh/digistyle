@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد دسته بندی جدید</h3>
{{--                <div class="text-left">--}}
{{--                    <a class="btn btn-app" href="{{ route('categories.create') }}">--}}
{{--                        <i class="fa fa-plus"></i> جدید--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6 col-md-offset-3">
                    <form method="post" action="/administrator/categories">
                        @csrf
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" name="name" class="form-control" placeholder="عنوان دسته بندی را وارد کنید...">
                        </div>
                        <div class="form-group">
                            <label for="category_parent">دسته والد</label>
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $catgory)
                                    <option value="{{ $catgory->id }}">{{ $catgory->name }}</option>
                                    @if(count($catgory->childrenRecursive) > 0)
                                        @include('admin.partials.category',['categories' => $catgory->childrenRecursive,'level' => 1])
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">عنوان سئو</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="عنوان سئو را وارد کنید...">
                        </div>
                        <div class="form-group">
                            <label for="meta_desc">توضیحات سئو</label>
                            <textarea type="text" name="meta_desc" class="form-control" placeholder="توضیحات سئو را وارد کنید..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">کلمات کلیدی سئو</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی سئو را وارد کنید...">
                        </div>

                         <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>
                </div>



            </div>
        </div>
    </section>
@endsection

