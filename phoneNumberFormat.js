
function phoneFormat(input) {//returns (###) ###-####
    input = input.replace(/\D/g,''); // Expression regulière pour une recherche globale de chiffres 
    var size = input.length;
    if (size>0) {input="("+input} // si une valeur est entrée on ajoute la parenthèse ouvrante "("
    if (size>3) {input=input.slice(0,4)+") "+input.slice(4,11)} // si 3 valeure est entrée on ajoute la parenthèse fermante (###)
    if (size>6) {input=input.slice(0,9)+"-" +input.slice(9)} // si 6 valeure est entrée on ajoute "-" apres la 6eme valeuew (###) ###-
    return input;
}

// FUnction pour formatter le code postale
function zipFormat(input) {//returns zip code  "###-###"
    input = input.toUpperCase();
    var size = input.length;
    if (size>2) {input=input.slice(0,3)+" "+input.slice(4,7)} // si 3 valeure sont entrée on ajoute "-" 
    return input;
}