@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="account_type_id" label="Account Type" required>
            @php $selected = old('account_type_id', ($editing ? $user->account_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Account Type</option>
            @foreach($accountTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="gender_id" label="Gender" required>
            @php $selected = old('gender_id', ($editing ? $user->gender_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Gender</option>
            @foreach($genders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select
            name="report_user_type_id"
            label="Report User Type"
            required
        >
            @php $selected = old('report_user_type_id', ($editing ? $user->report_user_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Report User Type</option>
            @foreach($reportUserTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $user->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $user->email : '')) }}"
            maxlength="255"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            value="{{ old('phone', ($editing ? $user->phone : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            required
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <div x-data="avatarComponentData()">
            <label for="avatar">Avatar</label><br />

            <img
                :src="avatarDataUrl"
                style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
            /><br />

            <div class="mt-2">
                <input
                    type="file"
                    name="avatar"
                    id="avatar"
                    @change="fileChanged"
                />
            </div>

            @error('avatar')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="bio" label="Bio" maxlength="255" required
            >{{ old('bio', ($editing ? $user->bio : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="is_recieve_new_letter"
            label="Is Recieve New Letter"
            :checked="old('is_recieve_new_letter', ($editing ? $user->is_recieve_new_letter : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="is_social_notification"
            label="Is Social Notification"
            :checked="old('is_social_notification', ($editing ? $user->is_social_notification : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="is_recieve_email_from_followed_author"
            label="Is Recieve Email From Followed Author"
            :checked="old('is_recieve_email_from_followed_author', ($editing ? $user->is_recieve_email_from_followed_author : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="is_metion_notification"
            label="Is Metion Notification"
            :checked="old('is_metion_notification', ($editing ? $user->is_metion_notification : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="is_promotion"
            label="Is Promotion"
            :checked="old('is_promotion', ($editing ? $user->is_promotion : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>

@push('scripts')
<script>

    /* Alpine component for avatar uploader viewer */
    function avatarComponentData() {
        return {
            avatarDataUrl: '{{ $editing && $user->avatar ? \Storage::url($user->avatar) : '' }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.avatarDataUrl = src)
            }
        }
    }
</script>
@endpush
