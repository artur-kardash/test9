
<!--<iframe src="https://calendar.google.com/calendar/embed?src=7qr0e8i55vjus2lmtc8d2l8q24%40group.calendar.google.com&ctz=Malaysia/Singapore" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>-->
<h1>Google Calendar</h1>

<!--Add buttons to initiate auth sequence and sign out-->
<button class="btn btn-success" id="authorize-button" style="display: none;">Authorize</button>
<button class="btn btn-default" id="signout-button">Sign Out</button>


<script type="text/javascript">
    var EventsArray = new Array();
</script>

<script type="text/javascript">
    // Client ID and API key from the Developer Console
    var CLIENT_ID = '447368125872-nlug0jlh6kisilt6ibvodolgousgnhca.apps.googleusercontent.com';

    // Array of API discovery doc URLs for APIs used by the quickstart
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

    // Authorization scopes required by the API; multiple scopes can be
    // included, separated by spaces.
    var SCOPES = "https://www.googleapis.com/auth/calendar";

    var authorizeButton = document.getElementById('authorize-button');
    var signoutButton = document.getElementById('signout-button');

    /**
     *  On load, called to load the auth2 library and API client library.
     */
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }

    /**
     *  Initializes the API client library and sets up sign-in state
     *  listeners.
     */
    function initClient() {
        gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
            clientId: CLIENT_ID,
            scope: SCOPES
        }).then(function () {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
            authorizeButton.onclick = handleAuthClick;
            signoutButton.onclick = handleSignoutClick;
        });
    }

    /**
     *  Called when the signed in status changes, to update the UI
     *  appropriately. After a sign-in, the API is called.
     */
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            authorizeButton.style.display = 'none';
            signoutButton.style.display = 'block';
            $('#calendar').show();
            listUpcomingEvents();
        } else {
            authorizeButton.style.display = 'block';
            signoutButton.style.display = 'none';
            $('#calendar').hide();
        }
    }

    /**
     *  Sign in the user upon button click.
     */
    function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
    }

    /**
     *  Sign out the user upon button click.
     */
    function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
    }

    /**
     * Append a pre element to the body containing the given message
     * as its text node. Used to display the results of the API call.
     *
     * @param {string} message Text to be placed in pre element.
     */
    function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        //pre.appendChild(textContent);
    }

    /**
     * Print the summary and start datetime/date of the next ten events in
     * the authorized user's calendar. If no events are found an
     * appropriate message is printed.
     */
    var yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);

    function listUpcomingEvents() {
        gapi.client.calendar.events.list({
            'calendarId': 'primary',
            'timeMin': yesterday.toISOString(),
            'showDeleted': false,
            'singleEvents': true,
            'maxResults': 30,
            'orderBy': 'startTime'
        }).then(function(response) {
            var events = response.result.items;
            //appendPre('Upcoming events:');

            if (events.length > 0) {
                for (i = 0; i < events.length; i++) {
                    var event = events[i];
                    var when = event.start.dateTime;
                    if (!when) {
                        when = event.start.date;
                    }
                    EventsArray.push({
                        title: event.summary+' (Remarks: '+event.description+')',
                        start: when,
                        end: event.end.dateTime,
                        //url:event.htmlLink
                    });
                    //console.log(event.summary + ' (' + when + ')')
                }
            } else {
                appendPre('No upcoming events found.');
            }
            console.log(events);
        });
    }

</script>

<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>


<link href='<?php echo $host; ?>/assets/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />

<script src='<?php echo $host; ?>/assets/plugins/moment/moment.js'></script>
<script src='<?php echo $host; ?>/assets/plugins/fullcalendar/fullcalendar.js'></script>

<script>

    function fillCalendar(){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?=date('Y-m-d')?>',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: EventsArray
        });
    }

    setTimeout(fillCalendar, 2000);

</script>

<div id='calendar' style="display:none;"></div>