@extends('Front.layout.master')
@section('content')

@include('Front.layout.include',[
'title' => 'Welcome To Portfolio Page',
]);

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    @foreach ( $portfolios as $portfolio )
                    <div class="col-lg-4 col-sm-6 mb-4">
 <!-- Portfolio item 1-->
 <div class="portfolio-item">
    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{$loop->index}}">
        <div class="portfolio-hover">
            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
        </div>
        <img class="img-fluid" src="{{asset('uplods/'.$portfolio->image)}}" alt="..." />
    </a>
    <div class="portfolio-caption">
        <div class="portfolio-caption-heading">{{$portfolio->Client}}</div>
        <div class="portfolio-caption-subheading text-muted">{{$portfolio->category->name}}</div>
    </div>
</div>
                                <!-- Portfolio item 6 modal popup-->
                                <div class="portfolio-modal modal fade" id="portfolioModal{{$loop->index}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('FrontEnd/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-8">
                                                        <div class="modal-body">
                                                            <!-- Project details-->
                                                            <h2 class="text-uppercase">{{$portfolio->name}}</h2>
                                                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                            <img class="img-fluid d-block mx-auto" src="{{asset('uplods/'.$portfolio->image)}}" alt="..." />
                                                            <p>{{$portfolio->content}}</p>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <strong>Client:</strong>
                                                                    {{$portfolio->Client}}
                                                                </li>
                                                                <li>
                                                                    <strong>Category:</strong>
                                                                    {{$portfolio->category->name}}
                                                                </li>
                                                            </ul>
                                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                                <i class="fas fa-times me-1"></i>
                                                                Close Project
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
@stop
