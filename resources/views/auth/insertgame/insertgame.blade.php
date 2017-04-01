@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ url('auth/insertgame/submit') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <h2>Insert New Game</h2><br>
            <!-- COMMUNITY -->
            <div class="form-group">
                <label for="community">Game Community:</label>
                <select id="community" class="form-control" name="community" required>
                    <option value="Mafia Universe">Mafia Universe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="url">Game URL:</label>
                <input type="text" id="url" name="url" class="form-control" placeholder="Copy/Paste Game URL page 1 here" required>
                <button id="checkurl" name="checkurl" class="button">Check if game is already in database</button>
            </div>
            <div class="form-group">
                <label for="title">Game Title:</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Copy/Paste Game Title here" required>
            </div>
            <div class="form-group">
                <label for="date">Start Day:</label>
                <input type="date" id="date" name="date" class="form-control" required min="2005-01-01" required>
            </div>
            <div class="form-group">
                <label for="gametype">Game Type:</label>
                <select class="form-control" id="gametype" name="gametype" required>
                    <option value="Open">Open</option>
                    <option value="Semi-open">Semi-open</option>
                    <option value="Closed">Closed</option>
                    <option value="Bastard">Bastard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gamesetup">Game Setup Name:</label>
                <input type="text" id="gamesetup" name="gamesetup" class="form-control" placeholder="Example: 'Vanilla'">
            </div>
            <div class="form-group">
                <input type="checkbox" id="wasitturbo" name="wasitturbo" value="1" class="form-inline">
                <label for="wasitturbo">Check if it was a turbo game: </label>
                (day/night phases lasting less than an hour each)
            </div>
            <div class="form-group">
                <label for="postcount">Total Post Count:</label>
                <p>Enter approximate number if circumstances make the total post count difficult to indicate</p>
                <input type="text" id="postcount" name="postcount" class="form-control" placeholder="Enter number" required>
            </div>
            <div class="form-group">
                <h4><b>Phase lengths in hours(minutes for turbos):</b></h4>
                <label for="daylength">Day Phase Length: </label>
                <input type="text" id="daylength" name="daylength" value="0" required>
                <label for="nightlength">Night Phase Length: </label>
                <input type="text" id="nightlength" name="daylength" value="0" required>
            </div>
            <div class="form-group">
                <h4><b>Check if game included any of the following:</b></h4>
                @foreach($gamemodificationtypes as $gamemodificationtype)
                    <input type="checkbox" id="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" name="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" value="1" class="form-inline">
                    <label for="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}">{{ $gamemodificationtype->modification_type_name }}: </label>
                    <br>
                @endforeach
            </div>


            <div class="form-group">
                <label for="description">Game Description:</label>
                <p>Write here if you want to leave a short comment about the game.</p>
                <textarea rows="2" cols="50" name="description" id="description" class="form-control"></textarea>
            </div>
            <div id="deathTableGenerationDiv">
                <div class="form-group">
                    <label for="allPlayers">Players - (Copy/paste player list here so they are listed vertically):</label>
                    The player list must only include the original players
                    that occupied each player slot. Subs are noted separately.
                    <textarea rows="10" cols="50" name="allPlayers" form="allPlayers" class="form-control" id="allPlayers"></textarea>
                </div>
                <!-- BUTTON - USES ENTERED NAMES FROM "allPlayers" TO CREATE PLAYER TABLE-->
                <div class="form-group">
                    <input type="button" class="btn-warning" value="Build Death Table With This Player List" id="deathTable">
                </div>
            </div>
            <p id="demo"></p>
        </form>
    </div>

    <script type="text/javascript">
        function myFunction() {
            document.getElementById("demo").innerHTML = 'test';
        }
        window.onload = function() {
            if (window.jQuery) {
                // jQuery is loaded
                alert("Yeah!");
                //document.getElementById("demo").innerHTML = 'testtestestestestestesetsetest<br><br><br>testesttest<br><br><br>testesttest';
                //$( document.body ).css( "background", "white" );
            } else {
                // jQuery is not loaded
                alert("Doesn't Work");
            }
        }
        //DEATH TABLE CREATION
        /*
        var deathTableCreated = false;
        var allPlayerNamesTextAreaString;
        $('#deathTable').click(function(){
            testValue = $('#allPlayers').val();
            if (testValue == "") {
                alert("You need to add player names before you can create the death table");
            } else {
                deathTableCreated = true;
                $('#deathTableGenerationDiv').hide();
                allPlayerNamesTextAreaString = $('#allPlayers').val();
                allPlayerNamesArray = allPlayerNamesTextAreaString.split('\n');
                allPlayerNamesArray.reverse();
                $('#allPlayersTable thead tr').after('<td>Name</td><td>Affiliation</td><td>Died Day/Night</td><td>Which Day/Night</td><td>Cause of Death</td><td>Role</td><td>Won As Third Party</td>');
                for (var i = 0; i<allPlayerNamesArray.length; i++) {
                    if (allPlayerNamesArray[i] != "") {
                        var playerName = allPlayerNamesArray[i]
                        $('#allPlayersTable tbody').after('<tr><td><input type="text" name="playerName'+ i +'" value="' +  playerName + '" id="playerName'+ i +'"></td>' +
                            '<td><select id="affiliation ' + i +'" name="affiliation' + i +'"><option value="Town">Town</option><option value="Mafia">Mafia</option><option value="Third Party">Third Party</option></select></td>' +
                            '<td><select id="timeOfDeath ' + i +'" name="timeOfDeath' + i +'"><option value="Survived">Survived</option><option value="Night">Died Night</option><option value="Day">Died Day</option></select></td>' +
                            '<td><input type="text" placeholder="Enter only the number" name="dayOfDeath'+ i +'" id="dayOfDeath'+ i +'"></td>' +
                            '<td><select id="causeOfDeath ' + i +'" name="causeOfDeath' + i +'"><option value="Survived">Survived</option><option value="Lynched">Lynched</option><option value="Nightkilled by mafia or third party">Nightkilled by mafia or third party</option><option value="Nightkilled by town">Nightkilled by town</option><option value="Daykilled by mafia or third party">Daykilled by mafia or third party</option><option value="Daykilled by town">Daykilled by town</option><option value="Modkilled">Modkilled</option><option value="In-Thread Attack">In-Thread Attack</option><option value="Killed in event">Killed in event</option><option value="Suicide">Suicide</option><option value="Endgamed">Endgamed</option><option value="Conceded">Conceded</option></<select></td>' +
                            '<td><input type="text" placeholder="Enter role name" value="Vanilla" required name="roleName'+ i +'" id="roleName'+ i +'"></td>' +
                            '<td><input type="checkbox" name="wonAsThird'+ i +'" value="TRUE"></td>' +
                            '</tr>');
                    }
                }
            }
        })
        */
    </script>

@endsection