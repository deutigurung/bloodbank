<!--*************** Footer  Starts Here *************** -->
<footer id="contact" class="container-fluid">
    <div class="container">

        <div class="row content-ro">
            <div class="col-lg-4 col-md-12 footer-contact">
                <h2>Contact Information</h2>
                <div class="address-row">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="detail">
                        <p>Tinkune,Kathmandu,Nepal</p>
                    </div>
                </div>
                <div class="address-row">
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="detail">
                        <p>info@cite.com</p>
                    </div>
                </div>
                <div class="address-row">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="detail">
                        <p>+977 9851791203</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 footer-links">
                <div class="row no-margin mt-2">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>Home</li>
                        <li>About Us</li>
                        <li>Contacts</li>
                        <li>Gallery</li>
                        <li>Features</li>
                        <li></li>

                    </ul>
                </div>
                <div class="row no-margin mt-1">
                    <h2 class="m-t-2"></h2>
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 footer-form">
                <div class="form-card">
                    <div class="form-title">
                        <h4>Quick Message</h4>
                    </div>
                    <form method="post" action="{{ route('contactStore') }}">
                        @csrf
                        <div class="form-body">
                            <input type="text" placeholder="Enter Name" name="name" class="form-control">
                            <input type="text" placeholder="Enter Mobile no" name="phone" class="form-control">
                            <input type="text" placeholder="Enter Email Address" name="email" class="form-control">
                            <input type="text" placeholder="Your Message" name="message" class="form-control">
                            <button class="btn btn-sm btn-primary w-100" type="submit">Send Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <p>Copyright © <a href="#">CITE</a> | All right reserved.</p>
                </div>
                <div class="col-lg-4 col-md-6 socila-link">
                    <ul>
                        <li><a><i class="fab fa-github"></i></a></li>
                        <li><a><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a><i class="fab fa-twitter"></i></a></li>
                        <li><a><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/grid-gallery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
