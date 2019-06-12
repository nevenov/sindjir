<!DOCTYPE html>
<html lang="en">
<head>
    <title>Синджирите</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">

        /* RESET STYLES */
        body{margin:0; padding:0;}
        img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
        table{border-collapse:collapse !important;}
        body{height:100% !important; margin:0; padding:0; width:100% !important; background-color: #f4f4f4;}
        p{margin: 0 0 10px 0;}

        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {

            /* FULL-WIDTH TABLES */
            table[class="responsive-table"]{
                width:100%!important;
            }

            td[class="padding-copy"]{
                padding: 10px 5% 10px 5% !important;
            }

            td[class="no-padding"]{
                padding: 0 !important;
            }

            td[class="section-padding"]{
                padding: 10px 15px 50px 15px !important;
            }

        }
    </style>
</head>
<body style="margin: 0; padding: 0;">

<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 15px;" class="section-padding">
            <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td style="padding: 25px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" style="padding: 0 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                <p><strong>Име:</strong> {{ $name }}</p>
                                                <p><strong>E-mail:</strong> {{ $email }}</p>
                                                <p><strong>Относно:</strong> {{ $about }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                {{ $user_message }}
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
</table>

</body>
</html>
