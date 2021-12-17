{{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">--}}
{{--    Launch Success Modal--}}
{{--</button>--}}

@if(session()->has('message'))

    <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog" style="width: 350px;" >
            <div class="modal-content" style="background-color: #00bf6f; color: white">
                <div class="modal-header" style="text-align: center;">
                    <h4 class="modal-title" style="margin: auto"><li class="fa fa-check-square-o" style="font-size: 50px;"></li></h4>
                </div>
                <div class="modal-body" style="text-align: center">
                    <p>{{session()->get('message')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success pull-left" style="color: white; margin: auto;" data-dismiss="modal">Thank you</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.modal -->
    <script>
        $('#modal-success').modal('show');
    </script>
@endif





<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Danger Modal</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
