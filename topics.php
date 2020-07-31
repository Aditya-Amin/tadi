<?php 
    session_start();
    include('crud/topics.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam System</title>
    <!-- core styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- banner start -->
    <div class="banner-area">
        <div class="container">
            <div class="banner-wrapper">
                <h1 class="section-title-big">
                    Topics
                </h1>
            </div>
        </div>
    </div>
    <!-- banner end -->


    <!-- topics start -->
    <div class="topics-area">
        <ul id="topics-wrapper">
            <?php if(topics() != null) { foreach(topics() as $item) : ?>
            <li>
                <p class="magic-topic" id="read-topic-<?php echo $item['id']?>"> <?php echo $item['title']; ?> </p>
                <div class="topic-popup">
                    <span @click="close($event)" class="close-topic" data-id="<?php echo $item['id']; ?>">X</span>
                    <div class="popup-contents">
                        <?php echo $item['content']; ?>
                    </div>
                </div>
            </li>
            <?php endforeach; } ?>

        </ul>

        <a href="examination.php" class="button btn-green proceed-btn">Training Evaluation</a>
    </div>
    <!-- topics end -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    <!-- custom script -->
    <script>
        $(document).ready(function () {
            // popup the contents
            $('.magic-topic').click(function () {
                if ($(this).parent().children('.topic-popup').length > 0) {
                    $(this).parent().children('.topic-popup').addClass('show-popup');
                    let popup = $(this).parent().find('.popup-contents');
                    if(isScrollable(popup) == false){
                        $(this).parent().children('.topic-popup').children('.close-topic').addClass('show-popup');
                    }
                    $('html, body').addClass('overflow-control');
                } else {
                    alert('No topic contents!');
                }
            })


            // visible the close button

            $('.popup-contents').on('scroll', function () {
                if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                    $(this).parent().children('.close-topic').addClass('show-popup');
                }
            })


            // check a element is scrollable
            function isScrollable(el){
                return $(el)[0].scrollWidth > $(el)[0].clientWidth || $(el)[0].scrollHeight > $(el)[0].clientHeight;
            };
            
        })
    </script>
    <script>
         const topicapp = new Vue({
             el: "#topics-wrapper",
             data:{

             },
             methods:{
                 close:function(e){
                    e.preventDefault();
                    let topic_id = $(e.target).data('id');
                    $(e.target).removeClass('show-popup');
                    $('.topic-popup').removeClass('show-popup');
                    $('html, body').removeClass('overflow-control');
                    $("#read-topic-"+topic_id).addClass("topic-disable");
                    this.setLocalTopics(topic_id);
                    this.checkReadTopics();
                 },

                 setLocalTopics:function(id = ''){
                    let topics = [];
                    let json = JSON.parse(localStorage.getItem('topics'));
                    if (json != null) {
                        topics = json;
                        if (!topics.includes(id)) {
                            topics.push(id);
                        }
                        localStorage.setItem('topics', JSON.stringify(topics));
                    } else {
                        topics.push(id);
                        localStorage.setItem('topics', JSON.stringify(topics));
                    }
                 },

                 checkReadTopics:function(){
                    let all_topics = document.querySelectorAll('.magic-topic');
                    let topics_read = JSON.parse(localStorage.getItem('topics'));
                    console.log(all_topics.length, topics_read.length);
                    if (all_topics.length <= 0) {
                        $('.proceed-btn').removeClass('show-popup');
                    }else if(all_topics.length == topics_read.length){
                        $('.proceed-btn').addClass('show-popup');
                    }
                 },

                 setTopicDisable:function(){
                    let topics_read = JSON.parse(localStorage.getItem('topics'));
                    if( topics_read != null){
                        let topics_ids = document.querySelectorAll('.close-topic');
                        topics_ids.forEach(function (item) {
                            if (topics_read.includes(parseInt(item.getAttribute('data-id')))) {
                                item.parentNode.parentNode.children[0].className += ' topic-disable';
                            }
                        })
                    }
                 }

             },

             created(){
                // check if all topics read and Visiable the button to proceed
                this.checkReadTopics();
                // set topics disable which already read
                this.setTopicDisable();
             }
         })
    </script>
</body>

</html>


<?php
    if(isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
        echo "<script type='text/javascript'>alert('$messages');</script>";
        unset($_SESSION['messages']);
    }
?>