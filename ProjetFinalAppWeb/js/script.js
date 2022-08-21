console.log("js connecte");

function loadLogin(){
    document.getElementById('login-container').style.display = 'flex';
}

function menuManufacturierAppear(){
    var element = document.getElementById("menu-manufacturier");
    element.classList.remove("menu-manufacturier-hidden");   
}

function menuManufacturierDisappear(){
    var element = document.getElementById("menu-manufacturier");
    element.classList.add("menu-manufacturier-hidden");  
}

// en cours 
function setActiveLink(){
    var elements = document.getElementsByClassName("nav_link");
    console.log(elements);
    elements.forEach(element => {
        element.classList.remove("nav_link_active");
        
    });
}

