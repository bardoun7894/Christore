<div class="form-group">
    <label>Set Category Level</label>
    <select id="parent_id" name="parent_id" class="form-control select2" style="width: 100%;">
       <option selected="selected" value="0">Main Category</option>
    @if(!empty($getCategories))
        @foreach($getCategories as $category)
        <option selected="selected" value="{{$category['id']}}">{{$category['category_name']}}</option>
                @if(!empty($category['subcategories']))
                    @foreach($category['subcategories'] as $subcategory)
                        <option selected="selected" value="{{$subcategory['id']}}">&nbsp;&nbsp;&twoheadrightarrow;&nbsp;{{$subcategory['category_name']}}</option>
                    @endforeach
                @endif
        @endforeach
    @endif
    </select>
</div>
