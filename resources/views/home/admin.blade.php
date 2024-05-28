<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--css file-->
    <link rel="stylesheet" href="{{ asset('assets/admin_style.css') }}" />
</head>

<body>
    <section class="sidebar">
        <a href="{{ route('home.index') }}" class="logo">
            <i class="fab fa-info-circle"></i>
            <span class="text">Admin Panel</span>
        </a>

        <ul class="side-menu top">

        

            <li class="active">
                <a href="#prev" class="nav-link">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <span class="text">Previous Events</span>
                </a>
            </li>

            <li class="active">
                <a href="#service" class="nav-link">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <span class="text">Our Services</span>
                </a>
            </li>

            <li class="active">
                <a href="#about" class="nav-link">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <span class="text">About Us</span>
                </a>
            </li>

            <li class="active">
                <a href="#pricing" class="nav-link">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <span class="text">Pricing</span>
                </a>
            </li>

            <li class="active">
                <a href="#message" class="nav-link">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <span class="text">Message</span>
                </a>
            </li>

            <li>
                <a href="{{ route('auth.logout-action') }}" class="logout">
                    <i class="fas fa-right-from-bracket"></i>
                    <span class="text">Logout</span>
                </a>
            </li>

        </ul>
    </section>

    <section class="content">


        <main>

            <div class="table-data">
                <div id="prev" class="order">
                    <div class="head">
                        <h3>Previous Events</h3>
                        <a href="{{ route('prevevents.create') }}">
                            <div tabindex="0" class="plusButton">
                                <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                    <g mask="url(#mask0_21_345)">
                                        <path
                                            d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>

                    <table>
                        <thead>
                            <tr class="gap">
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($prevs as $prev)
                                <tr class="gap">
                                    <td>
                                        @if ($prev->image1)
                                            <img src="{{ asset('all_storages/' . $prev->image1) }}" alt="Image 1" />
                                        @endif
                                        @if ($prev->image2)
                                            <img src="{{ asset('all_storages/' . $prev->image2) }}" alt="Image 2" />
                                        @endif
                                        @if ($prev->image3)
                                            <img src="{{ asset('all_storages/' . $prev->image3) }}" alt="Image 3" />
                                        @endif
                                        @if ($prev->image4)
                                            <img src="{{ asset('all_storages/' . $prev->image4) }}" alt="Image 4" />
                                        @endif
                                        @if ($prev->image5)
                                            <img src="{{ asset('all_storages/' . $prev->image5) }}" alt="Image 5" />
                                        @endif
                                        @if ($prev->image6)
                                            <img src="{{ asset('all_storages/' . $prev->image6) }}" alt="Image 6" />
                                        @endif
                                    </td>
                                    <td>
                                        <button>
                                            <a class="no-design"
                                                href="/admin/prev-events/edit/{{ $prev->id }}"><span>Update</span></a>
                                        </button>
                                        <form action="{{ route('prev-events.destroy', $prev->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this event?');">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="table-data">
                <div id="service" class="order">
                    <div class="head">
                        <h3>Our Sevices</h3>
                        <a href="{{ route('service.create') }}">
                            <div tabindex="0" class="plusButton">
                                <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                    <g mask="url(#mask0_21_345)">
                                        <path
                                            d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>

                    <table>
                        <thead>
                            <tr class="gap">
                                <th>Title</th>
                                <th>Descriptions</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                                <tr class="gap">
                                    <td>
                                        <p>{{ $service->title }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $service->description }}</p>
                                    </td>
                                    <td>
                                        <button>
                                            <a class="no-design"
                                                href="/admin/services/edit/{{ $service->id }}"><span>Update</span></a>
                                        </button>
                                        <form action="/admin/services/{{ $service->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this event?');">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="table-data">
                <div id="about" class="order">
                    <div class="head">
                        <h3>About Us</h3>
                        <a href="{{ route('about.create') }}">
                            <div tabindex="0" class="plusButton">
                                <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                    <g mask="url(#mask0_21_345)">
                                        <path
                                            d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>

                    <table>
                        <thead>
                            <tr class="gap">
                                <th>Image</th>
                                <th>Title</th>
                                <th>Descriptions</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($abouts as $about)
                                <tr class="gap">
                                    <td>
                                        <img src="{{ asset('all_storages/' . $about->image) }}" alt="Image" />
                                    </td>
                                    <td>
                                        <p>{{ $about->title }}</p>
                                    </td>
                                    
                                    <td>
                                        <p>{{ $about->description }}</p>
                                    </td>
                                    <td>
                                        <button>
                                            <a class="no-design"
                                                href="/admin/about-us/edit/{{$about->id}}"><span>Update</span></a>
                                        </button>
                                        <form action="/admin/about-us/{{$about->id}}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this event?');">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="table-data">
                <div id="pricing" class="order">
                    <div class="head">
                        <h3>Pricing</h3>
                        <a href="{{ route('pricing.create') }}">
                            <div tabindex="0" class="plusButton">
                                <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                    <g mask="url(#mask0_21_345)">
                                        <path
                                            d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>

                    <table>
                        <thead>
                            <tr class="gap2">
                                <th>Title</th>
                                <th>Price</th>
                                <th>Job 1</th>
                                <th>Job 2</th>
                                <th>Job 3</th>
                                <th>Job 4</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pricings as $pricing)
                                <tr class="gap2">
                                    <td>
                                        <p>{{ $pricing->title }}</p>
                                    </td>
                                    
                                    <td>
                                        <p>{{ $pricing->price }}$</p>
                                    </td>
                                    <td>
                                        <p>{{ $pricing->job1 }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $pricing->job2 }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $pricing->job3 }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $pricing->job4 }}</p>
                                    </td>
                                    <td>
                                        <button>
                                            <a class="no-design"
                                                href="/admin/pricing/edit/{{$pricing->id}}"><span>Update</span></a>
                                        </button>
                                        <form action="/admin/pricing/{{$pricing->id}}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this event?');">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="table-data">
                <div id="message" class="order">
                    <div class="head">
                        <h3>Message: {{count($messages)}}</h3>
                        
                    </div>

                    <table>
                        <thead>
                            <tr class="gap3">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($messages as $message)
                                <tr class="gap3">
                                    <td>
                                        <p>{{ $message->name }}$</p>
                                    </td>
                                    <td>
                                        <p>{{ $message->email }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $message->number }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $message->subject }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $message->message }}</p>
                                    </td>
                                    <td>
                                        
                                        <form action="/admin/message/{{$message->id}}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this event?');">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>


        </main>
    </section>

    <script src="{{ asset('assets/admin_app.js') }}"></script>
</body>

</html>
