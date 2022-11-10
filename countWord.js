
 // Script pour compter le nombre de mot dans les textarea
 
 	var wordCount1, wordCount2;
      document
        .querySelector("#descProbleme")
        .addEventListener("input", function countWord() {
          let res = [];
          let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          wordCount1= res.length;
          if (wordCount1>50 ) {
          	document.querySelector("#countNumber1").innerText = wordCount1;
          	document.querySelector("#tailleSuperieur1").innerText = "*RÉDUIRE LA TAILLE DU TEXTE";
          	document.getElementById('form_button').style.visibility='hidden';
          }
           else if (wordCount2>50 && wordCount1<50) {
           	document.querySelector("#countNumber1").innerText = wordCount1;
           	document.querySelector("#tailleSuperieur1").innerText = "";
          	document.getElementById('form_button').style.visibility='hidden';

          }
          else {
          	document.querySelector("#countNumber1").innerText = wordCount1;
          	document.querySelector("#tailleSuperieur1").innerText = "";
          	document.getElementById('form_button').style.visibility='visible';

          }
        });

         document
        .querySelector("#serviceEffectue")
        .addEventListener("input", function countWord() {
          let res = [];
          let str = this.value.replace(/[\t\n\r\.\?\!]/gm, " ").split(" ");
          str.map((s) => {
            let trimStr = s.trim();
            if (trimStr.length > 0) {
              res.push(trimStr);
            }
          });
          wordCount2= res.length;
          if (wordCount2>50) {
          	document.querySelector("#countNumber2").innerText = wordCount2;
          	document.querySelector("#tailleSuperieur2").innerText = "*RÉDUIRE LA TAILLE DU TEXTE";
          	document.getElementById('form_button').style.visibility='hidden';
          }
          else if (wordCount1>50 && wordCount2<50) {
          	document.querySelector("#countNumber2").innerText = wordCount2;
          	document.querySelector("#tailleSuperieur2").innerText = "";
          	document.getElementById('form_button').style.visibility='hidden';

          }
          else {
          	document.querySelector("#countNumber2").innerText = wordCount2;
          	document.querySelector("#tailleSuperieur2").innerText = "";
          	document.getElementById('form_button').style.visibility='visible';
          }
        });

