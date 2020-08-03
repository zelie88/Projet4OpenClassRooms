tinymce.init({
    selector: '#mycontent',
    entity_encoding : "raw",
    encoding: "UTF-8",
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
});

function Toggle() { 
    var temp = document.getElementById("password"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
}
