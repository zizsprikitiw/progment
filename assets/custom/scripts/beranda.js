var Beranda = function() {

	//function load select filter
    var loadSelectFilter = function() {
		$.ajax({
			url : base_url+"index/data_init" ,
			type: "POST",
			dataType: "JSON",
			success: function(data)
			{
				var d = new Date();
				var item_sel=["filter_proyek_year", "filter_proyek"];
				var item_select = {"filter_proyek_year":d.getFullYear(), "filter_proyek":-1};			
				select_box(data,item_select, item_sel);	
				
				var e = document.getElementById("filter_proyek_year");
				var year_selected = e.options[e.selectedIndex].text;
				var e = document.getElementById("filter_proyek");
				var proyek_selected = e.options[e.selectedIndex].text;
				
				$('#proyek_selected span').html(year_selected+' - Program '+proyek_selected);
				
				loadContent();
				
			},
			error: function (jqXHR, exception) {
				var msgerror = ''; 
				if (jqXHR.status === 0) {
					msgerror = 'jaringan tidak terkoneksi.';
				} else if (jqXHR.status == 404) {
					msgerror = 'Halamam tidak ditemukan. [404]';
				} else if (jqXHR.status == 500) {
					msgerror = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msgerror = 'Requested JSON parse gagal.';
				} else if (exception === 'timeout') {
					msgerror = 'RTO.';
				} else if (exception === 'abort') {
					msgerror = 'Gagal request ajax.';
				} else {
					msgerror = 'Error.\n' + jqXHR.responseText;
				}
				toastr.error("Error System", msgerror, 'error');
			}		
		});
		
		$('#form-filter-program').submit(function(){
			var e = document.getElementById("filter_proyek_year");
			var year_selected = e.options[e.selectedIndex].text;
			var e = document.getElementById("filter_proyek");
			var proyek_selected = e.options[e.selectedIndex].text;
			
			$('#proyek_selected span').html(year_selected+' - '+proyek_selected);
			loadContent();
		});
    }
	
	var select_box = function(data,item_select,item_sel) {
		//insert select item				
		var len_item = item_sel.length;
		select_val = -1;
		for(var i=0; i<len_item; i++){
			//get id selected
			for(var key in item_select){
				if(key == item_sel[i]){
					select_val = item_select[key];
				} 
			}
			
			var sel = $("#"+item_sel[i]);						
			sel.empty();					
			var len_sub = data[item_sel[i]].length;
			htmlString = "";//<option value='-- Pilih --' >-- Pilih --</option>						
			for(var j=0; j<len_sub; j++){
				if((select_val == -1) & (j==0)){
					selected_str = "selected='selected'";
				}else if(data[item_sel[i]][j].id_item == select_val){
					selected_str = "selected='selected'";
				}else{
					selected_str = "";
				}
				
				htmlString = htmlString+ "<Option value="+data[item_sel[i]][j].id_item+" "+selected_str+">"+data[item_sel[i]][j].nama_item+"</option>"							
			}
			sel.html(htmlString);	
		}	
	}
	
    var loadDashboardStat = function() {
		var e = document.getElementById("filter_proyek");
		var proyek_selected = e.options[e.selectedIndex].value;
		
		$.ajax({
			url : base_url+"index/data_dashboard_stat" ,
			type: "POST",
			dataType: "JSON",
			data: {"proyek_id":proyek_selected},
			success: function(data)
			{
				$('#count_member').html(data.count_member);
				$('#count_wp').html(data.count_wp);
				// $('.counter').counterUp({
					// delay: 40,
					// time: 1
				// });
			},
			error: function (jqXHR, exception) {
				var msgerror = ''; 
				if (jqXHR.status === 0) {
					msgerror = 'jaringan tidak terkoneksi.';
				} else if (jqXHR.status == 404) {
					msgerror = 'Halamam tidak ditemukan. [404]';
				} else if (jqXHR.status == 500) {
					msgerror = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msgerror = 'Requested JSON parse gagal.';
				} else if (exception === 'timeout') {
					msgerror = 'RTO.';
				} else if (exception === 'abort') {
					msgerror = 'Gagal request ajax.';
				} else {
					msgerror = 'Error.\n' + jqXHR.responseText;
				}
				toastr.error("Error System", msgerror, 'error');
			}		
		});
    }
	
    var loadTimeline = function() {
		var e = document.getElementById("filter_proyek");
		var proyek_selected = e.options[e.selectedIndex].value;
		
		$.ajax({
			url : base_url+"index/data_timeline" ,
			type: "POST",
			dataType: "JSON",
			data: {"proyek_id":proyek_selected},
			success: function(data)
			{
				$('#timeline-program').html(data.deskripsi);
				jqueryTimeline();
			},
			error: function (jqXHR, exception) {
				var msgerror = ''; 
				if (jqXHR.status === 0) {
					msgerror = 'jaringan tidak terkoneksi.';
				} else if (jqXHR.status == 404) {
					msgerror = 'Halamam tidak ditemukan. [404]';
				} else if (jqXHR.status == 500) {
					msgerror = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msgerror = 'Requested JSON parse gagal.';
				} else if (exception === 'timeout') {
					msgerror = 'RTO.';
				} else if (exception === 'abort') {
					msgerror = 'Gagal request ajax.';
				} else {
					msgerror = 'Error.\n' + jqXHR.responseText;
				}
				toastr.error("Error System", msgerror, 'error');
			}		
		});
    }
	
	var organisasiChart = function() {
		var e = document.getElementById("filter_proyek");
		var proyek_selected = e.options[e.selectedIndex].value;
				
		var peopleElement = document.getElementById("people");
		var orgChart = new getOrgChart(peopleElement, {
			enableDetailsView: false,
			enableEdit: false,
			enableZoom: false,
			enableMove: false,
			enableSearch: false,
			enableExportToImage: true,
			primaryFields: ["name", "title", "phone", "mail"],
			photoFields: ["image"],
			expandToLevel: 100,		
			color: "lightblue",			
			layout: getOrgChart.MIXED_HIERARCHY_RIGHT_LINKS
		});
		
		$.ajax({
			url : base_url+"index/data_struktur_organisasi" ,
			type: "POST",
			dataType: "JSON",
			data: {"proyek_id":proyek_selected},
			success: function(data)
			{
				orgChart.loadFromJSON(data.data_struktur);
				//setInterval(function(){ $('a[title="GetOrgChart jquery plugin"]').hide(); }, 10);
				
			},
			error: function (jqXHR, exception) {
				var msgerror = ''; 
				if (jqXHR.status === 0) {
					msgerror = 'jaringan tidak terkoneksi.';
				} else if (jqXHR.status == 404) {
					msgerror = 'Halamam tidak ditemukan. [404]';
				} else if (jqXHR.status == 500) {
					msgerror = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msgerror = 'Requested JSON parse gagal.';
				} else if (exception === 'timeout') {
					msgerror = 'RTO.';
				} else if (exception === 'abort') {
					msgerror = 'Gagal request ajax.';
				} else {
					msgerror = 'Error.\n' + jqXHR.responseText;
				}
				toastr.error("Error System", msgerror, 'error');
			}		
		});
	}
	
	var calendarProgram = function() {
		var e = document.getElementById("filter_proyek");
		var proyek_selected = e.options[e.selectedIndex].value;
		
		if (!jQuery().fullCalendar) {
			return;
		}

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var h = {};

		if ($('#kalender').width() <= 400) {
			$('#kalender').addClass("mobile");
			h = {
				left: 'title, prev, next',
				center: '',
				right: 'today,month,agendaWeek,agendaDay'
			};
		} else {
			$('#kalender').removeClass("mobile");
			if (App.isRTL()) {
				h = {
					right: 'title',
					center: '',
					left: 'prev,next,today,month,agendaWeek,agendaDay'
				};
			} else {
				h = {
					left: 'title',
					center: '',
					right: 'prev,next,today,month,agendaWeek,listWeek'
				};
			}
		}
		
		$('#kalender').fullCalendar('destroy'); // destroy the calendar
		$('#kalender').fullCalendar({
			header: h,
			timeFormat: 'H:mm',
			locale: 'id',
			disableDragging: false,
			editable: false,
			//eventLimit: true,
			events: function (start, end, timezone, callback) {				
				$.ajax({
					type: 'POST',
					url: 'index/data_kalender',
					dataType:'json',
					crossDomain: true,
					data: {
						start: Math.round(new Date(start).getTime()/1000),
						end: Math.round(new Date(end).getTime()/1000),        
						proyek_id: proyek_selected,        
					},
					success: function(data) {                            
						var events = [];
						var allday = null; //Workaround
						
						$.each(data.event, function(i, item) {
							// if($(this).attr('allDay') == "false") //Workaround 
									// allday = false; //Workaround 
							// if($(this).attr('allDay') == "true") //Workaround 
									// allday = true; //Workaround                     
							
							//alert(new Date(item.end) + new Date(y, m, 1));
							
							events.push({
								id: item.id,
								title: item.title,
								start: new Date(item.start),
								end: new Date(item.end),   
								backgroundColor: item.color,						
								allDay: false,
							});            
						});  
						callback(events);
					}
				});
			},
			eventClick: function(eventObj) {
				alert('Clicked ' + eventObj.id);
			},
		});
		
		var test = [{
				title: 'All Day',
				start: new Date(y, m, 1),
				backgroundColor: App.getBrandColor('yellow')
			}, {
				title: 'Long Event',
				start: new Date(y, m, d - 5),
				end: new Date(y, m, d - 2),
				backgroundColor: App.getBrandColor('blue')
			}, {
				title: 'Repeating Event',
				start: new Date(y, m, d - 3, 16, 0),
				allDay: false,
				backgroundColor: App.getBrandColor('red')
			}, {
				title: 'Repeating Event',
				start: new Date(y, m, d + 6, 16, 0),
				allDay: false,
				backgroundColor: App.getBrandColor('green')
			}, {
				title: 'Meeting',
				start: new Date(y, m, d + 9, 10, 30),
				allDay: false
			}, {
				title: 'Lunch',
				start: new Date(y, m, d, 14, 0),
				end: new Date(y, m, d, 14, 0),
				backgroundColor: App.getBrandColor('grey'),
				allDay: false
			}, {
				title: 'Birthday',
				start: new Date(y, m, d + 1, 19, 0),
				end: new Date(y, m, d + 1, 22, 30),
				backgroundColor: App.getBrandColor('purple'),
				allDay: false
			}, {
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				backgroundColor: App.getBrandColor('yellow'),
				url: 'http://google.com/'
			}];
			
		//console.log(test);

		/*$('#kalender').fullCalendar('destroy'); // destroy the calendar
		$('#kalender').fullCalendar({ //re-initialize the calendar
			disableDragging: false,
			header: h,
			editable: true,
			events: [{
				title: 'All Day',
				start: new Date(y, m, 1),
				backgroundColor: App.getBrandColor('yellow')
			}, {
				title: 'Long Event',
				start: new Date(y, m, d - 5),
				end: new Date(y, m, d - 2),
				backgroundColor: App.getBrandColor('blue')
			}, {
				title: 'Repeating Event',
				start: new Date(y, m, d - 3, 16, 0),
				allDay: false,
				backgroundColor: App.getBrandColor('red')
			}, {
				title: 'Repeating Event',
				start: new Date(y, m, d + 6, 16, 0),
				allDay: false,
				backgroundColor: App.getBrandColor('green')
			}, {
				title: 'Meeting',
				start: new Date(y, m, d + 9, 10, 30),
				allDay: false
			}, {
				title: 'Lunch',
				start: new Date(y, m, d, 14, 0),
				end: new Date(y, m, d, 14, 0),
				backgroundColor: App.getBrandColor('grey'),
				allDay: false
			}, {
				title: 'Birthday',
				start: new Date(y, m, d + 1, 19, 0),
				end: new Date(y, m, d + 1, 22, 30),
				backgroundColor: App.getBrandColor('purple'),
				allDay: false
			}, {
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				backgroundColor: App.getBrandColor('yellow'),
				url: 'http://google.com/'
			}]
		});*/
	}

	var jqueryTimeline = function() {
		var timelines = $('.cd-horizontal-timeline');
		var eventsMinDistance;

		(timelines.length > 0) && initTimeline(timelines);

		function initTimeline(timelines) {
			timelines.each(function(){
				eventsMinDistance = $(this).data('spacing');
				var timeline = $(this),
					timelineComponents = {};
				//cache timeline components 
				timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
				timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
				timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
				timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
				timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
				timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
				timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
				timelineComponents['eventsContent'] = timeline.children('.events-content');

				//assign a left postion to the single events along the timeline
				setDatePosition(timelineComponents, eventsMinDistance);
				//assign a width to the timeline
				var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
				//the timeline has been initialize - show it
				timeline.addClass('loaded');

				//detect click on the next arrow
				timelineComponents['timelineNavigation'].on('click', '.next', function(event){
					event.preventDefault();
					updateSlide(timelineComponents, timelineTotWidth, 'next');
				});
				//detect click on the prev arrow
				timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
					event.preventDefault();
					updateSlide(timelineComponents, timelineTotWidth, 'prev');
				});
				//detect click on the a single event - show new event content
				timelineComponents['eventsWrapper'].on('click', 'a', function(event){
					event.preventDefault();
					timelineComponents['timelineEvents'].removeClass('selected');
					$(this).addClass('selected');
					updateOlderEvents($(this));
					updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
					updateVisibleContent($(this), timelineComponents['eventsContent']);
				});

				//on swipe, show next/prev event content
				timelineComponents['eventsContent'].on('swipeleft', function(){
					var mq = checkMQ();
					( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
				});
				timelineComponents['eventsContent'].on('swiperight', function(){
					var mq = checkMQ();
					( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
				});

				//keyboard navigation
				$(document).keyup(function(event){
					if(event.which=='37' && elementInViewport(timeline.get(0)) ) {
						showNewContent(timelineComponents, timelineTotWidth, 'prev');
					} else if( event.which=='39' && elementInViewport(timeline.get(0))) {
						showNewContent(timelineComponents, timelineTotWidth, 'next');
					}
				});
			});
		}

		function updateSlide(timelineComponents, timelineTotWidth, string) {
			//retrieve translateX value of timelineComponents['eventsWrapper']
			var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
				wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
			//translate the timeline to the left('next')/right('prev') 
			(string == 'next') 
				? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
				: translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
		}

		function showNewContent(timelineComponents, timelineTotWidth, string) {
			//go from one event to the next/previous one
			var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
				newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

			if ( newContent.length > 0 ) { //if there's a next/prev event - show it
				var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
					newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');
				
				updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
				updateVisibleContent(newEvent, timelineComponents['eventsContent']);
				newEvent.addClass('selected');
				selectedDate.removeClass('selected');
				updateOlderEvents(newEvent);
				updateTimelinePosition(string, newEvent, timelineComponents);
			}
		}

		function updateTimelinePosition(string, event, timelineComponents) {
			//translate timeline to the left/right according to the position of the selected event
			var eventStyle = window.getComputedStyle(event.get(0), null),
				eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
				timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
				timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
			var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

			if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
				translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
			}
		}

		function translateTimeline(timelineComponents, value, totWidth) {
			var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
			value = (value > 0) ? 0 : value; //only negative translate value
			value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
			setTransformValue(eventsWrapper, 'translateX', value+'px');
			//update navigation arrows visibility
			(value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
			(value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
		}

		function updateFilling(selectedEvent, filling, totWidth) {
			//change .filling-line length according to the selected event
			var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
				eventLeft = eventStyle.getPropertyValue("left"),
				eventWidth = eventStyle.getPropertyValue("width");
			eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
			var scaleValue = eventLeft/totWidth;
			setTransformValue(filling.get(0), 'scaleX', scaleValue);
		}

		function setDatePosition(timelineComponents, min) {
			for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
				var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
					distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 2;
				timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
			}
		}

		function setTimelineWidth(timelineComponents, width) {
			var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
				timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
				timeSpanNorm = Math.round(timeSpanNorm) + 4,
				totalWidth = timeSpanNorm*width;
			timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
			updateFilling(timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents['fillingLine'], totalWidth);
			updateTimelinePosition('next', timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents);
		
			return totalWidth;
		}

		function updateVisibleContent(event, eventsContent) {
			var eventDate = event.data('date'),
				visibleContent = eventsContent.find('.selected'),
				selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
				selectedContentHeight = selectedContent.height();

			if (selectedContent.index() > visibleContent.index()) {
				var classEnetering = 'selected enter-right',
					classLeaving = 'leave-left';
			} else {
				var classEnetering = 'selected enter-left',
					classLeaving = 'leave-right';
			}

			selectedContent.attr('class', classEnetering);
			visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				visibleContent.removeClass('leave-right leave-left');
				selectedContent.removeClass('enter-left enter-right');
			});
			eventsContent.css('height', selectedContentHeight+'px');
		}

		function updateOlderEvents(event) {
			event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
		}

		function getTranslateValue(timeline) {
			var timelineStyle = window.getComputedStyle(timeline.get(0), null),
				timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
					timelineStyle.getPropertyValue("-moz-transform") ||
					timelineStyle.getPropertyValue("-ms-transform") ||
					timelineStyle.getPropertyValue("-o-transform") ||
					timelineStyle.getPropertyValue("transform");

			if( timelineTranslate.indexOf('(') >=0 ) {
				var timelineTranslate = timelineTranslate.split('(')[1];
				timelineTranslate = timelineTranslate.split(')')[0];
				timelineTranslate = timelineTranslate.split(',');
				var translateValue = timelineTranslate[4];
			} else {
				var translateValue = 0;
			}

			return Number(translateValue);
		}

		function setTransformValue(element, property, value) {
			element.style["-webkit-transform"] = property+"("+value+")";
			element.style["-moz-transform"] = property+"("+value+")";
			element.style["-ms-transform"] = property+"("+value+")";
			element.style["-o-transform"] = property+"("+value+")";
			element.style["transform"] = property+"("+value+")";
		}

		//based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
		function parseDate(events) {
			var dateArrays = [];
			events.each(function(){
				var singleDate = $(this),
					dateComp = singleDate.data('date').split('T');
				if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
					var dayComp = dateComp[0].split('/'),
						timeComp = dateComp[1].split(':');
				} else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
					var dayComp = ["2000", "0", "0"],
						timeComp = dateComp[0].split(':');
				} else { //only DD/MM/YEAR
					var dayComp = dateComp[0].split('/'),
						timeComp = ["0", "0"];
				}
				var	newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
				dateArrays.push(newDate);
			});
			return dateArrays;
		}

		function daydiff(first, second) {
			return Math.round((second-first));
		}

		function minLapse(dates) {
			//determine the minimum distance among events
			var dateDistances = [];
			for (i = 1; i < dates.length; i++) { 
				var distance = daydiff(dates[i-1], dates[i]);
				dateDistances.push(distance);
			}
			return Math.min.apply(null, dateDistances);
		}

		/*
			How to tell if a DOM element is visible in the current viewport?
			http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
		*/
		function elementInViewport(el) {
			var top = el.offsetTop;
			var left = el.offsetLeft;
			var width = el.offsetWidth;
			var height = el.offsetHeight;

			while(el.offsetParent) {
				el = el.offsetParent;
				top += el.offsetTop;
				left += el.offsetLeft;
			}

			return (
				top < (window.pageYOffset + window.innerHeight) &&
				left < (window.pageXOffset + window.innerWidth) &&
				(top + height) > window.pageYOffset &&
				(left + width) > window.pageXOffset
			);
		}

		function checkMQ() {
			//check if mobile or desktop device
			return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
		}
	}
	
	var loadContent = function() {
		loadDashboardStat();
		loadTimeline();
		organisasiChart();
        calendarProgram();
	}

    return {
        //main function to initiate the module
        init: function() {

            loadSelectFilter();
			
        }

    };

}();
 
 jQuery(document).ready(function() {
    Beranda.init();
});