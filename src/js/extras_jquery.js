$(document).ready(function() {
    $("#hamburger").click(function() {
        $("aside").show("slow");
    });

    $("#close").click(function() {
        $("aside").hide("slow");
    });
});
