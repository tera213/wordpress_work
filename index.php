<?php
/*
Template Name: TOP
*/
?>
<?php get_header(); ?>
    <!-- メニュー -->
    <?php get_template_part('content', 'menu'); ?>

    <main class="site-width">
        <div class="top">
            <img id="top-image" src="<?php echo get_post_meta($post->ID, 'img_top', true); ?>" alt="top-image">
            <div class="top-text">
                <h1>Vestibulum mauris</h1>
                <p>最新技術と自然との調和を目指す</p>
            </div>
        </div>
        <section class="sec01">
            <h2>VISION</h2>
            <div>
                <p class="text">
                    <?php echo get_post_meta($post->ID, 'vision', true); ?>
                </p>
            </div>
            
        </section>
        <section class="sec02">
            <div class="sec02-inner">
                <div class="bg">
                    <img src="images/sec02_01.jpg" alt="">
                </div>
                <div class="text">
                    <div>
                        <h2>MESSAGE</h2>
                        <p>ちかごろ世間で日本歴史の科学的研究ということがしきりに叫ばれている。科学的研究というのが近代史学の学問的方法による研究という意義であるならば、
                            これは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいう。
                        </p>
                    </div>
                </div>
            </div>
            <div class="sec02-inner" id="sec02-2">
                <div class="text">
                    <div>
                        <h2>MESSAGE</h2>
                        <p>日本歴史の科学的研究ということがしきりに叫ばれている。科学的研究というのが近代史学の学問的方法による研究という意義であるならば、
                            これは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいう。
                        </p>
                    </div>
                </div>
                <div class="bg">
                    <img src="images/sec02_02.jpg" alt="">
                </div>
            </div>
        </section>
        <section class="sec03">
            <div class="sec03-innner">
                <div class="sec03-content">
                    <h2>SERVICE</h2>
                    <div class="img">
                        <img src="images/circleImg01.png" alt="">
                    </div>
                    <div class="text">
                        <p>科学的研究というのが近代史学の学問的方法による研究という意義であるならば、これは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいう。</p>
                    </div>
                </div>
                <div class="sec03-content">
                    <h2>MESSAGE</h2>
                    <div class="img">
                        <img src="images/circleImg02.png" alt="">
                    </div>
                    <div class="text">
                        <p>日本歴史の科学的研究ということがしきりに叫ばれている。科学的研究というのが近代史学の学問的方法による研究という意義であるならば意義であるならば。</p>
                    </div>
                </div>
                <div class="sec03-content">
                    <h2>STORY</h2>
                    <div class="img">
                        <img src="images/circleImg03.png" alt="">
                    </div>
                    <div class="text">
                        <p>科学的研究というのが近代史学の学問的方法による研究という意義であるならば、これは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいう。</p>
                    </div>
                </div>
            </div>
            
        </section>
        <section class="sec04">
            <div class="wrap">
                <div class="sec04-1">
                    <div class="inner-text">
                        <h2>STORY</h2>
                        <p class="text">科学的研究というのが近代史学の学問的方法によるちかごろ世間で日本歴史の科学的研究ということがしきりに叫ばれている。研究という意義であるならば、
                            研究という意義であるならばこれは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいうには及ばないはずである。
                        </p>
                    </div>
                    
                </div>
                <div class="sec04-2">
                    <div class="inner-text">
                        <h2>SUCCESS</h2>
                        <p class="text">ちかごろ世間で日本歴史の科学的研究ということがしきりに叫ばれているということがしきりに叫ばれている。科学的研究というのが近代史学の学問的方法による研究という意義であるならば、
                            これは史学の学徒の間においては一般に行われていることであるから、今さらこと新しくいうには及ばないはずである。
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <?php get_footer(); ?>