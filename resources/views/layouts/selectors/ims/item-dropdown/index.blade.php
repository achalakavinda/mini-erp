<select id="ModelSelectId" class="form-control ui search dropdown" name="model_select_id">
    @foreach(\App\Models\Ims\ItemCode::all() as $option)
        <option value="{{ $option->id }}">{{ $option->brand?$option->brand->name.' - ':'' }} {{ $option->category?$option->category->name.' - ':'' }} {{ $option->name }} @if( $option->description!=null ) - {{ $option->description }}  @endif</option>
    @endforeach
</select>
@push('js-stack')
    @include('layouts.components.sematic-ui.dropdown')
@endpush
