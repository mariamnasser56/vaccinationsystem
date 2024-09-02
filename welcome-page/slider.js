class slider{ 
    constructor(){ 
        this.images = []; 
        this.images[0]="msg1047636035-30140.jpg"; 
        this.images[1]="msg1047636035-30141.jpg"; 
        this.images[2]="msg1047636035-30143.jpg"; 
        this.images[3]="msg1047636035-30142.jpg"; 
        this.images[4]="msg1047636035-30146.jpg";
        this.images[5]="msg1047636035-30145.jpg"; 
        this.images[6]="msg1047636035-30147.jpg"; 
 
 
        this.links=[]; 
        this.links[0]="#"; 
        this.links[1]="#"; 
        this.links[2]="#"; 
        this.links[3]="#"; 
        this.links[4]="#"; 
        this.links[5]="#"; 
        this.links[6]="#"; 
        this.counter=0; 
 
        this.playSlider(); 
 
        setInterval(() => { 
            console.log("test"); 
            this.playSlider( ); 
            }, 1500); 
             
 
    } 
    playSlider(){ 
        if(this.counter< this.images.length - 1){ 
          this.counter++; 
 
        } 
        else{ 
         this.counter=0; 
        } 
    document.slider_show.src = this.images[this.counter]; 
    document.getElementById("LinkImg").href=this.links[this.counter]; 
    } 
} 
onload = new slider()