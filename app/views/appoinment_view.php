<h3>Аppointment</h3>

<!--Add buttons to initiate auth sequence and sign out-->
<button class="btn btn-success" id="authorize-button" style="display: none;">Authorize</button>
<button class="btn btn-default" id="signout-button">Sign Out</button>

<div class="row">
    <div class="col-md-6">
        <form class="signin-wrapper" id="new-appointment" style="display:none">
              <div class="widget-body">
                    <div class="form-group">
                    <label>Project name:</label>
                      <input class="form-control" placeholder="Project name" type="text" id="projectname" name="projectname" required>
                    </div>
                    <div class="form-group">
                    <label>Client’s name:</label>
                      <input class="form-control" placeholder="Client’s name" type="text" id="clientname" name="clientname" required>
                    </div>
                    <div class="form-group form-inline">
                    <label>Date & time:</label><br/>
                      <input class="form-control" placeholder="Date" type="date" id="date" name="date" required>
                      <input class="form-control" placeholder="Time" type="time" id="time" name="time" value="00:00" required>
                    </div>
                    <div class="form-group">
                    <label>Remarks:</label>
                      <input class="form-control" placeholder="Remarks" type="text" id="remarks" name="remarks" required>
                    </div>
              </div>
              <div class="actions">
                    <input id="create-task" class="btn btn-info pull-left newbutton" type="submit" value="Save">
                    <div class="clearfix"></div>
              </div>
        </form>
    </div>
</div>

<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
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
            //listUpcomingEvents();
            //addNewEvent();
            $('#new-appointment').show();
        } else {
            authorizeButton.style.display = 'block';
            signoutButton.style.display = 'none';
            $('#new-appointment').hide();
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
        pre.appendChild(textContent);
    }

    /**
     * Print the summary and start datetime/date of the next ten events in
     * the authorized user's calendar. If no events are found an
     * appropriate message is printed.
     */
    function listUpcomingEvents() {
        gapi.client.calendar.events.list({
            'calendarId': 'primary',
            'timeMin': (new Date()).toISOString(),
            'showDeleted': false,
            'singleEvents': true,
            'maxResults': 10,
            'orderBy': 'startTime'
        }).then(function(response) {
            var events = response.result.items;
            appendPre('Upcoming events:');

            if (events.length > 0) {
                for (i = 0; i < events.length; i++) {
                    var event = events[i];
                    var when = event.start.dateTime;
                    if (!when) {
                        when = event.start.date;
                    }
                    appendPre(event.summary + ' (' + when + ')')
                }
            } else {
                appendPre('No upcoming events found.');
            }
        });


    }

    function addNewEvent(){

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

        var summary = $('#projectname').val();
            summary = summary+' - '+$('#clientname').val();
        var description = $('#remarks').val();
        var date = $('#date').val();
        var time = $('#time').val();
        //console.log(time);
        var datetime = date+'T'+time+':00';

        var eventnew = {
            "summary": summary,
            "description": description,
            "reminders": {
                "useDefault": true
            },
            "start": {
                "dateTime": datetime,
                "timeZone": "Asia/Singapore"
            },
            "end": {
                "dateTime": datetime,
                "timeZone": "Asia/Singapore"
            }
        };

        var request = gapi.client.calendar.events.insert({
            'calendarId': 'primary',
            'resource': eventnew
        });

        request.execute(function(event) {
            console.log('Event created: ' + event.htmlLink);
        });
    }


</script>


<script type="text/javascript">
    $('#create-task').on('click', function(event){
        event.preventDefault();
        addNewEvent();
        $('#new-appointment').trigger('reset');

    });
</script>