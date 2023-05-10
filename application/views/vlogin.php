<!DOCTYPE html><!-- This site was created in Webflow. http://www.webflow.com --><!-- Last Published: Fri Jul 31 2020 15:12:03 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="artboard.webflow.io" data-wf-page="5f146505df90aa45d5c1befa" data-wf-site="5d2f26e24904ea2ed96c0fac" data-wf-status="1">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta content="Login" property="og:title" />
    <meta content="Login" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="https://uploads-ssl.webflow.com/5d2f26e24904ea2ed96c0fac/css/artboard.webflow.80ed7f466.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["DM Sans:regular,500,700"]
            }
        });
    </script><!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="https://uploads-ssl.webflow.com/5d2f26e24904ea2ed96c0fac/5f22ac833eaaf515a25aafc1_fav%20(4).png" rel="shortcut icon" type="image/x-icon" />
    <link href="https://uploads-ssl.webflow.com/5d2f26e24904ea2ed96c0fac/5f22ac97e6f35af9178a5454_clip%20(2).png" rel="apple-touch-icon" />
</head>

<body class="body">
    <div class="single-layout">
        <div class="single-layout-row w-row">

            <!-- BAGIAN KIRI -->
            <div class="single-layout-col left w-col w-col-4">
                <div class="single-layout-left"><a href="/" class="single-layout-logo w-inline-block"></a>
                    <div>
                        <h4 class="white">Sistem Tugas Akhir</h4>
                        <p class="white text-large">Sistem ini mempermudah mahasiswa dalam menulis, mengedit, dan menyusun laporan tugas akhir mereka, serta memfasilitasi proses penilaian dan pengevaluasian oleh dosen atau tim penguji</p>
                        <a href="/" class="button button-primary mt-20 w-button">Panduan</a>
                    </div>
                </div>
            </div>
            <!-- END BAGIAN KIRI -->

            <!-- BAGIAN KANAN -->
            <div class="single-layout-col right w-col w-col-8">
                <div class="single-layout-right-header">Don&#x27;t have account? <a href="/signup" class="link"><strong>Sign up</strong></a></div>
                <div class="single-layout-right">
                    <div class="single-layout-right-content">
                        <div class="single-layout-logo-right"><a href="/" class="w-inline-block"></a></div>
                        <h3 class="text-center mb-40">Sistem Tugas Akhir</h3>
                        <div class="w-form">
                            <form id="email-form" method="POST" action="<?php echo site_url('clogin/auth'); ?>">
                                <input type="email" class="input w-input" maxlength="256" name="email" placeholder="Enter your email" id="email" required="" />
                                <input type="password" class="input w-input" maxlength="256" name="password" placeholder="Enter your password" id="password" required="" />
                                <input type="submit" value="Login" data-wait="Please wait..." class="button button-primary button-block w-button" />
                                <p class="text-center hint"><a href="/forgot-password" class="link">Forgot your password?</a></p>
                            </form>
                            <div class="w3-panel w3-blue w3-display-container">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END BAGIAN KANAN -->
        </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5d2f26e24904ea2ed96c0fac" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="https://uploads-ssl.webflow.com/5d2f26e24904ea2ed96c0fac/js/webflow.deb7a77dd.js" type="text/javascript"></script>[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>