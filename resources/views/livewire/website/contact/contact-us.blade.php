@section('bodyClass', 'contact-page')
<div>

        <section class="breadcrumb-section" style="background-image: url('assets/images/2.webp');">
            <div class="wrapper">
                <div class="breadcrumb-area">


                    <h1 class="title">Contact Us</h1>

                    <p class="description">your dreams can come true. we are here to help you.</p>
                </div>
            </div>
        </section>
        <section class="contact-form-section section">
            <div class="wrapper">
                <div class="section-header">
                    <h2 class="section-title">Let's Work Together</h2>
                    <p>
                        We are committed to providing our customers with exceptional service and ensuring that you have
                        an
                        unforgettable experience. If you have any questions or need assistance, please don't hesitate to
                        contact
                        us. We look forward to helping you create lasting memories.
                    </p>
                </div>
                <form action="https://favouriterange.com/contact-us" method="POST" class="custom-form">

                    <div class="col-2">


                        <div class="form-group">
                            <label for="floatingInput ">Full Name</label>
                            <input type="text" class="form-control" id="floatingInput"
                                placeholder="Enter your full name" name="name" required="">
                        </div>
                        <div class="form-group">
                            <label for="floatingInput ">Phone Number</label>
                            <input type="text" class="form-control" id="floatingInput"
                                placeholder="Enter your phone number" name="phone" required="">
                        </div>
                    </div>
                    <div class="col-2">

                        <div class="form-group">
                            <label for="floatingInput ">Email Address</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="email" required="">
                        </div>
                        <div class="form-group">
                            <label for="floatingInput ">Subject</label>
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter subject here"
                                name="subject" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="floatingTextarea">Message</label>
                        <textarea class="form-control" placeholder="Leave a message here" rows="3" id="floatingTextarea"
                            name="message"></textarea>

                    </div>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </section>
        <section class="contact-info section">
            <div class="wrapper">

                <div class="section-header">
                    <h2 class="section-title">Have Anything To Ask ? Let's Talk</h2>
                    <p>We specialize in forging strategic partnerships that drive innovation and growth. Our expertise
                        connects businesses with the right resources, ideas, and people for impactful results.</p>
                </div>

                <div class="info-box">
                    <div class="info-item">
                        <div class="content">
                            <div class="icon ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div class="some-text">
                                <h4>Email Support</h4>
                                <p>starunityd@gmail.com, info@starunitydevelopment.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="content">
                            <div class="icon ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>

                            </div>
                            <div class="some-text">
                                <h4>Address</h4>
                                <p>Bashundhara Revierview, Hasnabad, Keraniganj</p>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="content">
                            <div class="icon ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </div>
                            <div class="some-text">
                                <h4>Office Hours</h4>
                                <p> Sat - Thu : 8 am - 5 pm<br>
                                    Friday: CLOSED
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="content">
                            <div class="icon ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>

                            </div>
                            <div class="some-text">
                                <h4>Phone</h4>
                                <p>+88 017 1234 5678</p>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </section>
        <section class="map-sec">
            
                
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.1302063341727!2d90.4264554740239!3d23.671301191810954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b93fe4d4be69%3A0xa1466c731900ce4c!2sStar%20Unity!5e0!3m2!1sen!2sbd!4v1772530783296!5m2!1sen!2sbd"
                                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
           
        </section>
</div>
