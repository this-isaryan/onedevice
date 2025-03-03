<?php
require('connection.inc.php');
require('functions.inc.php');

function generateOTP()
{
    $digits = "0123456789";
    $otplen = 6;
    $otp = "";
    for ($i = 1; $i <= $otplen; $i++) {
        $otp .= substr($digits, (rand() % (strlen($digits))), 1);
    }
    return $otp;
}

$OTP = generateOTP();
$_SESSION['EMAIL_OTP'] = $OTP;
$year = date("Y");
$html = "<head>
    <title></title>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
        }
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }
        
        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }
        
        p {
            line-height: inherit
        }
        
        @media (max-width:720px) {
            .icons-inner {
                text-align: center;
            }
            .icons-inner td {
                margin: 0 auto;
            }
            .row-content {
                width: 100% !important;
            }
            .image_block img.big {
                width: auto !important;
            }
            .column .border,
            .mobile_hide {
                display: none;
            }
            .stack .column {
                width: 100%;
                display: block;
            }
            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }
        }
    </style>
</head>

<body style='background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
    <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9;' width='100%'>
        <tbody>
            <tr>
                <td>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <div class='spacer_block' style='height:10px;line-height:10px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img alt='Brand Logo' src='https://onedevice.s3.ap-south-1.amazonaws.com/Logo.png' style='display: block; height: auto; border: 0; width: 154px; max-width: 100%;' title='Brand Logo' width='154' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <div class='spacer_block' style='height:15px;line-height:15px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img class='big' src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/Up_pink.png' style='display: block; height: auto; border: 0; width: 700px; max-width: 100%;' width='700' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffd3e0; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;padding-top:30px;'>
                                                                <div align='center' style='line-height:10px'><img alt='Welcome' src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/Welcome_Email.png' style='display: block; height: auto; border: 0; width: 420px; max-width: 100%;' title='Welcome' width='420' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 18px; color: #191919; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 16px; text-align: center;'>
                                                                            <strong><span style='font-size:38px;'>Hi ADMIN, </span></strong></p>
                                                                        <p style='margin: 0; font-size: 16px; text-align: center;'>
                                                                            <strong><span
																					style='font-size:38px;'>welcome to
																					OneDevice.in!</span></strong></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:65px;padding-left:10px;padding-right:10px;padding-top:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #191919; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: center;'>
                                                                            <span style='font-size:22px;'>Thank you for
																				subscribing!</span></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-6' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-left:20px;padding-right:20px;padding-top:35px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 18px; color: #191919; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 42px;'>
                                                                            <span style='font-size:28px;'><strong><span
																						style=''>Verify Your Account
																						First</span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='5' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='15%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 2px solid #FFD3E0;'>
                                                                                <span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='divider_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='5%'>
                                                                        <tr>
                                                                            <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 2px solid #FFD3E0;'>
                                                                                <span> </span></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-7' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='66.66666666666667%'>
                                                    <div class='spacer_block' style='height:5px;line-height:5px;font-size:1px;'> </div>
                                                    <div class='spacer_block mobile_hide' style='height:20px;line-height:20px;font-size:1px;'> </div>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:40px;padding-right:30px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #555555; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left;'>
                                                                            Thanks for signing up for our emails now that you're on the list, you'll be first to hear about everything.</p>
																		<h2>Your OTP is: $OTP</h2>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:45px;padding-right:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #a96b7d; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 28px;'>
                                                                            <span style='font-size:14px;'><strong><span
																						style=''><span style=''><span
																								style=''></span></span>
                                                                            </span>
                                                                            </strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:15px;padding-left:40px;padding-right:10px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #34495e; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 40px;'>
                                                                            <span style='font-size:20px;'><strong><span
																						style=''>
																						</span></strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class='column column-2' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='33.333333333333336%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='padding-right:40px;width:100%;padding-left:0px;padding-top:5px;padding-bottom:5px;'>
                                                                <div align='center' style='line-height:10px'><img src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/Step_1_1.png' style='display: block; height: auto; border: 0; width: 193px; max-width: 100%;' width='193' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-8' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <div class='spacer_block' style='height:20px;line-height:20px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-9' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img class='big' src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/white_down.png' style='display: block; height: auto; border: 0; width: 700px; max-width: 100%;' width='700' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-10' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <div class='spacer_block' style='height:20px;line-height:20px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-11' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img class='big' src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/Up_pink.png' style='display: block; height: auto; border: 0; width: 700px; max-width: 100%;' width='700' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-12' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffd3e0; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='50%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:25px;padding-left:40px;padding-right:40px;padding-top:50px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 18px; color: #191919; line-height: 1.5; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 45px;'>
                                                                            <span style='font-size:30px;'><strong>Explore
																					our website here!</strong></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='button_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div align='center'>
                                                                    <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='http://localhost:3000/' style='height:38px;width:174px;v-text-anchor:middle;' arcsize='69%' stroke='false' fillcolor='#f1c405'><w:anchorlock/><v:textbox inset='0px,0px,0px,0px'><center style='color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px'><![endif]--><a href='http://localhost:3000/' style='text-decoration:none;display:inline-block;color:#ffffff;background-color:#f1c405;border-top-left-radius:26px;border-bottom-right-radius:26px;width:auto;border-top:1px solid #f1c405;border-right:1px solid #f1c405;border-bottom:1px solid #f1c405;border-left:1px solid #f1c405;padding-top:5px;padding-bottom:5px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;'
                                                                        target='_blank'><span
																			style='padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;'><span
																				style='font-size: 16px; line-height: 1.8; word-break: break-word; mso-line-height-alt: 29px;'>Visit
																				our Website</span></span></a>
                                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class='column column-2' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='50%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;padding-top:20px;'>
                                                                <div align='center' style='line-height:10px'><img src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/app_image_2.png' style='display: block; height: auto; border: 0; width: 298px; max-width: 100%;' width='298' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-13' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td style='padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:40px;'>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; mso-line-height-alt: 24px; color: #555555; line-height: 2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;'>
                                                                        <p style='margin: 0; font-size: 14px; text-align: center;'>
                                                                            If you have any questions, feel free to message us at <a href='mailto:onedevicein22@gmail.com' style='color: #555555;'>onedevicein22@gmail.com</a>. All right reserved.</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-14' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2;'>
                                                                        <p style='margin: 0; font-size: 12px; text-align: center;'>
                                                                            <span style='color:#555555;'><a href='/about-us' style='color:#555555;'>About Us</a>
																				<strong>|</strong> <a href='/tnc' style='color:#555555;'>Terms & conditions</a>
																				<strong>|</strong> <a href='/privacy-policy' style='color:#555555;'>Privacy Policy</a></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border='0' cellpadding='10' cellspacing='0' class='text_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                                                        <tr>
                                                            <td>
                                                                <div style='font-family: sans-serif'>
                                                                    <div style='font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;'>
                                                                        <p style='margin: 0; font-size: 12px; text-align: center;'>
                                                                            One Device © $year</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-15' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <table border='0' cellpadding='0' cellspacing='0' class='image_block' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                                        <tr>
                                                            <td style='width:100%;padding-right:0px;padding-left:0px;'>
                                                                <div align='center' style='line-height:10px'><img class='big' src='https://onedevice.s3.ap-south-1.amazonaws.com/email+images/white_down.png' style='display: block; height: auto; border: 0; width: 700px; max-width: 100%;' width='700' /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-16' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                            <tr>
                                <td>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;' width='700'>
                                        <tbody>
                                            <tr>
                                                <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                    width='100%'>
                                                    <div class='spacer_block' style='height:25px;line-height:25px;font-size:1px;'> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- End -->
</body>";

include('smtp/PHPMailerAutoload.php');
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "onedevicein22@gmail.com";
$mail->Password = "tysnqkcpqzddidzj";
$mail->SetFrom("onedevicein22@gmail.com");
$mail->addAddress("aryankumar1.12.2002@gmail.com");
$mail->IsHTML(true);
$mail->Subject = "OTP for login to Admin Panel";
$mail->Body = $html;
$mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
));
if ($mail->send()) {
    echo "done";
} else {
    //echo "Error occur";
}
