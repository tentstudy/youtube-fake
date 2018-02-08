<?php   

    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "select email from users where id ={$id}";
        $result = $conn->query($query);
        if($result->num_rows>0){
            $email = $result->fetch_assoc();
        }
        $name = $email['email'];
        $log = "Đăng xuất";

    }
    else{
        $name ="";
        $log = "Đăng nhập";
    }
?>
<link rel="stylesheet" href="/css/navbar.css">
<div class="navbar navbar-fixed-top">
    <ul class="menu">
        <li>
            <button class="" style="border:none; background: none;outline: none;" id="show-menu"><i
                        class="fa fa-navicon"></i></button>
        </li>
        <!--  -->
        <li><a href="/"><img style="width: 90px;padding-bottom: 5px; " src="../images/LG.png" alt=""> <sup>VN</sup></a></li>
        <!--  -->
        <li class="search" >
            <form method="get" action="search.php" style="margin: 0;">
                <input id="ip_search" type="text" placeholder="Tìm kiếm" name="search" value="<?php echo$search ?? '' ?>" type="submit" required="required">
                <button type="submit" id="btn-search" class="btnSearch"style="float: right;"><i class="fa fa-search ic-search" ></i></button>
            </form>
        </li>
        <!--  -->
        <li class="pull-right">
            <ul>
                <li class="pull-left">
                    <a href="upload.php"><i class="glyphicon glyphicon-open"></i></a>
                </li>
                <li class="pull-left th">
                    <div class="dropdown">
                        <button style="background: none; border:none;outline: none;" dropdown-toggle="" type="button"
                                id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                    class="glyphicon glyphicon-th">
                            </i></button>
                        <div style="width: 250px;" class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="dropdownMenu1">
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    YouTubeTV
                                </div>
                            </div>
                            <!--  -->
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    YouTube Gaming
                                </div>
                            </div>
                            <hr>
                            <!--  -->
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    YouTube Âm nhạc
                                </div>
                            </div>
                            <!--  -->
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    YouTube Kids
                                </div>
                            </div>
                            <hr>
                            <!--  -->
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="/images/youtube.png" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    Học viện sáng tạo
                                </div>
                            </div>
                            <!--  -->
                            <div class="row message">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <img src="/images/youtube.png" alt="">
                                </div>
                                <!--  -->
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    YouTube dành cho nghệ sĩ
                                </div>
                            </div>
                            <!--  -->
                        </div>
                </li>
                <li class="pull-left">
                    <div class="dropdown">
                        <button style="border:none;background: none;outline: none;" dropdown-toggle="" type="button"
                                id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                    class="glyphicon glyphicon-bell">
                            </i></button>
                        <div class="dropdown-menu dropdown-menu-right bell" aria-labelledby="dropdownMenu1">
                            <div class="drop-head">
                                <ul>
                                    <li>Thông báo</li>
                                    <li style="float: right; padding-right: 10px;"><a href=""><i class="fa fa-cog"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!--  -->
                            <div style="height: 338px;overflow-x: hidden;">
                                <a href="">
                                    <div style="padding-top: 10px;" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <img style="width: 48px;" src="../images/img.png" alt="">
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color: black">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            <p style="color: #909090">3 thg 1, 2018</p>
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <img style="width: 86px;" src="/images/YouTube.jpg" alt="">
                                        </div>
                                    </div>
                                </a>
                                <!--  -->
                                <a href="">
                                    <div style="padding-top: 10px;" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <img style="width: 48px;" src="../images/img.png" alt="">
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color: black">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            <p style="color: #909090">3 thg 1, 2018</p>
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <img style="width: 86px;" src="/images/YouTube.jpg" alt="">
                                        </div>
                                    </div>
                                </a>
                                <!--  -->
                                <a href="">
                                    <div style="padding-top: 10px;" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <img style="width: 48px;" src="../images/img.png" alt="">
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color: black">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            <p style="color: #909090">3 thg 1, 2018</p>
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <img style="width: 86px;" src="/images/YouTube.jpg" alt="">
                                        </div>
                                    </div>
                                </a>
                                <!--  -->
                                <a href="">
                                    <div style="padding-top: 10px;" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <img style="width: 48px;" src="../images/img.png" alt="">
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color: black">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            <p style="color: #909090">3 thg 1, 2018</p>
                                        </div>
                                        <!--  -->
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <img style="width: 86px;" src="/images/YouTube.jpg" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pull-left user">
                    <div class="dropdown">
                        <button style="border:none; background: none; outline: none;" dropdown-toggle="" type="button"
                                id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img
                                    style="width: 23px" src="/images/img.png" alt=""></button>
                        <div style="width: 300px; padding-top: 0px;" class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="dropdownMenu1">
                            <div style="background: #e5e5e5" class="row message">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <img style="width: 40px;padding-top: 5px" src="../images/img.png" alt="">
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div>
                                        <!-- <p><b>YouTube Admin</b></p> -->
                                        <p><?php echo $name ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div style="height: 100px; overflow-x: hidden; color: #888888;">
                                <a href="mychannel.php?page=1">
                                    <div style="background: none; margin-top: 5px;" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <i class="fa fa-id-badge"></i>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            Kênh của tôi
                                        </div>
                                    </div>
                                </a>
                                <a href="login.php">
                                    <div style="background: none" class="row message">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <i class="fa fa-id-badge"></i>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <a href="logout.php" class="log"><?php echo $log ?></a>
                                        </div>
                                    </div>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
