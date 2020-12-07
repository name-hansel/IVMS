<?php
$url = 'https://industrialvisit-api.herokuapp.com/API/company/getInfoAllCompanies.php';
$json_data = file_get_contents($url);
$company_arr = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Companies</title>
    <link rel="stylesheet" type="text/css" href="csscomp.css">
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Montserrat:wght@300&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('../images/cp.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="head">
        <h1>Industrial Visit Management System</h1>
        <nav class="navb">
            <ul>
                <li class="items"><a href="../../index.php">Home</a></li>
                <li class="items"><a href="../About.html">About</a></li>
                <li class="items" id="tlist"><a href="../AvailableTourInfo/available-tours.php">Tours</a>
                </li>
                <li class="items"><a href="CompanyInfo.php">Companies</a></li>
            </ul>
        </nav>
    </div>
    <br><br>

    <div class="container">
        <div id="sub">COMPANIES</div><br><br>
        <div id="cont">
            <div id="qt">"Being a great place to work is the difference between being a good company and great company."</div>
            <br>A company or workplace is where a person learns and grows. The atmosphere, working environment, methodolgies and strategies followed plays an important role in ther career develoopment.
            Developing an idea of an ideal workplace and understanding the working environment can prove to be very useful.<br><br>
            Here are some of the companies providing a good industrial visit experience.
        </div>
        <br>

        <div>
            <table id="comp">
                <thead>
                    <tr>
                        <th class="idhead">Company ID</th>
                        <th class="chead">Company Name</th>
                        <th class="dhead">Description</th>
                        <th class="cthead">Contact</th>
                    </tr>
                </thead>
            </table>
            <div class="tblcnt">
                <table>

                    <?php
                    if (isset($company_arr[0]['message'])) {
                    ?>
                        <div class='no-tour'>
                            <h3 class='message'>No companies.</h3>
                        </div>
                        <?php
                    } else {
                        foreach ($company_arr['data'] as $key => $item) {
                        ?>
                            <tr>
                                <td><?= $item['company_id'] ?></td>
                                <td><?= $item['company'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><?= $item['email'] ?><br><?= $item['phone_number'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>



    <br><br>
    <div class="footer">
        <div class="socials">
            <div class="site twitter">
                <img src="../images/twitter.svg" alt="" width="15px">
                <a href="">Twitter</a>
            </div>
            <div class="site facebook">
                <img src="../images/facebook.svg" alt="" width="15px">
                <a href="">Facebook</a>
            </div>
            <div class="site instagram">
                <img src="../images/instagram.svg" alt="" width="15px">
                <a href="">Instagram</a>
            </div>
        </div>
        <div class="contact">
            <h4>Email Address: ivsm@gmail.com</h4><br>
            <h4>Contact Number: 222-222-222</h4>
        </div>
    </div>

</body>

</html>