    <div class="container-body">
        <?php
            require_once "../app/views/tamplates/navbar.php";
        ?>
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
                        <div class="message-done"></div>
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
