<div>
    <main>

        <div class="slider-area hero-bg1   hero-overly">
            {{-- style="background-image: url({{ $banner ? asset('storage/' . $banner->banner) : asset('img/h1_hero.jpg') }});"> --}}
            <div class="single-slider  slider-height2 d-flex align-items-center" style="min-height: 0px !important;">
                <div class="container">
                    <div class="row justify-content-start ">
                        <div class="col-xl-7 col-lg-11">

                            <div class="hero-caption hero-caption3" style="padding-top: 0px !important;">
                                <h1>Contact Us</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">

                    {{-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28998.456663612273!2d84.98519604999998!3d24.699157599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f32c5fbc12ed3d%3A0x9bbc5dccc57d96e!2sBodh%20Gaya%2C%20Bihar!5e0!3m2!1sen!2sin!4v1675451692526!5m2!1sen!2sin"
                        width="1200" height="450" style="border:10;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" wire:submit.prevent="send" id="contactForm"
                            novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" wire:model="msg" name="message" id="message" cols="30" rows="9"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" wire:model="name" name="name" id="name" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                            placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" wire:model="email" name="email" id="email" type="email"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" wire:model="subject" id="subject" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                            placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                          @endif
                    </div>
                     
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Hotel Bodhi Residency, Near kanaya uch vidyalaya,</h3>
                                <p>Pachhatti Bodhgaya, Police Thana Rd, Gaya, Bihar 824231</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+91 9971 (840) 388</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>   <a href="mailto:enquiry@hotel.com">enquiry@hotel.com</a>
                                </h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
