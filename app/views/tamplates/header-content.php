<div class="header">
        <div class="container-popup">
            <div class="container-flasher">
                    <?php
                        Flasher::flash();
                    ?>
            </div>
            <div class="pop-delete" hidden>
                <div class="popup-header">
                    <i class="fa-solid fa-trash"></i>
                    <h4>Delete Account?</h4>
                </div>
                <div class="confirm-delete">
                    <button class="cancel-delete">Cancel</button>
                    <form class="delete" action="/home/delete" method="post">
                        <input type="submit" value="Delete Account">
                </div>
                </form>
            </div>
        </div>
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
            <div class="header-list-notif" hidden>
                <div class="header-list-header">
                    <h4 class="list-title"></h4>
                </div>
                <div class="header-list-content notif-content"></div>
                <div class="header-list-footer">
                    <h4</h4>
                </div>
            </div>
            <div class="header-list-profile" hidden>
                <div class="header-list-header">
                    <h4 class="list-title"></h4>
                </div>
                <div class="header-list-content">
                    <img src="<?php echo BASEURL . "/image/default pp.jpg"?>" alt="">
                    <form method="post" action="<?php echo BASEURL . "home/edit"?>">
                        <h4>Email</h4>
                        <input type="email" value="<?php
                            echo $_SESSION["account"]["email"];
                        ?>" required name="email" class="email" disabled>
                        <h4>Username</h4>
                        <input type="text" value="<?php
                            echo $_SESSION["account"]["username"];
                        ?>" required name="username" disabled autocomplete="off">
                        <h4>Contact</h4>
                        <input type="text" value="<?php
                            echo $_SESSION["account"]["contact"];
                        ?>" required name="contact" disabled>
                        <h4 class="old-password-text">Password</h4>
                        <input type="password" value="<?php
                            echo $_SESSION["account"]["password"];
                        ?>" required name="old-password" class="old-password" disabled>
                        <div class="change-password" hidden>Change Password</div>
                        <h4 class="confirm-password-text" hidden>Confirm Password</h4>
                        <input type="password" name="confirm-password" class="confirm-password" hidden>
            			<div class="message"></div>
                        <div class="confirm-btn" hidden>
                            <input type="submit" value="cancel" class="cancel" name="cancel">
                            <input type="submit" value="Save" class="save" name="save">
                        </div>
                    </form>
                    <button class="delete-account" hidden>delete account</button>
                </div>
                <div class="header-list-footer">
                    <h4 class="edit">Edit Profile</h4>
                </div>
            </div>
        </div>
    </div>