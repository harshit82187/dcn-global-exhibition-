<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - login</title>
    <link rel="stylesheet" href="{{ asset('backend/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bundles/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.ico') }}" />
</head>

<body>
    <!-- Display Errors -->
    @if (Session::has('success') || Session::has('error') || $errors->any())
        <script>
            @if (Session::has('success'))
                var messageType = 'success';
                var messageColor = 'green';
                var message = "{{ Session::get('success') }}";
            @elseif (Session::has('error'))
                var messageType = 'warning';
                var messageColor = 'orange';
                var message = "{{ Session::get('error') }}";
            @elseif ($errors->any())
                var messageType = 'error';
                var messageColor = 'red';
                var message = @json($errors->all());
            @endif

            if (Array.isArray(message)) {
                message.forEach(function(msg) {
                    iziToast[messageType]({
                        message: msg,
                        position: 'topRight',
                        timeout: 4000,
                        displayMode: 0,
                        color: messageColor,
                        theme: 'light',
                        messageColor: 'black',
                    });
                });
            } else {
                iziToast[messageType]({
                    message: message,
                    position: 'topRight',
                    timeout: 4000,
                    displayMode: 0,
                    color: messageColor,
                    theme: 'light',
                    messageColor: 'black',
                });
            }
        </script>
    @endif


    <div class="loader"></div>

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('login.submit') }}" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            {{--  <div class="float-right">
                        <a href="{{ route('admin-forget') }}" class="text-small">
                          Forgot Password?
                        </a>
                      </div>  --}}
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" tabindex="3"
                                                id="remember-me" name="remember">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('backend/js/app.min.js') }}"></script>
    
    <script src="{{ asset('backend/js/scripts.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    @if (Session::has('success') || Session::has('error') || $errors->any())
        <script>
            @if (Session::has('success'))
                var messageType = 'success';
                var messageColor = 'green';
                var message = "{{ Session::get('success') }}";
            @elseif (Session::has('error'))
                var messageType = 'warning';
                var messageColor = 'orange';
                var message = "{{ Session::get('error') }}";
            @elseif ($errors->any())
                var messageType = 'error';
                var messageColor = 'red';
                var message = @json($errors->all());
            @endif

            if (Array.isArray(message)) {
                message.forEach(function(msg) {
                    iziToast[messageType]({
                        message: msg,
                        position: 'topRight',
                        timeout: 4000,
                        displayMode: 0,
                        color: messageColor,
                        theme: 'light',
                        messageColor: 'black',
                    });
                });
            } else {
                iziToast[messageType]({
                    message: message,
                    position: 'topRight',
                    timeout: 4000,
                    displayMode: 0,
                    color: messageColor,
                    theme: 'light',
                    messageColor: 'black',
                });
            }
        </script>
    @endif

</body>

</html>
