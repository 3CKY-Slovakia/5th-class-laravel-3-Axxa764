<!-- Contact Section -->

<section id="contact" class="relative contact">

    <div class="grayscale-bg absolute background41 parallax9 xdark-bg"></div>

    <!-- Inner -->
    <div class="inner t-center clearfix no-black-white animated" data-animation="fadeIn" data-animation-delay="800">
        <!-- Header -->
        <h1 class="header header-style-1 white raleway uppercase t-center ">
            Get in Touch With Us!
        </h1>
        <!-- Header Text -->
        <p class="light t-center">
            There are many variations of passages of Lorem Ipsum available.
        </p>

        <!-- Address and Form -->
        <div class="fullwidth clearfix">

            <!-- Address -->
            <div class="address f-left t-left">

                <!-- Address Header -->
                <div class="address_head">
                    <!-- Header -->
                    <h3>
                        Visit Our Office
                    </h3>
                </div>
                <!-- End Address Header -->


                <!-- Address Box -->
                <a href="tel:0123456789" class="box light hover">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-phone colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            Phone
                        </h4>
                        <p>
                            0123 456 789 - 0123 456 788
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a href="mailto:info@3cky.sk" class="box light hover">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-envelope colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            E-Mail;
                        </h4>
                        <p>
                            info@3cky.sk
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a href="#map" class="box light hover scroll">
                    <!-- Icon -->
                    <div class="icon">
                        <!-- Icon SRC -->
                        <i class="fa fa-map-marker colored"></i>
                    </div>
                    <!-- Details -->
                    <div class="details">
                        <h4>
                            Address;
                        </h4>
                        <p>
                            Tupeho 23/A, 831 01, Bratislava
                        </p>
                    </div>
                    <!-- Right Secret Button -->
                    <div class="button">
                        <img src="{{ asset('/images/plus.png') }}" alt="Crexis Plus">
                    </div>
                </a>
                <!-- End Box -->


                <!-- Address Box -->
                <a class="box light">
                    <!-- Details -->
                    <div class="address-note">
                        <h4>
                            Get In Touch
                        </h4>
                        <p>
                            Contrary to popular belief, Lorem Ipsum.
                        </p>
                    </div>
                </a>
                <!-- End Box -->

                <!-- Address Box -->
                <div class="socials">

                    <!-- Social Button -->
                    <a href="#" class="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="twitter">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="pinterest">
                        <i class="fa fa-pinterest"></i>
                    </a>

                    <!-- Social Button -->
                    <a href="#" class="linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a>

                </div>
                <!-- End Box -->

            </div>
            <!-- End Address -->

            <!-- Contact Form -->
            <div class="contact_form f-right">
                <!-- Form -->
                <form class="clearfix form dark_form" method="post" action="{{ url('contact') }}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <!-- Name -->
                    <input type="text" name="name" id="name" required placeholder="Name">

                    <!-- Email -->
                    <input type="email" name="email" id="email" required placeholder="E-Mail">

                    <!-- Subject -->
                    <input type="text" name="subject" id="subject" required placeholder="Subject">

                    <!-- Message -->
                    <textarea name="message" id="message" required placeholder="Message"></textarea>

                    <!-- Verify -->
                    <input type="text" name="verify" id="verify" required placeholder="">

                    <!-- Reset Button -->
                    <button type="reset" id="clear" name="clear">Clear</button>
                    <!-- End Reset Button -->

                    <!-- Send Button -->
                    <button type="submit" id="submit" name="submit" class="colored-bg">Send</button>
                    <!-- End Send Button -->

                    <!-- Error Message -->
                    <div class="error_message">
                        <p class="t-left no-margin">
                            <!-- Error Message Icon -->
                            <i class="fa fa-warning"></i>
                            Validation error occured. Please enter the fields and submit it again.
                        </p>
                    </div>
                    <!-- Submit Message -->
                    <div class="submit_message">
                        <p class="t-left no-margin">
                            <!-- Error Message Icon -->
                            <i class="fa fa-check"></i>
                            Thank You ! Your email has been delivered.
                        </p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <!-- End Contact Form -->
        </div>
        <!-- End Contact, Address Area -->
    </div>
    <!-- End Inner -->
</section>
<!-- End Contact Section -->