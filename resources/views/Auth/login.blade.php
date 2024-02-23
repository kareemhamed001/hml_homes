<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/js/auth/login.js','resources/js/auth/helpers/checkToken.js','resources/scss/main.scss'])
</head>
<body class="bg-light p-0 m-0">
<div class="d-flex flex-wrap justify-content-center align-items-center vh-100 p-0 w-100" >
    <img class="position-absolute w-100 h-100 top-0 rounded-0 start-0" style="z-index: 0;object-fit: cover" src="{{asset('assets/loginCover.jpg')}}" alt="">
    <form id="loginForm" class="col-11 col-md-8 col-lg-4 bg-light bg-opacity-25  my-4  shadow-sm" style="z-index: 10">
        <div class="d-flex fs-30 justify-content-center align-items-center">
            <span class="text-primary  fw-600 text-large">HML <span class="fw-500">HOME</span></span>
        </div>
        <div class="my-1 my-md-2 my-lg-3  ">
            <label class="form-label fw-600 text-black" for="">Email</label>
            <input class="form-control shadow-sm" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="my-1 my-md-2 my-lg-3 ">
            <label class="form-label fw-600 text-black" for="">Password</label>
            <input class="form-control shadow-sm" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="mt-2 mt-md-3 mt-lg-4 mt-xl-5  row justify-content-center">

            <button class="btn btn-primary  w-auto" type="submit">Login</button>
        </div>

    </form>
</div>

</body>
</html>
