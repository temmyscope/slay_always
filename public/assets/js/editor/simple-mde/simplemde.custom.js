// second demo of simple mde
var sample = [
    "### Instructions",
    "Enter text in the area on the left. For more info, click the ? (help) icon in the menu."
]
var simplemde = new SimpleMDE({element: $("#smde")[0], toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "image", "|", "guide"]});
$(document).ready(function() {
    writeSample();
    simplemde.codemirror.on("change", function(){
        var renderedHTML = simplemde.options.previewRender(simplemde.value());
        $("#write_here").html(renderedHTML);
        $("#write_here").css("height", $(".row").height() +  "px" );
    });
});
function writeSample() {
    var s = "";
    s = getSample();
    simplemde.value(s);
    var renderedHTML = simplemde.options.previewRender(simplemde.value());
    $("#write_here").html(renderedHTML);
    $("#write_here").css("height", $(".row").height() +  "px" );
}
function getSample() {
    var s = "";
    $.each(sample, function( index, value ) {
        //alert( index + ": " + value );
        s = s + value + "\n\r";
    });
    return s;
}