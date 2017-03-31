@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ url('auth/insertgame/submit') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <h3>Udfyld information om event/nyhed</h3>
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
            <table id="allPlayersTable">
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
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
                document.getElementById("demo").innerHTML = 'testtestestestestestesetsetest<br><br><br>testesttest<br><br><br>testesttest';
                $( document.body ).css( "background", "black" );
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