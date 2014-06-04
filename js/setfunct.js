//------------------------------------------------
//function setLevel(nLev) {document.getElementById('sWord').focus();}

function setLevel(nLev) {
 
if (parseInt(document.getElementById("NumberRow").innerHTML,10) < parseInt(document.getElementById("CurrRow").innerHTML,10)){
 actBt()
exit();
}


    

    
// document.getElementById('tmp2').value = parseInt(document.getElementById("NumberRow").innerHTML,10) + " " + parseInt(document.getElementById("NCurrRow").innerHTML,10);
document.getElementById('tmp2').value = WOTmp;
document.getElementById('tmp1').value = document.getElementById('tmp1').value+" "+countTmp1;

   bookWordL = document.getElementById('numberInTable').value ; 
  

    bookWord = bookWordL ; 
    if (bookWordL < (NumberWords+1)){actBt();}
  dateTmp[countTmp1] = document.getElementById("dLevel").value;
   WETmp[countTmp1] = document.getElementById("WordEdit").value;
  WOTmp[countTmp1] = document.getElementById("oriWord").value;
  PrTmp[countTmp1] = nLev;
  dLev = document.getElementById("dLevel").value;
  
  if (parseInt(document.getElementById("NumberRow").innerHTML,10) == parseInt(document.getElementById("CurrRow").innerHTML,10)){
document.getElementById("WordEdit").value = "";
window.document.WordForm.trnsc.value = "";
window.document.WordForm.TextAreaTranslate.value = "";

} 
  
  
  
  
//document.getElementById('tmp2').value = countTmp1+ "  "+WOTmp+"  "+countTmp2; 
//document.getElementById('tmp1').value  = document.getElementById('tmp1').value + " "+ countTmp1 + WOTmp[countTmp1];
countCurr = countTmp1;
    if (countTmp1==0)
  {countTmp1Prev=NumberTmp -1;}
    else
  {countTmp1Prev=countTmp1-1;}

   if (countTmp1==NumberTmp-1)
  {countTmp1=0;}           
    else
  {countTmp1=countTmp1+1;}
  
if (WOTmp[countTmp1]!=""){deActBt();} 
  
    
//    alert(document.getElementById('Done100').checked );  


 if ((document.getElementById('Done100').checked == true) && (nLev==100)){
  document.getElementById("tc"+(bookWordL)).style.color="red";
  document.getElementById("date"+(bookWordL)).innerHTML = dLev;
 

   bookWordL = parseInt(bookWordL, 10)+1; 
//   if (bookWordL < (NumberWords+1)){actBt();}  
 showWord(bookWordL);
 }       

 if ((document.getElementById('Done100').checked == false) && (nLev==100)){ moveUp(bookWordL);}
  

  if ((document.getElementById('Done50').checked == true) && (nLev==50)){
  document.getElementById("tc"+(bookWordL)).style.color="blue";
  document.getElementById("date"+(bookWordL)).innerHTML = dLev;
   bookWordL = parseInt(bookWordL, 10)+1;                  

   //   if (bookWordL < (NumberWords+1)){showWord(bookWordL);actBt();}
showWord(bookWordL);
  }       

 if ((document.getElementById('Done50').checked == false) && (nLev==50)){ moveUp(bookWordL);}
 
 if ((document.getElementById('Done0').checked == true) && (nLev==0)){
  document.getElementById("tc"+(bookWordL)).style.color="black";
   bookWordL = parseInt(bookWordL, 10)+1; 
   if (bookWordL < (NumberWords+1)){showWord(bookWordL);actBt();}
//       actBt();  
 }       
 if ((document.getElementById('Done0').checked == false) && (nLev==0)){ moveUp(bookWordL);}
   
/* 
 var url = "lib/setLevel.php?nLev="+nLev+"&dLev="+dLev+"&weLev="+weLev+"&woLev="+woLev;
      request.open("GET", url, true);
      request.onreadystatechange = setLevelResponse;
      request.send(null);  
 */
//   alert(countTmp1Prev+" "+WOTmp[countTmp1Prev]);
 if (WOTmp[countTmp1Prev]==""){
     
//     document.getElementById('tmp1').value  = document.getElementById('tmp1').value + "!";
     setLevelInBases(countCurr);} 
}

function setLevelInBases(k) {
    cBook = 1;
   
  var url = "lib/setLevel.php?nLev="+PrTmp[k]+"&dLev="+dateTmp[k]+"&weLev="+WETmp[k]+"&woLev="+WOTmp[k]+"&chLearn=r";
     
      request.open("GET", url, true);
      request.onreadystatechange = setLevelInBasesResponse;
      request.send(null);  
}


function setLevelInBasesResponse() {
if (request.readyState == 4){
//document.getElementById('sWord').value  = document.getElementById('sWord').value + " " + countTmp2 + request.responseText;

WOTmp[countTmp2]="";
  if (countTmp2==NumberTmp-1)
  {countTmp2=0;}           
    else
  {countTmp2 = countTmp2+1;}

 

 if (WOTmp[countTmp2]!="" ){
 //document.getElementById('sWord').value  = document.getElementById('sWord').value +"!";
 setLevelInBases(countTmp2);
//document.getElementById('tmp2').value = countTmp1+ "  "+WOTmp+"  "+countTmp2;
actBt();
exit(); 
} 

 
 
 if (WOTmp[countTmp2]=="" ){
// deActBt();
 for (var k = 0; k < NumberTmp-1; k++) {
  countTmp2=k;
 if (WOTmp[k]!="" ){
     //document.getElementById('sWord').value  = document.getElementById('sWord').value +"!";
 setLevelInBases(k); 
 exit();
 }
 
 countTmp1=0;
 countTmp2=0;
 
//document.getElementById('tmp2').value = countTmp1+ "##"+WOTmp+"##"+countTmp2;
 //actBt();
 } 
 calcLev();    
} 
   
 
// actBt();

}    
}

 //End ------------------------------------------
 //---------------------------------------------- 
function check_exit(){
 for (var k = 0; k < NumberTmp-1; k++) {
  countTmp2=k;
 if (WOTmp[k]!="" ){
     //document.getElementById('sWord').value  = document.getElementById('sWord').value +"!";
 setLevelInBases(k); 
 exit();
 }
 
 countTmp1=0;
 countTmp2=0;
 
//document.getElementById('tmp2').value = countTmp1+ "##"+WOTmp+"##"+countTmp2;
 //actBt();
 }     
 alert("buy")  ; 
    
}


  function setBookmark() {
     idSBM = document.getElementById("numberInTable").value;
    var url = "lib/setBookmark.php?iSort="+document.getElementById("idS"+idSBM).innerHTML;
       request.open("GET", url, false);
      request.onreadystatechange = setBookmarkResponse;
      request.send(null);
          } 
 
  function setBookmarkResponse() {

    if (request.readyState == 4){
         if (idB!=0){
        document.getElementById("idS"+idB).style.color="black";
        }
        document.getElementById("idS"+idSBM).style.color="red";
        idB=idSBM;
        alert("Done");    
             
    }
    
  } 
  //End ------------------------------------------
  //-????? ??? ??????. ???????? ??? ? ???????------
  function seekTrans(eWord) {
     var url = "lib/seekTrans.php?eWord="+eWord;
      request.open("GET", url, true);
      request.onreadystatechange = seekTransResponse;
      request.send(null);   
}

 function seekTransResponse() {

    if (request.readyState == 4){
   
  var tagList = request.responseText.split("@(@");
  window.document.WordForm.TextAreaTranslate.value=tagList[1];
  window.document.WordForm.trnsc.value=tagList[0];
    }
  } 
 //End ????? ??? ??????. ???????? ??? ? ???????----------------------------------------

 function saveEdit(cha) {
    bookWord = document.getElementById('numberInTable').value ;   
 tr = window.document.WordForm.TextAreaTranslate.value;
 eWord = window.document.WordForm.WordEdit.value;
 oWord = document.getElementById('oriWord').value;
 tc = window.document.WordForm.trnsc.value;
 trw= document.getElementById('WordTrs').value;
 prvw = document.getElementById("tc"+bookWord).innerHTML;
 
 pth="lib/saveEdit.php";
 if (cha =="all"){pth="lib/saveEditA.php";}
 
 $.ajax({
   type: "POST",
  url: pth,
   data: "tr="+tr+"&eWord="+eWord+"&oWord="+oWord+"&tc="+tc+"&trWord="+trw+"&prevWord="+prvw+"&cha="+cha,
      async:false,
  success:  saveEditResponse, 
 });
 

}
 

 
 
 
 function saveEditResponse(data) {
//  alert(data);
 var tagList = data.split("@(@");

    var flag=tagList[0];
    var dtp=tagList[1];
    var pr=tagList[2];
    var cha=tagList[3].trim();
    if (flag==0){
        
        document.getElementById("tc"+(bookWord)).style.color="black";
        document.getElementById("idS"+(bookWord)).style.background="white";
 
  TrnslArray[bookWord-1] = window.document.WordForm.TextAreaTranslate.value;
  TrnscArray[bookWord-1] = window.document.WordForm.trnsc.value;
  document.getElementById("tc"+bookWord).innerHTML = window.document.WordForm.WordEdit.value;
  document.getElementById("date"+bookWord).innerHTML=dtp;


  
 
  if ((document.getElementById('Done50').checked == true) && (pr==50)){document.getElementById("tc"+(bookWord)).style.color="blue";}
 if ((document.getElementById('Done50').checked == false) && (pr==50)){moveUp(bookWord);}
 
// flagdel
    if((document.getElementById('flagdel').checked == true) && (pr==-1)){
    document.getElementById("idS"+(bookWord)).style.background="black";
    document.getElementById("tc"+(bookWord)).style.color="black";
       }
   
  if((document.getElementById('flagdel').checked == true) && (pr==-1)){moveUp(bookWord);}  
    
 if ((document.getElementById('Done100').checked == true) && (pr==100)){document.getElementById("tc"+(bookWord)).style.color="red";}
 if ((document.getElementById('Done100').checked == false) && (pr==100)){moveUp(bookWord);}
 
   for (var k = 0; k < (NumberWords-bookWord); k++) {
//     alert("aaa");  
   f=parseInt(bookWord,10)+parseInt(k,10); fn=parseInt(bookWord,10)+parseInt(k,10)+1; 
 
   if(document.getElementById("tc"+fn).innerHTML==document.getElementById("tc"+bookWord).innerHTML)
    { moveUp(fn);exit(); }   
   
   }
   
   }
 
 
 if (flag==2){moveUp(bookWord);}
 if(cha!="mute"){alert("Done!")};
 calcLev();
 }
 
 
 function delRestore(ch,cha) {
    
 bookWord = document.getElementById('numberInTable').value ;
 eWord = window.document.WordForm.WordEdit.value;
  
 //alert(data);  
 if ((document.getElementById('flagdel').checked == true) && (ch==-1))
 {
 document.getElementById("np"+(bookWord)).style.background="black";
 document.getElementById("tc"+(bookWord)).style.color="black";
   bookWord = parseInt(bookWord, 10)+1; showWord(bookWord);  
  
 }
 if ((document.getElementById('flagdel').checked == false) && (ch==-1)){moveUp(bookWord);}
 
 
 if ((document.getElementById('Done0').checked == true) && (ch==1))
 {
 document.getElementById("np"+(bookWord)).style.background="white";
 document.getElementById("tc"+(bookWord)).style.color="black";
 bookWord = parseInt(bookWord, 10)+1; showWord(bookWord);  
 }
 if ((document.getElementById('Done0').checked == false) && (ch==1)){moveUp(bookWord);} 
  
  
  
  
  

  pth="lib/delRestore.php";
  if (cha == "all"){pth="lib/delRestoreA.php";}
  $.get(
  pth,
  {
    ch: ch,
    eWord: eWord,
  },
  delRestoreResponse
);
   
}
 
 function delRestoreResponse(data) {
//alert(data);
 
 
 calcLev();
 
 }
  
 
 
 function moveUp(i) {
 

 
         if (beacSt == 0)  {actBt();}
  for (var k = 0; k < (NumberWords-i); k++) {
   f=parseInt(i,10)+parseInt(k,10); fn=parseInt(i,10)+parseInt(k,10)+1; 
  
   document.getElementById("tc"+f).innerHTML = document.getElementById("tc"+fn).innerHTML; 
   $("#tc"+f).css('color', $("#tc"+fn).css('color')) ;
   $("#tc"+f).css('background-color', $("#tc"+fn).css('background-color')) ;
   
   document.getElementById("np"+f).innerHTML = document.getElementById("np"+fn).innerHTML; 
   $("#np"+f).css('color', $("#np"+fn).css('color')) ;
   $("#np"+f).css('background-color', $("#np"+fn).css('background-color')) ;
   
   document.getElementById("date"+f).innerHTML = document.getElementById("date"+fn).innerHTML; 
   $("#date"+f).css('color', $("#date"+fn).css('color')) ;
   $("#date"+f).css('background-color', $("#date"+fn).css('background-color')) ;

   document.getElementById("iteration"+f).innerHTML = document.getElementById("iteration"+fn).innerHTML; 
   $("#iteration"+f).css('color', $("#iteration"+fn).css('color')) ;
   $("#iteration"+f).css('background-color', $("#iteration"+fn).css('background-color')) ;

   document.getElementById("idS"+f).innerHTML = document.getElementById("idS"+fn).innerHTML; 
   $("#idS"+f).css('color', $("#idS"+fn).css('color')) ;
   $("#idS"+f).css('background-color', $("#idS"+fn).css('background-color')) ;
  
   TrnslArray[f-1] = TrnslArray[fn-1];
   TrnscArray[f-1] = TrnscArray[fn-1];
   WOArray[f-1] = WOArray[fn-1];
   WtrArray[f-1] = WtrArray[fn-1];
   
  }

   TrnslArray[NumberWords-1]= TrnslSt[beacNSr];    
    TrnscArray[NumberWords-1]= TrnscSt[beacNSr];    
    WOArray[NumberWords-1] = WOSt[beacNSr];
    WtrArray[NumberWords-1] = WtrSt[beacNSr];
    
  
       document.getElementById("tc"+NumberWords).innerHTML =" ";
        document.getElementById("tc"+NumberWords).style.color="black";
              
        document.getElementById("iteration"+NumberWords).innerHTML = " ";
        document.getElementById("iteration"+NumberWords).style.background="white";
         document.getElementById("np"+NumberWords).innerHTML = " ";
        document.getElementById("np"+NumberWords).style.background="white";
        document.getElementById("date"+NumberWords).innerHTML = " ";
        document.getElementById("date"+NumberWords).style.background="white";                                      
  
  document.getElementById("NumberRow").innerHTML = parseInt(document.getElementById("NumberRow").innerHTML,10)-1; 
 
 
  if(typeof(WOSt[beacNSr])=="undefined"){ showWord(bookWord); return ;} 
  
                                              
  
  
  document.getElementById("tc"+NumberWords).innerHTML = WESt[beacNSr];
       if(PrSt[beacNSr]==50){
    document.getElementById("tc"+NumberWords).style.color="blue";
       }
       
       if(PrSt[beacNSr]==-1){
    document.getElementById("np"+NumberWords).style.background="black";
    document.getElementById("tc"+NumberWords).style.color="black";
       }
       
       if(PrSt[beacNSr]==100){
           document.getElementById("tc"+NumberWords).style.color="red";
              }
//    document.getElementById("idS"+NumberWords).innerHTML = mvID[k+1];
 
    document.getElementById("date"+NumberWords).innerHTML = dateSt[beacNSr];
    document.getElementById("np"+NumberWords).innerHTML = NPSt[beacNSr];
    document.getElementById("iteration"+NumberWords).innerHTML = IterationSt[beacNSr];
    document.getElementById("idS"+NumberWords).innerHTML = idSSt[beacNSr];

   
    
    
    
showWord(bookWord);  
beacNSr =   beacNSr+1;
 
if  (beacNSr==(NumberStore/2 )){
//if (beacSt == 2)  {  deActBt();}    

 for (var k = 0; k < (NumberStore/2 ); k++) { 
    idSSt[k] = idSSt[k+(NumberStore/2 )];  
    TrnslSt[k] = TrnslSt[k+(NumberStore/2 )];
    TrnscSt[k] = TrnscSt[k+(NumberStore/2 )];
    WOSt[k] = WOSt[k+(NumberStore/2 )];
    WESt[k] = WESt[k+(NumberStore/2 )];
    dateSt[k] = dateSt[k+(NumberStore/2 )];
    NPSt[k] = NPSt[k+(NumberStore/2 )];
    PrSt[k] = PrSt[k+(NumberStore/2 )];
    IterationSt[k] = IterationSt[k+(NumberStore/2)];
    WtrSt[k] =  WtrSt[k+1 -NumberStore/2];
 }
// alert (WOSt);
beacSt = 2;
beacNSr=0;

fillSt();
//document.getElementById('tmp2').value=document.getElementById('tmp2').value+"contin";

}
}

function fillSt(){
//alert('fillSt start');
  pth="lib/fillTableSt.php";
$.ajax({
   type: "GET",
  url: pth,
    data: "WO="+WOSt[NumberStore-1],
      async:true,
  success:  fillStResponse, 
 });
}


function fillStResponse(data) {
 var tagList = data.split("@(@");
 //  alert(tagList[1]);
 //alert("WOSt " + WOSt);
    var mvWE=tagList[1].split("{{~");
    var mvID=tagList[0].split("{{~");
    var mvTrnsl=tagList[2].split("{{~");
    var mvTrnsc=tagList[3].split("{{~");
    var mvDate=tagList[4].split("{{~");
    var mvPr=tagList[5].split("{{~");
    var mvWO=tagList[6].split("{{~");
    var mvNP=tagList[7].split("{{~");
    var mvIteration=tagList[8].split("{{~");
    var mvWtr=tagList[9].split("{{~");
                                       
 
 for (var k = NumberStore/2 ; k < NumberStore; k++) {
 //    alert(mvWO[k+1 -NumberStore/2]);
    TrnslSt[k]= mvTrnsl[k+1 -NumberStore/2];    
    TrnscSt[k]= mvTrnsc[k+1 -NumberStore/2];    
    WOSt[k] = mvWO[k+1 -NumberStore/2];
    WESt[k] = mvWE[k+1 -NumberStore/2];
    dateSt[k] =  mvDate[k+1 -NumberStore/2];
    NPSt[k] = mvNP[k+1 -NumberStore/2];
    PrSt[k] = mvPr[k+1 -NumberStore/2];
    IterationSt[k] =  mvIteration[k+1 -NumberStore/2];
    WtrSt[k] =  mvWtr[k+1 -NumberStore/2];
 } 
 //alert("result " + WOSt);  
  beacSt=0;  
actBt();

}







function deActBt(){
document.getElementById('btRestore').disabled = true;
document.getElementById('btDel').disabled = true;
document.getElementById('bt0').disabled = true;
document.getElementById('bt50').disabled = true;
document.getElementById('bt100').disabled = true;
document.getElementById('btDel').disabled = true;
}

function actBt(){
document.getElementById('btRestore').disabled = false;
document.getElementById('btDel').disabled = false;
document.getElementById('bt0').disabled = false;
document.getElementById('bt50').disabled = false;
document.getElementById('bt100').disabled = false;
document.getElementById('btDel').disabled = false;
}