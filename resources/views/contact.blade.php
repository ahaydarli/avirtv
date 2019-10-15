@extends('layout')
@section('page', 'contact-page')
@section('title', 'Avirnet Contact')
@section('content')
    <div id="contactUsMap" class="big-map"></div>
    <div class="main main-raised">
        <div class="contact-content">
            <div class="container">
                <h2 class="title">Send us a message</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p class="description">You can contact us with anything related to our Products. We&apos;ll get in touch with you as soon as possible.
                            <br>
                            <br>
                        </p>
                        <form role="form" id="contact-form" method="post" action={{action('Frontend\HomeController@sendMessage')}}>
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Your name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmails" class="bmd-label-floating">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmails" name="email" required>
                                <span class="bmd-help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="bmd-label-floating">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="form-control-label bmd-label-floating" for="message"> Your message</label>
                                <textarea class="form-control" rows="6" id="message" name="message" required></textarea>
                            </div>
                            <div class="submit text-center">
                                <input type="submit" class="btn btn-danger btn-raised btn-round" value="Contact Us">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-danger">
                                <i class="material-icons">pin_drop</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Find us at the office</h4>
                                <p> M.Araz küç. 50c,
                                    <br> AZ 1106, Nərimanov ray.,
                                    <br> Bakı
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-danger">
                                <i class="material-icons">phone</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Müştəri xidmətləri</h4>
                                <p> Əlaqə nömrəsi: 176
                                    <br> contact@avirnet.az
                                    <br> Bazar ertəsi - Şənbə, 9:00-23:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection()
