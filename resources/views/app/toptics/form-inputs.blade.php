@php $editing = isset($toptic) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="category_id" label="Category Id">
            @php $selected = old('category_id', ($editing ? $toptic->category_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>
</div>
