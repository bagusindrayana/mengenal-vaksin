<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env("APP_NAME") }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    @stack('styles')

    <style>
        #open-menu {
            position: fixed;
            top: 25px;
            right: 0;
            background: rgb(5, 112, 201);
            height: 100px;
            width: 100px;
            border-radius: 50%;
            color: white;
            align-items: center;
            display: flex;
            justify-content: center;
            transition: all ease-in-out 0.5s;
            z-index: 9999;
        }

        #open-menu:hover {
            cursor: pointer;
            /* transform: translateX(100%); */
        }

        /* #open-menu:hover + #float-menu {
            transform: translateX(0%);
        } */

        #float-menu {
            position: fixed;
            top: 25px;
            right: 0;
            background: rgb(5, 112, 201);
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            min-width: 200px;
            height: 100px;
            color: white;
            box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.10);
            transform: translateX(100%);
            transition: all ease-in-out 0.5s;
            z-index: 9999;
            
        }

        /* #float-menu:hover {
            transform: translateX(0%);
        } */

  

        #float-menu ul {
            list-style: none;
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100%;
            
        }

        #float-menu ul li {
            list-style: none;
            display: flex;
            align-items: center;
            width: calc(100% - 10px);
            height: 50px;
            margin-right: 10px;
        }

        #float-menu ul li a{
            text-decoration: none;
            color: white;
            
        }

        #float-menu ul li a i,#float-menu ul li a span{
            display: inline-block;
            
        }

    </style>
</head>
<body onload="hideLoading()">
    <div class="loading-wrapper" id="main-loading">
        <div class="loading">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div id="open-menu">
        <i class="fas fa-compass fa-4x"></i>
    </div>

    <div id="float-menu">
        
        <ul>
            <li>
                <a href="{{ url('/') }}" title="Beranda">
 
                   <i class="fas fa-home fa-2x"></i>
                </a>

            </li>
            <li>
                
                <a href="{{ url('/tentang-vaksin#jenis-vaksin') }}" title="Macam-Macam Vaksin">

                    <i class="fas fa-medkit fa-2x"></i>
                </a>
            </li>
            <li>
                
                <a href="{{ url('/quiz-vaksin') }}" title="Quiz Vaksinasi">

                    <i class="fas fa-spell-check fa-2x"></i>
                </a>
            </li>
         
        </ul>
    </div>

    
    
    @yield('content')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        function hideLoading() {
            document.getElementById("main-loading").classList.add('hide'); 
            setTimeout(() => {
                document.getElementById("main-loading").style.display = "none"; 
            }, 1000);
        }

        var openMenu = false;

        document.getElementById("float-menu").onmouseover = function() {mouseOver()};
        document.getElementById("float-menu").onmouseleave = function() {mouseOut()};
        function mouseOver() {
            document.getElementById("open-menu").style.transform = "translateX(100%)";
        }
        function mouseOut() {
            if(document.getElementById("open-menu").style.transform == "translateX(100%)"){
                openMenu = false;
            }
            document.getElementById("open-menu").style.transform = "translateX(0%)";
            document.getElementById("float-menu").style.transform = "translateX(100%)";
            console.log("open-menu");
        }

        document.getElementById("open-menu").onmouseover = function() {mouseOver1()};
        document.getElementById("open-menu").onmouseleave = function() {mouseOut1()};
        function mouseOut1() {
            if(!openMenu) {
                document.getElementById("float-menu").style.transform = "translateX(100%)";
            }
        }
        function mouseOver1() {
            openMenu = true;
            document.getElementById("float-menu").style.transform = "translateX(0%)";
            document.getElementById("open-menu").style.transform = "translateX(100%)";
        }

    </script>
    <script>
        AOS.init();
    </script>

    @stack('scripts')
</body>
</html>