@include('frontend.partials.header')

<!-- ################# Slider Starts Here#######################--->

<div class="slider-detail">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/images/slide-02.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood &amp; Save a Life</h5>
                    <p class=" bounceInLeft">WHO - "If 1% to 3% of a country's population donate blood, it would be sufficient for the country's needs."</p>
                    <div class=" vbh">
                        <div class="btn btn-success  bounceInUp"><a href="{{ route('joinForm') }}" target="_blank">Join Us</a></div>
                        <div class="btn btn-success  bounceInUp"><a href="{{ route('searchBloodForm') }}" target="_blank"> Search Blood</a></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/images/slide-03.jpg') }}" alt="Third slide">
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood &amp; Save a Life</h5>
                    <p class=" bounceInLeft">To give blood you need neither extra strength nor extra food, and you will save a life. <br>
                        If you're a blood donor, you're a hero to someone, somewhere, who received your gracious gift of life.</p>

                    <div class=" vbh">
                        <div class="btn btn-success  bounceInUp"><a href="{{ route('joinForm') }}" target="_blank">Join Us</a></div>
                        <div class="btn btn-success  bounceInUp"><a href="{{ route('searchBloodForm') }}" target="_blank"> Search Blood</a></div>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="{{ route('frontend') }}"
           role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="{{ route('frontend') }}"
           role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>

<!--*************** About Us Starts Here ***************-->
<section id="about" class="contianer-fluid about-us">
    <div class="container">
        <div class="row session-title">
            <h2>About Us</h2>
            <p></p>
        </div>
        <div class="row">
            <div class="col-md-6 text">
                <h2>Welcome to Blood Bank</h2>
                <p>Blood Bank is an online blood bank service that works to encourage and inspire people to donate blood and provide fresh blood to needy ones to save their life.
                    Our main objective is to act as a bridge between the blood donor and patient. Welfare of the society is our motto.</p>
                <p> This website can match you with a donor near you in fraction of second. You can also register as a donor in this site and save someone’s life. The need is constant, and your contribution is important for a healthy and reliable blood supply.</p>
                <h2>Why Donate Blood?</h2>
                <p><i class="fa fa-info-circle"></i> Till date there no substitute for blood. Only donated blood can provide adequate supply of blood to save life of those who need it. You give a second chance to someone unknown to you. Sometimes it one who need blood could be a friend, family member or yourself.</p>
                <p><i class="fa fa-info-circle"></i> Whenever you donate blood, the body can easily replenish the lost blood within 24-48 hours. Hence you are welcoming new blood into your body. In that way there no loss.</p>
                <p><i class="fa fa-info-circle"></i> Donating blood helps to maintain iron content in blood.</p>
                <p><i class="fa fa-info-circle"></i> Whenever you donate you will be losing excess cholesterol accumulated in blood. Hence reducing the proximity of Heart Attacks.</p>
                <p><i class="fa fa-info-circle"></i> A one unit of donated blood can save upto 3 people when supplied into three different components as Red blood cells, Fresh frozen plasma and Platelet concentrate/platelet rich plasma.</p>
                <p><i class="fa fa-info-circle"></i> A self fulfillment for a lifetime of saving a person life during emergency.</p>
            </div>
            <div class="col-md-6 image">
                <div class="" style="margin-left: 170px;">
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-default">
                        Emergency Blood Request
                    </button>
                </div>
                <img src="{{ asset('assets/images/about.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Emergency Blood Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" class="form" method="post" action="{{ route('emergencyRequestStore') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" autofocus>
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group"  id="blood_group" class="form-control select2">
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="requisition_form">Requisition form </label>
                                <input type="file" name="requisition_form" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Patient Details With Location and Problem"></textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Request Blood</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ################# Gallery Start Here #######################--->

<div id="gallery" class="gallery container-fluid">
    <div class="container">
        <div class="row session-title">
            <h2>Checkout Our Gallery</h2>
        </div>
        <div class="gallery-row row">
            <div id="gg-screen"></div>
            <div class="gg-box">
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g1.jpg') }}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g2.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g3.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g4.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g5.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g6.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g7.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g8.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g9.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('assets/images/g10.jpg')}}">
                </div>


            </div>
        </div>
    </div>
</div>


<!-- ################# Donation Process Start Here #######################--->

<section id="process" class="donation-care">
    <div class="container">
        <div class="row session-title">
            <h2>Donation Process</h2>
            <p>The donation process from the time you arrive center until the time you leave</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('assets/images/g1.jpg')}}" alt="">
                    <h4><b>1 - </b>Registration</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('assets/images/g2.jpg')}}" alt="">
                    <h4><b>2 - </b>Seeing</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('assets/images/g3.jpg')}}" alt="">
                    <h4><b>3 - </b>Donation</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('assets/images/g4.jpg')}}" alt="">
                    <h4><b>4 - </b>Save Life</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>


    </div>
</section>


<!--################### Our Blog Starts Here #######################--->
<div id="blog" class="blog-container contaienr-fluid">
    <div class="container">
        <div class="session-title row">
            <h2>Latest Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit velit
                consectetur adipiscing elit.</p>
        </div>
        <div class="row news-row">
            @foreach($blogs as $blog)
            <div class="col-md-6">
                <div class="news-card">
                    <div class="image">
                        <img src="{{ asset('assets/images/blog_01.jpg')}}" alt="">
                    </div>
                    <div class="detail">
                        <h3>{{ $blog->name }}</h3>
                        <p>{{ $blog->description }}</p>
                        <p class="footp">
                            27 Comments <span>/</span>
                            Blog Design <span>/</span>
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('frontend.partials.footer')
