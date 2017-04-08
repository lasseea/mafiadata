/**
 * Created by leadk on 4/1/2017.
 */

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

function addTeam(teamTypes, teamResultTypes) {
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
            '<select name="teamtype' + teamCount + '" id="teamtype' + teamCount + '">' +
            '<option value="Town">Town</option>' +
            '<option value="Mafia">Mafia</option>' +
            '<option value="Third Party">Third Party</option>' +
            '</select>' +
            ' ' +
            '<label>Team Result: </label>' +
            '<select name="teamresulttype' + teamCount + '" id="teamresulttype' + teamCount + '">' +
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
