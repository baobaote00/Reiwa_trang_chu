<?php
$title = setHeader();
$contactModel = new ContactModel();
$contact = $contactModel->getContact();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/all.min.css">
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/slick-theme.css">
    <link rel="stylesheet" href="./public/css/slick.css">
    <link rel="stylesheet" href="./public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./public/css/animate.css">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="/public/images/ReiwaHouse_logo_final.svg">
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/stick.js"></script>



    <style>
        .nav-item:not(.is_active):hover:before {
            opacity: 1;
            bottom: 0;
        }

        .nav-item:not(.is-active):hover {
            color: #333;
        }

        .nav-indicator {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            transition: 0.4s;
            height: 5px;
            z-index: 1;
            border-radius: 8px 8px 0 0;
        }


        ul {
            padding: 0;
            list-style: none;
        }

        ul li {
            display: inline-block;
            position: relative;
            line-height: 21px;
            text-align: left;
        }

        ul li a {
            display: block;
            padding: 8px 5px;
            text-decoration: none;
        }

        ul li a:hover {
            background: #007cba;
            color: white;
        }



        ul li ul.dropdown {
            min-width: 100%;
            /* Set width of the dropdown */
            background: #f2f2f2;
            display: none;
            position: absolute;
            z-index: 999;
            left: 0;
        }

        ul li:hover ul.dropdown {
            display: block;
            /* Display the dropdown */
        }

        ul li ul.dropdown li {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Top -->
    <div class="top-style border-bottom">
        <nav class="navbar navbar-light justify-content-between">
            <div class="container">
                <a class="navbar-brand">
                    <div class="top-right">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Hotline:</span>
                        <span class="top-mg-right"><b><?php echo $contact[4]['link'] ?></b></span>
                        <i class="fas fa-envelope"></i>
                        <span>Email:</span>
                        <span><?php echo $contact[3]['link'] ?></span>
                    </div>
                </a>
                <form action="" method="GET" class="form-inline my-2 my-lg-0" style="right: 0px;">
                    <div class="top-search-all">
                        <input type="text" name="action" value="post" hidden>
                        <input type="text" name="type" value="search" hidden>
                        <input class="top-search" id="search-input" type="search" name="value" placeholder="Tìm Kiếm" aria-label="Search">
                        <button class="top-btn-search" id="action-search" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>

            </div>
        </nav>
    </div>
    <!-- Nav -->
    <nav class="navbar navbar-expand-sm navbar-light bg-white sticky-top pos-nav">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URL_TRANG_CHU ?>"><img src="<?php echo DEFAULT_IMG ?>" alt="logo" width="150" height="100" class="img-fluid"></a>
            <button class="navbar-toggler" id="click-nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php
                    echo getNavBar();
                    ?>
                </ul>

            </div>
        </div>

    </nav>


    <script>
        
    </script>