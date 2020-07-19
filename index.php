<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Twitter Card  -->
  <!--①カードの種類-->
  <meta name="twitter:card" content="summary_large_image" />
  <!--② @ユーザー名-->
  <meta name="twitter:site" content="@iwaken_08" />
  <!--③ 記事のURL-->
  <meta property="og:url" content="kensuke-portfolio.net/" />
  <!--④ タイトル-->
  <meta property="og:title" content="Kensuke's Portfolio" />
  <!--⑤ 紹介文-->
  <meta property="og:description" content="いわけんです。0から作成した初めてのポートフォリオです。" />
  <!--⑥ 画像のURL-->
  <meta property="og:image" content="http://kensuke-portfolio.net/img/vincent-van-zalinge-vUNQaTtZeOo-unsplash.jpg" />

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/e92658c180.js" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
  <!-- favicon -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="swiper/swiper.min.css">
  <!-- wow CSS -->
  <link rel="stylesheet" href="wow/animate.css">
  <!-- modal CSS -->
  <link rel="stylesheet" href="modal/modaal.min.css">
  <!-- CSS -->
  <link rel="stylesheet" href="css/styles.css">


  <title>Kensuke's Portfolio</title>

  <!-- サチコ -->
  <meta name="google-site-verification" content="6KeTX9sffQfPMQDSP1DTyiU9I_t5RPQCtEMYMjOUiwk" />
</head>

<body>

  <?php //お問い合わせフォーム用のphpコード
  $error = [];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォーム送信時にエラーをチェックする
    if ($post['name'] === "") {
      $error['name'] = 'blank';
    }

    if ($post['email'] === "") {
      $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = 'email';
    }

    if ($post['text'] === "") {
      $error['text'] = 'blank';
    }

    if ($post['item'] === "未選択") {
      $error['item'] = '未選択';
    }

    if (count($error) === 0) { //エラーがないことを確認した後の処理
      // 確認画面に移動
      header('Location: thanks.php');

      //メール本文の作成
      $honbun = '';
      $honbun .= "メールフォームよりお問い合わせがありました。\n\n";
      $honbun .= "【お名前】\n";
      $honbun .= $post['name'] . "\n\n";
      $honbun .= "【メールアドレス】\n";
      $honbun .= $post['email'] . "\n\n";
      $honbun .= "【種別】\n";
      $honbun .= $post['item'] . "\n\n";
      $honbun .= "【お問い合わせ内容】\n";
      $honbun .= $post['text'] . "\n\n";

      //エンコード処理
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");

      //メールの作成
      $mail_to  = "kensuke0801iwasaki@gmail.com";      //送信先メールアドレス
      $mail_subject  = "ポートフォリオのメールフォームよりお問い合わせ";  //メールの件名
      $mail_body  = $honbun;        //メールの本文
      $mail_header  = "from:" . $post['email'];      //送信元として表示されるメールアドレス

      //メール送信処理
      $mailsousin  = mb_send_mail($mail_to, $mail_subject, $mail_body, $mail_header);
      exit();
    }
  }
  ?>

  <div class="inner">

    <header id="header">
      <div class="container">
        <div class="flex">
          <img class="icon" src="img/logo.png" alt="ロゴ">
          <nav class="global-nav">
            <ul class="global-nav__list">
              <li class="global-nav__item"><a class="nav-link" href="#home">Home</a></li>
              <li class="global-nav__item"><a class="nav-link" href="#about">About</a></li>
              <li class="global-nav__item"><a class="nav-link" href="#service">Service</a></li>
              <li class="global-nav__item"><a class="nav-link" href="#works">Works</a></li>
              <li class="global-nav__item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
          </nav>
          <div class="hamburger" id="js-hamburger">
            <span class="hamburger__line hamburger__line--1"></span>
            <span class="hamburger__line hamburger__line--2"></span>
          </div>
          <!--end hamburger -->
          <div class="black-bg" id="js-black-bg"></div>
          <!--end black-bg-->
        </div>
        <!--end flex-->
      </div><!-- end .container -->
      <!--end flex-->
    </header>

    <main id="home">
      <div class="box"><img src="img/sarah-dorweiler-x2Tmfd1-SgA-unsplash-min.jpg" alt="メイン画像"></div>
      <div class="main-content ">
        <h1 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="2"><span>“想い”</span>をカタチに
        </h1>
        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s" data-wow-offset="2">あなたの要望を実現します。</p>
      </div><!-- end main-content-->
      <div class="main-title">Kensuke's Portfolio</div><!-- end main-title-->
    </main>

    <section id="about">
      <h2>About</h2>
      <div class="about-content">
        <img src="img/profile.jpg" class="profile wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s" data-wow-offset="1" alt="プロフィール写真">
        <div class="introduction">
          <div class="myName">
            <h3>Iwasaki Kensuke</h3>
            <p>岩崎 堅亮</p>
          </div>
          <!--end myName-->
          <div class="status">
            <i class="far fa-user"></i>
            <div class="status-content">
              <p>Status</p>
              <p>東京都出身 東京都在住<br>
                2016年某私立大学を卒業<br>
                現在は神奈川県のIT企業にて在職中<br>
                サーバのインフラ基盤を仮想化する<br>
                ソフトウェア製品を扱っています<br>
                26歳会社員です<br>
                <br>
                幼い娘と、妻の3人家族</p>
            </div>
            <!--end status-content-->
          </div>
          <!--end status-->
          <div class="skill">
            <i class="fas fa-cogs"></i>
            <div class="skill-content">
              <p>Skills</p>
              <div class="skills">
                <div class="skill-item">
                  <i class="fab fa-html5"></i>
                  <p>HTML</p>
                </div>
                <div class="skill-item">
                  <i class="fab fa-css3-alt"></i>
                  <p>CSS</p>
                </div>
                <div class="skill-item">
                  <i class="fab fa-sass"></i>
                  <p>Sass</p>
                </div>
                <div class="skill-item ">
                  <i class="fab fa-js"></i>
                  <p>JS/jQuery</p>
                </div>
                <div class="skill-item">
                  <i class="fab fa-bootstrap"></i>
                  <p>Bootstrap</p>
                </div>
                <div class="skill-item">
                  <i class="fab fa-php"></i>
                  <p>PHP</p>
                </div>
                <div class="skill-item">
                  <i class="fas fa-database"></i>
                  <p>MySQL</p>
                </div>
                <div class="skill-item">
                  <i class="fab fa-wordpress"></i>
                  <p>WordPress</p>
                </div>
              </div>
              <!--end skills-->
            </div>
            <!--end skill-content-->
          </div>
          <!--end skill-->
        </div>
        <!--end introduction-->
      </div>
      <!--end about-content-->
      <div class="square"> </div><!-- end .square -->
    </section>
    <!--end about-->

    <section id="service">
      <h2>Service</h2>
      <div class="container">
        <div class="services">
          <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" data-wow-offset="10">
            <i class="fas fa-laptop-code service-image"></i>
            <p>ランディングページの作成</p>
            <p>お預かりしたデザインデータをもとに適切にコーディング、ランディングページの制作を致します。<br>
              アニメーション対応やレスポンシブ(スマホ)対応もお任せください。</p>
          </div><!-- end .service-item -->
          <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" data-wow-offset="10">
            <i class="fas fa-mobile-alt service-image"></i>
            <p>レスポンシブ対応</p>
            <p>PC・スマホ・タブレット表示に対応致します。<br>
              既存サイトのレスポンシブ化など、お気軽にご相談ください。 </p>
          </div><!-- end .service-item -->
          <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" data-wow-offset="10">
            <i class="fab fa-wordpress service-image"></i>
            <p>WordPressサイト制作</p>
            <p>ホームページ、ブログ等の
              WordPress サイト制作、既存サイトのWordPress 化対応を行います。</p>
          </div><!-- end .service-item -->
        </div><!-- end .services -->
      </div><!-- end .container -->
    </section>

    <section id="works" class="container">
      <h2>Works</h2>
      <div class="swiper-container">
        <div class="performance swiper-wrapper">
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" data-wow-offset="10">
            <img src="img/1top-min.jpg" class="js-modal-open" data-target="modal01" alt="実績の画像" width="300" height="300">
            <p>Landing Page 模写</p>
            <p><a href="results/result1/index.html" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" data-wow-offset="10">
            <img src="img/2top-min.jpg" class="js-modal-open" data-target="modal02" alt="実績の画像" width="300" height="300">
            <p>Airbnb 模写</p>
            <p><a href="results/result2/index.html" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" data-wow-offset="10">
            <img src="img/3top-min.jpg" class="js-modal-open" data-target="modal03" alt="実績の画像" width="300" height="300">
            <p>iSara 模写</p>
            <p><a href="results/result3/index.html" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" data-wow-offset="10">
            <img src="img/4top-min.jpg" class="js-modal-open" data-target="modal04" alt="実績の画像" width="300" height="300">
            <p>デイトラ 2nd</p>
            <p><a href="results/result4/index.html" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" data-wow-offset="10">
            <img src="img/5top-min.jpg" class="js-modal-open" data-target="modal05" alt="実績の画像" width="300" height="300">
            <p>デイトラ 2nd 課題</p>
            <p><a href="results/result5/index.html" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
          <div class="performance-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s" data-wow-offset="10">
            <img src="img/6top-min.jpg" class="js-modal-open" data-target="modal06" alt="実績の画像" width="300" height="300">
            <p>デイトラ 3rd</p>
            <p><a href="https://iwakendaddy.com/" target="_blank">サイト全体図を見る</a></p>
          </div><!-- end .performance-item -->
        </div><!-- end .performance -->
        <div class="swiper-pagination"></div>
      </div><!-- end .swiper-container -->
    </section>

    <!-- modal contents -->
    <!-- modal01 -->
    <div class="modal js-modal" id="modal01">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>Youtube を見ながら模写</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>1日</p>
            <p>HTML/CSS/Bootstrap</p>
            <p>Youtube でコーディングを見ながら作成した初めてのランディングページ。<br>
              1つ1つのコードを理解しない状態で作成したため、何がどうなっているのか不明でしたが、Web制作の楽しさを実感した。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal01-->

    <!-- modal02 -->
    <div class="modal js-modal" id="modal02">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>Youtube を見ながら模写</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>5日</p>
            <p>HTML/CSS/Bootstrap</p>
            <p>progate にて HTML と CSS の基礎を学習した後、実際のサイトを見ながら模写しました。<br>
              レスポンシブ化に苦戦し、横幅がはみ出したり崩れたりナビゲーション周りの挙動を再現するのに苦労し、多くの時間を取られました。<br>
              しかし、ググりつつ時間をかけながら作成したことで、大きく成長した機会だと思います。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal02-->

    <!-- modal03 -->
    <div class="modal js-modal" id="modal03">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>実際のサイトを模写</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>10日</p>
            <p>HTML/CSS/Bootstrap</p>
            <p>さらに知識や経験を得るために実際のサイトを模写しました。<br>
              ボリュームが多く、flexbox や position など必須で都度調べながら作成しました。<br>
              その中でも、ボタンや図形などの共通の部分は使い回すことで作成の時間の短縮を心がけました。<br>
              作成終了後は、基本的なぺーじは作成できる自身がつきました。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal03-->

    <!-- modal04 -->
    <div class="modal js-modal" id="modal04">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>デザインカンプ～ランディングページ作成</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>7日</p>
            <p>HTML/CSS/Boorstrap/Javascript/jQuery/Sass</p>
            <p>Adobe XD のデザインカンプからコーディング。<br>
              Perfect Pixel を用いてデザインカンプからズレがないように心がけましたが、どうしてもズレが生じていしまいました。<br>
              しかし、今までなぁなぁとなっていた1つ1つのコード意味をしっかりと理解する経験となりました。<br>
              また、Javascript と jQuery を使用したことで動きを付けることができ、web制作がさらに楽しく感じました。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal04-->

    <!-- modal05 -->
    <div class="modal js-modal" id="modal05">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>デザインカンプ～ランディングページ作成</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>7日</p>
            <p>HTML/CSS/Boorstrap/Javascript/jQuery/Sass</p>
            <p>Adobe XD のデザインカンプからコーディング。<br>
              前述したサイト(デイトラ2nd)を作成した後、作成多サイトです。<br>
              反省を活かし、同一のコードは可能な限り統一しまとめコーディング量を少なくすることを意識しました。<br>
              ここで学んだデザインや技術は当サイトでも多く用いております。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal05-->

    <!-- modal06 -->
    <div class="modal js-modal" id="modal06">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <h4>Wordpress テーマ作成</h4>
        <div class="modal-flex">
          <div class="modal-content-left">
            <p>製作期間</p>
            <p>使用スキル</p>
            <p>所感</p>
          </div><!-- end .modal-content-left -->
          <div class="modal-content-right">
            <p>5日</p>
            <p>HTML/CSS/PHP/MySQL/WordPress</p>
            <p>トップページや下層ページを WordPress化<br>
              XAMPP を導入し環境構築から始め、各ページを WordPress化しました<br>
              ループなど WordPress 独自のコードに苦戦しましたが、codex や 書籍を参考にしながら作成しました。</p>
          </div>
          <!--end modal-content-right-->
        </div>
        <!--end modal-flex-->
        <a class="js-modal-close" href="">閉じる</a>
      </div>
      <!--modal__inner-->
    </div>
    <!--modal06-->
    <!-- end modal contents -->


    <section id="contact" class="container">
      <h2>Contact</h2>
      <div class="contact-form">
        <p class="form-guide">下記フォームより必要事項を記入いただき Send ボタンを押してください。</p>
        <form action="#contact" method="POST" novalidate>
          <input type="text" name="name" placeholder="Name/Company" value="<?php echo htmlspecialchars($post['name']); ?>" required>
          <?php if ($error['name'] === 'blank') : ?>
            <p class="error-msg">※お名前をご記入下さい</p>
          <?php endif; ?>
          <input type="text" name="email" placeholder="Email (guest@example.com)" value="<?php echo htmlspecialchars($post['email']); ?>" required>
          <?php if ($error['email'] === 'blank') : ?>
            <p class="error-msg">※メールアドレスをご記入下さい</p>
          <?php endif; ?>
          <?php if ($error['email'] === 'email') : ?>
            <p class="error-msg">※メールアドレスを正しく入力してください</p>
          <?php endif; ?>
          <select name="item">
            <option value="未選択">お問い合わせ項目を選択してください</option>
            <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
            <option value="ご意見・ご感想">ご意見・ご感想</option>
          </select>
          <?php if ($error['item'] === '未選択') : ?>
            <p class="error-msg">※選択してください</p>
          <?php endif; ?>
          <textarea name="text" rows="5" placeholder="Message" required><?php echo htmlspecialchars($post['text']); ?></textarea>
          <?php if ($error['text'] === 'blank') : ?>
            <p class="error-msg">※Message をご記入下さい</p>
          <?php endif; ?>
          <button type="submit" class="btn"><span>Send</span></button>
        </form>
      </div><!-- end .contact-form -->
    </section>

    <footer class="container">
      <div class="footer-main">
        <div class="move-top">
          <a href="#" class="arrow_r_b"></a>
        </div>
        <!--end .move-top-->
        <nav class="footer-nav">
          <ul>
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about">About</a></li>
            <li><a class="nav-link" href="#service">Service</a></li>
            <li><a class="nav-link" href="#works">Works</a></li>
            <li><a class="nav-link" href="#contact" style="margin-right: 0px">Contact</a></li>
          </ul>
        </nav>
      </div><!-- end .footer-main -->
      <div class="footer-second">
        <img src="img/logo.png" alt="ロゴ">
        <a href="https://twitter.com/iwaken_08" target="_blank"><i class="fab fa-twitter"></i></a>
      </div><!-- end .second -->
    </footer>

  </div><!-- end .inner -->



  <!-- Nav open/close -->
  <script>
    function toggleNav() {
      var body = document.body;
      var hamburger = document.getElementById('js-hamburger');
      var blackBg = document.getElementById('js-black-bg');
      var navItem1 = document.getElementsByClassName('global-nav__item')[0];
      var navItem2 = document.getElementsByClassName('global-nav__item')[1];
      var navItem3 = document.getElementsByClassName('global-nav__item')[2];
      var navItem4 = document.getElementsByClassName('global-nav__item')[3];
      var navItem5 = document.getElementsByClassName('global-nav__item')[4];

      hamburger.addEventListener('click', function() {
        body.classList.toggle('nav-open');
        hamburger.classList.add("fixed");
      });
      blackBg.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });
      navItem1.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });
      navItem2.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });
      navItem3.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });
      navItem4.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });
      navItem5.addEventListener('click', function() {
        body.classList.remove('nav-open');
        hamburger.classList.remove("fixed");
      });

    }
    toggleNav();
  </script><!-- Nav open/close -->

  <!-- modal.js -->
  <script src="modal/modaal.min.js"></script>
  <script>
    $(function() {
      $('.js-modal-open').each(function() {
        $(this).on('click', function() {
          var target = $(this).data('target');
          var modal = document.getElementById(target);
          $(modal).fadeIn();
          return false;
        });
      });
      $('.js-modal-close').on('click', function() {
        $('.js-modal').fadeOut();
        return false;
      });
    });
  </script><!-- emd modal.js -->


  <!-- swiper.js -->
  <script src="swiper/swiper.js"></script>
  <script>
    const breakpoint = window.matchMedia('(max-width:1181px)');
    let swiper;

    const breakpointChecker = function() {

      // if larger viewport and multi-row layout needed
      if (breakpoint.matches === true) {

        // clean up old instances and inline styles when available
        if (swiper !== undefined) swiper.destroy(true, true);

        // or/and do nothing
        return;

        // else if a small viewport and single column layout needed
      } else if (breakpoint.matches === false) {

        // fire small viewport version of swiper
        return enableSwiper();
      }
    };


    const enableSwiper = function() {
      swiper = new Swiper('.swiper-container', {
        spaceBetween: 20, //間隔指定
        speed: 1000, //速さ指定
        slidesPerView: '3', //3枚表示
        loop: true, //ループ有効
        pagination: { //ページネーション指定
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
        },
      });
    };

    breakpoint.addListener(breakpointChecker);

    breakpointChecker();
  </script>
  <!--end swiper.js-->

  <!-- wow.js -->
  <script src="wow/wow.min.js">
  </script>
  <script>
    new WOW().init();
  </script>
  <!--end wow.js-->

  <!-- smooth-scroll -->
  <script src="scroll/smooth-scroll.polyfills.min.js"></script>
  <script>
    var scroll = new SmoothScroll('a[href*="#"]', {
      header: '#header',
      speed: 300,
    });
  </script>

  <!-- header の表示/非表示 -->
  <script>
    $(function() {
      var headNav = $("header");
      $(window).on('load scroll', function() {
        //現在の位置が500px以上かつ、クラスis-displayが付与されていない時
        if ($(this).scrollTop() > 650 && headNav.hasClass('is-display') == false) {
          //headerの高さ分上に設定
          headNav.css({
            "top": '-100px'
          });
          //クラスis-displayを付与
          headNav.addClass('is-display');
          //位置を0に設定し、アニメーションのスピードを指定
          headNav.animate({
            "top": 0
          }, 300);
        }
        //現在の位置が600px以下かつ、クラスis-displayが付与されている時にis-displayを外す
        else if ($(this).scrollTop() <= 600 && headNav.hasClass('is-display') == true) {
          headNav.removeClass('is-display');
        }
      });
    });
  </script><!-- end header の表示/非表示 -->
</body>

</html>