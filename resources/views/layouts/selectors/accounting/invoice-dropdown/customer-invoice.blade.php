<select id="CustomerInvoiceModelSelectId" class="form-control ui search dropdown" name="model_select_id">
    @foreach(\App\Models\Ims\Invoice::all() as $option)
    <option value="{{ $option->id }}">{{ $option->code }}</option>
    @endforeach
</select>
@push('js-stack')
@include('layouts.components.sematic-ui.dropdown')
@endpush