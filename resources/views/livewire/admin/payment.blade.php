<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Payment gateway</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                    <li class="breadcrumb-item active">Payment gateway</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent="updatePayment" method="post">
                        <h4 class="text-primary" wire:model = "stripe"></h4>
                        <x-pay_alert />
                        <div class="form-group">
                            <label>Stripe Option</label>

                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="sandbox" wire:model = "stripe" name="gateway_type" value="sandbox" type="radio" checked="" onchange="payment(this.value)">
                                    <label class="custom-control-label" for="sandbox">Sandbox</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="livepaypal" wire:model = "stripe" name="gateway_type" value="live" type="radio" onchange="payment(this.value)">
                                    <label class="custom-control-label" for="livepaypal">Live</label>
                                </div>
                                @error('stripe') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gateway Name</label>
                            <input type="text" name="gateway_name" wire:model = "gateway_name" required="" class="form-control" placeholder="Gateway Name">
                            @error('gateway_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>API Key</label>
                            <input type="text" id="api_key" name="api_key" wire:model = "api_key"  required="" class="form-control">
                            @error('api_key') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Rest Key</label>
                            <input type="text" id="value" name="value" wire:model = "rest_key"  required="" class="form-control">
                            @error('rest_key') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4">
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit"  wire:loading.remove wire:target="updatePayment" class="btn btn-primary">Submit</button>
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading wire:target="updatePayment" class="btn btn-primary">
                                <i class="fa fa-spinner fa-spin"></i> Prosessing request...</button>
                            <a href="#" style="color: #420175 !important;" onclick="event.preventDefault()" wire:click ="discard" class="btn btn-link m-l-5">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
