$(document).on("click", ".alert", function(e) {
	bootbox.alert("Hello world!", function() {
		console.log("Alert Callback");
	});
});


bootbox.prompt("What is your name?", function(result) {
if (result === null) {
Example.show("Prompt dismissed");
} else {
Example.show("Hi <b>"+result+"</b>");
}
});