 var t = document.getElementById("table");
 var trs = t.getElementsByTagName("tr");
 var tds = null;
 for (var i = 0; i < trs.length; i++) {
     tds = trs[i].getElementsByTagName("td");
     for (var n = 0; n < tds.length; n++) {
         tds[n].addEventListener('click',(e )=> {
             if (e.target.classList.contains("highlight")) {
                 e.target.classList.remove("highlight");
             } else {
                 e.target.classList.add("highlight");
             }
         })
     }
 }

