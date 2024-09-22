<footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Column 1: Logo and Mission Statement -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3">Food Rescue</h5>
                <p>Join us in our mission to reduce food waste by redistributing surplus food from restaurants to those in need. Together, we can make a difference.</p>
                <a href="{{ url('/about') }}" class="btn btn-primary btn-sm mt-2">Learn More</a>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/home') }}" class="text-white-50">Home</a></li>
                    <li><a href="{{ url('/restaurants') }}" class="text-white-50">Partner Restaurants</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-white-50">Contact Us</a></li>
                    <li><a href="{{ url('/volunteer') }}" class="text-white-50">Become a Volunteer</a></li>
                </ul>
            </div>

            <!-- Column 3: Social Media -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3">Follow Us</h5>
                <div class="d-flex">
                    <a href="#" class="me-3 text-white-50"><i class="mdi mdi-facebook mdi-24px"></i></a>
                    <a href="#" class="me-3 text-white-50"><i class="mdi mdi-twitter mdi-24px"></i></a>
                    <a href="#" class="me-3 text-white-50"><i class="mdi mdi-instagram mdi-24px"></i></a>
                    <a href="#" class="text-white-50"><i class="mdi mdi-linkedin mdi-24px"></i></a>
                </div>
            </div>

            <!-- Column 4: Newsletter Subscription -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Subscribe to Our Newsletter</h5>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email" aria-describedby="subscribe-button">
                        <button class="btn btn-primary" type="button" id="subscribe-button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col text-center">
                <p class="text-white-50 mb-0">&copy; 2024 Food Rescue. All Rights Reserved. | <a href="{{ url('/privacy') }}" class="text-white-50">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</footer>
