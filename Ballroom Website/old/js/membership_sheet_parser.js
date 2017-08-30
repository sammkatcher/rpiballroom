var file_text = "";

function readSingleFile(evt) {
    //Retrieve the first (and only!) File from the FileList object
    var f = evt.target.files[0];

    if (f) {
	var r = new FileReader();
	r.onload = function(e) {
	    var contents = e.target.result;
            console.log( "Got the file.n"
			 +"name: " + f.name + "n"
			 +"type: " + f.type + "n"
			 +"size: " + f.size + " bytesn"
		       );
	    file_text = contents;
	    document.getElementById("filerefresh_button").innerHTML = "<button id='filerefresh' onclick='parse_sheet(file_text)'>Refresh</button><br /><br />";
	    parse_sheet(contents);
	}
	r.readAsText(f);
    } else {
	alert("Failed to load file");
    }
}

function parse_sheet(text) {
    var results = "<table><tr>";
    var email_results = "<td>";
    var last_results = "<td>";
    var first_results = "<td>";
    var lines = text.split("\n");

    var email = "";
    var tango = false;
    var lindy = false;
    var club = false;
    var team = false;

    var branch = "";
    var branches = document.getElementsByName("branch");
    for (var i = 0; i < branches.length; i++){
	if (branches[i].checked) {
	    branch = branches[i].value;
	    break;
	}
    }

    // RIN if not checked
    var rin = document.getElementsByName("info")[1].checked;

    for (var i = 2; i < lines.length; i++) {
	var line;
	if (lines[i].search(";") != -1) {
	    line = lines[i].split(";");
	}
	else {
	    line = lines[i].split("\t");
	}
	email = rin ? line[6] : line[4];
	tango = line[7].toLowerCase().trim() == "x";
	lindy = line[8].toLowerCase().trim() == "x";
	club = line[9].toLowerCase().trim() == "x";
	team = line[10].toLowerCase().trim() == "x";

	if (branch == "all" ||
	    (branch == "lindy" && lindy) || 
	    (branch == "tango" && tango) || 
	    (branch == "club" && club) || 
	    (branch == "team" && team)) {
    	    email_results += email + "<br />";
	    last_results += line[0] + "<br />";
	    first_results += line[1] + "<br />";
	}
    }
    email_results += "</td>";
    last_results += "</td>";
    first_results += "</td>";
    results += last_results + first_results + email_results + "</tr></table>";
    document.getElementById("results_area").innerHTML = results;
}

document.getElementById('fileinput').addEventListener('change', readSingleFile, false);

