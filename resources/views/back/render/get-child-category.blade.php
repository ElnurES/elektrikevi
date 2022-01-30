@if($cateqories->count()>0)
   @foreach($cateqories as $category)
       <option value="{{$category->id}}">{{$category->name}}</option>
   @endforeach
@endif