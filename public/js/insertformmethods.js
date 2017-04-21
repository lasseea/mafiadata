//HOST METHODS
var hostCount = 1;
var maxHosts = 25;

function addHost() {
    if(hostCount>maxHosts){
        alert('Max '+ maxHosts +' hosts allowed per game')
    } else {
        var newHostDiv = $(document.createElement('div'))
            .attr("id", 'hostdiv' + hostCount);

        newHostDiv.after().html(
            '<label>Username: </label>' +
            '<input type="text" name="hostusername' + hostCount + '" id="hostusername' + hostCount + '" value="" required >' +
            ' ' +
            '<label> Type: </label>' +
            '<select name="hosttype' + hostCount + '" id="hosttype' + hostCount + '"><option value="Co-host">Co-host</option><option value="Main host">Main host</option></select>' +
            ' ' +
            '<button class="button btn-danger" id="removehost' + hostCount + '" name="removehost' + hostCount + '" onclick="removeHost('+hostCount+')">X</button>'
        );

        newHostDiv.appendTo("#hostdiv");
        hostCount++;
    }
}

function removeHost(hostNumber) {
    if(hostCount==1){
        alert("Error - No host to remove");
        return false;
    }
    hostCount--;
    $("#hostdiv"+hostNumber).remove();
    for (i=hostNumber; i <= maxHosts ; i++) {
        var count = i-1;
        $("#hostdiv"+i).attr("id", 'hostdiv' + count);
        $("#hostusername"+i).attr("name", 'hostusername' + count);
        $("#hostusername"+i).attr("id", 'hostusername' + count);
        $("#hosttype"+i).attr("name", 'hosttype' + count);
        $("#hosttype"+i).attr("id", 'hosttype' + count);
        $("#removehost"+i).attr("onclick", 'removeHost('+ count +')');
        $("#removehost"+i).attr("name", 'removehost' + count);
        $("#removehost"+i).attr("id", 'removehost' + count);
    }
}

//TEAM METHODS
var teamCount = 1;
var maxTeams = 50;

function addTeam() {
    if(teamCount>maxTeams){
        alert('Max '+ maxTeams +' teams allowed per game')
    } else {
        var newTeamDiv = $(document.createElement('div'))
            .attr("id", 'teamdiv' + teamCount);

        newTeamDiv.after().html(
            '<label>Team name: </label>' +
            '<input type="text" name="teamname' + teamCount + '" id="teamname' + teamCount + '" value="" placeholder="May be same as type" required >' +
            ' ' +
            '<label> Type: </label>' +
            '<select name="teamtype' + teamCount + '" id="teamtype' + teamCount + '" required>' +
            '<option value="Town">Town</option>' +
            '<option value="Mafia">Mafia</option>' +
            '<option value="Third Party">Third Party</option>' +
            '</select>' +
            ' ' +
            '<label>Team Result: </label>' +
            '<select name="teamresulttype' + teamCount + '" id="teamresulttype' + teamCount + '" required>' +
            '<option value="Won">Won</option>' +
            '<option value="Lost">Lost</option>' +
            '<option value="Draw">Draw</option>' +
            '<option value="Null">Null</option>' +
            '</select>' +
            ' ' +
            '<button class="button btn-danger" id="removeteam' + teamCount + '" name="removeteam' + teamCount + '" onclick="removeTeam(' + teamCount + ')">X</button>'
        );

        newTeamDiv.appendTo("#teamdiv");
        teamCount++;
    }
}

function removeTeam(teamNumber) {
    if(teamCount==1){
        alert("Error - No team to remove");
        return false;
    }
    teamCount--;
    $("#teamdiv"+teamNumber).remove();
    for (i=teamNumber; i <= maxTeams ; i++) {
        var count = i-1;
        $("#teamdiv"+i).attr("id", 'teamdiv' + count);
        $("#teamusername"+i).attr("name", 'teamname' + count);
        $("#teamusername"+i).attr("id", 'teamname' + count);
        $("#teamtype"+i).attr("name", 'teamtype' + count);
        $("#teamtype"+i).attr("id", 'teamtype' + count);
        $("#teamresulttype"+i).attr("name", 'teamresulttype' + count);
        $("#teamresulttype"+i).attr("id", 'teamresulttype' + count);
        $("#removeteam"+i).attr("onclick", 'removeTeam('+ count +')');
        $("#removeteam"+i).attr("name", 'removeteam' + count);
        $("#removeteam"+i).attr("id", 'removeteam' + count);
    }
}

//PLAYER SLOT METHODS
var slotCount = 1;
var maxSlots = 500;

function addPlayerSlot() {
    if(slotCount>maxSlots){
        alert('Max '+ maxSlots +' player slots allowed per game')
    } else {
        var newPlayerSlotRow = $(document.createElement('tr'))
            .attr("id", 'playerslotrow' + slotCount);

        newPlayerSlotRow.after().html(
            '<td><input type="text" id="player'+ slotCount +'" name="player'+ slotCount +'" placeholder="Enter player name here" required></td>' +
            '<td><input type="text" name="slotteam' + slotCount + '" id="slotteam' + slotCount + '" placeholder="C/P team name here" required></td>' +
            '<td><input type="text" name="slotrole' + slotCount + '" id="slotrole' + slotCount + '" value="Vanilla" placeholder="Enter role name here" required></td>' +
            '<td><select id="slotstatus' + slotCount + '" name="slotstatus' + slotCount + '" required>' +
            '<option value="Survived">Survived</option>' +
            '<option value="Lynched">Lynched</option>' +
            '<option value="Night killed by Mafia or Third Party">Night killed by Mafia or Third Party</option>' +
            '<option value="Night killed by Town">Night killed by Town</option>' +
            '<option value="Day killed by Mafia or Third Party">Day killed by Mafia or Third Party</option>' +
            '<option value="Day killed by Town">Day killed by Town</option>' +
            '<option value="Modkilled">Modkilled</option>' +
            '<option value="In-Thread Attack">In-Thread Attack</option>' +
            '<option value="Killed in event">Killed in event</option>' +
            '<option value="Suicide">Suicide</option>' +
            '<option value="Endgamed">Endgamed</option>' +
            '<option value="Conceded">Conceded</option>' +
            '</select></td>' +
            '<td><input type="text" id="alias'+ slotCount +'" name="alias'+ slotCount +'" placeholder="Enter alias/hydra name" required></td>' +
            '<td><input type="text" id="secondplayer'+ slotCount +'" name="secondplayer'+ slotCount +'" placeholder="Enter name if hydra" required></td>' +
            '<td><button class="button btn-danger" id="removeplayerslot' + slotCount + '" name="removeplayerslot' + slotCount + '" onclick="removePlayerSlot(' + slotCount + ')">X</button></td>'
        );

        newPlayerSlotRow.appendTo("#allplayerslotsbody");
        slotCount++;
    }
}

function removePlayerSlot(playerSlotNumber) {
    if(slotCount==1){
        alert("Error - No player slot to remove");
        return false;
    }
    slotCount--;
    $("#playerslotrow"+playerSlotNumber).remove();
    for (i=playerSlotNumber; i <= maxSlots ; i++) {
        var count = i-1;
        $("#playerslotrow"+i).attr("id", 'playerslotrow' + count);
        $("#player"+i).attr("name", 'player' + count);
        $("#player"+i).attr("id", 'player' + count);
        $("#slotteam"+i).attr("name", 'slotteam' + count);
        $("#slotteam"+i).attr("id", 'slotteam' + count);
        $("#slotrole"+i).attr("name", 'slotrole' + count);
        $("#slotrole"+i).attr("id", 'slotrole' + count);
        $("#slotstatus"+i).attr("name", 'slotstatus' + count);
        $("#slotstatus"+i).attr("id", 'slotstatus' + count);
        $("#alias"+i).attr("name", 'alias' + count);
        $("#alias"+i).attr("id", 'alias' + count);
        $("#secondplayer"+i).attr("name", 'secondplayer' + count);
        $("#secondplayer"+i).attr("id", 'secondplayer' + count);
        $("#removeplayerslot"+i).attr("name", 'removeplayerslot' + count);
        $("#removeplayerslot"+i).attr("onclick", 'removePlayerSlot('+ count +')');
        $("#removeplayerslot"+i).attr("id", 'removeplayerslot' + count);
    }
}

function generatePlayerSlots() {
    var amount = 0;
    amount = document.getElementById("playerslotnumber").value;
    if (amount <= 0  || amount > 500) {
        alert('Amount of player spots must be between 1 and 500');
    } else {
        hidePlayerSlotsGenerator();
        showPlayerSlotsTable();
        for (var i = 0; i < amount; i++) {
            addPlayerSlot();
        }
    }
}

function hidePlayerSlotsGenerator() {
    $("#generateplayerslotsdiv").hide();
}

function showPlayerSlotsTable() {
    $("#playerspotdiv").removeClass('hidden');
}

//SUBSTITUTE METHODS
var substituteCount = 1;
var maxSubstitutes = 200;

function addSubstitute() {
    if(substituteCount>maxSubstitutes){
        alert('Max '+ maxSubstitutes +' substitutes allowed per game')
    } else {
        var newSubstituteRow = $(document.createElement('tr'))
            .attr("id", 'substituterow' + substituteCount);

        newSubstituteRow.after().html(
            '<td><input type="text" name="suboutname' + substituteCount + '" id="suboutname' + substituteCount + '" value="" placeholder="Enter player name here" required></td>' +
            '<td><input type="text" name="subinname' + substituteCount + '" id="subinname' + substituteCount + '" value="" placeholder="Enter player name here" required></td>' +
            '<td><input type="number" name="dayofsub' + substituteCount + '" id="dayofsub' + substituteCount + '" value="0" min="0" max="500" required></td>' +
            '<td><button class="button btn-danger" id="removesubstitute' + substituteCount + '" name="removesubstitute' + substituteCount + '" onclick="removeSubstitute(' + substituteCount + ')">X</button></td>'
        );

        newSubstituteRow.appendTo("#substitutesbody");
        substituteCount++;
    }
}

function removeSubstitute(substituteNumber) {
    if(substituteCount==1){
        alert("Error - No substitute to remove");
        return false;
    }
    substituteCount--;
    $("#substituterow"+substituteNumber).remove();
    for (i=substituteNumber; i <= maxSubstitutes ; i++) {
        var count = i-1;
        $("#substituterow"+i).attr("id", 'substituterow' + count);
        $("#suboutname"+i).attr("name", 'suboutname' + count);
        $("#suboutname"+i).attr("id", 'suboutname' + count);
        $("#subinname"+i).attr("name", 'subinname' + count);
        $("#subinname"+i).attr("id", 'subinname' + count);
        $("#dayofsub"+i).attr("name", 'dayofsub' + count);
        $("#dayofsub"+i).attr("id", 'dayofsub' + count);
        $("#removesubstitute"+i).attr("name", 'removesubstitute' + count);
        $("#removesubstitute"+i).attr("onclick", 'removeSubstitute('+ count +')');
        $("#removesubstitute"+i).attr("id", 'removesubstitute' + count);
    }
}

//ACTION METHODS
var actionCount = 1;
var maxActions = 2000;

function addAction() {
    if(actionCount>maxActions){
        alert('Max '+ maxActions +' actions allowed per game')
    } else {
        var newActionRow = $(document.createElement('tr'))
            .attr("id", 'actionrow' + actionCount);

        newActionRow.after().html(
            '<td><input type="text" name="actionuser' + actionCount + '" id="actionuser' + actionCount + '" value="" placeholder="Enter name here" required></td>' +
            '<td><select id="actionname' + actionCount + '" name="actionname' + actionCount + '" required>' +
            '<option value=""></option>' +
            '<option value="Peek">Peek</option>' +
            '<option value="Protect">Protect</option>' +
            '<option value="Vig Shot">Vig Shot</option>' +
            '<option value="ITA Shot">ITA Shot</option>' +
            '</select></td>' +
            '<td><input type="text" name="actiontextname' + actionCount + '" id="actiontextname' + actionCount + '" value="" placeholder="Enter name here" required></td>' +
            '<td><input type="text" name="actiontarget' + actionCount + '" id="actiontarget' + actionCount + '" value="" placeholder="Enter name here" required></td>' +
            '<td><select id="nightorday' + actionCount + '" name="nightorday' + actionCount + '" required>' +
            '<option value="Night">Night</option>' +
            '<option value="Day">Day</option>' +
            '</select></td>' +
            '<td><input type="number" name="whichnightorday' + actionCount + '" id="whichnightorday' + actionCount + '" value="0" min="0" max="500" required></td>' +
            '<td><button class="button btn-danger" id="removeaction' + actionCount + '" name="removeaction' + actionCount + '" onclick="removeAction(' + actionCount + ')">X</button></td>'
        );

        newActionRow.appendTo("#actionsbody");
        actionCount++;
    }
}

function removeAction(actionNumber) {
    if(actionCount==1){
        alert("Error - No action to remove");
        return false;
    }
    actionCount--;
    $("#actionrow"+actionNumber).remove();
    for (i=actionNumber; i <= maxActions ; i++) {
        var count = i-1;
        $("#substituterow"+i).attr("id", 'substituterow' + count);
        $("#actionuser"+i).attr("name", 'actionuser' + count);
        $("#actionuser"+i).attr("id", 'actionuser' + count);
        $("#actionname"+i).attr("name", 'actionname' + count);
        $("#actionname"+i).attr("id", 'actionname' + count);
        $("#actiontextname"+i).attr("name", 'actiontextname' + count);
        $("#actiontextname"+i).attr("id", 'actiontextname' + count);
        $("#actiontarget"+i).attr("name", 'actiontarget' + count);
        $("#actiontarget"+i).attr("id", 'actiontarget' + count);
        $("#nightorday"+i).attr("name", 'nightorday' + count);
        $("#nightorday"+i).attr("id", 'nightorday' + count);
        $("#whichnightorday"+i).attr("name", 'whichnightorday' + count);
        $("#whichnightorday"+i).attr("id", 'whichnightorday' + count);
        $("#removeaction"+i).attr("name", 'removeaction' + count);
        $("#removeaction"+i).attr("onclick", 'removeAction('+ count +')');
        $("#removeaction"+i).attr("id", 'removeaction' + count);
    }
}