@extends('layout')
@section('page', 'pricing')
@section('title', 'Avirnet Pricing')
@section('content')
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/img/pricing.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Let&apos;s get started</h1>
                    <h4>To get started, you will need to choose a plan for your needs. You can opt in for the monthly of annual options and go with one fo the three listed below.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="pricing-2">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <ul class="nav nav-pills nav-pills-danger">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pill1" data-toggle="tab">@lang('site.monthly')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill2" data-toggle="tab">@lang('site.yearly')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-pricing card-plain">
                            <div class="card-body">
                                <h6 class="card-category text-info">Free</h6>
                                <h1 class="card-title">
                                    <small>$</small>0
                                    <small>/mo</small>
                                </h1>
                                <ul>
                                    <li>
                                        <b>1</b> Project</li>
                                    <li>
                                        <b>5</b> Team Members</li>
                                    <li>
                                        <b>55</b> Personal Contacts</li>
                                    <li>
                                        <b>5.000</b> Messages</li>
                                </ul>
                                <a href="#pablo" class="btn btn-danger btn-raised btn-round">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-pricing card-raised bg-danger">
                            <div class="card-body">
                                <h6 class="card-category text-info">Premium</h6>
                                <h1 class="card-title">
                                    <small>$</small>89
                                    <small>/mo</small>
                                </h1>
                                <ul>
                                    <li>
                                        <b>500</b> Projects</li>
                                    <li>
                                        <b>50</b> Team Members</li>
                                    <li>
                                        <b>125</b> Personal Contacts</li>
                                    <li>
                                        <b>15.000</b> Messages</li>
                                </ul>
                                <a href="#pablo" class="btn btn-white btn-danger btn-round">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-pricing card-plain">
                            <div class="card-body">
                                <h6 class="card-category text-info">Platinum</h6>
                                <h1 class="card-title">
                                    <small>$</small>199
                                    <small>/mo</small>
                                </h1>
                                <ul>
                                    <li>
                                        <b>1000</b> Projects</li>
                                    <li>
                                        <b>100</b> Team Members</li>
                                    <li>
                                        <b>550</b> Personal Contacts</li>
                                    <li>
                                        <b>50.000</b> Messages</li>
                                </ul>
                                <a href="#pablo" class="btn btn-danger btn-raised btn-round">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="features-2">
                <div class="text-center">
                    <h3 class="title">@lang('site.frequently_asked_question')</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-info">
                                <i class="material-icons">card_membership</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Can I cancel my subscription?</h4>
                                <p>Yes, you can cancel and perform other actions on your subscriptions via the My Account page. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mr-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">card_giftcard</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Is there any discount for an annual subscription?</h4>
                                <p>Yes, we offer a 40% discount if you choose annual subscription for any plan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-success">
                                <i class="material-icons">attach_money</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Which payment methods do you take?</h4>
                                <p>WooCommerce comes bundled with PayPal (for accepting credit card and PayPal account payments), BACS, and cash on delivery for accepting payments. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mr-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">question_answer</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Any other questions we can answer?</h4>
                                <p>We are happy to help you. Contact us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
