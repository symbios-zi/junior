<?php

class Layouts {
	public static function head($title = 'Найди работу на dopjob.ru', $description = '', $keywords = ''){
		$head = '
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="'.$description.'">
        <meta name="keywords" content="'.$keywords.'">
        <meta name="author" content="">
        <title>'.$title.'</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link href="/template/css/prettyPhoto.css" rel="stylesheet"> -->
        <!-- <link href="/template/css/price-range.css" rel="stylesheet"> -->
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">

        <link href="/template/css/slidebars.min.css" rel="stylesheet"> <!-- Mobile menu -->

        <!-- Zebra Date-Picker -->
        <link href="/template/library/date-picker/bootstrap.css" rel="stylesheet">
        <!-- //Zebra Date-Picker -->

        <!-- BOOTSTRAP DatePicker -->
       <!--  <link href="/template/library/bootstrap-datepicker/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="/template/library/bootstrap-datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="/template/library/bootstrap-datepicker/bootstrap-datetimepicker-standalone.css" rel="stylesheet"> -->
        <!-- //BOOTSTRAP DatePicker -->

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/icons/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
        <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
                (function (d, w, c) {
                    (w[c] = w[c] || []).push(function() {
                        try {
                            w.yaCounter42915629 = new Ya.Metrika({
                                id:42915629,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true
                            });
                        } catch(e) { }
                    });

                    var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = "https://mc.yandex.ru/metrika/watch.js";

                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else { f(); }
                })(document, window, "yandex_metrika_callbacks");
            </script>
<noscript><div><img src="https://mc.yandex.ru/watch/42915629" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    </head>
		';
		echo $head;
	}
}

?>