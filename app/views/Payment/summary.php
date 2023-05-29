    <div class="container-body">

        <div class="content-summary">
            <div class="card-summary">
                <div class="invoice-summary">
                            <h4>INVOICE</h4>
                            <ul>
                                <li>
                                    <h4>No Booking</h4> 
                                    <span class="no-booking">
                                        <?php
                                            echo $_SESSION["booking"]["no"];
                                        ?>
                                    </span>
                                </li>
                                <li>
                                    <h4>Field</h4> 
                                    <span>
                                        <?php
                                            echo $_SESSION["booking"]["field"]
                                        ?>
                                    </span>
                                </li>
                                <li>
                                    <h4>Date</h4> 
                                    <span>
                                        <?php
                                            echo substr($_SESSION["booking"]["date"],0,10)
                                        ?>
                                    </span>
                                </li>
                                <li>
                                    <h4>Time</h4> 
                                    <span>
                                        <?php
                                            echo substr($_SESSION["booking"]["date"],11,8)
                                        ?>
                                    </span>
                                </li>
                                <li>
                                    <h4>Total Amount</h4> 
                                    <span class="amount">
                                        <?php
                                            echo $_SESSION["booking"]["amount"]
                                        ?>
                                    </span>
                                </li>
                            </ul>
                </div>
                <div class="payment-transfer">
                    <h4><?php echo $_SESSION["paymentMethod"];?> method</h4>
                    <div>
                        <h4>Transfer to <?php echo $_SESSION["paymentNumber"];?></h4>
                    </div>
                </div>  
                <button class="summary-btn">home</button>
            </div>
        </div>
    </div>
