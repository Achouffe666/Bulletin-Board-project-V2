<doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header and footer</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../Static/CSS/style.css">
</head>
<body>
     
    <header class="img-fluid image-header">
    
    </header>

    <header class="card bg-dark text-white">
        <div class="card-img-overlay header-rt">
            <h1 class="card-title">TRACKER</h1> 
                <!--<div class="dropdown-menu block-login">
                    <a class="dropdown-item" href="#"><img src="../images/header/edit.png" alt="Register"><span style="color: white;">Register</span></a>
                    <a class="dropdown-item" href="#"><img src="../images/header/enter.png" alt="Register"><span style="color: white;">Login</span></a>
                </div> -->
        </div>
    </header>

    <footer class="contenair-fluide">

        <div class="navbar navbar-expand-lg navbar-light bg-light  brique-1">

            <div class="contenair-fluide brique-11">
                <ul class="img-fluid barre-reseaux">
                    <li class="cercle"><a href="#"><i class="fab fa-twitter tkl" ></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-apple tkl"></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-facebook-f tkl"></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-codepen tkl"></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-google-plus-g tkl"></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-digg tkl"></i></a></li>
                    <li class="cercle"><a href="#"><i class="fab fa-pinterest-p tkl"></i></a></li>
                </ul>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light  brique-2">
            <a class="navbar-brand" href="#"><i class="fas fa-home"></i>Home <span style="color: #888383;"><</span> Board index</a>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav  info-footer">
                    <a href="#"><i class="far fa-envelope"></i>Contact us</a>
                    <a href="#"><i class="fas fa-shield-alt"></i>The team</a>
                    <a href="#"><i class="far fa-angle-down"></i>Termes</a>
                    <a href="#"><i class="fas fa-lock"></i>Privacy</a>
                    <a href="#"><i class="fas fa-users"></i></i>Members</a>
                    <a href="#"><i class="fas fa-trash-alt"></i>Delete cookies</a>
                    <span style="color: #888383;">All times are UTC</span>
                </div>
              </div>
        </nav>

          <div class="navbar navbar-light bg-light brique-3">
            
                <div>
                    <p><span style="color: #888383;">Powered by</span> phpBB<span style="color: #888383;">. Desing by </span>PlanetStyles</p>
                </div>
                <div id="icon">
                    <i class="fad fa-arrow-alt-square-up"></i>
                </div>
            </div>   
         </div>
    </footer>

    <script type="text/javascript">
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        }
        else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>
</html>