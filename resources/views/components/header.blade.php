<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ENT.ENTtechnologies.com/html/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 13:56:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>E-learning website [ ENT ]</title>

    <link rel="shortcut icon" type="image/x-icon" href="/assets-client/img/logo.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets-client/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets-client/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets-client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets-client/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/feather/feather.css">

    <link rel="stylesheet" href="/assets-client/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets-client/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="/assets-client/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets-client/plugins/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="/assets-client/css/blue.css">

    <!--
<link rel="stylesheet" href="/assets-client/plugins/aos/aos.css"> -->



    <link rel="stylesheet" href="/assets-client/css/style.css">
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .loader-bg{
            position: fixed;
            z-index: 99999;
            background-color:#fff;
            width: 100%;
            height: 100%;
        }
        .wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -100px;
            width: 200px;
            height: 200px;
            background-color: transparent;
            border: none;
            -webkit-user-select: none;
        }

        .wrapper .box-wrap {
            width: 70%;
            height: 70%;
            margin: calc((100% - 70%)/2) calc((100% - 70%)/2);
            position: relative;
            transform: rotate(-45deg);
        }

        .wrapper .box-wrap .box {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background: rgba(135, 0, 0, 0.6);
            background: linear-gradient(to right, #141562, #486FBC, #EAB5A1, #8DD6FF, #4973C9, #D07CA7, #F4915E, #F5919E, #B46F89, #141562, #486FBC);
            background-position: 0% 50%;
            background-size: 1000% 1000%;
            visibility: hidden;
        }

        .wrapper .box-wrap .box.one {
            -webkit-animation: moveGradient 15s infinite, oneMove 3.5s infinite;
            animation: moveGradient 15s infinite, oneMove 3.5s infinite;
        }

        .wrapper .box-wrap .box.two {
            -webkit-animation: moveGradient 15s infinite, twoMove 3.5s 0.15s infinite;
            animation: moveGradient 15s infinite, twoMove 3.5s 0.15s infinite;
        }

        .wrapper .box-wrap .box.three {
            -webkit-animation: moveGradient 15s infinite, threeMove 3.5s 0.3s infinite;
            animation: moveGradient 15s infinite, threeMove 3.5s 0.3s infinite;
        }

        .wrapper .box-wrap .box.four {
            -webkit-animation: moveGradient 15s infinite, fourMove 3.5s 0.575s infinite;
            animation: moveGradient 15s infinite, fourMove 3.5s 0.575s infinite;
        }

        .wrapper .box-wrap .box.five {
            -webkit-animation: moveGradient 15s infinite, fiveMove 3.5s 0.725s infinite;
            animation: moveGradient 15s infinite, fiveMove 3.5s 0.725s infinite;
        }

        .wrapper .box-wrap .box.six {
            -webkit-animation: moveGradient 15s infinite, sixMove 3.5s 0.875s infinite;
            animation: moveGradient 15s infinite, sixMove 3.5s 0.875s infinite;
        }

        @-webkit-keyframes moveGradient {
            to {
                background-position: 100% 50%;
            }
        }

        @keyframes moveGradient {
            to {
                background-position: 100% 50%;
            }
        }

        @-webkit-keyframes oneMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes oneMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @-webkit-keyframes twoMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes twoMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @-webkit-keyframes threeMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes threeMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
                clip-path: inset(0% 70% 70% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(0% 35% 70% round 5%);
                clip-path: inset(0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
                clip-path: inset(35% 70% 35% 0 round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @-webkit-keyframes fourMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes fourMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @-webkit-keyframes fiveMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes fiveMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @-webkit-keyframes sixMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }

        @keyframes sixMove {
            0% {
                visibility: visible;
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            14.2857% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            28.5714% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            42.8571% {
                -webkit-clip-path: inset(70% 0 0 70% round 5%);
                clip-path: inset(70% 0 0 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            57.1428% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            71.4285% {
                -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
                clip-path: inset(35% 0% 35% 70% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            85.7142% {
                -webkit-clip-path: inset(35% round 5%);
                clip-path: inset(35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }

            100% {
                -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
                clip-path: inset(70% 35% 0% 35% round 5%);
                -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
                animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            }
        }
    </style>
</head>

<body class="home-three">
    <div class="loader-bg" id="loader">
        <div class="wrapper" >
            <div class="box-wrap">
                <div class="box one"></div>
                <div class="box two"></div>
                <div class="box three"></div>
                <div class="box four"></div>
                <div class="box five"></div>
                <div class="box six"></div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <header class="header header-page">
            <div class="header-fixed">
                <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
                    <div class="container ">
                        <div class="navbar-header">
                            <a id="mobile_btn" href="javascript:void(0);">
                                <span class="bar-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a href="{{ route('Dashboard-client') }}" class="navbar-brand logo">
                                <img src="{{ asset('/img/logo.gif') }}" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <div class="main-menu-wrapper">
                            <div class="menu-header">
                                <a href="" class="menu-logo">
                                    <img src="{{ asset('/img/logo.svg') }}" class="img-fluid" alt="Logo">
                                </a>
                                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <ul class="main-nav">
                                <li class="has-submenu {{ Route::currentRouteName() == 'Dashboard-client' ? 'active' : '' }}">
                                    <a href="{{ route('Dashboard-client') }}">Trang chủ </a>
                                </li>
                                <li class="has-submenu {{ Route::currentRouteName() == 'client.instructor-list' ? 'active' : '' }}">
                                    <a href="{{ route('client.instructor-list') }}">Danh sách giảng viên</a>
                                   
                                </li>
                                <li class="{{ Route::currentRouteName() == 'client.course-lists' ? 'active' : '' }}">
                                    <a href="{{ route('client.course-lists') }}">Khóa học</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'client.post-list' ? 'active' : '' }}">
                                    <a href="{{ route('client.post-list') }}">Bài viết</a>
                                </li>
                                

                                @if(auth()->check())
                                    @if(auth()->user()->role == 2)
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">
                                            <a href="{{ route('client.instructor-course',auth()->user()->id)}}">Quản lí Khóa học</a>
                                        </li>
{{--                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">--}}
{{--                                            <a href="{{ route('client.instructor-course') }}">Khóa học của tôi</a>--}}
{{--                                        </li>--}}
                                    @elseif(auth()->user()->role == 0)
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">
                                            <a href="{{ route('client.instructor-course',auth()->user()->id)}}">Khóa học của tôi</a>
                                        </li>
                                        @elseif(auth()->user()->role == 1)
                                        <li class="{{ Route::currentRouteName() == 'client.instructor-course' ? 'active' : '' }}">
                                            <a href="/admin">Quản trị website</a>
                                        </li>
                                        @endif
                                @endif
                            </ul>
                        </div>
                        @guest
                            <ul class="nav header-navbar-rht">
                                <li class="nav-item">
                                    <a class="nav-link header-sign" href="{{route('login')}}">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link header-login" href="{{route('register')}}" >Đăng ký</a>
                                </li>
                            </ul>
                        @endguest
                        @auth
                            <ul class="nav ">

                                <li class="nav-item user-nav">
                                    <div class="dropdown" >
                                    <a href="" class="dropdown-toggle"
                                    data-bs-toggle="">
                                        <span class="user-img" >
                                            <img src="@if(auth()->user()->thumbnail)
                                            @if(Str::startsWith(auth()->user()->thumbnail, 'http'))
                                                {{ auth()->user()->thumbnail }}
                                            @else
                                                {{ Storage::url('assets-client/img/user/' . auth()->user()->thumbnail) }}
                                            @endif
                                        @else
                                            https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPyGNr2qL63Sfugk2Z1-KBEwMGOfycBribew&usqp=CAU
                                        @endif
                                    " style="transform: scale(0.8);">
                                            <span class="status online"></span>
                                        </span>

                                    </a>

                                    <div class="users dropdown-menu dropdown-user"
                                        data-popper-placement="bottom-end">
                                        <a href="">{{auth()->user()->name}}</a>
                                        @if(auth()->user()->role == 0)
                                        <p class="text-muted text-center">Học viên</p>
                                        @elseif(auth()->user()->role == 1)
                                        <p class="text-muted  m-0">ADMIN</p>
                                        @elseif(auth()->user()->role == 2)
                                        <p class="text-muted mb-0">Mentor</p>
                                        @endif

                                        @if(auth()->user()->role == 0)
                                        <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}"><i
                                            class="feather-user me-1"></i>Thông tin người dùng</a>
                                        </a>
                                        @elseif(auth()->user()->role== 2)
                                        <a class="dropdown-item" href="{{route('client.mentor_detail', ['id' =>auth()->user()->id]) }}">
                                            <i class="feather-star me-1"></i> Giới thiệu
                                        </a>
                                    <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}">
                                        <i class="feather-star me-1"></i> Thông tin mentor
                                    </a>
                                    @elseif(auth()->user()->role== 1)
                                    <a class="dropdown-item" href="{{ route('client.dashboard-profile') }}">
                                        <i class="feather-star me-1"></i> Thông tin ADMIN
                                    </a>

                                    <a class="dropdown-item" href="/admin">
                                        <i class="feather-cpu me-1"></i> Quản trị website
                                    </a>
                                    @endif

                                        <a class="dropdown-item" href="{{route('logout')}}"><i
                                                class="feather-log-out me-1"></i>Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        @endauth
                        </div>


                    </div>
                </nav>
            </div>
        </header>
        <script>
            function chuyenDuLieu() {
            // Lấy giá trị từ tất cả các trường ngoài form và phân tách chúng bằng dấu phẩy
            var giaTriNgoaiFormList = document.querySelectorAll('.inputOutsideForm')
            var giaTriChuoi = Array.from(giaTriNgoaiFormList).map(function(element) {
                return element.value
            }).join(',')

            // Thiết lập giá trị cho trường trong form
            document.getElementById("inputInsideForm").value = giaTriChuoi
        }
        </script>
