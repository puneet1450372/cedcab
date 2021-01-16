
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;

        }

        nav {
            background-color: #474645;
            width: 100%;
            height: 80px;
        }

        label.logo {
            color: white;
            font-size: 35px;
            line-height: 80px;
            padding: 0 100px;
            font-weight: bold;
        }

        nav ul {
            float: right;
            margin-right: 20px;
        }

        nav ul li {
            display: inline;
            line-height: 80px;
            margin: 0 5px;
        }

        nav ul li a {
            color: white;
            font-size: 17px;
            text-transform: uppercase;
            font-weight: 700;
        }

        a.active,
        a:hover {
            /* background-color: yellow; */
            transition: .5s;
        }

        .checkbtn {
            font-size: 30px;
            color: white;
            float: right;
            line-height: 80px;
            margin-right: 40px;
            cursor: pointer;
            display: none;
        }

        #check {
            display: none;
        }

        @media(max-width:952px) {
            label.logo {
                font-size: 30px;
                padding-left: 50px;
            }

            nav ul li a {
                font-size: 16px;
            }
        }

        @media(max-width:858px) {
            .checkbtn {
                display: block;

            }

            ul {
                position: fixed;
                width: 100%;
                height: 60vh;
                background: #404040;
                top: 80px;
                left: -100%;
                text-align: center;
                transition: all .5s;
                z-index: 99;
            }

            nav ul li {
                display: block;
                margin: 50px 0;
                line-height: 10px;
            }

            nav ul li a {
                font-size: 20px;
            }

            #check:checked~ul {
                left: 0;
            }
        }
    </style>
</head>
<body>
<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label class="logo">Ced<span style="color: #ccd138;"> Cab</span></label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="signup.php">BOOK NOW</a></li>

            <li><a href="login.php"> Login </a></li>
           
        </ul>
    </nav>
</body>
</html>