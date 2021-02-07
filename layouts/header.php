
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="images/icon/hologram.svg" style="width:7%;" alt="PortFolio Secure"/>
                </a>

            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="index.php">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="addasset.php">
                          <button type="button" class="btn btn-success">
                              <i class="fa fa-magic"></i>&nbsp; Add Asset</button>
                            <span class="bot-line"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="" alt="" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['FirstName']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="" alt="" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $_SESSION['FirstName']; ?></a>
                                    </h5>
                                    <span class="email"><?php echo $_SESSION['Email']; ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                               
                             
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="logout.php">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>