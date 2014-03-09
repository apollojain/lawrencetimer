	var a = false;
	var count = 0;
    function startTimer()
    {	
        var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
        function timer()
        {
			if(a == true){
            	count=count+1;
			}else{
				clearInterval(counter);
			}
         document.getElementById("time").value= Math.floor(count/3600) + " hrs " + Math.floor(count/60) + " mins " + count % 60 + " secs"; // watch for spelling
        }
        return timer()
    }
    
    function toggleTimer(){
		if(a == false){
			a = true;
			startTimer();
		}
		else{
			a = false;
		}
		
	}
