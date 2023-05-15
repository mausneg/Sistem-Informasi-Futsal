<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/mybooking.css">
</head>
<body>
    <div class="header">
        <div class="container-header">
            <div class="header-btn">
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                    <h2 class="notif-text">Notification</h2>
                </div>
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                    <h2 class="profile-text">Profile</h2>
                </div>    
            </div>
            <div class="header-list" hidden>
                <div class="header-list-header">
                    <h4 class="list-title"></h4>
                </div>
                <div class="header-list-content">
                    <ol class="header">

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-body">
        <div class="navbar">
            <img src="../image/Logo Sifoot 2.png" alt="" class="logo">
            <ul class="navbar-list">
                <li class="list list-select" id="home">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-house text-list-select"></i>
                        <h4 class="list-text text-list-select">Home</h4>
                    </button>
                </li>
                <li class="list" id="my-booking">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-list-check"></i>
                        <h4 class="list-text">My Booking</h4>
                    </button>
                </li>
                <li class="list" id="payment">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-money-bill-wave"></i>
                        <h4 class="list-text">Payment</h4>
                    </button>
                </li>
                <li class="list" id="about-us">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-users"></i>
                        <h4 class="list-text">About Us</h4>
                    </button>
                </li>
                <li class="list" id="feedback">
                    <button class="list-btn">
                        <i class="list-icon fa-regular fa-comments"></i>
                        <h4 class="list-text">Feedback</h4>
                    </button>
                </li>
                <li class="list" id="guide">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-book"></i>
                        <h4 class="list-text">Guide</h4>
                    </button>
                </li>
                <li class="list" id="log-out">
                    <button class="list-btn">
                        <i class="list-icon fa-solid fa-right-from-bracket"></i>
                        <h4 class="list-text">Log Out</h4>
                    </button>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="content-btn">
                <div class="content-btn-all">
                    <button class="btn-all btn-select">
                        <h4>All</h4>
                    </button>
                </div>
                <div class="content-btn-ongoing">
                    <button class="btn-ongoing btn-unselect">
                        <h4>On Going</h4>
                    </button>
                </div>
                <div class="content-btn-end">
                    <button class="btn-end btn-unselect">
                        <h4>End</h4>
                    </button>
                </div>
                <div class="content-btn-cancel">
                    <button class="btn-cancel btn-unselect">
                        <h4>Cancel</h4>
                    </button>
                </div>
            </div>
            <div class="content-main">
                <div class="content-main-header">
                    <div class="book-search">
                        <input type="text" id="input-search" placeholder="Cari bookingmu di sini">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="book-filter">
                        <input type="text" placeholder="Pilih tanggal booking">
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                </div>
                <div class="content-main-all">
                    
                </div>
                <div class="content-main-ongoing" hidden>
                    ongoing
                </div>
                <div class="content-main-end" hidden>
                    end
                </div>
                <div class="content-main-cancel" hidden>
                    cancel
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/js/mybooking.js"></script>
</body>
</html>