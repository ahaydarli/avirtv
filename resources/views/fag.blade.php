@extends("layout")
@section('page', 'Fag-page')
@section('title', 'Avirnet Faq')
@section('content')


    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/img/faq.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">FAQ</h1>
                    <h4>Frequently asked questions</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="about-description text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                    </div>
                </div>
            </div>
            <div class="about-team team-1">
                <div id="collapse ">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 ">
                            <div id="accordion" role="tablist">
                                @foreach($faqs as $faq)
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                {!! $faq->question !!}
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse{{$faq->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                        <div class="card-body">
                                        {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
