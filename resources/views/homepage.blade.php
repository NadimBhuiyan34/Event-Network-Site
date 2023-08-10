<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

 

    <!-- font awesome cdn link  -->
 
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">




</head>

<body>

    <section>

        <form action="" method="post">

            <div class="flex">


                <div class="col-sm-12 mx-auto" style="width: 1070px; padding: 40px; ">
                    <div class="card" style="size:width 2500px; height: 500px; background-color:#f2f2f2">
                        <div class="card-body" style="color:black; padding-top:150px; padding-left:60px;">
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="{{ asset('img/Wayzaway_logo.png') }}" alt=""
                                        style="width: 220px;height:70px">
                                    <h1><strong>Imagine a place....</strong></h1>


                                    <p style="color: #272424" class="fs-4" >Where you can tell only your friends and family
                                        about the places<br>
                                        you spent your weekends, holidays and time. A social network that<br>
                                        enhances real life connections you have with people you love</p>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('login.page') }}" class="btn btn-dark btn-lg fs-3">Sign in to
                                            Wayzaway</a>

                                        <a href="{{ route('register.page') }}" class="btn btn-danger btn-lg fs-3">Join
                                            Wayzaway</a>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <img src="people.png" alt="" style="height:240px; width: 240px; ">
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

        </form>

    </section>



    <!-- #second page start -->


    <section>



        <form action="" method="post">

            <div class="flex">


                <div class="col-sm-12 mx-auto" style="width: 1070px; padding: 40px; ">
                    <!-- <div class="card" style="size:width 2500px; height: 500px; background-color:#f2f2f2">
                        <div class="card-body" style="color:black; padding-top:150px; padding-left:60px;"> -->
                    <div class="row">

                        <div class="col-md-5">
                            <img src="motorhome.png" alt=""
                                style="height:260px; width: 260px; padding-left:40px; ">
                        </div>
                        <div class="col-md-5">

                            <h1><strong>Tell your loved <br>
                                    ones about your <br>
                                    days out and <br>
                                    upcoming events</strong></h1>


                            <p style="color: hsl(0, 0%, 34%)" class="fs-4 text-dark">Wayzaway is a way to share the <br>
                                things you’re doing with friends <br>
                                that you know in real life. It’s a <br>
                                great way to see what they’re up to <br>
                                and get ideas on what to do from <br>
                                people you trust</p>




                        </div>


                    </div>
                </div>

            </div>

            </div>

        </form>



    </section>
    <!-- #second page end -->

    <!-- #3rd page Start -->

    <section>



        <form action="" method="post">

            <div class="flex">


                <div class="col-sm-12 mx-auto" style="width: 1070px; padding: 40px; ">
                    <div class="card" style="size:width 2500px; height: 500px; background-color:#f2f2f2">
                        <div class="card-body" style="color:black; padding-top:150px; padding-left:60px;">
                            <div class="row">
                                <div class="col-md-7">

                                    <h1><strong>Social media site <br>
                                            that enhances <br>
                                            your real life</strong></h1>


                                    <p style="color: hsl(0, 0%, 34%)" class="fs-4 text-dark">Wayzaway is a social media site that<br>
                                        helps you connect with friends in a<br>
                                        unique, useful and practical way</p>




                                </div>
                                <div class="col-md-4">
                                    <img src="confetti.png" alt="" style="height:230px; width: 230px; ">
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

        </form>



    </section>

    <!-- #3rd page end -->

    <section>

        <form action="" method="post">

            <div class="flex">


                <div class="col-sm-12 mx-auto" style="width: 1070px; padding: 40px; ">
                    <!-- <div class="card" style="size:width 2500px; height: 500px; background-color:#f2f2f2">
                        <div class="card-body" style="color:black; padding-top:60px; padding-left:120px;"> -->
                    <div class="row">
                        <div class="col-md-7" style="padding-left:400px;">
                            <img src="{{ asset('img/Wayzaway_logo.png') }}" alt=""
                                style="width: 200px;height:50px; ">
                        </div>
                        <p style="color: hsl(0, 0%, 34%);padding-left:100px;" class="text-center fs-4 text-dark">A social network site that allows you to
                            post places
                            and events you’ve visited, or ones that are upcoming<br>
                            to only friends and families. You can share your thoughts and help inspire people
                            you love on places to<br>
                            visit. Wayzaway is focused on enhancing real life connections you have with friends
                            and families. We don’t<br>
                            do trending or allow strangers to search for you. You add friends by sending them an
                            email.</p>

                        <div class="col-md-4" style="padding-left:350px;">
                            <img src=" beach-sunset.png" alt="" style="height:300px; width: 300px; ">


                        </div>

                        <div class="" style="padding-left:450px;">
                            <p class=" fs-2"><b>Are you ready?</b></p>
                        </div>

                        <div class="d-flex gap-2" style="padding-left:380px;">
                            <button class="btn btn-dark btn-lg fs-3">Sign in to Wayzaway</button>
                            <button class="btn btn-danger btn-lg fs-3">Join
                                Wayzaway</button>
                        </div>




                    </div>
                </div>

            </div>

            </div>

        </form>

    </section>



    
</body>

</html>
