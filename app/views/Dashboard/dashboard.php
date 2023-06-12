    <div class="container-body">
        <?php
            require_once "../app/views/tamplates/admin-navbar.php";
        ?>
        <div class="content">
            <div class="content-header">Dashboard</div>
            <div class="content-body">
                <div class="statistik">
                    <div class="card customer">
                        <div class="card-body card-body-customer">
                            <i class="fa-solid fa-user"></i>
                            <div class="card-content">
                                <h4>Total customer</h4>
                                <span class="customer-number"></span>
                            </div>
                        </div>
                        <div class="card-footer card-footer-customer">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="card booking">
                        <div class="card-body card-body-booking">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            <div class="card-content">
                                <h4>Total Booking</h4>
                                <span class="booking-number"></span>
                            </div>
                        </div>
                        <div class="card-footer card-footer-booking">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="card done">
                        <div class="card-body card-body-done">
                            <i class="fa-solid fa-file-circle-check"></i>
                            <div class="card-content">
                                <h4>Booking Selesai</h4>
                                <span class="done-number"></span>
                            </div>
                        </div>
                        <div class="card-footer card-footer-done">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="transaksi-list">
                        <div class="transaksi-list-header">Transaksi Terbaru</div>
                        <div class="transaksi-list-body">
                        </div>
                        <div class="transaksi-list-footer">
                            <span>Lihat Selengkapnya</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                </div>
            </div>
        </div>
    </div>
