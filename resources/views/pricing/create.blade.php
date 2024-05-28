<!DOCTYPE html>
<html>

<head>
    <title>Create</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/create_style.css') }}">
    <style>
        #form{
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .error-message{
            color: red;
        }
        .form-group input{
            width: 340px
        }
    </style>
</head>

<body>
    <div class="container register">

        <div class="row">


            <div class="col-md-9 register-right">

                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">


                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="club" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Package</h3>
                        <form  action="/admin/pricing/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row register-form" id="form">

                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Title"
                                        value="{{ old('title') }}" required="" />
                                    @error('title')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="number" name="price" class="form-control" placeholder="Price"
                                        value="{{ old('price') }}" required="" />
                                    @error('price')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="job1" class="form-control" placeholder="Job 1"
                                        value="{{ old('job1') }}" required="" />
                                    @error('job1')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="job2" class="form-control" placeholder="Job 2"
                                        value="{{ old('job2') }}" required="" />
                                    @error('job2')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="job3" class="form-control" placeholder="Job 3"
                                        value="{{ old('job3') }}" required="" />
                                    @error('job3')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="job4" class="form-control" placeholder="Job 4"
                                        value="{{ old('job4') }}" required="" />
                                    @error('job4')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>


                                <button type="submit">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                        </svg> Create
                                    </span>
                                </button>



                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
