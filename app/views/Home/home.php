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
    <link rel="stylesheet" href="/css/home.css">
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
            <img src="/image/Logo Sifoot 2.png" alt="" class="logo">
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
                <div class="content-btn-schedule">
                    <button class="btn-schedule">
                        <i class="fa-solid fa-calendar-days"></i>
                        <h4 class="content-btn-text">Schedule</h4>
                    </button>
                </div>
                <div class="content-btn-book">
                    <button class="btn-book">
                        <i class="fa-solid fa-pencil"></i>
                        <h4 class="content-btn-text">Book</h4>
                    </button>
                </div>
            </div>
            <div class="content-main">
                <div class="content-schedule">
                    <div class="schedule-header">
                        <span class="schedule-month"></span>
                        <span class="schedule-year"></span>
                    </div>
                    <div class="schedule-body">
                        <pre><i class="fa-solid fa-chevron-left schedule-left"></i></pre>
                        <div class="schedule-list"></div>
                        <pre><i class="fa-solid fa-chevron-right schedule-right"></i></pre>
                    </div>
                </div>
                <div class="content-book" hidden>
                    <div class="calendar">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker"></span>
                            <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                    <pre><i class="fa-solid fa-chevron-left"></i></pre>
                                </span>
                                <span id="year">2023</span>
                                <span class="year-change" id="next-year">
                                    <pre><i class="fa-solid fa-chevron-right"></i></pre>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days"></div>
                        </div>
                        <div class="month-list"></div>
                    </div>
                    <div class="book-picker">
                        <div class="book-field-picker">
                            <div class="book-field">
                                <span class="field-text">Choose Field</span>
                                <span><i id="field-dropdown" class="fa-solid fa-chevron-down"></i></span>
                            </div>
                            <ul class="field-list" hidden>
                                <li>
                                    <h4 class="field-title">Sintetis</h4>
                                    <h4 class="field-price">120K/JAM</h4>
                                </li>
                                <li>
                                    <h4 class="field-title">Vinyl</h4>
                                    <h4 class="field-price">150K/JAM</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="book-time-picker">
                            <div class="book-time">
                                <span class="time-text">Choose Time</span>
                                <span><i id="time-dropdown" class="fa-solid fa-chevron-down"></i></span>
                            </div>
                            <ul class="time-list" hidden></ul>
                        </div>
                        <div class="book-reset">
                            <span class="reset">Reset</span>
                            <span><i class="fa-solid fa-rotate-left"></i></span>
                        </div>
                        <div class="book-done">
                            <span class="done">Done</span>
                            <span><i class="fa-solid fa-check"></i></span>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="content-info">
                <h4 class="info-select" hidden></h4>
                <h2 class="lapangan-text">Lapangan Futsal</h2>
                <div class="field-info">
                    <div class="info-card sintetis">
                        <img src="../image/sintetis.jpg" alt="" class="info-img">
                        <div class="info-data">
                            <h4 class="sintetis-text">RUMPUT SINTETIS</h4>
                            <h4 class="sintetis-harga">120K/JAM</h4>
                        </div>
                        <i class="fa-solid fa-info info-sintetis"></i>
                    </div>
                    <div class="info-card vinyl">
                        <img src="../image/vinyl.jpg" alt="" class="info-img">
                        <div class="info-data">
                            <h4 class="rumput-text">RUMPUT VINYL</h4>
                            <h4 class="sintetis-harga">150K/JAM</h4>
                        </div>
                        <i class="fa-solid fa-info info-vinyl"></i>
                    </div>
                </div>
            </div>
            <div class="content-booking" hidden>

            </div>
        </div>
    </div>
    <div class="footer">
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/js/home.js"></script>
</body>
</html>