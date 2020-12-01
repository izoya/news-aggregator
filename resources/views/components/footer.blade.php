<footer class="page-footer center-on-small-only  pt-0 footer-widget-container">
    <div class="container pt-5 mb-5">
        <div class="row">
            {{-- Contacts --}}
            <div class="col-md-6 col-lg-4 col-xl-4 footer-contact-widget d-flex flex-column">
                <h3 class="footer-title">About Us</h3>
                <p>Lorem ipsum dolor sit amet. Voluptates eos minus expedita illo recusandae
                    esse labore obcaecati nisi amet.</p>
                <ul class="icon-list w-100 d-block pr-5">
                    <li class=" pr-5"><i class="mdi mdi-map-marker"></i> {{ __('pages.contacts.address') }}</li>
                    <li class=" pr-5"><i class="mdi mdi-email"></i>
                        <a href="mailto:mail@material.com" class="nocolor"> {{ __('pages.contacts.email') }}</a>
                    </li>
                    <li><i class="mdi mdi-phone-classic"></i> {{ __('pages.contacts.phone') }}</li>
                </ul>
                <ul class="">
                    <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                    <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                    <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                    <li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
                </ul>
            </div>
            {{-- Recent posts --}}
            <div class="col-md-6 col-lg-4 col-xl-4 recent-widget">
                <h3 class="footer-title">Recent Posts</h3>
                <ul class="image-list">
                    <li>
                        <figure class="overlay">
                            <img class="img-fluid" src="{{ asset('images/art/a1.jpg') }}" alt="">
                            <figcaption><a href="#"><i class="mdi mdi-link-variant from-top icon-xs"></i></a>
                            </figcaption>
                        </figure>
                        <div class="post-content">
                            <h6 class="post-title"><a href="#">Fusce gravida tortor felis Risus</a></h6>
                            <div class="meta"><span class="date">12 Jan 2019</span></div>
                        </div>
                    </li>
                    <li>
                        <figure class="overlay">
                            <img class="img-fluid" src="{{ asset('images/art/a2.jpg') }}" alt="">
                            <figcaption><a href="#"><i class="mdi mdi-link-variant from-top icon-xs"></i></a>
                            </figcaption>
                        </figure>
                        <div class="post-content">
                            <h6 class="post-title"><a href="#">Ornare Nullam Risus Cursus</a></h6>
                            <div class="meta"><span class="date">12 Jan 2019</span></div>
                        </div>
                    </li>
                    <li>
                        <figure class="overlay">
                            <img class="img-fluid" src="{{ asset('images/art/a3.jpg') }}" alt="">
                            <figcaption><a href="#"><i class="mdi mdi-link-variant from-top icon-xs"></i></a>
                            </figcaption>
                        </figure>
                        <div class="post-content">
                            <h6 class="post-title"><a href="#">Euismod Nullam Fusce Dapibus</a></h6>
                            <div class="meta"><span class="date">12 Jan 2019</span></div>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- Links & Subscribe --}}
            <div class="col-md-6 col-lg-4 col-xl-4 footer-contact">
                <h3 class="footer-title">Subscribe</h3>
                <div class="widget">
                    <div class="newsletter-wrapper">
                        <form method="" id="subscribe-form" name="subscribe-form" class="validate" action="#">
                            <div class="form-group is-empty">
                                <input type="email" value="" name="EMAIL" class="email form-control" id="EMAIL"
                                       placeholder="Email Address" required="">
                                <button type="submit" name="subscribe" id="subscribe"
                                        class="btn btn-common pull-right">Join
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget">
                    <h5 class="widget-title">Useful Links</h5>
                    <ul class="unordered-list">
                        <li><a href="#" class="nocolor">Terms of Use</a></li>
                        <li><a href="#" class="nocolor">Privacy Policy</a></li>
                        <li><a href="#" class="nocolor">Company Profile</a></li>
                        <li><a href="{{ route('feedback') }}" class="nocolor text-bold">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Copyright --}}
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Template designed and developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
