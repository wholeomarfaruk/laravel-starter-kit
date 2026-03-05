@section('bodyClass', 'projects-page')
<div>
           <section class="breadcrumb-section" style="background-image: url('{{asset('assets/images/2.webp')}}');">
            <div class="wrapper">
                <div class="breadcrumb-area">


                    <h1 class="title">Projects</h1>

                    <p class="description">your dreams can come true. we are here to help you.</p>
                </div>
            </div>
        </section>
        <section class="projects_filter section">
            <div class="wrapper">
                <div>
                    <!-- <h3 class="filter-title">Search Projects</h3> -->
                    <div class="filter-inner">
                        <div class="filter-item">
                            <label for="">Location</label>
                            <select name="" id="">
                                <option value="">Select Location</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="khulna">Khulna</option>
                                <option value="rajshahi">Rajshahi</option>

                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Type</label>
                            <select name="" id="">
                                <option value="">Select type</option>
                                <option value="luxary">Luxary</option>
                                <option value="residentials">Residentials</option>
                                <option value="classic">Classic</option>
                                <option value="commercial">Commercial</option>

                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Status</label>
                            <select name="" id="">
                                <option value="">Select status</option>
                                <option value="On Sale">On Sale</option>
                                <option value="On Progress">On Progress</option>
                                <option value="completed">Completed</option>
                                <option value="Upcomming">Upcomming</option>

                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Search</label>
                            <input type="text" placeholder="type something...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="projects-section ">
            <div class="wrapper">
                <div class="projects-grid">
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/1.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/2.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/3.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">

                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/4.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/1.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/2.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/3.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">

                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                    <a href="/project-details.html" class="item">
                        <img src="{{asset('assets/images/buildings/4.jpg')}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>Star Complex</h2>
                            <p>Bashundhara Riverview</p>
                        </div>
                    </a>
                </div>
                <div class="pagination">
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-prev">
                         
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                                </svg>
                            Prev


                            </a>
                        </li>

                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-active">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">3</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">...</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">4</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-next">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                </svg>




                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </section>

</div>
