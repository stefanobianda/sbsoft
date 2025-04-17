@props(['id', 'name', 'label' => null, 'rows' => 25, 'value' => '', 'placeholder' => ''])

<div class="mb-4">
    @if($label)
    <label class="block text-gray-700" for="{{$id}}" >{{$label}}</label> 
    @endif
    <textarea id="{{$id}}" rows="{{$rows}}" name="{{$name}}" class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror" placeholder="{{$placeholder}}">{{old($name, $value)}}</textarea>
    @error($name)
    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>