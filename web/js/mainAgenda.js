"use strict";
$(document).ready(function() {
	$('#calendar').fullCalendar( {
		lang:'fr',
		weekNumbers: true,
		header: {
		    left: 'prev,next today',
		    center: 'title',
		    right: 'month,basicWeek,basicDay'
		},
        events: [
            {
                title  : 'event1',
                start  : '2017-05-10',
                url: 'http://google.com/'
            },
            {
                title  : 'event2',
                start  : '2017-05-05',
                end    : '2017-05-07',
                url: 'http://google.com/'
            },
            {
                title  : 'event3',
                start  : '2017-05-11T12:30:00',
                allDay : false,
                url: 'http://google.com/' // will make the time show
            }
        ],
    });
});