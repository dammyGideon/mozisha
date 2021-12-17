<div>
    <form>


    <input type="file" wire:model="image" />

    @if($image)
    <img src="{{$image->temporaryUrl()}}" />
    @endif
    </form>
{{--    <button type="button" wire:click="inc">Add</button>--}}
{{--    <div>{{$count}}</div>--}}
{{--    <button type="button" wire:click="dec"></button>--}}
</div>
