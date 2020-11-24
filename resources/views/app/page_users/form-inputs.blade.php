@php $editing = isset($pageUser) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $pageUser->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="page_id" label="Page" required>
            @php $selected = old('page_id', ($editing ? $pageUser->page_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Page</option>
            @foreach($pages as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="page_role_id" label="Page Role" required>
            @php $selected = old('page_role_id', ($editing ? $pageUser->page_role_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Page Role</option>
            @foreach($pageRoles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
