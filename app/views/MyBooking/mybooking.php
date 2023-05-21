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