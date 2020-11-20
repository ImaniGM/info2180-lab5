window.onload = function(){
    var xhttpR;
    var xhttpS;
    var button1 = document.getElementById("lookup");
    var button2 = document.getElementById("lookupCities");
    var result = document.getElementById("result");
    

    button1.addEventListener('click',function(e){
        e.preventDefault();
        country = document.getElementById("country").value;
        xhttpR = new XMLHttpRequest();
        url = 'http://localhost/info2180-lab5/world.php?country=' + country;
        xhttpR.onreadystatechange = request;
        xhttpR.open('GET', url, true);
        xhttpR.send();
        
    });

    function request(){
        if((xhttpR.readyState === XMLHttpRequest.DONE) && (xhttpR.status === 200))
        {
           result.innerHTML = xhttpR.responseText;
        }
       
    }
    
     button2.addEventListener('click',function(eve){
        eve.preventDefault();
        country = document.getElementById("country").value;      
        xhttpS = new XMLHttpRequest();
        url = 'http://localhost/info2180-lab5/world.php?country='+country+'&context=cities';
        xhttpS.onreadystatechange = mReqest;
        xhttpS.open('GET', url, true);
        xhttpS.send();
        
    });
    
     function mReqest(){
        if((xhttpS.readyState === XMLHttpRequest.DONE) && (xhttpS.status === 200))
        {
           result.innerHTML = xhttpS.responseText;
        }
       
     }
    };

