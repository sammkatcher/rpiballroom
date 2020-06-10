function createTable(data) {
    document.getElementById('processing').className = "collapse";
    document.getElementById('resultToggle').style.display = "";

    var pointTable = {
	"Smooth": {
	    "Waltz": [0,0,0],
	    "Tango": [0,0,0],
	    "Foxtrot": [0,0,0],
	    "V. Waltz": [0,0,0]
	},
	"Standard": {
	    "Waltz": [0,0,0],
	    "Quickstep": [0,0,0],
	    "Tango": [0,0,0],
	    "Foxtrot": [0,0,0],
	    "V. Waltz": [0,0,0]
	},
	"Rhythm": {
	    "Cha Cha": [0,0,0],
	    "Rumba": [0,0,0],
	    "Swing": [0,0,0],
	    "Mambo": [0,0,0],
	    "Bolero": [0,0,0]
	},
	"Latin": {
	    "Cha Cha": [0,0,0],
	    "Rumba": [0,0,0],
	    "Samba": [0,0,0],
	    "Jive": [0,0,0],
	    "Paso Doble": [0,0,0]
	}
    };
    
    for (var i = 0; i < data.length; i++) {
	var compEvents = data[i]["compEvents"];
	for (var j = 0; j < compEvents.length; j++) {
	    var event = compEvents[j];
	    var category = event["category"];
	    var dance = event["dance"];
	    var points = event["points"];
	    var level = event["level"];
	    for (k = 0; k < level; k++) {
		var pointsAtLevel = points;
		if ( level - k - 1 == 1 ) {
		    pointsAtLevel = points * 2;
		}
		else if ( level - k - 1 >= 2 ) {
		    pointsAtLevel = 7;
		}
		if (!(category in pointTable))
		    continue;
		if (!(dance in pointTable[category]))
		    continue;
		pointTable[category][dance][k] += pointsAtLevel;
	    }
	}
    }

    var tableString = "<table class='table'>";
    tableString += "<thead><tr>";
    tableString += "<th>Totals</th><th></th><th>Bronze</th><th>Silver</th><th>Gold</th>";
    tableString += "</tr></thead>";
    tableString += "<tbody>";
    for (category in pointTable) {
	var placedCategory = false;
	for (dance in pointTable[category]) {
	    tableString += "<tr>";
	    tableString += "<td><b>" + (placedCategory ? "" : category) + "</b></td>";
	    tableString += "<td>" + dance + "</td>";
	    for (var i = 0; i < pointTable[category][dance].length; i++) {
		var points = pointTable[category][dance][i];
		tableString += "<td>" + (points != 0 ? points : "") + "</td>";
	    }
	    tableString += "</tr>";
	    placedCategory = true;
	}
    }
    tableString += "</tbody>";
    tableString += "</table>";
    document.getElementById('scoresheet').innerHTML = tableString;
    // document.write(tableString);
}
