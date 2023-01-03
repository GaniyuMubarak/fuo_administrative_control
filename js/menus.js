// Selection College base on Department js code

function populate(s1,s2){

    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = "";

    if(s1.value == 'cobmhes'){
        var optionArray = ['select department|Select Department', 'environment health science|Environment Health Science', 'general studies(gns)|General Studies(GNS)', 'medical laboratory science|Medical Laboratory Science', 'nursing|Nursing', 'public health|Public Health'];
    }
    else if(s1.value == 'comass'){
        var optionArray = ['select department|Select Department', 'accounting|Accounting', 'banking and finance|Banking and Finance', 'business administration|Business Administration', 'economics|Economics', 'general studies (gns)|General Studies (GNS)', 'mass communication|Mass Communication', 'political science and public admin|Political Science and Public Admin', 'sociology|Sociology'];
    }
    else if(s1.value == 'conas'){
        var optionArray = ['select department|Select Department', 'biological science (microbiology)|Biological Science (Microbiology)', 'chemical science (biochemistry and nutrition)|Chemical Science (Biochemistry and Nutrition)', 'computer science|Computer Science', 'chemical science (industrial and environmental chemistry)|Chemical Science (Industrial and Environment Chemistry)', 'general studies (gns)|General Studies (GNS)', 'mathematics|Mathematics', 'physics, electronics adn earth science|Physics, Electronics and Earth Science'];
    }
    else if(s1.value == 'law'){
        var optionArray = ['select department|Select Department', 'common and islamic law|Common and Islamic Law', 'common law|Common Law', 'general studies (gns)|General Studies (GNS)', 'islamic law|Islamic Law'];
    }

    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newoption = document.createElement("option");

        newoption.value = pair[1];
        newoption.innerHTML = pair[1];
        s2.options.add(newoption);
    }
}