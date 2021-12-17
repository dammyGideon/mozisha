<div class="mailbox-controls">
    <!-- Check all button -->
    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
    </button>
    <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
     @if ($paginator->hasPages())
            @if ($paginator->onFirstPage())
               <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            @else
                <button type="button" wire:click="previousPage" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            @endif
            @if($paginator->hasMorePages())
            <button type="button" wire:click="nextPage" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            @else
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            @endif

    </div>
    <!-- /.btn-group -->
    <a href="{{route('admin.post.pending')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
    <div class="pull-right">
        {{$paginator->firstItem()}}-{{$paginator->lastItem()}}/{{$paginator->total()}}
        <div class="btn-group">
            @if ($paginator->onFirstPage())
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            @else
                <button type="button" wire:click="previousPage" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            @endif
            @if($paginator->hasMorePages())
                <button type="button" wire:click="nextPage" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            @else
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            @endif
        </div>
        <!-- /.btn-group -->
    </div>
@endif
    <!-- /.pull-right -->
</div>
