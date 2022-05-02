<!--header-->
<?php
    include('header.php');
?>
<!--end header-->
<body onLoad=load()>
    <div class="blog__container" style="margin-top: 100px">
        <div class="row blog__intro">
            <div class="col-12">
                <span>Latest News</span>
                <h3>Tin tức mới nhất</h3>
                <p>Cập nhật tin tức, sự kiện nóng xung quanh vấn đề covid 19 được bạn đọc quan tâm nhất trên Covid Tracker.</p>
            </div>
            <div class="col-12 search">
                <div class="wrapper">
                    <input type="text" placeholder="Tìm kiếm bài viết">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="row blog__content">
            <div class="col-4 col-md-6 col-sm-12">
                <div class="blog__single">
                    <div class="blog__img">
                        <a href="">
                            <img src="./images/blog-1.jpg" alt="" width="100%">
                        </a>
                    </div>
                    <div class="blog__post">
                        <a href="#" target="_blank">
                            <h4>How to safe yourself from Coronavirus?</h4>
                        </a>
                        <p>
                            Coronaviruses are a large family of viruses which may cause illness in animals or humans.  In humans, several COVID -19 are known to cause respiratory.
                        </p>
                    </div>
                    <div class="blog__info">
                        <div class="blog__info-author">
                            <span><i class="fas fa-user"></i></span>
                            <span>Admin</span>
                        </div>
                        <div class="blog__info-cmt">
                            <span><i class="fas fa-comment"></i></span>
                            <span>3444</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <div class="blog__single">
                    <div class="blog__img">
                        <a href="">
                            <img src="./images/blog-2.jpg" alt="" width="100%">
                        </a>
                    </div>
                    <div class="blog__post">
                        <a href="#" target="_blank">
                            <h4>What Can I do to protect myself & prevent the spread of disease?</h4>
                        </a>
                        <p>
                            Coronaviruses are a large family of viruses which may cause illness in animals or humans. In humans, several COVID -19 are known to cause respiratory.
                        </p>
                    </div>
                    <div class="blog__info">
                        <div class="blog__info-author">
                            <span><i class="fas fa-user"></i></span>
                            <span>Admin</span>
                        </div>
                        <div class="blog__info-cmt">
                            <span><i class="fas fa-comment"></i></span>
                            <span>3444</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <div class="blog__single">
                    <div class="blog__img">
                        <a href="">
                            <img src="./images/blog-3.jpg" alt="" width="100%">
                        </a>
                    </div>
                    <div class="blog__post">
                        <a href="#" target="_blank">
                            <h4>Coronavirus disease (COVID-19) Online training</h4>
                        </a>
                        <p>
                            Coronaviruses are a large family of viruses which may cause illness in animals or humans.  In humans, several COVID -19 are known to cause respiratory.
                        </p>
                    </div>
                    <div class="blog__info">
                        <div class="blog__info-author">
                            <span><i class="fas fa-user"></i></span>
                            <span>Admin</span>
                        </div>
                        <div class="blog__info-cmt">
                            <span><i class="fas fa-comment"></i></span>
                            <span>3444</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    include('footer.php');
?>