@php $editing = isset($freqAskQuestion) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="status_id" label="Status" required>
            @php $selected = old('status_id', ($editing ? $freqAskQuestion->status_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Status</option>
            @foreach($statuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="question"
            label="Question"
            value="{{ old('question', ($editing ? $freqAskQuestion->question : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="answer" label="Answer" maxlength="255" required
            >{{ old('answer', ($editing ? $freqAskQuestion->answer : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
