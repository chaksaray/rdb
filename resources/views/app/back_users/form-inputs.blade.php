@php $editing = isset($backUser) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select
            name="back_user_role_id"
            label="Back User Role"
            required
        >
            @php $selected = old('back_user_role_id', ($editing ? $backUser->back_user_role_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Back User Role</option>
            @foreach($backUserRoles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
