@foreach($categories as $sub_category)
    <tr>
        <td>{{ $sub_category->id }}</td>
        <td>{{ str_repeat('-----',$level) }}  {{ $sub_category->name }}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('categories.edit',$sub_category->id) }}">ویرایش</a>
            <div class="display-inline-block">
                <form method="post" action="/administrator/categories/{{ $sub_category->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger">حذف</button>
                </form>
            </div>
            <a class="btn btn-primary" href="{{ route('categories.indexSettings',$sub_category->id) }}">تنظیمات</a>

        </td>
    </tr>
    @if(count($sub_category->childrenRecursive) > 0)
        @include('admin.partials.category_list',['categories' => $sub_category->childrenRecursive,'level' => $level+1 ])
    @endif
@endforeach


