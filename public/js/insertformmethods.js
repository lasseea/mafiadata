/**
 * Created by leadk on 4/1/2017.
 */

var hostCount = 1;
var maxHosts = 20;

function addHost() {
    if(hostCount>maxHosts){
        alert('Max 20 hosts allowed per game')
    } else {
        var newCoHostDiv = $(document.createElement('div'))
            .attr("id", 'hostdiv' + hostCount);

        newCoHostDiv.after().html(
            '<label>Username: </label>' +
            '<input type="text" name="hostusername' + hostCount + '" id="hostusername' + hostCount + '" value="" required >' +
            ' ' +
            '<label> Type: </label>' +
            '<select name="hosttype' + hostCount + '" id="hosttype' + hostCount + '"><option value="Co-host">Co-host</option><option value="Main host">Main host</option></select>' +
            ' ' +
            '<button class="button btn-danger" id="removehost' + hostCount + '" name="removehost' + hostCount + '" onclick="removeHost('+hostCount+')">X</button>'
        );

        newCoHostDiv.appendTo("#hostdiv");
        hostCount++;
    }
}

function removeHost(hostNumber) {
    alert('test');
    if(hostCount==1){
        alert("Error - No host to remove");
        return false;
    }
    hostCount--;
    $("#hostdiv"+hostNumber).remove();
    for (i=hostNumber; i < 20 ; i++) {
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

