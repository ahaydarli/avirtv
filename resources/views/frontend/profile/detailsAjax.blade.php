<div class="col-md-12">
    <h5 style="color: red">{{ __('Ministra details') }}</h5>
    <div class="row">
        <div class="col-md-6">
            <label>{{ __('Ministra Url') }}</label>
        </div>
        <div class="col-md-6">
            <p>http://ministra.avirtel.az/stalker_portal/</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>{{ __('Ministra Login') }}</label>
        </div>
        <div class="col-md-6">
            <p>{{ $subscription->service->login }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>{{ __('Ministra password') }}</label>
        </div>
        <div class="col-md-6">
            <p>{{ $subscription->service->password }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>{{ __('License key') }}</label>
        </div>
        <div class="col-md-6">
            <p>{{ $subscription->service->license }}</p>
        </div>
    </div>
</div>

