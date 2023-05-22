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
                        <div class="card">
                            <img src="/image/dana.jpg" alt="">
                            <div>PAY WITH DANA</div>
                        </div>
                        <div class="card">
                            <img src="/image/gopay.jpg" alt="">
                            <div>PAY WITH GOPAY</div>
                        </div>
                        <div class="card">
                            <img src="/image/shopee.jpg" alt="">
                            <div>PAY WITH SHOPEE</div>
                        </div>
                        <div class="card">
                            <img src="/image/qris.jpg" alt="">
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
                                    <span>12</span>
                                </li>
                                <li>
                                    <h4>Field</h4> 
                                    <span>Sintetis</span>
                                </li>
                                <li>
                                    <h4>Date</h4> 
                                    <span>12/07/2023</span>
                                </li>
                                <li>
                                    <h4>Time</h4> 
                                    <span>17:00:00</span>
                                </li>
                                <li>
                                    <h4>Total Amount</h4> 
                                    <span>150.000</span>
                                </li>
                            </ul>
                        </div>
                        <div class="dana-detail">
                            <input type="tel" placeholder="Input Your Dana Number" pattern="[0-9]+" maxlength="12" required>
                            <input type="button" value="OK">
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
