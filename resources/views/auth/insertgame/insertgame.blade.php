@extends('layouts.app')

@section('content')

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/submitgame') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <h2>Insert New Game</h2><br>
            <!-- COMMUNITY -->
            <div class="form-group">
                <label for="community">Game Community:</label>
                <select id="community" class="form-control" name="community" required>
                    <option value="Mafia Universe">Mafia Universe</option>
                </select>
            </div>
            <!-- GAME URL -->
            <div class="form-group">
                <label for="url">Game URL:</label>
                <input type="text" id="url" name="url" class="form-control" placeholder="Copy/Paste Game URL page 1 here" required>
                <button id="checkurl" name="checkurl" class="button">Check if game already is in database</button>
            </div>
            <!-- GAME TITLE -->
            <div class="form-group">
                <label for="title">Game Title:</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Copy/Paste Game Title here" required>
            </div>
            <!-- GAME START DATE -->
            <div class="form-group">
                <label for="date">Start Day:</label>
                <input type="date" id="date" name="date" class="form-control" required min="2005-01-01" required>
            </div>
            <!-- GAME TYPE -->
            <div class="form-group">
                <label for="gametype">Game Type:</label>
                <select class="form-control" id="gametype" name="gametype" required>
                    <option value="Open">Open</option>
                    <option value="Semi-open">Semi-open</option>
                    <option value="Closed">Closed</option>
                    <option value="Bastard">Bastard</option>
                </select>
            </div>
            <!-- GAME SETUP NAME -->
            <div class="form-group">
                <label for="gamesetup">Game Setup Name:</label>
                <input type="text" id="gamesetup" name="gamesetup" class="form-control" placeholder="Example: 'Vanilla'">
            </div>
            <!-- WAS IT A TURBO? CHECKBOX -->
            <div class="form-group">
                <input type="checkbox" id="wasitturbo" name="wasitturbo" value="1" class="form-inline">
                <label for="wasitturbo">Check if it was a turbo game: </label>
                (day/night phases lasting less than an hour each)
            </div>
            <!-- TOTAL POST COUNT -->
            <div class="form-group">
                <label for="postcount">Total Post Count:</label>
                <p>Enter approximate number if circumstances make the total post count difficult to precisely indicate</p>
                <input type="text" id="postcount" name="postcount" class="form-control" placeholder="Enter number" required>
            </div>
            <!-- PHASE LENGTH DAY/NIGHT -->
            <div class="form-group">
                <h4><b>Phase lengths in hours(minutes for turbos):</b></h4>
                <label for="daylength">Day Phase Length: </label>
                <input type="text" id="daylength" name="daylength" value="0" required>
                <label for="nightlength">Night Phase Length: </label>
                <input type="text" id="nightlength" name="nightlength" value="0" required>
            </div>
            <!-- CHECK IF GAME INCLUDED CHECKBOXES -->
            <div class="form-group">
                <h4><b>Check if game included any of the following:</b></h4>
                @foreach($gamemodificationtypes as $gamemodificationtype)
                    <input type="checkbox" id="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" name="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" value="1" class="form-inline">
                    <label for="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}">{{ $gamemodificationtype->modification_type_name }}</label>
                    <br>
                @endforeach
            </div>
            <!-- GAME DESCRIPTION -->
            <div class="form-group">
                <label for="description">Game Description:</label>
                <p>Here you can leave a short comment about the game.</p>
                <textarea rows="2" cols="50" name="description" id="description" class="form-control"></textarea>
            </div>
            <!-- GAME MAIN HOST -->
            <div class="form-group">
                <h4><b>Hosts:</b></h4>
                <label for="mainhost">Main Host:</label>
                <input type="text" id="mainhost" name="mainhost" placeholder="Enter username" required>
            </div>
            <!-- BUTTON TO ADD/REMOVE HOSTS-->
            <div class="form-group">
                <button class="button btn-success" id="addhost" name="addhost" onclick="addHost()">Add host</button>
            </div>
            <!-- DIV FOR ADDED HOSTS TO APPEAR -->
            <div id="hostdiv">

            </div>
            <hr>
            <!-- BUTTON TO ADD/REMOVE TEAMS-->
            <div class="form-group">
                <h4><b>Teams:</b></h4>
                <button class="button btn-success" id="addteam" name="addteam" onclick="addTeam()">Add team</button>
            </div>
            <!-- DIV FOR ADDED HOSTS TO APPEAR -->
            <div id="teamdiv">
            </div>
            <hr>
            <!-- PLAYER SLOTS -->
            <div class="form-group">
                <h4><b>Player slots:</b></h4>
                <div id="generateplayerslotsdiv">
                    <label for="playerslotnumber">Choose number of original player slots (in hydra games this may be lower than amount of players):</label>
                    <input type="number" id="playerslotnumber" name="playerslotnumber" min="1" max="500" class="form-control">
                    <button id="generateplayerslots" name="generateplayerslots" class="btn-success" onclick="generatePlayerSlots()">Generate player slots</button>
                </div>
            </div>
            <!-- TABLE FOR ADDED PLAYER SLOTS TO APPEAR -->
            <div class="form-group hidden" id="playerspotdiv">
                <button id="addplayerslot" name="addplayerslot" class="btn-success" onclick="addPlayerSlot()">Add player slot</button>
                <table id="allplayerslotstable" class="table-condensed">
                    <thead>
                    <tr>
                        <td>Player</td>
                        <td>Team</td>
                        <td>Role</td>
                        <td>End status</td>
                        <td>Alias</td>
                        <td>Second player</td>
                        <td>Remove</td>
                    </tr>
                    </thead>
                    <tbody id="allplayerslotsbody">
                    </tbody>
                </table>
            </div>
            <hr>
            <!-- GAME SUBSTITUTES -->
            <div class="form-group" id="substitutesdiv">
                <h4><b>Substitutes:</b></h4>
                <!-- BUTTON TO ADD/REMOVE SUBSTITUTES-->
                <button class="button btn-success" id="addsubstitute" name="addsubstitute" onclick="addSubstitute()">Add substitute</button>

                <!-- TABLE FOR ADDED SUBSTITUTES TO APPEAR -->
                <table id="substitutestable" class="table-condensed">
                    <thead>
                    <tr>
                        <td>Player subbing in</td>
                        <td>Player subbing out</td>
                        <td>Day/Night of substitution</td>
                        <td>Remove</td>
                    </tr>
                    </thead>
                    <tbody id="substitutesbody">
                    </tbody>
                </table>
            </div>
            <hr>
            <!-- GAME ACTIONS -->
            <div class="form-group" id="actionsdiv">
                <h4><b>Actions:</b></h4>
                <!-- BUTTON TO ADD ACTIONS-->
                <button class="button btn-success" id="addaction" name="addaction" onclick="addAction()">Add action</button>

                <!-- TABLE FOR ADDED ACTIONS TO APPEAR -->
                <table id="actionstable" class="table-condensed">
                    <thead>
                    <tr>
                        <td>Action user</td>
                        <td>Action name</td>
                        <td>Action name</td>
                        <td>Action target</td>
                        <td>Night or day</td>
                        <td>Which night/day?</td>
                        <td>Remove</td>
                    </tr>
                    </thead>
                    <tbody id="actionsbody">
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn-success btn-lg">Add game</button>
            </div>
            <br>
            {{ csrf_field() }}
        </form>
    </div>



@endsection