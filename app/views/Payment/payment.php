    <div class="container-body">
        <?php
            require_once "../app/views/tamplates/navbar.php";
        ?>
        <div class="content">
            <div class="content-header">
                <h4>Payment</h4>
            </div>
            <div class="content-body">
                <div class="container-payment-method">
                    <div class="payment-method-header">
                        <div>Choose your payment method</div>
                    </div>
                    <div class="payment-method-body">
                        <div class="card selected-card dana">
                            <img src="<?php echo BASEURL . "/image/dana.jpg"?>" alt="">
                            <div>PAY WITH DANA</div>
                        </div>
                        <div class="card gopay">
                            <img src="<?php echo BASEURL . "/image/gopay.jpg"?>" alt="">
                            <div>PAY WITH GOPAY</div>
                        </div>
                        <div class="card shopee">
                            <img src="<?php echo BASEURL . "/image/shopee.jpg"?>" alt="">
                            <div>PAY WITH SHOPEE</div>
                        </div>
                        <div class="card qris">
                            <img src="<?php echo BASEURL . "/image/qris.jpg"?>" alt="">
                            <div>PAY WITH QRIS</div>
                        </div>
                    </div>
                </div>
                <div class="payment-method-detail-container">
                    <div class="payment-method-detail">
                        <div class="invoice">
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
                        <div class="choose-detail">
                            <input class="choose-input" type="tel" placeholder="Input Your Dana Number" pattern="[0-9]+" maxlength="12" required>
                            <div class="message"></div>
                        </div>
                        <div class="promo">
                            <h4>DO YOU HAVE PROMO CODE?</h4>
                            <input type="text">
                            <input type="button" value="APPLY">
                        </div>
                    </div>
                    <button class="checkout-btn">CHECKOUT</button>
                </div>
            </div>
        </div>
    </div>
