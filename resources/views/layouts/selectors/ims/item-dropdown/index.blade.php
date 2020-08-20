<select id="ModelSelectId" class="form-control ui search dropdown" name="model_select_id">
    @foreach(\App\Models\Ims\ItemCode::all() as $option)
        <option value="{{ $option->id }}">{{ $option->name }} {{ $option->size?' - '.$option->size->code:'' }}  {{ $option->color?' - '.$option->color->code:'' }} </option>
    @endforeach
</select>
@push('js-stack')
    @include('layouts.components.sematic-ui.dropdown')
@endpush
