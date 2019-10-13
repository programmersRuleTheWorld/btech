function cardSlide(){
    var elem = document.getElementById('card-slide');
    var pos = 0;
    var id = setInterval(frame, 5);
    function frame(){
        if(pos === 350){
            clearInterval(id);
        }else{
            pos++;
            elem.style.height = pos + 'px';
        }
    }
}