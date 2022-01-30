@extends('Front.layout.master')
@section('content')

@include('Front.layout.include',[
'title'=> 'Welcome To Content Page '
])

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" method="POST" action="{{route('ContactSubmit')}}" >
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Your Name *" value="{{old('name')}}" name="name" />
                                @error('name')
                                    <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Your Email *" value="{{old('email')}}" />
                                @error('email')
                                    <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="tel" placeholder="Your Phone *" name="phone" value="{{old('phone')}}" />
                                @error('phone')
                                    <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" placeholder="Your Message *" >{{old('message')}}</textarea>
                                @error('message')
                                    <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>

@stop
