<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!-- <![endif]-->

    <title>List Berita</title>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        .header {
            background-color: #629C87;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-family: Quicksand'Courier New', Courier, monospace
            }

            .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            }
            .back-button {
                background-color: #fff;
                color: #629C87;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                margin-right: 10px;
            }

            .back-button:hover {
                background-color: #629C87;
                color: #fff;
            }
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>

<div class="header">
    <h1 class="text-center">Basyir - Booster Your Iman</h1>
</div>
<br>
<br/>

<?php 
    $nomor = 1; 
        foreach($getListBerita as $glb):
    ?>

<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

    <!--  50% image -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">


                                <tr>
                                    <td align="center">
                                        <a href="" style=" border-style: none !important; border: 0 !important;"><img src="<?=base_url($glb->gambar_berita);?>" style="display: block; width: 280px;" width="280" border="0" alt="" /></a>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" width="5" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td width="5" height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" width="260" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #3d3d3d; font-size: 22px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                        class="align-center main-header">


                                        <div style="line-height: 35px">

                                            <h1 class="mt-4 mb-4"><?= $glb->judul_berita;?></h1>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left">
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" class="container590">
                                            <tr>
                                                <td align="center">
                                                    <table align="center" width="40" border="0" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                                        <tr>
                                                            <td height="2" style="font-size: 2px; line-height: 2px;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15" style="font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;"
                                        class="align-center">


                                        <div style="line-height: 24px">

                                            <p class="mt-4"><?= $glb->ringkasan_berita;?></p>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left">
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" class="container590">
                                            <tr>
                                                <td align="center">
                                                    <table border="0" align="center" width="120" cellpadding="0" cellspacing="0" style="border: 1px solid #eeeeee; ">

                                                        <tr>
                                                            <td height="5" style="font-size: 5px; line-height: 5px;">&nbsp;</td>
                                                        </tr>

                                                        <tr>
                                                            <td align="center" style="color: #5caad2; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 20px;">


                                                                <div style="line-height: 20px;">
                                                                <a href="/detailBeritaPengunjung/<?= $glb->id_berita?>" style="color: #5caad2; text-decoration: none;">Informasi Lebih Lanjut</a>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="8" style="font-size: 8px; line-height: 8px;">&nbsp;</td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end section -->
    <?php endforeach; ?>

    

    <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">

                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">

                                            <span style="color: #333333;">List Berita</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <!-- <a style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;"
                                                        href="{{UnsubscribeURL}}">UNSUBSCRIBE</a> -->
                                                        <a href="/" class="back-button">Back</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->

</body>

</html>