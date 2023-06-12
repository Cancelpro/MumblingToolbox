function Like(event){
    //document.getElementById("LikeButton").src = "LikeOn.png";
    LikeButtonReg = /LikeOff.png$/
    if (LikeButtonReg.test(document.getElementById("LikeButton").src)){
        document.getElementById("LikeButton").src = "LikeOn.png";
        document.getElementById("DislikeButton").src = "DislikeOff.png"
        
    } else{
        document.getElementById("LikeButton").src = "LikeOff.png"
        
    }
    
    
}

function Dislike(event){
    DislikeButtonReg = /DislikeOff.png$/
    if (DislikeButtonReg.test(document.getElementById("DislikeButton").src)){
        document.getElementById("DislikeButton").src = "DislikeOn.png";
        document.getElementById("LikeButton").src = "LikeOff.png"
        
    } else{
        document.getElementById("DislikeButton").src = "DislikeOff.png"
        
    }
}
