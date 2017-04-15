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
            /*
            '<label>Player:</label>' +
            '<input type="text" id="player'+ slotCount +'" name="player'+ slotCount +'" placeholder="Enter player name here" required>' +
            ' ' +
            '<label>Team: </label>'+
            '<input type="text" name="slotteam' + slotCount + '" id="slotteam' + slotCount + '" placeholder="C/P team name here" required >' +
            ' ' +
            '<label>Role:</label>' +

            ' ' +
            '<label>End status:</label>' +

            ' ' +
            '<label>Alias:</label>' +

            ' ' +

            */
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
            '<td><input type="text" id="secondplayer'+ slotCount +'" name="secondplayer'+ slotCount +'" placeholder="Only if Hydra game" required></td>' +
            '<td><button class="button btn-danger" id="removeplayerslot' + slotCount + '" name="removeplayerslot' + slotCount + '" onclick="removePlayerSlot(' + slotCount + ')">X</button></td>'
        );

        newPlayerSlotRow.appendTo("#allplayerslotsbody");
        slotCount++;
    }
}

function removePlayerSlot(playerSlotNumber) {

}