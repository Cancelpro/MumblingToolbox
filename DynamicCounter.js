function dynamicCounter(event){
    var  textArea = document.getElementById("posttext");
    var textCounter = document.getElementById("counter");
    textCounter.innerHTML = "Word Counter: " + textArea.value.length;
    
    if (textArea.value.length > 256){
        textCounter.style.color = "red";
    } else{
        textCounter.style.color = "black";
    }
}