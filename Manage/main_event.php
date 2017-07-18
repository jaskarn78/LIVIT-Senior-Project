<?php
	session_start();
	include_once ('../php/check_login.php');
?>
<!doctype php>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Event Creation</title>
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery.js"></script>
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery-ui.js"></script> 
<link rel="icon" href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png" />
<link rel="shortcut icon"  href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/realStyle.css" rel="stylesheet" type="text/css"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/listStyle.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>


<script>
jQuery(function(){
    var max = 3;
    var checkboxes = $('input[type="checkbox"]');
                       
    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});	
</script>

<script>
	$(function(){
		var fileInput = $('.upload-file');
		var maxSize = fileInput.data('max-size');
		$('.upload-form').submit(function(e){
			if(fileInput.get(0).files.length){
				var fileSize = fileInput.get(0).files[0].size; // in bytes
				if(fileSize>maxSize){
					alert('file size is more then' + maxSize + ' bytes');
					return false;
				}else{
					alert('file size is correct- ' + fileSize + ' bytes');
				}
			}else{
				alert('choose file, please');
				return false;
			}
		});
	});
</script>

<script>
	function checkDate(id) {
		var startdate = document.getElementById("datepicker").value;
		var enddate	  = document.getElementById("datepicker2").value;
		
		// Start Date has just been set
		if (enddate != "" && enddate != null && startdate != "" && startdate != null) {
			var startmonth = startdate.substr(0,2);
			var startday   = startdate.substr(3,2);
			var startyear  = startdate.substr(6,4);
			
			var endmonth = enddate.substr(0,2);
			var endday   = enddate.substr(3,2);
			var endyear  = enddate.substr(6,4);
			
			// Compare Start and End dates
			if (endyear < startyear) {
				alert("Cannot have an end date earlier than the start date.");
				document.getElementById(id).value = null;
			} else if (endyear == startyear) {
				if (endmonth < startmonth) {
					alert("Cannot have an end month earlier than the start month.");
					document.getElementById(id).value = null;
				} else if (endmonth == startmonth) {
					if (endday < startday) {
						alert("Cannot have an end day earlier than the start day.");
						document.getElementById(id).value = null;
					}
				}
			} 
		}
	}

	function pickOption(sel) {
		if (sel.options[sel.selectedIndex].value == "facebook") {
			showFacebookList();
		} else if (sel.options[sel.selectedIndex].value == "google") {
			showGoogleList();
		} else {
			showFacebookList();
		}
	}
	
	function showLists() {
		showGoogleList();
		showFacebookList();
	}

	function showGoogleList() {
		document.getElementById("thirdPartyPullListDiv").innerHTML = "";
	}
	
	function showFacebookList()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/event_main_facebook_list.php";
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("thirdPartyPullListDiv").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	function insertEvent()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/event_push.php";
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("thirdPartyPullListDiv").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
</script>

<style>
 #map {
		z-index:8;
        height: 100%;
		width: 100%;
		margin:0px;
      }
	  
	  #holder { border: 2px dashed #e8e8e8; width: 98%; height:auto; min-height: 100px; max-height: 200px; overflow-y:auto; margin-bottom: 4px; text-align: center; line-height:350%;}
	  #holder.hover { border: 2px dashed #000000; }
	  #holder img { display: block; margin: 10px auto; height:inherit; }
	  #holder p { margin: 2px; font-size: 10px; }
	  .progress { width: 100%; }
	  .progress:after { content: '%'; }
	  .fail { background: #c00; padding: 2px; color: #fff; }
	  .hidden { display: none !important;}

</style>

<script>
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
	$(function() {
		$("#datepicker").datepicker();
		// Pass the user selected date format.
		$("#format").change(function() {
			$("#datepicker").datepicker("option", "dateFormat", $(this).val());
		});
	});
});
</script>
 
<script>
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
$(function() {
$("#datepicker2").datepicker();
// Pass the user selected date format.
$("#format").change(function() {
$("#datepicker2").datepicker("option", "dateFormat", $(this).val());
});
});
});
</script>	
	
<script>
	$("input").change(function(e) {
		for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
			
			var file = e.originalEvent.srcElement.files[i];
			
			var img = document.createElement("img");
			var reader = new FileReader();
			reader.onloadend = function() {
				 img.src = reader.result;
			}
			reader.readAsDataURL(file);
			$("input").after(img);
		}
	});
</script>

<script>

import scrollbarWidth from 'scrollbarwidth';
import debounce from 'lodash.debounce';
import ResizeObserver from 'resize-observer-polyfill';

import './simplebar.css';

export default class SimpleBar {
    constructor(element, options) {
        this.el = element;
        this.track;
        this.scrollbar;
        this.flashTimeout;
        this.contentEl;
        this.scrollContentEl;
        this.dragOffset         = { x: 0, y: 0 };
        this.isVisible          = { x: true, y: true };
        this.scrollOffsetAttr   = { x: 'scrollLeft', y: 'scrollTop' };
        this.sizeAttr           = { x: 'offsetWidth', y: 'offsetHeight' };
        this.scrollSizeAttr     = { x: 'scrollWidth', y: 'scrollHeight' };
        this.offsetAttr         = { x: 'left', y: 'top' };
        this.observer;
        this.currentAxis;
        this.enabled;
        this.scrollbarWidth = scrollbarWidth(); // we consider that scrollbar width won't change
                                                // during lifespan of the component

        this.options = Object.assign({}, SimpleBar.defaultOptions, options);
        this.classNames = this.options.classNames;

        this.flashScrollbar = this.flashScrollbar.bind(this);
        this.startScroll = this.startScroll.bind(this);
        this.startDrag = this.startDrag.bind(this);
        this.drag = this.drag.bind(this);
        this.endDrag = this.endDrag.bind(this);

        this.recalculate = debounce(this.recalculate, 100, { leading: true, trailing: false });

        this.init();
    }

    static get defaultOptions() {
        return {
            wrapContent: true,
            autoHide: true,
            forceEnabled: false,
            classNames: {
                content: 'simplebar-content',
                scrollContent: 'simplebar-scroll-content',
                scrollbar: 'simplebar-scrollbar',
                track: 'simplebar-track'
            },
            scrollbarMinSize: 10
        }
    }

    static get htmlAttributes() {
        return {
            autoHide: 'data-simplebar-autohide',
            forceEnabled: 'data-simplebar-force-enabled',
            scrollbarMinSize: 'data-simplebar-scrollbar-min-size'
        }
    }

    static initHtmlApi() {
        // MutationObserver is IE11+
        if (typeof MutationObserver !== 'undefined') {
            // Mutation observer to observe dynamically added elements
            const globalObserver = new MutationObserver(mutations => {
                mutations.forEach(mutation => {
                    Array.from(mutation.addedNodes).forEach(addedNode => {
                        if (addedNode.nodeType === 1) {
                            if (addedNode.SimpleBar) return;

                            if (addedNode.hasAttribute('data-simplebar')) {
                                new SimpleBar(addedNode, SimpleBar.getElOptions(addedNode));
                            } else {
                                Array.from(addedNode.querySelectorAll('[data-simplebar]')).forEach(el => {
                                    new SimpleBar(el, SimpleBar.getElOptions(el));
                                });
                            }
                        }
                    });

                    Array.from(mutation.removedNodes).forEach(removedNode => {
                        if (removedNode.nodeType === 1) {
                            if (removedNode.hasAttribute('data-simplebar')) {
                                removedNode.SimpleBar && removedNode.SimpleBar.unMount();
                            } else {
                                Array.from(removedNode.querySelectorAll('[data-simplebar]')).forEach(el => {
                                    el.SimpleBar && el.SimpleBar.unMount();
                                });
                            }
                        }
                    });
                });
            });

            globalObserver.observe(document, { childList: true, subtree: true });
        }

        // Taken from jQuery `ready` function
        // Instantiate elements already present on the page
        if (document.readyState === 'complete' ||
                (document.readyState !== 'loading' && !document.documentElement.doScroll)) {
            // Handle it asynchronously to allow scripts the opportunity to delay init
            window.setTimeout(this.initDOMLoadedElements.bind(this));
        } else {
            document.addEventListener('DOMContentLoaded', this.initDOMLoadedElements.call(this));
            window.addEventListener('load', this.initDOMLoadedElements.call(this));
        }
    }

    // Helper function to retrieve options from element attributes
    static getElOptions(el) {
        const options = Object.keys(SimpleBar.htmlAttributes).reduce((acc, obj) => {
            const attribute = SimpleBar.htmlAttributes[obj];
            if (el.hasAttribute(attribute)) {
                acc[obj] = JSON.parse(el.getAttribute(attribute) || true);
            }
            return acc;
        }, {});

        return options;
    }

    static removeObserver() {
        this.observer && this.observer.disconnect();
    }

    static initDOMLoadedElements() {
        document.removeEventListener('DOMContentLoaded', this.initDOMLoadedElements);
        window.removeEventListener('load', this.initDOMLoadedElements);

        Array.from(document.querySelectorAll('[data-simplebar]')).forEach(el => {
            if (!el.SimpleBar)
                new SimpleBar(el, SimpleBar.getElOptions(el));
        });
    }

    init() {
        // Save a reference to the instance, so we know this DOM node has already been instancied
        this.el.SimpleBar = this;

        // If scrollbar is a floating scrollbar, disable the plugin
        this.enabled = this.scrollbarWidth !== 0 || this.options.forceEnabled;

        if (!this.enabled) {
            this.el.style.overflow = 'auto';

            return;
        }

        this.initDOM();

        this.trackX = this.el.querySelector(`.${this.classNames.track}.horizontal`);
        this.trackY = this.el.querySelector(`.${this.classNames.track}.vertical`);

        this.scrollbarX = this.trackX.querySelector(`.${this.classNames.scrollbar}`);
        this.scrollbarY = this.trackY.querySelector(`.${this.classNames.scrollbar}`);

        // Calculate content size
        this.recalculate();

        if (!this.options.autoHide) {
            this.showScrollbar('x');
            this.showScrollbar('y');
        }

        this.initListeners();
    }

    initDOM() {
        // Prepare DOM
        if (this.options.wrapContent) {
            this.scrollContentEl = document.createElement('div');
            this.contentEl = document.createElement('div');

            this.scrollContentEl.classList.add(this.classNames.scrollContent);
            this.contentEl.classList.add(this.classNames.content);

            this.scrollContentEl.style.padding = `0 ${this.scrollbarWidth}px ${this.scrollbarWidth}px 0`;
            this.scrollContentEl.style.margin = `0 -${this.scrollbarWidth}px -${this.scrollbarWidth}px 0`;
            this.contentEl.style.marginBottom = `-${this.scrollbarWidth}px`;

            while (this.el.firstChild)
                this.contentEl.appendChild(this.el.firstChild)

            this.scrollContentEl.appendChild(this.contentEl);
            this.el.appendChild(this.scrollContentEl);
        }

        const track = document.createElement('div');
        const scrollbar = document.createElement('div');

        track.classList.add(this.classNames.track);
        scrollbar.classList.add(this.classNames.scrollbar);

        track.appendChild(scrollbar);

        this.trackX = track.cloneNode(true);
        this.trackX.classList.add('horizontal');

        this.trackY = track.cloneNode(true);
        this.trackY.classList.add('vertical');

        this.el.insertBefore(this.trackX, this.el.firstChild);
        this.el.insertBefore(this.trackY, this.el.firstChild);
    }

    initListeners() {
        // Event listeners
        if (this.options.autoHide) {
            this.el.addEventListener('mouseenter', this.flashScrollbar);
        }

        this.scrollbarX.addEventListener('mousedown', (e) => this.startDrag(e, 'x'));
        this.scrollbarY.addEventListener('mousedown', (e) => this.startDrag(e, 'y'));

        this.scrollContentEl.addEventListener('scroll', this.startScroll);

        // MutationObserver is IE11+
        if (typeof MutationObserver !== 'undefined') {
            // create an observer instance
            this.mutationObserver = new MutationObserver(mutations => {
                mutations.forEach(mutation => {
                    if (this.isChildNode(mutation.target) || mutation.addedNodes.length) {
                        this.recalculate();
                    }
                });
            });

            // pass in the target node, as well as the observer options
            this.mutationObserver.observe(this.el, { attributes: true, childList: true, characterData: true, subtree: true });
        }

        this.resizeObserver = new ResizeObserver(this.recalculate.bind(this));

        this.resizeObserver.observe(this.el);
    }

    removeListeners() {
        if (!this.enabled) {
            return;
        }

        // Event listeners
        if (this.options.autoHide) {
            this.el.removeEventListener('mouseenter', this.flashScrollbar);
        }

        this.scrollbarX.removeEventListener('mousedown', (e) => this.startDrag(e, 'x'));
        this.scrollbarY.removeEventListener('mousedown', (e) => this.startDrag(e, 'y'));

        this.scrollContentEl.removeEventListener('scroll', this.startScroll);

        this.observer && this.observer.disconnect();
    }
    

    startDrag(e, axis = 'y') {
        // Preventing the event's default action stops text being
        // selectable during the drag.
        e.preventDefault()
        
        let scrollbar = axis === 'y' ? this.scrollbarY : this.scrollbarX;
        // Measure how far the user's mouse is from the top of the scrollbar drag handle.
        let eventOffset = axis === 'y' ? e.pageY : e.pageX;
        
        this.dragOffset[axis] = eventOffset - scrollbar.getBoundingClientRect()[this.offsetAttr[axis]];
        this.currentAxis = axis;

        document.addEventListener('mousemove', this.drag);
        document.addEventListener('mouseup', this.endDrag);
    }



    drag(e) {
        e.preventDefault();

        let eventOffset = this.currentAxis === 'y' ? e.pageY : e.pageX;
        let track = this.currentAxis === 'y' ? this.trackY : this.trackX;

        // Calculate how far the user's mouse is from the top/left of the scrollbar (minus the dragOffset).
        let dragPos = eventOffset - track.getBoundingClientRect()[this.offsetAttr[this.currentAxis]] - this.dragOffset[this.currentAxis];
        
        // Convert the mouse position into a percentage of the scrollbar height/width.
        let dragPerc = dragPos / track[this.sizeAttr[this.currentAxis]];
        
        // Scroll the content by the same percentage.
        let scrollPos = dragPerc * this.contentEl[this.scrollSizeAttr[this.currentAxis]];

        this.scrollContentEl[this.scrollOffsetAttr[this.currentAxis]] = scrollPos;
    }

    endDrag() {
        document.removeEventListener('mousemove', this.drag);
        document.removeEventListener('mouseup', this.endDrag);
    }


 
    resizeScrollbar(axis = 'y') {
        let track;
        let scrollbar;

        if (axis === 'x') {
            track = this.trackX;
            scrollbar = this.scrollbarX;
        } else { // 'y'
            track = this.trackY;
            scrollbar = this.scrollbarY;
        }

        let contentSize     = this.contentEl[this.scrollSizeAttr[axis]];
        let scrollOffset    = this.scrollContentEl[this.scrollOffsetAttr[axis]]; // Either scrollTop() or scrollLeft().
        let scrollbarSize   = track[this.sizeAttr[axis]];
        let scrollbarRatio  = scrollbarSize / contentSize;
        let scrollPourcent  = scrollOffset / (contentSize - scrollbarSize);
            // Calculate new height/position of drag handle.
            // Offset of 2px allows for a small top/bottom or left/right margin around handle.
        let handleSize      = Math.max(Math.floor(scrollbarRatio * (scrollbarSize - 2)) - 2, this.options.scrollbarMinSize);
        let handleOffset    = (scrollbarSize - 4 - handleSize) * scrollPourcent + 2;


        // Set isVisible to false if scrollbar is not necessary (content is shorter than wrapper)
        this.isVisible[axis] = scrollbarSize < contentSize

        if (this.isVisible[axis]) {
            track.style.visibility = 'visible';

            if (axis === 'x') {
                scrollbar.style.left = `${handleOffset}px`;
                scrollbar.style.width = `${handleSize}px`;
            } else {
                scrollbar.style.top = `${handleOffset}px`;
                scrollbar.style.height = `${handleSize}px`;
            }
        } else {
            track.style.visibility = 'hidden';
        }
    }


    startScroll() {
        this.flashScrollbar();
    }

    flashScrollbar() {
        this.resizeScrollbar('x');
        this.resizeScrollbar('y');
        this.showScrollbar('x');
        this.showScrollbar('y');
    }



    showScrollbar(axis = 'y') {
        if (!this.isVisible[axis]) {
            return
        }

        if (axis === 'x') {
            this.scrollbarX.classList.add('visible');
        } else {
            this.scrollbarY.classList.add('visible');
        }

        if (!this.options.autoHide) {
            return
        }
        if(typeof this.flashTimeout === 'number') {
            window.clearTimeout(this.flashTimeout);
        }

        this.flashTimeout = window.setTimeout(this.hideScrollbar.bind(this), 1000);
    }



    hideScrollbar() {
        this.scrollbarX.classList.remove('visible');
        this.scrollbarY.classList.remove('visible');
        
        if(typeof this.flashTimeout === 'number') {
            window.clearTimeout(this.flashTimeout);
        }
    }



    recalculate() {
        if (!this.enabled) return;

        this.resizeScrollbar('x');
        this.resizeScrollbar('y');
    }


    getScrollElement() {
        return this.scrollContentEl;
    }



    getContentElement() {
        return this.contentEl;
    }

    unMount() {
        this.removeListeners();
        this.el.SimpleBar = null;
    }


    isChildNode(el) {
        if (el === null) return false;
        if (el === this.el) return true;
        
        return this.isChildNode(el.parentNode);
    }
}


SimpleBar.initHtmlApi();

</script>

<script>
function checkphone(val) {
	var isnum = /^[0-9]+$/.test(val);
	if (isnum) {
		if (val.length < 10) {
			console.log("MORE");
		} else if (val.length > 10){
			console.log("LESS");
		} else {
			console.log("OK");
		}
	}
}
</script>

<!--
<link rel="stylesheet" href="https://unpkg.com/simplebar@2.2.1/dist/simplebar.css" />
<script src="https://unpkg.com/simplebar@2.2.1/dist/simplebar.js"></script>
-->

</head>

<body onload="showLists();"><!-- main container-->

<div class = "mapContainer"> <!--main containter class-->
<header><!--Header start -->	

  <nav class="navbar navbar-inverse" style="border-color:transparent; border-width: 0px;">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"><img src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:42px; width:42px;" /></a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myInverseNavbar2">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
        <?php
          if (isset($_SESSION['facebook_access_token'])) {
			 echo '<li> <a href="http://athena.ecs.csus.edu/~teamone/Manage/manage.php">MANAGE</a></li>';
             echo '<li><a href="http://athena.ecs.csus.edu/~teamone/php/login/logout.php">LOGOUT</a></li>';
          } else {
             echo '<li><a href="http://athena.ecs.csus.edu/~teamone/login_page.php">LOG IN</a></li>';
          }
        ?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>


<!-- GOOD OLD HEADER
<a href="">
<h4 class="logo"><img id="logoImage" src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:44px; width:44px;" /></h4>
</a>
<nav>
	<ul>
		<li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
		<li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
		<li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
	  
	</ul>
</nav> 


END GOOD OLD HEADER-->
</header> <!-- Header end-->

<form action="http://athena.ecs.csus.edu/~teamone/Manage/event_review.php" method="POST" enctype="multipart/form-data"><!--Push Form-->
<div class= "herro" id="herro" style="width: 100%; height: 100%; position: absolute;"><!--Hero Class -->
    <!--floating Search Box-->
	<div><input name="eventlocation" class="searchbox" id="pac-input" name="pac-input" type="text" placeholder="Search" style="margin-top: 10px; border: 1px solid trasparent; height:30px; box-shadow: rgba(0,0,0,.289039) 0px 2px 6px; padding:0px 11px 0px 13px; width:313px; font-size:13px; font-weight: 300; z-index:10; position:absolute; left:121px; top:0px; background: #fab9ff; border-color:#fab9ff;"></input></div>
    <!--floating Search Box end-->
    
    <!--Right Floating Event Info Div-->
	<div style ="font-size: 12px; position: absolute; height:auto; border: 1px solid trasparent; top: 10px; margin-bottom:inherit; right: 10px; width: auto; z-index: 10; padding: 7px; border-radius: 2px; background: #222222;">
		
	<div style="margin-bottom: 4px; font-size: 10px;"><input type ="text" placeholder="Event Name" name="eventname" id="eventNameForm" style="padding:7px; width: 100%;  margin-left:1px; margin-right: 2px; background: #fab9ff; border-color:#fab9ff;"></input>
	</div>
		
	<div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder = "Event Sponsor" id="eventSponsorForm" name="eventsponsor" style = "padding:7px;  width: 100%; margin-left:1px; margin-right: 2px; background: #fab9ff; border-color:#fab9ff;"></input>
	</div>
	
	<div style="margin-bottom:4px; font-size: 10px;  "><input type = "text" placeholder = "Event Website" id="eventWebsite" name="eventWebsite" style = "padding:7px;  width: 100%;  margin-left:1px; margin-right: 2px; background: #fab9ff; border-color:#fab9ff;"></input>
	</div>
	
	<div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder="10-Digit Event Phone" onkeyup="checkphone(this.value) " id="eventPhone" name="eventPhone" style = "padding:7px;  width: 100%;  margin-left:1px; margin-right: 2px; background: #fab9ff; border-color:#fab9ff;"></input>
	</div>
	
	<div id="startDateDiv" style="font-size:12px;"><input readonly type="text" id="datepicker" placeholder="Start Date" name="datepicker" onchange="checkDate(this.id);" style="padding: 4px; margin-bottom: 4px; width: 100%; margin-left:1px; margin-right: 2px; cursor:pointer; background: #fab9ff; border-color:#fab9ff;"></input></div>
        
    <div style="font-size:12px;"><input readonly type="text" id="datepicker2" placeholder=" End Date" name="datepicker2" onchange="checkDate(this.id);" style="padding: 4px; margin-bottom: 4px; width: 100%;  margin-left:1px; margin-right: 2px; cursor:pointer; background: #fab9ff; border-color:#fab9ff;"></input></div>
 	
<select name="startTime" id="startTime" class="startTime" style="width: 100%; margin-left:1px; margin-right: 2px; margin-bottom:4px; padding:4px; background: #fab9ff; border-color:#fab9ff; " onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
<option value="default" style="text-align: right;" selected disabled>Start Time</option>
<option value="00:00:00">12:00 AM</option>
<option value="00:15:00">12:15 AM</option>
<option value="00:30:00">12:30 AM</option>
<option value="00:45:00">12:45 AM</option>

<option value="01:00:00">1:00 AM</option>
<option value="01:15:00">1:15 AM</option>
<option value="01:30:00">1:30 AM</option>
<option value="01:45:00">1:45 AM</option>

<option value="02:00:00">2:00 AM</option>
<option value="02:15:00">2:15 AM</option>
<option value="02:30:00">2:30 AM</option>
<option value="02:45:00">2:45 AM</option>

<option value="03:00:00">3:00 AM</option>
<option value="03:15:00">3:15 AM</option>
<option value="03:30:00">3:30 AM</option>
<option value="03:45:00">3:45 AM</option>

<option value="04:00:00">4:00 AM</option>
<option value="04:15:00">4:15 AM</option>
<option value="04:30:00">4:30 AM</option>
<option value="04:45:00">4:45 AM</option>

<option value="05:00:00">5:00 AM</option>
<option value="05:15:00">5:15 AM</option>
<option value="05:30:00">5:30 AM</option>
<option value="05:45:00">5:45 AM</option>
 
<option value="06:00:00">6:00 AM</option>
<option value="06:15:00">6:15 AM</option>
<option value="06:30:00">6:30 AM</option>
<option value="06:45:00">6:45 AM</option>
 
<option value="07:00:00">7:00 AM</option>
<option value="07:15:00">7:15 AM</option>
<option value="07:30:00">7:30 AM</option>
<option value="07:45:00">7:45 AM</option>
 
<option value="08:00:00">8:00 AM</option>
<option value="08:15:00">8:15 AM</option>
<option value="08:30:00">8:30 AM</option>
<option value="08:45:00">8:45 AM</option>
 
<option value="09:00:00">9:00 AM</option>
<option value="09:15:00">9:15 AM</option>
<option value="09:30:00">9:30 AM</option>
<option value="09:45:00">9:45 AM</option>
 
<option value="10:00:00">10:00 AM</option>
<option value="10:15:00">10:15 AM</option>
<option value="10:30:00">10:30 AM</option>
<option value="10:45:00">10:45 AM</option>
 
<option value="11:00:00">11:00 AM</option>
<option value="11:15:00">11:15 AM</option>
<option value="11:30:00">11:30 AM</option>
<option value="11:45:00">11:45 AM</option>
 
<option value="12:00:00">12:00 PM</option>
<option value="12:15:00">12:15 PM</option>
<option value="12:30:00">12:30 PM</option>
<option value="12:45:00">12:45 PM</option>
 
<option value="13:00:00">1:00 PM</option>
<option value="13:15:00">1:15 PM</option>
<option value="13:30:00">1:30 PM</option>
<option value="13:45:00">1:45 PM</option>
 
<option value="14:00:00">2:00 PM</option>
<option value="14:15:00">2:15 PM</option>
<option value="14:30:00">2:30 PM</option>
<option value="14:45:00">2:45 PM</option>
 
<option value="15:00:00">3:00 PM</option>
<option value="15:15:00">3:15 PM</option>
<option value="15:30:00">3:30 PM</option>
<option value="15:45:00">3:45 PM</option>
 
<option value="16:00:00">4:00 PM</option>
<option value="16:15:00">4:15 PM</option>
<option value="16:30:00">4:30 PM</option>
<option value="16:45:00">4:45 PM</option>
 
<option value="17:00:00">5:00 PM</option>
<option value="17:15:00">5:15 PM</option>
<option value="17:30:00">5:30 PM</option>
<option value="17:45:00">5:45 PM</option>
 
<option value="18:00:00">6:00 PM</option>
<option value="18:15:00">6:15 PM</option>
<option value="18:30:00">6:30 PM</option>
<option value="18:45:00">6:45 PM</option>
 
<option value="19:00:00">7:00 PM</option>
<option value="19:15:00">7:15 PM</option>
<option value="19:30:00">7:30 PM</option>
<option value="19:45:00">7:45 PM</option>
 
<option value="20:00:00">8:00 PM</option>
<option value="20:15:00">8:15 PM</option>
<option value="20:30:00">8:30 PM</option>
<option value="20:45:00">8:45 PM</option>
 
<option value="21:00:00">9:00 PM</option>
<option value="21:15:00">9:15 PM</option>
<option value="21:30:00">9:30 PM</option>
<option value="21:45:00">9:45 PM</option>
 
<option value="22:00:00">10:00 PM</option>
<option value="22:15:00">10:15 PM</option>
<option value="22:30:00">10:30 PM</option>
<option value="22:45:00">10:45 PM</option>
 
<option value="23:00:00">11:00 PM</option>
<option value="23:15:00">11:15 PM</option>
<option value="23:30:00">11:30 PM</option>
<option value="23:45:00">11:45 PM</option>
</select>
	
<select name="endTime" id="endTime" class="endTime" style="width: 100%; margin-left:1px; margin-right: 2px; margin-bottom:4px; padding:4px; background: #fab9ff; border-color:#fab9ff;" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
<option style="text-align: right;" selected disabled>End Time</option>
<option value="00:00:00">12:00 AM</option>
<option value="00:15:00">12:15 AM</option>
<option value="00:30:00">12:30 AM</option>
<option value="00:45:00">12:45 AM</option>

<option value="01:00:00">1:00 AM</option>
<option value="01:15:00">1:15 AM</option>
<option value="01:30:00">1:30 AM</option>
<option value="01:45:00">1:45 AM</option>

<option value="02:00:00">2:00 AM</option>
<option value="02:15:00">2:15 AM</option>
<option value="02:30:00">2:30 AM</option>
<option value="02:45:00">2:45 AM</option>

<option value="03:00:00">3:00 AM</option>
<option value="03:15:00">3:15 AM</option>
<option value="03:30:00">3:30 AM</option>
<option value="03:45:00">3:45 AM</option>

<option value="04:00:00">4:00 AM</option>
<option value="04:15:00">4:15 AM</option>
<option value="04:30:00">4:30 AM</option>
<option value="04:45:00">4:45 AM</option>

<option value="05:00:00">5:00 AM</option>
<option value="05:15:00">5:15 AM</option>
<option value="05:30:00">5:30 AM</option>
<option value="05:45:00">5:45 AM</option>
 
<option value="06:00:00">6:00 AM</option>
<option value="06:15:00">6:15 AM</option>
<option value="06:30:00">6:30 AM</option>
<option value="06:45:00">6:45 AM</option>
 
<option value="07:00:00">7:00 AM</option>
<option value="07:15:00">7:15 AM</option>
<option value="07:30:00">7:30 AM</option>
<option value="07:45:00">7:45 AM</option>
 
<option value="08:00:00">8:00 AM</option>
<option value="08:15:00">8:15 AM</option>
<option value="08:30:00">8:30 AM</option>
<option value="08:45:00">8:45 AM</option>
 
<option value="09:00:00">9:00 AM</option>
<option value="09:15:00">9:15 AM</option>
<option value="09:30:00">9:30 AM</option>
<option value="09:45:00">9:45 AM</option>
 
<option value="10:00:00">10:00 AM</option>
<option value="10:15:00">10:15 AM</option>
<option value="10:30:00">10:30 AM</option>
<option value="10:45:00">10:45 AM</option>
 
<option value="11:00:00">11:00 AM</option>
<option value="11:15:00">11:15 AM</option>
<option value="11:30:00">11:30 AM</option>
<option value="11:45:00">11:45 AM</option>
 
<option value="12:00:00">12:00 PM</option>
<option value="12:15:00">12:15 PM</option>
<option value="12:30:00">12:30 PM</option>
<option value="12:45:00">12:45 PM</option>
 
<option value="13:00:00">1:00 PM</option>
<option value="13:15:00">1:15 PM</option>
<option value="13:30:00">1:30 PM</option>
<option value="13:45:00">1:45 PM</option>
 
<option value="14:00:00">2:00 PM</option>
<option value="14:15:00">2:15 PM</option>
<option value="14:30:00">2:30 PM</option>
<option value="14:45:00">2:45 PM</option>
 
<option value="15:00:00">3:00 PM</option>
<option value="15:15:00">3:15 PM</option>
<option value="15:30:00">3:30 PM</option>
<option value="15:45:00">3:45 PM</option>
 
<option value="16:00:00">4:00 PM</option>
<option value="16:15:00">4:15 PM</option>
<option value="16:30:00">4:30 PM</option>
<option value="16:45:00">4:45 PM</option>
 
<option value="17:00:00">5:00 PM</option>
<option value="17:15:00">5:15 PM</option>
<option value="17:30:00">5:30 PM</option>
<option value="17:45:00">5:45 PM</option>
 
<option value="18:00:00">6:00 PM</option>
<option value="18:15:00">6:15 PM</option>
<option value="18:30:00">6:30 PM</option>
<option value="18:45:00">6:45 PM</option>
 
<option value="19:00:00">7:00 PM</option>
<option value="19:15:00">7:15 PM</option>
<option value="19:30:00">7:30 PM</option>
<option value="19:45:00">7:45 PM</option>
 
<option value="20:00:00">8:00 PM</option>
<option value="20:15:00">8:15 PM</option>
<option value="20:30:00">8:30 PM</option>
<option value="20:45:00">8:45 PM</option>
 
<option value="21:00:00">9:00 PM</option>
<option value="21:15:00">9:15 PM</option>
<option value="21:30:00">9:30 PM</option>
<option value="21:45:00">9:45 PM</option>
 
<option value="22:00:00">10:00 PM</option>
<option value="22:15:00">10:15 PM</option>
<option value="22:30:00">10:30 PM</option>
<option value="22:45:00">10:45 PM</option>
 
<option value="23:00:00">11:00 PM</option>
<option value="23:15:00">11:15 PM</option>
<option value="23:30:00">11:30 PM</option>
<option value="23:45:00">11:45 PM</option>
</select>

	<div style="margin-bottom: 4px; font-size: 10px;"><textarea maxlength="250" placeholder = "Event Description" name="eventdescription" id="eventDescForm" style="padding:4px; width: 100%;  margin-left:1px; margin-right: 2px; resize:none; rows:7; background-color:#fab9ff;"></textarea></div>
	
	<select name="age" id="age" class="age" style="padding:4px; margin-bottom: 4px;width: 100%;  margin-left:1px; margin-right: 2px; background:#fab9ff; border-color:#fab9ff;">
		<option style="text-align: right;" value="selectAge" selected disabled>Select Age</option>
		<option value="All">All</option>
		<option value="18">18+</option>
		<option value="21">21+</option>
	</select>

  <div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder = "Cost" id="eventCost" name="eventCost" style="padding:7px;  width: 100%;  margin-left:1px; margin-right: 2px; background: #fab9ff; border-color:#fab9ff;"></input>
	</div>

	<!--Preference List-->
       
	<div id="setPreferences" style="color:#fab9ff; text-align: center;">Set Prefrences</div>
	<div id="prefDiv" style="margin-bottom:4px; font-size: 9px;  color: #fab9ff;">
		<input id="preference1" style="color:#000000" type="checkbox" value="1" name="eventPreferences[]" style="width:100%; margin-left:2px; margin-right:2px; display: inline-block;"> Music</input></br>
		<input id="preference2" type="checkbox" style="border-color:#fab9ff;" value="2" name="eventPreferences[]"> Food & Drinks
		</input></br>
		<input  id="preference3" type="checkbox" value="3" name="eventPreferences[]"> Sporting Events
		</input></br>
		<input  id="preference4" type="checkbox" value="4" name="eventPreferences[]"> Outdoor
		</input></br>
		<input  id="preference5" type="checkbox" value="5" name="eventPreferences[]"> Health & Fitness
        </input></br>
		<input  id="preference6" type="checkbox" value="6" name="eventPreferences[]"> Family Friendly
        </input></br>
		<input  id="preference7" type="checkbox" value="7" name="eventPreferences[]"> Retail
        </input></br>
		<input id="preference8" type="checkbox" value="8" name="eventPreferences[]"> Charity/Philanthropy
        </input></br>
		<input  id="preference9" type="checkbox" value="9" name="eventPreferences[]"> Entertainment
        </input></br>
	</div>
		<!--Old spot for lat long-->
		<!-- Terms & Conditions, may need, may not? disbling for now
		<div style="text-align:center;"><form action=""><input type="checkbox">I agree to the Terms & Conditions
		</input>
		</form></div>
		<br><br>
		-->
	    
	    <button type="submit"; onclick="return checkFields();" style= "padding-top: 1px; padding-botton:1px; width:100%; border-color:#fab9ff; color: #fab9ff; background: #222222;">Create Event</button>   
		    
	</div><!--Right Float div end -->
	
<!--Left Float Div Start-->
<div style ="font-size: 12px; position: absolute; bottom:22px;  border: 1px solid transparent; color:#fab9ff; top: 50px; left: 10px; width: auto; max-width: 300px; margin-bottom:inherit; z-index: 10; padding: 7px; border-radius: 2px; background: #222222; overflow:hidden; overflow-y:scroll;">
<!--
<div id="thirdPartyPullType" name="thirdPartyPullType" class="thirdPartyPullType">
<select style="width:100%;" name="eventOptionType" id="eventOptionType" onchange="pickOption(this);">
	<option value="all">All</option>
    <option value="facebook">Facebook</option>
    <option value="google">Google</option>
</select>
</div> -->
<div id="thirdPartyPullListDiv" name="eventPullListBody" class="eventPullListBody"> 

</div>
</div> <!--Left FLoat Div End-->
    
    <!--Long/Lat Div-->
    <div style="display:none;">
		<input type="text" name="lat" id="lat" class="lat">
		<input type="text" name="long" id="long" class="lat">
	</div>
    <!--End lat/long-->
    
    <!--map div-->
  	<div id="map"></div>
	<script>
	// check all required input fields, do not allow submission if bare minimum fields are not filled in
	function checkFields() {
		
		var eventName = document.getElementById("eventNameForm").value;
		var eventSpon = document.getElementById("eventSponsorForm").value;
		var eventDesc = document.getElementById("eventDescForm").value;
		var eventLoc  = document.getElementById("pac-input").value;
		var startDate = document.getElementById("datepicker").value;
		var startTime = document.getElementById("startTime").value;
		var cost	  = document.getElementById("eventCost").value;
		var age		  = document.getElementById("age").value;
		var lat		  = document.getElementById("lat").value;
		var lng		  = document.getElementById("long").value;
		
		var retFalse = false;
		
		var eventPhone= document.getElementById("eventPhone").value;
		
		if (eventPhone != null && eventPhone != "") {
			var isnum = /^[0-9]+$/.test(eventPhone);
			if (isnum) {
				if (eventPhone.length != 10 && eventPhone.length != 0) {
					document.getElementById("eventPhone").style.borderColor = "red";
					retFalse = true;
				} else {
					document.getElementById("eventPhone").style.removeProperty("border");
				}
			} else {
				document.getElementById("eventPhone").style.borderColor = "red";
				retFalse = true;
			}
		} else {
			document.getElementById("eventPhone").style.removeProperty("border");
		}
		
		// Check if event name is set
		if (eventName == null || eventName == "") {
			document.getElementById("eventNameForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventNameForm").style.removeProperty("border");
		}
		
		// check if event sponsor is set
		if (eventSpon == null || eventSpon == "") {
			document.getElementById("eventSponsorForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventSponsorForm").style.removeProperty("border");
		}
		
		// check if event location is set
		if (eventLoc == null || eventLoc == "") {
			document.getElementById("pac-input").style.borderColor = "red";
			retFalse = true;
		} else {
			if (lat == null || lat == "" || lng == null || lng == "") {
				geocodeAddress(new google.maps.Geocoder(), map);
				document.getElementById("pac-input").style.removeProperty("border");
			} else {
				document.getElementById("pac-input").style.removeProperty("border");
			}
		}
		
		// check if event description is set
		if (eventDesc == null || eventDesc == "") {
			document.getElementById("eventDescForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventDescForm").style.removeProperty("border");
		}
		
		// check if start date is set
		if (startDate == null || startDate == "") {
			document.getElementById("datepicker").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("datepicker").style.removeProperty("border");
		}
		
		// check if start time is set
		if (startTime == "default") {
			document.getElementById("startTime").options[0].innerHTML = "*Start Time";
			retFalse = true;
		}
		
		// check if cost is set
		if (cost == null || cost == "" || cost < 0) {
			document.getElementById("eventCost").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventCost").style.removeProperty("border");
		}
		
		// check if age is set
		if (age == "selectAge") {
			document.getElementById("age").options[0].style.color = "red"; 
			document.getElementById("age").options[0].innerHTML = "*Select Age";
			retFalse = true;
		}
		
		var prefNull = true;
		for (var i=1; i<=9; i++) {
			var id = "preference" + i;
			var pref	  = document.getElementById(id).checked;
			if (pref)
				prefNull = false;
		}
		
		if (prefNull) {
			document.getElementById("setPreferences").style.color = "red";
			document.getElementById("setPreferences").innerHTML = "*Set Preferences";
			retFalse = true;
		} else {
			document.getElementById("setPreferences").style.color = "rgba(255,255,255,1.00)";
			document.getElementById("setPreferences").innerHTML = "Set Preferences";
		}
		
		if (retFalse) { 
			return false;
		} else  {
			return true;
		}
	}
	</script>
	
	<script>
     // People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

	var markers = [];
	  
    function initAutocomplete() {
        window.map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.5816, lng: -121.4944},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
		
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
			
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
			
			//declare lat and long variables
			document.getElementById('lat').value = place.geometry.location.lat();
        	document.getElementById('long').value = place.geometry.location.lng();  
			
          });
          map.fitBounds(bounds);
        });
      }
	  
	function geocodeAddress(geocoder, resultsMap) {
		var address = document.getElementById('pac-input').value;
		geocoder.geocode({'address': address}, function(results, status) {	
		
			if (status === 'OK') {
				var bounds = new google.maps.LatLngBounds();
				// Clear out the old markers.
				markers.forEach(function(marker) {
					marker.setMap(null);
				});
				markers = [];
		
				// Set new bounds for the newly inputted place
				if (results[0].geometry.viewport) {
				  // Only geocodes have viewport.
				  bounds.union(results[0].geometry.viewport);
				} else {
				  bounds.extend(results[0].geometry.location);
				}
				
				// Create new marker for the input location
				resultsMap.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: resultsMap,
					position: results[0].geometry.location
				});			
				markers.push(marker);
				
				// update latitude and longitude fields
				document.getElementById('lat').value  = results[0].geometry.location.lat();
				document.getElementById('long').value = results[0].geometry.location.lng();  
				
				map.fitBounds(bounds);
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
	  
	  function fillForms(name, desc, loc, date, shour, smin, pic) {
		name = name.replace(/%s/g, "\'");
		name = name.replace(/%q/g, "\"");
		desc = desc.replace(/%s/g, "\'");
		desc = desc.replace(/%q/g, "\"");
		loc = loc.replace(/%s/g, "\'");
		loc = loc.replace(/%q/g, "\"");
		
		document.getElementById("eventNameForm").value = name;
		document.getElementById("eventDescForm").innerHTML = desc;
		document.getElementById("datepicker").value = date;
		document.getElementById("pac-input").value = loc;
		
		var geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder, map);
		
		var morning = shour/12;
		var hour    = shour%12;
		var min     = smin/15;
		
		if (hour != -1) {
			switch(hour) {
				case 0:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '00:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '00:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '00:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '00:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '12:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '12:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '12:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '12:45:00';
					}
					break;
				case 1:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '01:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '01:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '01:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '01:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '13:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '13:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '13:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '13:45:00';
					}
					break;
				case 2:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '02:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '02:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '02:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '02:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '13:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '13:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '13:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '13:45:00';
					}
					break;
				case 3:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '03:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '03:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '03:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '03:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '15:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '15:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '15:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '15:45:00';
					}
					break;
				case 4:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '04:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '04:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '04:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '04:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '16:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '16:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '16:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '16:45:00';
					}
					break;
				case 5:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '05:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '05:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '05:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '05:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '17:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '17:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '17:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '17:45:00';
					}
					break;
				case 6:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '06:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '06:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '06:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '06:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '18:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '18:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '18:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '18:45:00';
					}
					break;
				case 7:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '07:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '07:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '07:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '07:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '19:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '19:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '19:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '19:45:00';
					}
					break;
				case 8:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '08:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '08:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '08:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '08:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '20:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '20:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '20:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '20:45:00';
					}
					break;
				case 9:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '09:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '09:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '09:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '09:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '21:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '21:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '21:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '21:45:00';
					}
					break;
				case 10:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '10:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '10:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '10:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '10:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '22:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '22:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '22:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '22:45:00';
					}
					break;
				case 11:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '11:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '11:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '11:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '11:45:00';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '23:00:00';
						if (min == 1)
							document.getElementById("startTime").value = '23:15:00';
						if (min == 2)
							document.getElementById("startTime").value = '23:30:00';
						if (min == 3)
							document.getElementById("startTime").value = '23:45:00';
					}
					break;
			}
		}
	}
    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAik0mFJzy4vTrOP4IyfIGcO6vdX1odY&libraries=places&callback=initAutocomplete"></script>
	</div><!--End Hero Div-->
	</form><!-- End Form-->
</div><!--End Container -->
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

</body>
</html>