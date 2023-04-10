@props(['name'])

<div class="py-15">
    <label
        class="
            bg-gray-200 hover:bg-gray-700
            text-gray-700 hover:text-gray-200
            transition duration-300
            cursor-pointer
            p-5 rounded-lg
            font-bold uppercase
        "
    >
        <span>Select an {{$name}} to upload</span>
        <input type="file" name="{{$name}}" class="hidden"
        {{ $attributes(['value' => old($name)]) }}>
        
    </label>
</div>

<x-inpute.message-error name='{{$name}}'/>
