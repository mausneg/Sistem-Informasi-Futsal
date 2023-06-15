<div class="container-body">
        <?php
            require_once "../app/views/tamplates/admin-navbar.php";
        ?>
        <div class="content">
            <div class="content-header">
                <h4>Transaction</h4>
                <div class="statistik">
                    <div class="card card-paid">
                        <i class="fa-solid fa-square-check"></i>
                        <div class="card-content">
                            <h4>Total Paid</h4>
                            <span class="paid-number"></span>
                        </div>
                    </div>
                    <div class="card card-unpaid">
                        <i class="fa-solid fa-square-xmark"></i>
                        <div class="card-content">
                            <h4>Total Unpaid</h4>
                            <span class="unpaid-number"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <table class="table-transaction">
                    <tr>
                        <th>No</th>
                        <th>No Payment</th>
                        <th>No Booking</th>
                        <th>Number Method</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Admin</th>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
