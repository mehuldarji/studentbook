<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Studentbook | Coming Soon</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600%2C400%2C500%7CRoboto:400" rel="stylesheet" property="stylesheet" media="all">

    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700|Damion' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <style>
        /* Reset */

        body,
        div,
        dl,
        dt,
        dd,
        ul,
        ol,
        li,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        pre,
        code,
        form,
        fieldset,
        legend,
        input,
        textarea,
        p,
        blockquote,
        th,
        td {
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        fieldset,
        img {
            border: 0;
        }

        address,
        caption,
        dfn,
        th,
        var {
            font-style: normal;
            font-weight: normal;
        }

        li {
            list-style: none;
        }

        caption,
        th {
            text-align: left;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: 100%;
            font-weight: normal;
        }


        html,
        body {
            height: 100%;
            background-color: #000;
        }



        .black {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #wrapper {
            position: relative;
            width: 100%;
            margin: auto;
        }

        #header {
            width: 100%;
            padding: 100px 0 100px 0;
            margin: auto;
        }

        h1 {
            font-family: 'Damion', cursive;
            font-size: 103px;
        }

        h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 30px;
            letter-spacing: 4px;
        }

        h2 strong.sep-one {
            width: 60px;
            height: 1px;
            background: #fff;
            position: absolute;
            margin-left: -80px;
            margin-top: 15px;
        }

        h2 strong.sep-two {
            width: 60px;
            height: 1px;
            background: #fff;
            position: absolute;
            margin-left: 15px;
            margin-top: 15px;
        }


        #middle {
            width: 100%;
            background: unset;
            /* padding: 10px 0; */
            /* margin: 50px 0; */
        }

        #middle p {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 24px;
            color: #000000;
            line-height: 34px;
            padding: 0 30%;
        }

        #middle p span {
            color: #e63b4d;
        }

        #footer {
            width: 100%;
        }

        ul.social {
            width: 242px;
            margin: 80px auto 0;
            height: 62px;
        }

        ul.social li {
            float: left;
            background: url(../images/social.png) left top no-repeat;
            position: relative;
            height: 62px;
            margin-right: 28px;
        }

        ul.social li a {
            display: block;
            width: 62px;
            height: 62px;
        }


        ul.social li.facebook {
            height: 62px;
            background-position: 0 0;
            width: 62px;
        }

        ul.social li.facebook:hover {
            background-position: 0 -62px;
        }



        ul.social li.twitter {
            height: 62px;
            background-position: -90px 0;
            width: 62px;
        }

        ul.social li.twitter:hover {
            background-position: -90px -62px;
        }



        ul.social li.youtube {
            margin-right: 0;
            height: 62px;
            background-position: -180px 0;
            width: 62px;
        }

        ul.social li.youtube:hover {
            background-position: -180px -62px;
        }


        @media screen and (max-width: 568px) {
            #header {
                width: 100%;
                padding: 30px 0 30px 0;
                margin: auto;
            }


            h1 {
                font-size: 53px;
            }

            h2 {
                font-family: 'Josefin Sans', sans-serif;
                font-size: 15px;
                letter-spacing: 2px;
            }

            h2 strong.sep-one {
                width: 30px;
                margin-left: -40px;
                margin-top: 7px;
            }

            h2 strong.sep-two {
                width: 30px;
                margin-left: 10px;
                margin-top: 7px;
            }

            #middle {
                margin: 50px 0 20px 0;
                width: 90%;
                padding: 5%;
            }

            #middle p {
                font-family: 'Josefin Sans', sans-serif;
                font-size: 18px;
                color: #000000;
                line-height: 24px;
                padding: 0;
            }

            #middle p span {
                color: #e63b4d;
            }


        }

        body {
            margin: 0;
            padding: 0;
            color: #fff;
            text-align: center;
            background: url(<?= asset('img/11.jpg') ?>) right bottom no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            box-shadow: inset 0 0 100px rgb(0 0 0 / 50%);
            position: relative;
        }

        h2 {
            font-family: 'Josefin Sans', sans-serif;
    font-size: 40px;
    letter-spacing: 0px;
    width: 70%;
    margin: auto;
    line-height: 41px;
        }
        .btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn-primary {
    background: -moz-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #007bff), color-stop(100%, #00c9e4));
    background: -webkit-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
    background: -o-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
    background: -ms-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
    background: linear-gradient(256deg, #0172bd8a 0%, #0172BD 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#007bff', endColorstr='#00c9e4', GradientType=1);
    border-color: var(--theme-color);
}
.form-control, .btn {
    font-size: 13px;
}
.btn-primary {
    background: -moz-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -webkit-gradient(linear,left top,right top,color-stop(0%,#007bff),color-stop(100%,#00c9e4));
    background: -webkit-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -o-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: -ms-linear-gradient(194deg,#00c9e4 0%,#007bff 100%);
    background: linear-gradient(256deg,#00c9e4 0%,#007bff 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007bff',endColorstr='#00c9e4',GradientType=1 );
    border-color: #007bff;
}
.btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #0062cc;
    border-color: #005cbf;
}
.form-control, .btn {
    font-size: 13px;
}
.btn-group-lg>.btn, .btn-lg {
    padding: 0.5rem 1rem;
    font-size: 15px;
    color: #fff;
    border-radius: 0.3rem;
    text-decoration: none;
    margin-top: 15px !important;
    font-family: 'Josefin Sans', sans-serif;
}
    </style>
</head>

<body>
    <div class="black"></div>
    <div id="wrapper">
        <div id="header" style="padding: 29px 0 50px 0;">
            <a href="/home"><img src="{{ asset('img/logoW.png') }}" style="width:9%"></a>
            <h1>Page Not Found</h1>
            <div id="middle">
                <img src="{{ asset('img/404.png') }}">
            </div>


            <h2 style="    margin-bottom: 30px;"><strong class="sep-one"></strong>Oops! Looks like you followed a bad link.

                If you think this is a problem with us, please tell us.<strong class="sep-two"></strong></h2>

                <a href="/" class="btn btn-primary btn-lg">Go Back</a>
            </div>

    </div>
</body>

</html>