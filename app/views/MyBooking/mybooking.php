    <div class="container-body">
        <?php
            require_once "../app/views/tamplates/navbar.php";
        ?>
        <div class="content">
            <div class="content-btn">
                <div class="content-btn-all">
                    <button class="btn-all btn-select">
                        <h4>All</h4>
                    </button>
                </div>
                <div class="content-btn-booked">
                    <button class="btn-booked btn-unselect">
                        <h4>Booked</h4>
                    </button>
                </div>
                <div class="content-btn-pending">
                    <button class="btn-pending btn-unselect">
                        <h4>Pending</h4>
                    </button>
                </div>
                <div class="content-btn-confirm">
                    <button class="btn-confirm btn-unselect">
                        <h4>Confirm</h4>
                    </button>
                </div>
                <div class="content-btn-cancelled">
                    <button class="btn-cancelled btn-unselect">
                        <h4>Cancelled</h4>
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
                <div class="content-main-body">
                 
                </div>
            </div>
        </div>
    </div>