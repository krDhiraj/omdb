<html lang="en">
    <head>
        <title>Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style type="text/css">
            body{
                margin: 0px;padding: 0px;
                font-family: 'Roboto', sans-serif;
            }
            .main-section{
                background-color: #f6ab36;text-align: center; padding: 0px 15px;height:100vh;min-height: 550px
            }
            .main-section .logo{
                margin: 0 auto;padding-top: 85px;
            }
            .main-section .logo img{
                width: 200px;
            }
            .main-section .search-bar{   
                width: 50%;
                min-width: 300px;
                margin: 50px auto;
                background: rgba(255, 255, 255, 0.28);
                position: relative;
                padding: 15px;
            }
            .main-section .search-bar form{
                margin: 0px;
                width: 100%;
            }
            .main-section .search-bar .form-control{
                width: 100%;
                background: transparent;
                border: 0px;
                height: 45px;
                font-size: 20px;
                color: #fff;
            }
            .main-section .search-bar .form-control:focus{
                outline: none;
            }
            .main-section .btn-search{
                position: absolute;
                right: 0px;
                background: #dd9b2c;
                border: 0px;
                top: 0px;
                height: 75px;
                width: 120px;
                line-height: 0px;
                color: #fff;
                font-size: 20px;
                cursor:pointer;
            }
            .main-section .btn-search:focus{
                outline: none;
            }
            .header{background: #f6ab36; padding: 30px 0px;}
            .header h2{margin-bottom: 0px; text-align: center; color: #fff}
            .header a{
                float: left;position: absolute;
                left: 25px;
            }
            .header p{
                text-align: center;color: #fff; margin-bottom: 0px
            }
            .movie-list{    
                width: 98.5%;
                padding:10px;
                float: left;
            }
            .movie-list .movie-desc h3{
                font-size: 16px;
                margin-top: 10px;
                margin-bottom: 2px;
            }
            .movie-list .movie-desc p{
                font-size: 14px;
            }
            .movie-banner{
                max-height: 440px;
                overflow:hidden;
            }
            .movie-list .movie-desc p{
                color: #adadad;
                margin: 5px;
            }

            .col-4{
                width: 25%;
                display: block;
                float: left;
            }
            .movie-desc{
                margin: 10px;
                position: relative;
                padding: 5px;
                text-align: center;
                box-shadow: 0px 0px 6px rgba(0,0,0,0.15);
                cursor: pointer;
                min-height: 535px;
            }
            .movie-banner img{
                width: 100%;
                height: 440px;
            }
             @media only screen and (max-width: 767px) {
                .col-4{
                    width: 100%;
                }
                
                .movie-list .lists img{    
                    width: 100%;
                    height: 200px;
                }
                .main-section .btn-search{
                    width: 90px;
                    font-size: 15px;
                }
                .main-section .search-bar .form-control{
                    font-size: 15px; 
                }
                .movie-list{
                    width: 100%;
                    padding: 0px;
                }
             }
            input::-webkit-input-placeholder {
            color: #fff !important;
            }
            input:-moz-placeholder { 
            color: #fff !important;  
            }
             
            input::-moz-placeholder {
            color: #fff !important;  
            }
             
            input:-ms-input-placeholder {  
            color: #fff !important;  
            }

        </style>
    </head>
    <body>
        <div id="main">
            <section class="main-section">
                <div class="logo">
                    <img src="<?= base_url(); ?>assets/img/omdb.png"  alt="omdb">
                </div>
                <div class="search-bar">
                    <form method="POST" class="movie-search" action="<?= base_url();?>site/search">
                        <input type="text" name="s" class="form-control" placeholder="Search for your favourite movie...">
                        <button type="submit" class="btn btn-search">SEARCH</button>
                    </form>
                </div>
                <span class="error-response"></span>
            </section>
             <script>
                $(".movie-search").on("submit", function () {
                    var form = $(this);
                    $.ajax({
                        url: form.attr("action"),
                        method: form.attr("method"),
                        data: form.serialize(),
                        success: function (result) {
                            var output = JSON.parse(result);
                            if (output.status == 200) {
                                $("#main").html(output.html);
                            } else {
                                $(".error-response").text(output.message);
                            }
                        }
                    });

                    return false;
                });
            </script>
        </div>
        <script>
            var main_page = $("#main").html();
            function main(){
                 $("#main").html(main_page);
            }
        </script>
    </body>
</html>