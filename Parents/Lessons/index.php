<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../parents-left-sidebar.php'; ?>

<div class="main-container">
    <div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Kids Lessons</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo PARENT_BASE_URL; ?>">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php
            require_once "../../common/Operations.php";
            $conn = new Operations();
            $res = $conn->getLessonsDetails();
            foreach ($res as $val) {
                ?>
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4"><?php echo $val["title"]; ?></h4>
                            <p class="font-14 ml-0">A simple, accessible HTML5 media player <a
                                        href="https://github.com/sampotts/plyr" target="_blank"
                                        class="weight-700 text-blue">Click Here</a></p>
                        </div>
                    </div>
                    <div class="container">
                        <video width="100%"
                               poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg?v1" controls
                               crossorigin>
                            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.mp4"
                                    type="video/mp4">
                        </video>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Plyr HTML5 Audio</h4>
                        <p class="font-14 ml-0">A simple, accessible HTML5 media player <a
                                    href="https://github.com/sampotts/plyr" target="_blank"
                                    class="weight-700 text-blue">Click Here</a></p>
                    </div>
                </div>
                <div class="container">
                    <audio controls>
                        <source src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3"
                                type="audio/mp3">
                        <source src="https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg"
                                type="audio/ogg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Plyr YouTube Video</h4>
                        <p class="font-14 ml-0">A simple, accessible HTML5 media player <a
                                    href="https://github.com/sampotts/plyr" target="_blank"
                                    class="weight-700 text-blue">Click Here</a></p>
                    </div>
                </div>
                <div class="container">
                    <div data-type="youtube" data-video-id="bTqVqk7FSmY"></div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Plyr Vimeo Video</h4>
                        <p class="font-14 ml-0">A simple, accessible HTML5 media player <a
                                    href="https://github.com/sampotts/plyr" target="_blank"
                                    class="weight-700 text-blue">Click Here</a></p>
                    </div>
                </div>
                <div class="container">
                    <div data-type="vimeo" data-video-id="143418951"></div>
                </div>
            </div>

        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
                Hingarajiya</a>
        </div>
    </div>
</div>
<?php include_once '../../common/footer.php'; ?>

