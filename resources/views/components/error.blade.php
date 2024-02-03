@if ($errors->has($errorField))
<div class="flex flex-col text-red-600 text-sm">
@foreach($errors->get($errorField) as $message)
    <p>{{ $message }}</p>
@endforeach
</div>
@endif
