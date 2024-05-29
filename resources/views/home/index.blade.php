<x-outer>

    <header class="header">
        <a href="#" class="logo"><span>Festivity</span>Flair</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#service">service</a>
            <a href="#about">about</a>
            <a href="#gallery">gallery</a>
            <a href="#price">price</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
            @guest
                <a href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                @if (auth()->user()->type == 'admin')
                    <a href="{{ route('home.admin') }}">
                        {{ Auth::user()->name }}
                    </a>
                @else
                    {{-- <a href="{{ route('home.user') }}">
                    {{ Auth::user()->name }} --}}
                    <a href="{{ route('user.profile') }}">
                     {{Auth::user()->name}}

                </a>
                @endif
            @endauth

        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>
    </header>

    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="content">
            <h3>
                where your ideas take off
                <span> Previous events </span>
            </h3>

        </div>

        <div class="swiper-container home-slider">
            <div class="swiper-wrapper">
                @foreach ($prevs as $prev)
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image1) }}" alt="Image 1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image2) }}" alt="Image 1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image3) }}" alt="Image 1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image4) }}" alt="Image 1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image5) }}" alt="Image 1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('all_storages/' . $prev->image6) }}" alt="Image 1" />
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- service section starts  -->
    <section class="service" id="service">
        <h1 class="heading">our <span>services</span></h1>

        <div class="box-container">

            @foreach ($services as $service)
                <div class="box">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <h3>{{ $service->title }}</h3>
                    <p>
                        {{ $service->description }}
                    </p>
                </div>
            @endforeach


        </div>
    </section>

    <!-- about section starts  -->
    <section class="about" id="about">
        <h1 class="heading"><span>about</span> us</h1>

        <div class="row">
            @foreach ($abouts as $about)
                <div class="image">
                    <img src="{{ asset('all_storages/' . $about->image) }}" alt="Image 1" />
                </div>

                <div class="content">
                    <h3>{{ $about->title }}</h3>
                    <p>
                        {{ $about->description }}
                    </p>

                    <a href="#contact" class="btn">reach us</a>
                </div>
            @endforeach


        </div>
    </section>

    <!-- gallery section starts  -->
    <section class="gallery" id="gallery">
        <h1 class="heading">our <span>gallery</span></h1>

        <div class="box-container">

            @foreach ($prevs as $prev)
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image1) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image2) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image3) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image4) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image5) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
                <div class="box">
                    <img src="{{ asset('all_storages/' . $prev->image6) }}" alt="Image 1" />
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                </div>
            @endforeach


        </div>
    </section>

    <!-- price section starts  -->
    <section class="price" id="price">
        <h1 class="heading">our <span>pricing</span></h1>

        <div class="box-container">

            @foreach ($pricings as $pricing)
                <div class="box">
                    <h3 class="title">{{ $pricing->title }}</h3>
                    <h3 class="amount">{{ $pricing->price }} tk</h3>
                    <ul>
                        <li><i class="fas fa-check"></i>{{ $pricing->job1 }}</li>
                        <li><i class="fas fa-check"></i> {{ $pricing->job2 }}</li>
                        <li><i class="fas fa-check"></i> {{ $pricing->job3 }}</li>
                        <li><i class="fas fa-check"></i> {{ $pricing->job4 }}</li>
                    </ul>
                    <a href="{{route('checkout', $pricing->id)}}" class="btn">check out</a>
                </div>
            @endforeach



        </div>
    </section>

    <!-- review section starts  -->
    <section class="reivew" id="review">
        <h1 class="heading">client's <span>review</span></h1>

        <div class="review-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{asset('assets/img1.jpg')}}" alt="" />
                        <div class="user-info">
                            <h3>nayana</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
                        dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
                        corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.
                    </p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{asset('assets/img1.jpg')}}" alt="" />
                        <div class="user-info">
                            <h3>nayana</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
                        dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
                        corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.
                    </p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{asset('assets/img1.jpg')}}" alt="" />
                        <div class="user-info">
                            <h3>nayana</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
                        dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
                        corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.
                    </p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{asset('assets/img1.jpg')}}" alt="" />
                        <div class="user-info">
                            <h3>nayana</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
                        dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
                        corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.
                    </p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="{{asset('assets/img1.jpg')}}" alt="" />
                        <div class="user-info">
                            <h3>nayana</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
                        dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
                        corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- contact section starts  -->
    @guest
    <section class="contact" id="contact">
        <h1 class="heading"><span>contact</span> us</h1>

        <form action="/message/store" method="POST">
            @csrf
            <div class="inputBox">
                <input type="text" name="name" placeholder="name" required=""  />
                <input type="email" name="email" placeholder="email" required="" />
            </div>
            <div class="inputBox">
                <input type="tel" name="number" placeholder="number" required="" />
                <input type="text" name="subject" placeholder="subject" required="" />
            </div>
            <textarea name="message" placeholder="message" id="" cols="30" rows="10" required=""></textarea>
            <input type="submit" value="send message" class="btn" />
        </form>
    </section>
    @endguest
    

    <!-- footer section starts  -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>branches</h3>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> bangalore </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> hyderabad </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> delhi </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> kolkata </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> chennai </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> service </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> gallery </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> price </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> reivew </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> contact </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-envelope"></i> kanasu@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> kanasuind@gmail.com </a>
                <a href="#">
                    <i class="fas fa-map-marker-alt"></i> bangalore, india - 560054
                </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin-in"></i> linkedin </a>
            </div>
        </div>

        <div class="box" style="position: fixed; bottom: 20px; right: 20px;">
            <button onclick="topFunction()" title="Go to top" style="display: inline-block; background-color: #555; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>

        <div class="credit">
            created by <span>Amit_69</span> | all rights reserved
        </div>
    </section>

    <!-- theme toggler  -->
    <div class="theme-toggler">
        <div class="toggle-btn">
            <i class="fas fa-cog"></i>
        </div>

        <h3>choose color</h3>

        <div class="buttons">
            <div class="theme-btn" style="background: #ccff33"></div>
            <div class="theme-btn" style="background: #d35400"></div>
            <div class="theme-btn" style="background: #f39c12"></div>
            <div class="theme-btn" style="background: #1abc9c"></div>
            <div class="theme-btn" style="background: #3498db"></div>
            <div class="theme-btn" style="background: #9b59b6"></div>
        </div>
    </div>

</x-outer>
