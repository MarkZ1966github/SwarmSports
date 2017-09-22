<?php

//This is where it all begins.
// version 6/4/13

define("SECURE",1);  //A defined variable used to prevent direct access to the logic and content
                     //modules.

error_reporting(E_ALL ^ E_NOTICE);  //Report every error except notices.  Only for debugging purposes.

include "logic/logic.submission.php";  //Check for form input. (registration, login, etc.)

include "content/content.headersmall.php";  //Output the page header.

//Is the user logged in?
if(isset($_SESSION['loggedIn']))
{ ?>
<div class="navbar transparent navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
<a class="brand" href="/indexchrome.php"><img src = "./bootstrap/docs/assets/img/SwarmSports-Header-225x45.jpg"></a> 
    <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
 	 	<li><a href="#featured">Featured</a></li>
              <li><a href="#more">More</a></li>
              <li><a href="#new">New</a></li>
            
             </ul>

 <div align = "right">
<?php include "content/content.searchsmall.php"; ?>
 </div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/docs/assets/js/jquery.js"></script>
    <script>
    /* ===================================================
 * bootstrap-transition.js v2.3.1
 * http://twitter.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);
    </script>
    <script src="./bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>

<?php include "content/content.loggedIn.php"; ?>
<?php
  
 	
}
else
{ ?>
<div class="navbar transparent navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
<a class="brand" href="/indexchrome.php"><img src = "./bootstrap/docs/assets/img/SwarmSports-Header-225x45.jpg"></a> 
    <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
 	 	<li><a href="#featured">Featured</a></li>
              <li><a href="#more">More</a></li>
              <li><a href="#new">New</a></li>
            
             </ul>

 <div align = "right">
<?php include "content/content.searchsmall.php"; ?>
 </div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">

<?php include "content/content.loggedoutsmall.php"; ?>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/docs/assets/js/jquery.js"></script>
    <script>
    /* ===================================================
 * bootstrap-transition.js v2.3.1
 * http://twitter.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);
    </script>
    <script src="./bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>

<?php
}

?>