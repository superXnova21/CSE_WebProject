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
                        <h3 class="register-heading">About Us</h3>
                        <form  action="/admin/about-us/store" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" name="image" class="form-control" placeholder="Image"
                                        value="{{ old('image') }}" required="" />
                                    @error('image')
                                        <div class="error-message">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="description" id="" required="" cols="50" rows="10" placeholder="Description">
                                        {{ old('description') }}
                                    </textarea>
                                    @error('description')
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
