@if($cateqories->count()>0)
    @foreach($cateqories as $category)
        <option value="{{$category->id}}" {{in_array($category->id,$categoryItem) ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach
@endif